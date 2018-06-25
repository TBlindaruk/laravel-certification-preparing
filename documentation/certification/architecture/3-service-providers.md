# Service Providers

https://laravel.com/docs/5.6/providers

---------------

### The `bindings` And `singletons` Properties

If your service provider registers many simple bindings, you may wish to use the `bindings` and  
`singletons` properties instead of manually registering each container binding. 
When the service provider is loaded by the framework, it will automatically check for these 
properties and register their bindings:


```PHP
<?php

namespace App\Providers;

use App\Contracts\ServerProvider;
use App\Contracts\DowntimeNotifier;
use Illuminate\Support\ServiceProvider;
use App\Services\PingdomDowntimeNotifier;
use App\Services\DigitalOceanServerProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ServerProvider::class => DigitalOceanServerProvider::class,
    ];

    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        DowntimeNotifier::class => PingdomDowntimeNotifier::class,
    ];
}
```

### Boot Method Dependency Injection

You may type-hint dependencies for your service provider's `boot` method. 
The service container will automatically inject any dependencies you need:

```PHP
<?php
use Illuminate\Contracts\Routing\ResponseFactory;
//...
public function boot(ResponseFactory $response)
{
    $response->macro('caps', function ($value) {
        //
    });
}
```

### Deferred Providers

If your provider is `only` registering bindings in the service container, 
you may choose to defer its registration until one of the registered bindings is actually needed. 
Deferring the loading of such a provider will improve the performance of your application, 
since it is not loaded from the filesystem on every request.

```PHP
<?php

namespace App\Providers;

use Riak\Connection;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Connection::class, function ($app) {
            return new Connection($app['config']['riak']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Connection::class];
    }

}
```