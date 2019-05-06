<?php

$ini_array = parse_ini_file('../.env');
define('VIEWS_DIR_APP_JAZZ',$ini_array['VIEWS_DIR']);
define('DB_HOST_APP_JAZZ',$ini_array['DB_HOST']);
define('PROXY_APP_JAZZ',$ini_array['PROXY']);
define('STORAGE_PATH_APP_JAZZ',$ini_array['STORAGE_PATH']);
define('WEB_ROOT_PATH_APP_JAZZ',$ini_array['WEB_ROOT_PATH']);

$BASE_DIR = dirname(__FILE__);
$VIEWS_DIR = $BASE_DIR.'/View';

require_once '../../pmroPadrao/src/start.php';
require_once '../BackEnd/vendor/autoload.php';

use Slim\Handlers\NotFound;
use Slim\Views\Twig;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app = new \Slim\App([
    'settings' => [
        // Only set this if you need access to route within middleware
        'determineRouteBeforeAppMiddleware' => true,
        'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();
$container['view'] = function ($container) use ($VIEWS_DIR){
    $view = new \Slim\Views\Twig($VIEWS_DIR, [
        'cache' => false
    ]);
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    return $view;
};

//manipulador de pagina de erro 404
class NotFoundHandler extends NotFound {
    private $view;
    private $templateFile;
    public function __construct(Twig $view, $templateFile) {
        $this->view = $view;
        $this->templateFile = $templateFile;
    }
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response) {
        parent::__invoke($request, $response);
        $this->view->render($response, $this->templateFile);
        return $response->withStatus(404);
    }
}

$container['notFoundHandler'] = function ($c) {
    return new NotFoundHandler($c->get('view'), '404.php');
};

// ROTAS DE WEBPAGES
require_once '../BackEnd/Routes/web.php';

require_once '../BackEnd/Routes/webservice.php';

$app->run();