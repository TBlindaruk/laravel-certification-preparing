<?php
declare(strict_types = 1);

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

/**
 * Class Kernel
 *
 * @package App\Http
 */
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [];
    
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        'api' => [
            \App\Http\Middleware\JsonMiddleware::class,
            'throttle:30,1',
            'bindings',
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
        'auth'        => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.client' => \Laravel\Passport\Http\Middleware\CheckClientCredentials::class,
        'throttle'    => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'bindings'    => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    ];
}
