# Rate Limiting

https://laravel.com/docs/5.6/routing#rate-limiting

------------

Laravel includes a middleware to rate limit access to routes within your application. 
To get started, assign the `throttle` middleware to a route or a group of routes. 
The `throttle` middleware accepts two parameters that determine the maximum number of 
requests that can be made in a given number of minutes.
 For example, let's specify that an authenticated user may access the following group 
 of routes 60 times per minute:
 
```PHP
<?php
Route::middleware('auth:api', 'throttle:60,1')->group(function () {
    Route::get('/user', function () {
        //
    });
});
```

-----

### determinate in Kernal

```PHP
<?php
declare(strict_types = 1);

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'api' => [
            'throttle:30,1',
        ],
    ];
    
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'throttle'      => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}

```

### Dynamic Rate Limiting

You may specify a dynamic request maximum based on an attribute of the authenticated `User` model. 
For example, if your `User` model contains a `rate_limi`t attribute, you may pass the name of the attribute to the
 `throttle` middleware so that it is used to calculate the maximum request count:
 
```PHP
<?php
Route::middleware('auth:api', 'throttle:rate_limit,1')->group(function () {
    Route::get('/user', function () {
        //
    });
});
```