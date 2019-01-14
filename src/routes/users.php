<?php

use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\User;

$app->get('/api/v1/users', function (Request $request, Response $response, array $args){

    $users = User::get();


    return $response->withJson($users);
});

$app->post('/api/v1/users', function (Request $request, Response $response, array $args){
    $data = $request->getParsedBody();
    $user = User::create($data);


    return $response->withJson($user);
});