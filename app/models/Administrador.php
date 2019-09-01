<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 06/01/2019
 * Time: 14:53
 */
use Phalcon\Mvc\Model;
class Administrador extends Model
{
    public $id;
    public $usuario;
    public $login;
    public $password;
    public $telefone_pri;
    public $telefone_sec;
    public $email;
    public $endereco;
    public $sobre;
    public $id_galeria;

    public function getSource()
    {
        return 'administrador';
    }

    public function initialize() {
        $this->hasMany("id_galeria",
            "Galeria",
            "id",
            array(
                'alias' => 'galeria'
            ));
    }

    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($val) {
        $this->usuario = $val;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($val) {
        $this->login = $val;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($val) {
        $this->password = $val;
    }

    public function getTelefonePri() {
        return $this->telefone_pri;
    }

    public function setTelefonePri($val) {
        $this->telefone_pri = $val;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($val) {
        $this->email = $val;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($val) {
        $this->endereco = $val;
    }

    public function getSobre() {
        return $this->sobre;
    }

    public function setSobre($val) {
        $this->sobre = $val;
    }

    public function getIdGaleria() {
        return $this->id_galeria;
    }

    public function setIdGaleria($val) {
        $this->id_galeria = $val;
    }


}