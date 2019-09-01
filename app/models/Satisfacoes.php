<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 11/06/19
 * Time: 22:06
 */
use Phalcon\Mvc\Model;
class Satisfacoes extends Model
{
    public $id;
    public $satisfacao;
    public $cliente;
    public $dt_cad;
}