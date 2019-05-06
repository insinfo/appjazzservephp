<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 07/01/2019
 * Time: 13:14
 */

namespace AppJazz\Model;


class Filtro
{
    public $field;
    public $operator;
    public $value;

    public function  __construct($field,$operator,$value) {
        $this->field = $field;
        $this->operator = $operator;
        $this->value = $value;
    }

}