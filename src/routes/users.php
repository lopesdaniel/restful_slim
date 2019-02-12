<?php

use Slim\Http\Request;
use Slim\Http\Response;

use App\Models\User;

// Listar todos os usuários
$app->get('/api/v1/users', function (Request $request, Response $response, array $args){
    $users = User::get();
    return $response->withJson($users);
});

//$app->post('/api/v1/users', function (Request $request, Response $response, array $args){
//    $data = $request->getParsedBody();
//    $user = User::create($data);
//    return $response->withJson($user);
//});

// Adicionar um novo usuário
$app->post('/api/v1/users', function (Request $request, Response $response, array $args){
    $data = $request->getParsedBody();
    $user = User::create($data);
    return $response->withJson($user, 201);
});

// Buscar um usuário
$app->get('/api/v1/users/{id}', function (Request $request, Response $response, array $args){
    $user = User::findOrFail($args['id']);
    return $response->withJson($user);
});

// Editar e atualizar um usuário
$app->put('/api/v1/users/{id}', function (Request $request, Response $response, array $args){
    $user = User::findOrFail($args['id']);
    $user->update($request->getParsedBody());
    return $response->withJson($user);
});

// Excluir um usuário
$app->delete('/api/v1/users/{id}', function (Request $request, Response $response, array $args){
    $user = User::findOrFail($args['id']);
    $user->delete();
    return $response->withJson($user);
});

