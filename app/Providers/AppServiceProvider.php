<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Price;

use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('otp',false);
        $PriceLuckyPoint = Price::getLuckyPrice();
        $PriceBTC = Price::getBTCPrice();
        $PriceETH = Price::getETHPrice();
        View::share('PriceLuckyPoint',$PriceLuckyPoint);
        View::share('PriceBTC',$PriceBTC);
        View::share('PriceETH',$PriceETH);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
