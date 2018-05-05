# Route Model Binding

https://laravel.com/docs/5.4/routing#route-model-binding

-----------------

`\Illuminate\Routing\Middleware\SubstituteBindings::class` middleware should be assigner to the route.

### Implicit Binding

Laravel automatically resolves Eloquent models defined in routes or controller actions whose type-hinted variable names match a route segment name. For example:
```PHP
<?php
Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
});
```

### Explicit Binding

To register an explicit binding, use the router's model method to specify the class for a given parameter. You should define your explicit model bindings in the boot method of the  RouteServiceProvider class:

```PHP
<?php
public function boot()
{
    parent::boot();

    Route::model('user', App\User::class);
}
```