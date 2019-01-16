<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;

use Hash;

class ProfileController extends Controller
{
    public function getProfile(){
        return view('system.profile.index');
    }

    public function postUpdateotpverify(Request $request){
        $checked = $request->input('checkbox-switch-otp');
        $user = User::find(Session('user')->User_ID);
        if ($checked == "on") {
            $user->User_OTP = 1;
            $user->save();
            Session('user')->User_OTP = 1;
        }
        else {
            $user->User_OTP = 0;
            $user->save();
            Session('user')->User_OTP = 0;
        }
        return redirect()->route('system.getProfile')->with(['flash_type'=>'success','flash_message'=>'Update Securiy success!']);
    }

    public function postUpdatepassword(Request $request){
        $this->validate($request,
        [
            'password' => 'required|max:25',
            'newpassword' => 'required|max:25',
        ]
        );

        $password = $request->input('password');
        $newpassword = $request->input('newpassword');
        $user = User::find(Session('user')->User_ID);
        if (Hash::check($password,$user->User_Password)){
            $user->User_Password = Hash::make($newpassword);
            $user->save();
            return redirect()->route('system.getProfile')->with(['flash_type'=>'success', 'flash_message'=>'Update Password success!']);
        }
        else {
            return redirect()->route('system.getProfile')->with(['flash_type'=>'error', 'flash_message'=>'Your current Password is wrong!']);
        }
    }

    public function postUpdateavatar(Request $request){
        if ($request->input('submit-update')) {
            $this->validate($request, [
                'input_img' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        
            if ($request->hasFile('input_img')) {

                $image = $request->file('input_img');
                $name = Session('user')->User_ID.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('system/avatar');
                $image->move($destinationPath, $name);
                
                $user = User::find(Session('user')->User_ID);
                if ($user){
                    $user->User_Avatar = $name;
                    $user->save();
                    Session('user')->User_Avatar = $name;
                }

                return redirect()->route('system.getProfile')->with(['flash_type'=>'success', 'flash_message'=>'Update Avatar success!']);
            }
        }

        elseif ($request->input('submit-delete')) {
            $user = User::find(Session('user')->User_ID);
            if ($user){
                if ($user->User_Avatar!=''){
                    $user->User_Avatar = '';
                    $user->save();
                    Session('user')->User_Avatar = '';
                }
                else {
                    return redirect()->route('system.getProfile')->with(['flash_type'=>'error', 'flash_message'=>'Avatar was deleted']);
                }
            }
            return redirect()->route('system.getProfile')->with(['flash_type'=>'success', 'flash_message'=>'Delete Avatar success!']);
        }

    }

}
