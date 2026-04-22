<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->report(function (Throwable $e) {
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/exceptions.log'),
            ])->error('--- SYSTEM ERROR ---', [
                'message' => $e->getMessage(),
                'upload_file' => $e->getFile(),
                'line'     => $e->getLine(),
                'url'      => request()->fullUrl(),
            ]);
            return false;
        });

        $exceptions->render(function (ThrottleRequestsException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You submitted your request too quickly. Please wait 1 minute and try again..',
                    'code' => 429
                ], 429);
            }
        });
    })->create();
