<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Setting;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Africa/Lagos');
//        $all = file_get_contents("https://blockchain.info/ticker");
//        $res = json_decode($all);
        //  $btcrate = $res->USD->last;
        $btcrate = 630;

        view()->share('btcrate', $btcrate);
        $setting = Setting::whereId(1)->first();

        View::share('settings', $setting);
    }

}
