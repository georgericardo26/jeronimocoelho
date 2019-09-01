<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 11/06/19
 * Time: 22:09
 */
use Phalcon\Mvc\Model;
class Urologia extends Model
{
    public $id;
    public $titulo;
    public $conteudo;
    public $id_categoria;
    public $id_galeria;
    public $dt_cad;

    public function initialize() {
        $this->hasMany(
            "id_galeria",
            "Galeria",
            "id", [
            'reusable' => true
        ]);
        $this->hasMany(
            "id_categoria",
            "Categoria",
            "id", [
            'reusable' => true
        ]);
    }

}