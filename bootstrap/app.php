<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\PermissionCheck;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            App\Http\Middleware\Authenticate::class,
            'perms'=>App\Http\Middleware\PermissionCheck::class,
        ]);
        $middleware->redirectGuestsTo('/login');
        $middleware->trustHosts(at: ['localhost:8000']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
