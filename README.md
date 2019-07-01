# SecurityHeaders
Add security headers for laravel project

This is a middleware to include in your laravel project if you dont want to include you'r headers in index or configure httpacces.

A Middleware is basically a code that is executed on every request that acts as a bridge between a request and a response. So we can create a middleware that appends or removes headers on each request.


Create a new file and copy the code from [Headers](Headers.php),
or download the file.

Move the file to ``/app/http/middleware`` and now all you have to do is go to ``/app/http/kernel.php`` and add ``\App\Http\Middleware\SecureHeaders::class`` at the end of ``protected $middleware`` array.

E.g

```php
protected $middleware = [
            \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \App\Http\Middleware\Headers::class // This is our middleware to add/remove headers
    ];
```
And now your all set the headers will be added on each request.
