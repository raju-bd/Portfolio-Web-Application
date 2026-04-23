<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default session "driver" that will be used on
    | requests. By default, we will use the lightweight native driver but
    | you may specify any of the other wonderful drivers provided here.
    |
    */

    'driver' => env('SESSION_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that will be allowed to
    | elapse before the user is required to re-authenticate. This will
    | keep sessions from lasting forever, which is a guard against
    | certain security and performance concerns.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => false,

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | This option allows you to easily encrypt all of your session data. All
    | encryption will be run using OpenSSL with the AES-256-CBC cipher. You
    | are free to modify the cipher algorithm.
    |
    */

    'encrypt' => false,

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
    | When using the native session driver, we need a location where session
    | files may be stored. A default has been set for you but a different
    | location may be specified. This is only needed for file sessions.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | When using the "database" or "dynamodb" session drivers, you may
    | specify the connection that should be used to manage these sessions.
    | This should correspond with a connection in your database config.
    |
    */

    'connection' => null,

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | When using the "database" or "dynamodb" session drivers, you may
    | specify the table we should use to manage the sessions. Of course,
    | a sensible default is provided for you; however, you are free to
    | change this as needed.
    |
    */

    'table' => 'sessions',

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
    | When using the "apc" or "dynamodb" session drivers, you may specify a
    | cache store that should be used for these sessions. This value must
    | correspond with one of your defined cache "stores" in config/cache.php.
    |
    */

    'store' => null,

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Some session drivers must manually sweep their storage location to get
    | rid of old sessions from storage. Here are the chances that it will
    | happen on a given request. By default, the odds are 2 out of 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Settings
    |--------------------------------------------------------------------------
    |
    | Here you may change the default behavior of session cookies generated
    | by Laravel. You're free to change these settings as needed for your
    | particular application, though sensible defaults have been provided.
    |
    */

    'cookie' => [
        'name' => env('SESSION_COOKIE', 'XSRF-TOKEN'),
        'lifetime' => env('SESSION_LIFETIME', 120),
        'path' => '/',
        'domain' => env('SESSION_DOMAIN'),
        'secure' => env('SESSION_SECURE_COOKIES'),
        'http_only' => true,
        'same_site' => 'lax',
    ],

];
