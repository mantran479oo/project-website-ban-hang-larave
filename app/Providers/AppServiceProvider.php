<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Model_product_type;
use App\Models\Model_information;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Repository\Interfaces\PostRepositoryInterface::class,
            \App\Repositories\Repository\PostEloquentRepository::class,
            \App\Repositories\Repository\Interfaces\OrderRepositoryInterface::class,
            \App\Repositories\Repository\OrderEloquentRepository::class

        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('master.layout', function($view) {
            $loai = Model_product_type::all();

            view()->share('loai_san_pham', $loai);
        });
        view()->composer('master.layout',function($view){
           $cart = session()->get('cart');
           view()->share('cart',$cart);
        });
        view()->composer('master.layout', function($view) {
            $information = Model_information::get();
            view()->share('information', $information);
        });
    }
}
