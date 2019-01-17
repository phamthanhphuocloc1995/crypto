<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Address extends Model
{

    protected $table = "Address";
    protected $fillable = ['Address_ID','Address_Currency', 'Address_Address', 'Address_User', 'Address_CreateAt', 'Address_UpdateAt', 'Address_IsUse', 'Address_Comment'];

    public $timestamps = true;

    const CREATED_AT = 'Address_CreateAt';
	const UPDATED_AT = 'Address_UpdateAt';

    public static function getAddressByUser($userid, $currency=1){
    	$result = DB::table('address')
                        ->select('Address_Currency', 'Address_Address')
                        ->where('Address_IsUse',0)
                        ->where('Address_User',$userid)
                        ->where('Address_Currency',$currency)
                        ->first();
        return $result;
    }
    
    public static function getAddress($address, $currency=1){
	    $result = DB::table('address')
                        ->select('Address_User')
                        ->where('Address_Address', $address)
                        ->where('Address_Currency',$currency)
                        ->where('Address_IsUse',0)
                        ->first();
        return $result;
    }
    
}
