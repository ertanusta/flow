<?php
return [
    'cache_driver' => env('RULE_ENGINE_CACHE_DRIVER', 'redis'),
    'redis' => [
        'url' => env('REDIS_URL'),
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'username' => env('REDIS_USERNAME'),
        'password' => env('REDIS_PASSWORD'),
        'port' => env('REDIS_PORT', '6379'),
        'database' => env('REDIS_CACHE_DB', '1'),
        'life_time' => 0,
        'namespace' => 'rule-engine'
    ],
    'file' => [
        'path' => storage_path('framework/cache/data'),
        'life_time' => 0,
        'namespace' => 'rule-engine'
    ]
];
