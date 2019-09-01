<?php

use Phalcon\Mvc\Controller;
use Phalcon\Assets\Filters\Jsmin;
use Phalcon\Image\Factory;
use Phalcon\Tag;
use ControllerBase\ControllerBase;

/**
 * This class does a initial load
 *
 * @InitialIndex(true)
 */

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->view->setTemplateAfter('home');
    }
    public function indexAction()
    {
        //RobotAges::find(["hydration" => \Phalcon\Mvc\Model\Resultset::HYDRATE_OBJECTS])->toArray());

        ### set path img ###
        $img_root = '/assets/img/slide/';
        $this->view->slides = Galeria::find(array(
            "conditions" => "slide_principal = 1"
        ));

        ##### UROLOGIA ####
        $this->view->urologia = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Urologia')
            ->join('Galeria')
            ->orderBy('Urologia.id')
            ->limit(3)
            ->getQuery()
            ->execute();

        #### PERGUNTAS FREQUENTES ####
        $this->view->duvidas = Duvidas::find(array(
            "limit" => 3
        ));

        #### SATISFACAO ####
        $this->view->satisfacoes = Satisfacoes::find();

    }


}