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
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'route-16',
            'route-17',
            'route-18',
            'route-19',
            'route-20',
            'addReader2',
            'addReader4',
            'addReader5'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
