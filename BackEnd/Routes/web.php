<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use CMDCA\Model\Constants;
use PmroPadraoLib\Middleware\PermissionMiddleware;

$app->get('/', function (Request $request, Response $response, $args) use ($app) {

    //disponivel do dia 24/04 ate 08/05
    date_default_timezone_set('America/Sao_Paulo');

    $format = "d/m/Y H:i:s";
    $startdate = \DateTime::createFromFormat($format, "23/04/2019 23:59:00");
    $enddate = \DateTime::createFromFormat($format, "08/05/2019 16:00:00");
    $now = \DateTime::createFromFormat($format, date($format));

    if($startdate <= $now && $now <= $enddate) {
        return $this->view->render($response, 'InscricaoView.php');
    }else if($now > $enddate){
        return $this->view->render($response, 'avisoFimInscricao.php', ['date' => date("Y-m-d H:i:s")]);
    }else {
        return $this->view->render($response, 'aviso.php', ['date' => date("Y-m-d H:i:s")]);
    }


});

$app->get('/comprovante', function (Request $request, Response $response, $args) use ($app) {

    return $this->view->render($response, 'ComprovanteDeInscricao.php', [
        'nome' => $request->getQueryParams()['nome'],
        'numero' => str_pad($request->getQueryParams()['numero'], 5, '0', STR_PAD_LEFT)
    ]);

});

$app->group('', function () use ($app) {

    $app->get('/gerencia', function (Request $request, Response $response, $args) use ($app) {
        return $this->view->render($response, 'GerenciaIncricaoView.php');
    });

})->add(new PermissionMiddleware($container, Constants::SISTEMA_CMDCA_ID));