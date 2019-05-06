<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 02/01/2019
 * Time: 17:37
 */

namespace AppJazz\Controllers;

use AppJazz\Model\Inscricao;
use AppJazz\Model\ExperienciaProfissional;
use AppJazz\Model\Filtro;
use AppJazz\Model\Filtros;
use \Slim\Http\Request;
use \Slim\Http\Response;
use \PmroPadraoLib\Util\StatusCode;
use \PmroPadraoLib\Util\StatusMessage;
use AppJazz\Services\AppService;
use \Exception;
use AppJazz\Util\Utils;

class AgendaController
{
    public static function getAllAgenda(Request $request, Response $response)
    {
        try {

            $params = $request->getParsedBody();
            $draw = isset($params['draw']) ? $params['length'] : null;
            $limit = isset($params['length']) ? $params['length'] : null;
            $offset = isset($params['start']) ? $params['start'] : null;
            $search = isset($params['search']) ? $params['search'] : null;


            $ordering = isset($params['ordering']) ? $params['ordering'] : null;
            $orderBy = null;
            $orderDir = 'asc';

            if ($ordering != null) {
                $orderBy = $ordering[0]['columnKey'];
                $orderDir = $ordering[0]['direction'];
            }

            $filters = new Filtros();


            $service = new AppService();
            $data = $service->getAllAgenda($search, $filters, $limit, $offset, $orderBy, $orderDir, $totalRecords);

            $result['draw'] = $draw;
            $result['recordsFiltered'] = $totalRecords;
            $result['recordsTotal'] = $totalRecords;
            $result['data'] = $data;

            return $response->withStatus(StatusCode::SUCCESS)->withJson($result);

        } catch (Exception $e) {
            return $response->withStatus(StatusCode::BAD_REQUEST)
                ->withJson((['message' => StatusMessage::MENSAGEM_ERRO_PADRAO, 'exception' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()]));
        }

    }

    public static function addItem(Request $request, Response $response)
    {
        try {
            //$id = $request->getAttribute('id');
            $data = $request->getParsedBody();

            $service = new AppService();

            $ficha_id = $service->addItem($data);

            return $response->withStatus(StatusCode::SUCCESS)
                ->withJson([
                    'message' => 'Cadastro realizada com sucesso!'
                ]);

        } catch (Exception $e) {
            return $response->withStatus(StatusCode::BAD_REQUEST)
                ->withJson((['message' => $e->getMessage(),
                    'exception' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()]));
        }
    }

    public static function deferir(Request $request, Response $response)
    {
        try {
            $id = $request->getAttribute('id');
            $data = $request->getParsedBody();

            $service = new AppService();
            $service->deferir($id, $data['motivoDeferido'], $data['isDeferido']);

            return $response->withStatus(StatusCode::SUCCESS)
                ->withJson([
                    'message' => StatusMessage::MENSAGEM_DE_SUCESSO_PADRAO
                ]);

        } catch (Exception $e) {
            return $response->withStatus(StatusCode::BAD_REQUEST)
                ->withJson((['message' => $e->getMessage(),
                    'exception' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()]));
        }
    }

    public static function getItem(Request $request, Response $response)
    {
        try {
            $id = $request->getAttribute('id');
            $service = new AppService();
            return $response
                ->withStatus(StatusCode::SUCCESS)
                ->withJson($service->getItem($id));

        } catch (Exception $e) {

            return $response->withStatus(StatusCode::BAD_REQUEST)
                ->withJson(['message' => StatusMessage::MENSAGEM_ERRO_PADRAO, 'exception' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()]);
        }
    }

    public static function deleteItems(Request $request, Response $response)
    {
        try {
            $formData = $request->getParsedBody();
            $ids = $formData['ids'];
            $idsCount = count($ids);

            $service = new AppService();
            $itensDeletadosCount = $service->deleteItems($ids);

            if ($itensDeletadosCount == $idsCount) {
                return $response->withStatus(StatusCode::SUCCESS)
                    ->withJson(['message' => StatusMessage::TODOS_ITENS_DELETADOS]);
            } else if ($itensDeletadosCount > 0) {
                return $response->withStatus(StatusCode::SUCCESS)
                    ->withJson(['message' => StatusMessage::NEM_TODOS_ITENS_DELETADOS]);
            } else {
                return $response->withStatus(StatusCode::SUCCESS)
                    ->withJson((['message' => StatusMessage::NENHUM_ITEM_DELETADO]));
            }
        } catch (Exception $e) {
            return $response->withStatus(StatusCode::BAD_REQUEST)
                ->withJson(['message' => StatusMessage::MENSAGEM_ERRO_PADRAO,
                    'exception' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()]);
        }
    }

}