<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        Product::observe(ProductObserver::class);
    }
}
