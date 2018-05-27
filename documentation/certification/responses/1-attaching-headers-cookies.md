# Attaching Headers / Cookies

https://laravel.com/docs/5.6/responses#attaching-headers-to-responses

https://laravel.com/docs/5.6/responses#attaching-cookies-to-responses

-----------

### Attaching Headers To Responses

Keep in mind that most response methods are chainable, allowing for the fluent construction of response instances. For example, you may use the `header` method to add a series of headers to the response before sending it back to the user:

```PHP
<?php

return response($content)
            ->header('Content-Type', $type)
            ->header('X-Header-One', 'Header Value')
            ->header('X-Header-Two', 'Header Value');
            
```

Or, you may use the `withHeaders` method to specify an array of headers to be added to the response:

```PHP
<?php

return response($content)
            ->withHeaders([
                'Content-Type' => $type,
                'X-Header-One' => 'Header Value',
                'X-Header-Two' => 'Header Value',
            ]);
```

------------

### Attaching Cookies To Responses

The `cookie` method on response instances allows you to easily attach cookies to the response. For example, you may use the `cookie` method to generate a cookie and fluently attach it to the response instance like so:


```PHP
<?php

return response($content)
                ->header('Content-Type', $type)
                ->cookie('name', 'value', $minutes);
```


The `cookie` method also accepts a few more arguments which are used less frequently. Generally, these arguments have the same purpose and meaning as the arguments that would be given to PHP's native setcookie method:

```PHP
<?php

->cookie($name, $value, $minutes, $path, $domain, $secure, $httpOnly)

```

Alternatively, you can use the `Cookie` facade to "queue" cookies for attachment to the outgoing response from your application. The `queue` method accepts a `Cookie` instance or the arguments needed to create a `Cookie` instance. These cookies will be attached to the outgoing response before it is sent to the browser:

```PHP
<?php

Cookie::queue(Cookie::make('name', 'value', $minutes));

Cookie::queue('name', 'value', $minutes);
```