<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 04/04/2019
 * Time: 12:03
 */

namespace AppJazz\Model;

use AppJazz\Services\TraitFillFromArray;

class Agenda
{
    use TraitFillFromArray;

    public static $instance;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Agenda();
        }
        return self::$instance;
    }
    public static function getNewInstance() {
        return new Agenda();
    }

    const TABLE_NAME = "agenda";
    const KEY_ID = "id";
    const ARTISTA = "artista";
    const HORA = "hora";
    const DATA = "data";
    const PALCO_NOME = "palconome";
    const ATRACAO_NOME = "atracaonome";
    const ATRACAO_ID = "atracaoid";
    const PALCO_ID = "palcoid";

    const TABLE_FIELDS = [
        self::ARTISTA,
        self::HORA,
        self::DATA,
        self::PALCO_NOME,
        self::ATRACAO_NOME,
        self::ATRACAO_ID,
        self::PALCO_ID,
    ];

    private $id;
    private $artista;
    private $hora;
    private $data;
    private $palconome;
    private $atracaonome;
    private $atracaoid;
    private $palcoid;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getArtista()
    {
        return $this->artista;
    }

    /**
     * @param mixed $artista
     */
    public function setArtista($artista)
    {
        $this->artista = $artista;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getPalconome()
    {
        return $this->palconome;
    }

    /**
     * @param mixed $palconome
     */
    public function setPalconome($palconome)
    {
        $this->palconome = $palconome;
    }

    /**
     * @return mixed
     */
    public function getAtracaonome()
    {
        return $this->atracaonome;
    }

    /**
     * @param mixed $atracaonome
     */
    public function setAtracaonome($atracaonome)
    {
        $this->atracaonome = $atracaonome;
    }

    /**
     * @return mixed
     */
    public function getAtracaoid()
    {
        return $this->atracaoid;
    }

    /**
     * @param mixed $atracaoid
     */
    public function setAtracaoid($atracaoid)
    {
        $this->atracaoid = $atracaoid;
    }

    /**
     * @return mixed
     */
    public function getPalcoid()
    {
        return $this->palcoid;
    }

    /**
     * @param mixed $palcoid
     */
    public function setPalcoid($palcoid)
    {
        $this->palcoid = $palcoid;
    }




}