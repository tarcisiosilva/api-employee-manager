<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['*'],

    //'allowed_methods' => ['*'],

    //'allowed_origins' => [env('FRONTEND_URL', ['http://localhost:3000','http://localhost:5173'])],
    'allowed_origins' => [
        'http://localhost:5173', // origem do seu frontend React
        'http://localhost:3000', // caso tenha outra origem para o frontend
    ],

    'allowed_origins_patterns' => [],

   // 'allowed_headers' => ['*'],

    'allowed_headers' => ['Content-Type', 'Authorization', 'X-Requested-With'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];