<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 04/04/2019
 * Time: 12:03
 */

namespace AppJazz\Model;

use AppJazz\Services\TraitFillFromArray;

class Comercio
{
    use TraitFillFromArray;

    public static $instance;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Comercio();
        }
        return self::$instance;
    }
    public static function getNewInstance() {
        return new Comercio();
    }

    const TABLE_NAME = "comerciosparceiro";
    const KEY_ID = "id";
    const NOME = "nome";
    const LOGRADOURO = "logradouro";
    const TIPO_LOGRADOURO = "tipologradouro";
    const NUMERO = "numero";
    const TELEFONE1 = "telefone1";
    const TELEFONE2 = "telefone2";
    const TIPO_COMERCIO = "tipocomercio";
    const HORARIO_FUNCIONAMENTO = "horariofuncionamento";
    const BAIRRO = "bairro";
    const IMAGEM = "imagem";
    const DESCRICAO = "descricao";

    const TABLE_FIELDS = [
        self::NOME,
        self::LOGRADOURO,
        self::TIPO_LOGRADOURO,
        self::NUMERO,
        self::TELEFONE1,
        self::TELEFONE2,
        self::TIPO_COMERCIO,
        self::HORARIO_FUNCIONAMENTO,
        self::BAIRRO,
        self::IMAGEM,
        self::DESCRICAO,
    ];

    private $id;
    private $nome;
    private $logradouro;
    private $tipologradouro;
    private $numero;
    private $telefone1;
    private $telefone2;
    private $tipocomercio;
    private $horariofuncionamento;
    private $bairro;
    private $imagem;
    private $descricao;

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
    public function getTelefone1()
    {
        return $this->telefone1;
    }

    /**
     * @param mixed $telefone1
     */
    public function setTelefone1($telefone1)
    {
        $this->telefone1 = $telefone1;
    }

    /**
     * @return mixed
     */
    public function getTelefone2()
    {
        return $this->telefone2;
    }

    /**
     * @param mixed $telefone2
     */
    public function setTelefone2($telefone2)
    {
        $this->telefone2 = $telefone2;
    }

    /**
     * @return mixed
     */
    public function getTipocomercio()
    {
        return $this->tipocomercio;
    }

    /**
     * @param mixed $tipocomercio
     */
    public function setTipocomercio($tipocomercio)
    {
        $this->tipocomercio = $tipocomercio;
    }

    /**
     * @return mixed
     */
    public function getHorariofuncionamento()
    {
        return $this->horariofuncionamento;
    }

    /**
     * @param mixed $horariofuncionamento
     */
    public function setHorariofuncionamento($horariofuncionamento)
    {
        $this->horariofuncionamento = $horariofuncionamento;
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


}