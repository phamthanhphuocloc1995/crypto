<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Money extends Model
{
    protected $table = "Money";
    
    protected $fillable = ['Money_ID','Money_User','Money_Amount','Money_AmountFee','Money_Time','Money_Comment','Money_Action','Money_Status','Money_Currency','Money_CurrencyCurrentPrice','Money_Confirm','Money_Demo'];

    public $timestamps = false;
	
    protected $primaryKey = 'Money_ID';

    public static function listexchangeHistory($userid) {
        $result = DB::table('Money')
        ->select('Money_ID','Money_User','Money_Amount','Money_Time','Money_Comment','Money_Currency','Money_Status','Money_Demo','Money_Action')
        ->where('Money_User',$userid)
        ->where('Money_Action',3)
        ->where('Money_Status',1)
        ->where('Money_Demo',0)
        ->orderby('Money_ID','Desc')
        ->paginate(10);
        return $result;
    }
}
