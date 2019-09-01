<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 24/06/19
 * Time: 08:50
 */
use ControllerBase\ControllerBase;
use Phalcon\Mvc\View;
use Phalcon\Paginator\Factory;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class DuvidasController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->view->setTemplateAfter('duvidas');

    }

    public function indexAction()
    {
        $this->view->duvidas = Duvidas::find();
    }

}