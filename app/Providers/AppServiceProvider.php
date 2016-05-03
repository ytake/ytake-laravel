<?php

namespace App\Providers;

use App\Modules\ValidModule;
use App\Modules\LoggableModule;
use App\Modules\CacheableModule;
use App\Modules\TransactionalModule;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** @var \Ytake\LaravelAspect\AspectManager $aspect */
        $aspect = $this->app['aspect.manager'];
        $aspect->register(ValidModule::class);
        $aspect->register(CacheableModule::class);
        $aspect->register(LoggableModule::class);
        $aspect->register(TransactionalModule::class);
        $aspect->dispatch();
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
