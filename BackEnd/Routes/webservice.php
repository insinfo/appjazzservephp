<?php

use \Slim\Http\Request;
use \Slim\Http\Response;

use \CMDCA\Controllers\InscricaoController;

use PmroPadraoLib\Middleware\AuthMiddleware;
use PmroPadraoLib\Middleware\LogMiddleware2;

// ROTAS DE WEBSERVICE REST
$app->group('/api', function () use ($app) {

    //CRIA
    $app->put('/inscricao', function (Request $request, Response $response, $args) use ($app) {
        return InscricaoController::addItem($request, $response);
    });


});

$app->group('/api', function () use ($app) {

    //OBTEM
    $app->get('/inscricao/{id}', function (Request $request, Response $response, $args) use ($app) {
        return InscricaoController::getItem($request, $response);
    });

    //LISTA
    $app->post('/inscricao', function (Request $request, Response $response, $args) use ($app) {
        return InscricaoController::getAll($request, $response);
    });

    //DELETA ITEMS
    $app->delete('/inscricao', function (Request $request, Response $response, $args) use ($app) {
        return InscricaoController::deleteItems($request, $response);
    });

    //DELETA ITEMS
    $app->put('/inscricao/deferir/{id}', function (Request $request, Response $response, $args) use ($app) {
        return InscricaoController::deferir($request, $response);
    });



})->add(new AuthMiddleware())->add(new LogMiddleware2());
