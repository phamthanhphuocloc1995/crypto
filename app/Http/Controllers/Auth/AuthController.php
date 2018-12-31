<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\User;
use Illuminate\Support\Facades\Session;

use Hash;
use Mail;

class AuthController extends Controller
{
    public function getSignin() {
        return view('system.auth.signin');
    }

    public function postSignin(Request $request) {
        //Lấy dữ liệu captcha
        $captcha = $request->input('g-recaptcha-response');
        if (!$captcha) {
            //Chưa check captcha
            return redirect()->route('system.getSignin')->with(['flash_type'=>'error', 'flash_message'=>'Please check google recaptcha before submit form']);
        } else {
            //Kiểm tra xác thực captcha
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Leie4UUAAAAAO8sgdx1jzJX8lwkWEGbUqGYW_-1&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
            if (json_decode($response)->success == false) {
                //Lỗi xác thực
                return redirect()->route('system.getSignin')->with(['flash_type'=>'error', 'flash_message'=>'Google recaptcha: Error Vertificate ']);
            }

            $this->validate($request, 
                [
                'login-password' => 'required|max:25',
                'login-email' => 'required|email',
                ]
            );

            if (!$user = User::GetUser($request->input('login-email'),1)) {
                return redirect()->route('system.getSignin')->with(['flash_type'=>'error', 'flash_message'=>'The email does not exsist in system']);
            }

            if (!Hash::check($request->input('login-password'),$user->User_Password)) {
                return redirect()->route('system.getSignin')->with(['flash_type'=>'error', 'flash_message'=>'The password is wrong']);
            }

            if (!Session::has('user')){
                Session::put('user',$user);
            }

            dd('return view dashboard : Welcomeback ! ".$user->User_ID." ');
        }
    }

    public function getSignup() {
        return view('system.auth.signup');
    }

    public function postSignup(Request $request) {
    //Lấy dữ liệu captcha
    $captcha = $request->input('g-recaptcha-response');
    if (!$captcha) {
        //Chưa check captcha
        return redirect()->route('system.getSignup')->with(['flash_type'=>'error', 'flash_message'=>'Please check google recaptcha before submit form']);
    } else {
        //Kiểm tra xác thực captcha
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Leie4UUAAAAAO8sgdx1jzJX8lwkWEGbUqGYW_-1&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if (json_decode($response)->success == false) {
        //Lỗi xác thực
        return redirect()->route('system.getSignup')->with(['flash_type'=>'error', 'flash_message'=>'Google recaptcha: Error Vertificate ']);
        }

        $this->validate($request, 
            [
            'register-username' => 'required|max:25',
            'register-email' => 'required|email|unique:User,User_Email',
            ]
        );

        $input = array(
            'User_ID' => User::Random_User_ID(),
            'User_Name' => $request->input('register-username'),
            'User_Email' => $request->input('register-email'),
            'User_EmailActive' => 0,
            'User_RegisteredDatetime' => date("Y-m-d h:i:s"),
            'User_Level' => 0,
            'User_Password' => '',
            'User_Status'   => 1,
            'User_OTP'  => 0
        );

        //Tạo token cho mail
        $token = Crypt::encryptString($request->input('register-email').':'.time());
        $input['User_Token'] = $token;

        //Insert db thông tin user
        User::InsertDB($input);

        //dữ liệu gửi sang mailtemplate
        $data = array('User_ID'=>$input['User_ID'], 'token'=>$token);

        // gửi mail
        Mail::send('mailTemplate.addUser', $data, function($msg) use ($input){
            $msg->from('do-not-reply@earncoingame.com','Earn Coin Game');
            $msg->to($input['User_Email'])->subject('Activate Account');
        });

        return redirect()->route('system.getSignup')->with(['flash_type'=>'success', 'flash_message'=>'Register Success ! Please check your email to Activate Account']);
    }
}

    public function getForgotPassword() {
        return view('system.auth.forgotpassword');
    }

    public function getUpdatePassword($token) {
        try {
            $decrypted = Crypt::decryptString($token);
        } catch (DecryptException $e) {
            return redirect()->route('system.getSignup')->with(['flash_type'=>'error', 'flash_message'=>'Token does not exist']);
        }

        $ex = explode(':',$decrypted);
        $user = User::where('User_Email', $ex[0])->where('User_Token', $token)->first();
        if(!$user){
            return redirect()->route('system.getSignup')->with(['flash_type'=>'error', 'flash_message'=>'User does not exist']);
        }
        return view('system.auth.updatepassword',compact('token'));
    }

    public function postUpdatePassword($token,Request $request) {
        $this->validate($request,
        [
            'register-password' => 'required|max:25',
            'register-password-verify' => 'required|max:25|same:register-password',
        ]
        );

        try {
            $decrypted = Crypt::decryptString($token);
        } catch (DecryptException $e) {
            return redirect()->route('system.getSignup')->with(['flash_type'=>'error', 'flash_message'=>'Token does not exist']);
        }

        $ex = explode(':',$decrypted);
        $User_Password = Hash::make($request->input('register-password'));
        $checkactive = User::where(['User_Email'=>$ex[0],'User_EmailActive'=>0])->first();
        if ($checkactive) {
            $update = User::where('User_Email',$ex[0])->update(['User_Password'=>$User_Password,'User_EmailActive'=>1]);
            if ($update) {
                return redirect()->route('system.getSignin')->with(['flash_type'=>'success', 'flash_message'=>'Activate Account Success! Please Login']);
            }
        }
        else {
            return redirect()->route('system.getSignin')->with(['flash_type'=>'error', 'flash_message'=>'Your account was active']);
        }
    }
}
