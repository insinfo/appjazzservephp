<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 07/01/2019
 * Time: 13:17
 */

namespace AppJazz\Model;

use AppJazz\Model\Filtro;
class Filtros
{
    public $filtros = array();

    public function  __construct() {
        $this->filtros = array();
    }

    public function add(Filtro $filtro){
        $this->filtros[] = $filtro;
       // array_push($this->filtros,$filtro);
       // $this->filtros += $filtro;
    }
}