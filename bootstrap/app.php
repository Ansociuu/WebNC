<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: 
            [
                __DIR__.'/../routes/web.php',
                __DIR__.'/../routes/news.php',
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    
        // api: __DIR__.'../routes/api.php',
        // then: function () {
        //     Route::Middleware('web')->group(base_path('routes/news.php'));
        // }
        )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias(['check.admin' => AdminMiddleware::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();