# Route Parameters

https://laravel.com/docs/5.6/routing#route-parameters

--------------

Route parameters are always encased within `{}` braces and should consist of alphabetic
 characters, and may not contain a `-` character. Instead of using the `-` character, use an 
 underscore (`_`). Route parameters are injected into route callbacks / controllers based on 
 their order `-` the names of the callback / controller arguments do not matter.
 
-----------------

### Optional Parameters

Occasionally you may need to specify a route parameter, but make the presence of that 
route parameter optional. You may do so by placing a `?` mark after the parameter name. 
`Make sure to give the route's corresponding variable a default value`:

```PHP
<?php

Route::get('user/{name?}', function ($name = null) {
    return $name;
});

Route::get('user/{name?}', function ($name = 'John') {
    return $name;
});
```
