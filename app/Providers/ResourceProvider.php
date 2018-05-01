<?php
declare(strict_types = 1);

namespace App\Providers;

use App\Http\Resources\TaskCollectionResource;
use Illuminate\Support\ServiceProvider;

/**
 * Class ResourceProvider
 *
 * @package App\Providers
 */
class ResourceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        TaskCollectionResource::withoutWrapping();
    }
}
