<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Urameshibr\Providers\FormRequestServiceProvider;
use Waavi\Sanitizer\Laravel\SanitizerServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(FormRequestServiceProvider::class);
        $this->app->register(SanitizerServiceProvider::class);
    }
}
