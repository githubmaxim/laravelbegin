<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    //промежуточный слой для настройки безопасности:
    //указываются адреса, которые будут исключены из CSRF проверки и поэтому при переходе на них не выдадут 419 ошибку,
        ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            '/posts',
            '/admin/products', //или тут или прямо в "web.php" через "->withoutMiddleware(VerifyCsrfToken::class)"
        ]);

    //указывается путь, куда будет перенаправлен неаутентифицированный пользователь (по умолчанию '/login')
        $middleware->redirectGuestsTo('forCache/login');
    })


    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
