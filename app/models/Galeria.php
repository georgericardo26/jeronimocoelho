<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 11/06/19
 * Time: 21:45
 */
use Phalcon\Mvc\Model;
class Galeria extends Model
{
    public $id;
    public $imagem;
    public $titulo;
    public $descricao;
    public $slide_principal;
    public $slide_secundario;
    public $qualificacoes;
    public $dt_cad;
    public $servicos;


    public function initialize() {
        $this->belongsTo(
            "id_galeria",
            "Urologia",
            "id", [
            'reusable' => true
        ]);
    }

}