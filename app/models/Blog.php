<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 11/06/19
 * Time: 21:53
 */
use Phalcon\Mvc\Model;
class Blog extends Model
{
    public $id;
    public $titulo;
    public $conteudo;
    public $id_galeria;
    public $dt_cad;
    public $qtd_like;

    public function initialize() {
        $this->hasMany(
            "id_galeria",
            "Galeria",
            "id", [
            'reusable' => true
        ]);
    }

    public function setQtdlike($qtd){

        $this->qtd_like = $qtd;

    }


}