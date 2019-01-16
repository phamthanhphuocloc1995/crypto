<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "User";
    
    protected $fillable = ['User_ID','User_Name','User_Email', 'User_Avatar', 'User_EmailActive', 'User_RegisteredDatetime', 'User_Level', 'User_Password', 'User_Status', 'User_Token', 'User_OTP'];

    public $timestamps = false;
	
	protected $primaryKey = 'User_ID';
	
    protected $hidden = [
        'User_Password', 'User_Token', 'User_OTP'
    ];

    public static function Random_User_ID(){
        $id = rand(100000, 999999);
        $user = User::where('User_ID',$id)->first();
            if(!$user){
                return $id;
            }else{
                return User::Random_User_ID();
            }
    }

    public static function InsertDB($input){
        DB::table('User')->insert($input);
    }

    public static function GetUser($input,$type=0) {
        $result = array();
            if ($type == 0) {
                $type = 'User_ID';
            }
            elseif ($type == 1) {
                $type = 'User_Email';
            }
            else {
                $type = 'Error';
            }
            switch($type) {
                case 'Error': break;
                case 'User_ID' : $result = DB::table('User')->Where('User_ID',$input)->first(); break;
                case 'User_Email' : $result = DB::table('User')->Where('User_Email',$input)->first(); break;
            }
        return $result;
    }

    public static function GetUserChildren($user) {
        // 1F Children
        $result = User::select('User_ID', 'User_Name', 'User_Email', 'User_Avatar', 'User_RegisteredDatetime', 'User_Status', DB::raw("(CHAR_LENGTH(User_Childrens)-CHAR_LENGTH(REPLACE(User_Childrens, ',', '')))-" . substr_count($user->User_Childrens, ',') . " AS f"))
        ->where('User_Parent',$user->User_ID)
        ->where('User_ID','<>',$user->User_ID)
        ->where('User_Childrens','<>',$user->User_Childrens)
        ->where('User_Status',1)
        ->orderBy('User_RegisteredDatetime','DESC')
        ->paginate(10);
        return $result;

        //Multi Children
        // $result = User::select('User_ID', 'User_Name', 'User_Email', 'User_Avatar', 'User_RegisteredDatetime', 'User_Status', DB::raw("(CHAR_LENGTH(User_Childrens)-CHAR_LENGTH(REPLACE(User_Childrens, ',', '')))-" . substr_count($user->User_Childrens, ',') . " AS f"))
        // ->whereRaw('User_Childrens LIKE "'.$user->User_Childrens.'%"')
        // ->where('User_ID','<>',$user->User_ID)
        // ->where('User_Childrens','<>',$user->User_Childrens)
        // ->where('User_Status',1)
        // ->orderBy('User_RegisteredDatetime','DESC')
        // ->paginate(20);
        // return $result;
    }

    public static function GetCountUserChildren($user) {
        // 1F Children
        $result = User::select('User_ID', 'User_Name', 'User_Email', 'User_Avatar', 'User_RegisteredDatetime', 'User_Status', DB::raw("(CHAR_LENGTH(User_Childrens)-CHAR_LENGTH(REPLACE(User_Childrens, ',', '')))-" . substr_count($user->User_Childrens, ',') . " AS f"))
        ->where('User_Parent',$user->User_ID)
        ->where('User_ID','<>',$user->User_ID)
        ->where('User_Childrens','<>',$user->User_Childrens)
        ->where('User_Status',1)
        ->orderBy('User_RegisteredDatetime','DESC')
        ->get();
        return count($result);

        //Multi Children
        // $result = User::select('User_ID', 'User_Name', 'User_Email', 'User_Avatar', 'User_RegisteredDatetime', 'User_Status', DB::raw("(CHAR_LENGTH(User_Childrens)-CHAR_LENGTH(REPLACE(User_Childrens, ',', '')))-" . substr_count($user->User_Childrens, ',') . " AS f"))
        // ->whereRaw('User_Childrens LIKE "'.$user->User_Childrens.'%"')
        // ->where('User_ID','<>',$user->User_ID)
        // ->where('User_Childrens','<>',$user->User_Childrens)
        // ->where('User_Status',1)
        // ->orderBy('User_RegisteredDatetime','DESC')
        // ->get();
        // return count($result);
    }

}
