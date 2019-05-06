<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 04/04/2019
 * Time: 12:03
 */

namespace AppJazz\Model;

use AppJazz\Services\TraitFillFromArray;

class Palco
{
    use TraitFillFromArray;

    public static $instance;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Palco();
        }
        return self::$instance;
    }
    public static function getNewInstance() {
        return new Palco();
    }

    const TABLE_NAME = "palcos";
    const KEY_ID = "id";
    const NOME = "nome";
    const DESCRICAO = "descricao";
    const IMAGEM = "imagem";
    const VIDEO = "video";
    const LOGRADOURO = "logradouro";
    const TIPO_LOGRADOURO = "tipologradouro";
    const NUMERO = "numero";
    const BAIRRO = "bairro";

    const TABLE_FIELDS = [
        self::NOME,
        self::DESCRICAO,
        self::IMAGEM,
        self::VIDEO,
        self::LOGRADOURO,
        self::TIPO_LOGRADOURO,
        self::NUMERO,
        self::BAIRRO,
    ];

    private $id;
    private $nome;
    private $descricao;
    private $imagem;
    private $video;
    private $logradouro;
    private $tipologradouro;
    private $numero;
    private $bairro;

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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    /**
     * @return mixed
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param mixed $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }

    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param mixed $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    /**
     * @return mixed
     */
    public function getTipologradouro()
    {
        return $this->tipologradouro;
    }

    /**
     * @param mixed $tipologradouro
     */
    public function setTipologradouro($tipologradouro)
    {
        $this->tipologradouro = $tipologradouro;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }



}