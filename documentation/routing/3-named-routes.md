# Named Routes

https://laravel.com/docs/5.6/routing#named-routes

--------------

### Generating URLs To Named Routes

Once you have assigned a name to a given route, you may use the route's name when generating 
URLs or redirects via the global `route` function:

```PHP
<?php
// Generating URLs...
$url = route('profile');

// Generating Redirects...
return redirect()->route('profile');
```

If the named route defines parameters, you may pass the parameters as the second argument to the
 `route` function. 
 The given parameters will automatically be inserted into the URL in their correct positions:
 
```PHP
<?php
Route::get('user/{id}/profile', function ($id) {
    //
})->name('profile');

$url = route('profile', ['id' => 1]);
```

### Inspecting The Current Route

If you would like to determine if the current request was routed to a given named route, you may
 use the `named` method on a Route instance. For example, you may check the current route name
  from a route middleware:
  
```PHP
<?php
/**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 */
public function handle($request, Closure $next)
{
    if ($request->route()->named('profile')) {
        //
    }

    return $next($request);
}
```