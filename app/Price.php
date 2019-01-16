<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Price extends Model
{
    protected $table = "Price";
    
    protected $fillable = ['Price_ID','Price_Currency','Price_Amount'];

    public $timestamps = false;
	
    protected $primaryKey = 'Price_ID';
    
    public static function getLuckyPrice() {
        $result = DB::table('Price')->select('Price_Amount')->where('Price_Currency','Lucky Point')->first();
        return $result->Price_Amount;
    }
}
