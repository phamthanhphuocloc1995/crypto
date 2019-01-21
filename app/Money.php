<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    protected $table = "Money";
    
    protected $fillable = ['Money_ID','Money_User','Money_Amount','Money_AmountFee','Money_Time','Money_Comment','Money_Action','Money_Status','Money_Currency','Money_CurrencyCurrentPrice','Money_Confirm','Money_Demo'];

    public $timestamps = false;
	
    protected $primaryKey = 'Money_ID';
}
