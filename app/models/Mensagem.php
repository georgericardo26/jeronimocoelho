<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 11/06/19
 * Time: 21:57
 */
use Phalcon\Mvc\Model;
class Mensagem extends Model
{
    public $id;
    public $nome;
    public $assunto;
    public $email;
    public $mensagem;
    public $status;
    public $data;

}