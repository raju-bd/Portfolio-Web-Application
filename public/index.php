<?php

/*
|--------------------------------------------------------------------------
| Laravel Public Entry Point
|--------------------------------------------------------------------------
|
| This file serves as the entry point for all HTTP requests to the
| Laravel application. This is the front controller of your application.
|
*/

define('LARAVEL_START', microtime(true));

// Register the auto loader.
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request.
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = \Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
