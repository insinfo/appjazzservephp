<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 04/04/2019
 * Time: 12:03
 */

namespace AppJazz\Model;

use AppJazz\Services\TraitFillFromArray;

class Atracao
{
    use TraitFillFromArray;

    public static $instance;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Atracao();
        }
        return self::$instance;
    }
    public static function getNewInstance() {
        return new Atracao();
    }

    const TABLE_NAME = "atracoes";
    const KEY_ID = "id";
    const NOME = "nome";
    const DESCRICAO = "descricao";
    const IMAGEM = "imagem";
    const VIDEO = "video";
    const MEDIA = "media";

    const TABLE_FIELDS = [
        self::NOME,
        self::DESCRICAO,
        self::IMAGEM,
        self::VIDEO,
        self::MEDIA,
    ];

    private $id;
    private $nome;
    private $descricao;
    private $imagem;
    private $video;
    private $media;

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
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param mixed $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }


}