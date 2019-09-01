<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 11/06/19
 * Time: 21:59
 */

use Phalcon\Mvc\Model;
class Multimedia extends Model
{
    public $id;
    public $titulo;
    public $id_categoria;
    public $url;
    public $comentario;
    public $dt_cad;

}