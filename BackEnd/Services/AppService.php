<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 02/01/2019
 * Time: 16:20
 */

namespace AppJazz\Services;

use AppJazz\Util\DBLayer;
use AppJazz\Model\Agenda;
use AppJazz\Model\Atracao;
use AppJazz\Model\Comercio;
use AppJazz\Model\Palco;
use AppJazz\Model\Filtros;
use \Exception;
use Illuminate\Support\Facades\DB;

class AppService
{
    private $db = null;

    function __construct()
    {
        $this->db = DBLayer::Connect();
    }

    public function addAgenda(Agenda $agenda)
    {
        $this->db->table(Agenda::TABLE_NAME)
            ->insert($agenda->toArray());
    }

    public function getAllAgenda($search, Filtros $filters, $limit = 10, $offset = 0, $orderBy = null, $orderDir = 'asc', &$totalRecords)
    {
        $query = $this->db->table(Agenda::TABLE_NAME);

        if ($search != null) {
            $query->where(function ($query) use ($search) {
                $search = '%' . $search . '%';
                $query->orWhere(Agenda::ATRACAO_NOME, DBLayer::OPERATOR_ILIKE, $search);

            });
        }

        if ($filters != null) {
            foreach ($filters->filtros as $filtro) {
                $query->orWhere($filtro->field, $filtro->operator, $filtro->value);
            }
        }

        $totalRecords = $query->count();

        if ($orderBy != null) {
            $query->orderBy($orderBy, $orderDir);
        }

        if ($limit != null && $offset != null) {
            $data = $query->limit($limit)->offset($offset)->get();
        } else {
            $data = $query->get();
        }

        return $data;
    }

}