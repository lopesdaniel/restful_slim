<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$app->add(new Tuupola\Middleware\JwtAuthentication([
    'regexp' => '/(.*)/',
    'header' => 'Authorization',
    'path' => '/api',
    'realm' => 'Protected',
    'secret' => $container['settings']['secretKey']
]));

$app->add(function ($req, $res, $next){
    $response = $next($req, $res);

    return $response
        ->withHeader('Acess-Control-Allow-Origin', '*')
        ->withHeader('Acess-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->withHeader('Acess-Control-Allow-Headers', 'X-Requested-With, Content-Type, Authorization, Origin, Accept');
});


