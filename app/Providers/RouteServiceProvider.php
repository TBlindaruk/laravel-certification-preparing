<?php
declare(strict_types = 1);

namespace App\Providers;

use App\Exceptions\NotFoundHttpException;
use App\Model\Task;
use App\Model\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/**
 * Class RouteServiceProvider
 *
 * @package App\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        /** @var Router $router */
        $router = $this->app->make('router');
        $router->model(
            'task',
            Task::class,
            function () {
                throw new NotFoundHttpException(Response::HTTP_NOT_FOUND);
            }
        );
        $router->model(
            'user',
            User::class,
            function () {
                throw new NotFoundHttpException(Response::HTTP_NOT_FOUND);
            }
        );
        
        parent::boot();
    }
    
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapOauthRoutes();
        $this->mapWebRoutes();
    }
    
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/web.php'));
    }
    
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace('App\Http\Controllers\Api')
            ->group(base_path('routes/api.php'));
    }
    
    protected function mapOauthRoutes()
    {
        Route::prefix('oauth')
            ->namespace('App\Http\Controllers\Oauth')
            ->group(base_path('routes/oauth.php'));
    }
}
