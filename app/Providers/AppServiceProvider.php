<?php
declare(strict_types = 1);

namespace App\Providers;

use App\Model\ModelFactory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
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
        Schema::defaultStringLength(191);
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerModelFactory();
    }
    
    /**
     * @see ModelFactory
     */
    private function registerModelFactory()
    {
        $this->app->singleton(ModelFactory::class, function () {
            return new ModelFactory(
                $this->app->make(Container::class)
            );
        });
    }
}
