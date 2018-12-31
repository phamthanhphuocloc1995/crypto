<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "User";
    
    protected $fillable = ['User_ID','User_Name',  'User_Email', 'User_EmailActive', 'User_RegisteredDatetime', 'User_Level', 'User_Password', 'User_Status', 'User_Token', 'User_OTP'];

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

}
