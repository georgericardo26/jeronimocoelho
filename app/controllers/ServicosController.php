<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 06/01/2019
 * Time: 00:20
 */

use Phalcon\Mvc\Controller;
use ControllerBase\ControllerBase;

class ServicosController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->view->setTemplateAfter('servicos');
    }

    public function indexAction()
    {
        ##### ADMIN #####
        $admin = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Administrador')
            ->join('Galeria')
            ->getQuery()
            ->execute();

        ##### UROLOGIA ####
        $this->view->urologia = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Urologia')
            ->join('Galeria')
            ->orderBy('Urologia.id')
            ->limit(3)
            ->getQuery()
            ->execute();

        #### RESUMO BLOG ####
        $this->view->resume_blog = $this->session->get('resume_blog');


        #### ABOUT US ####
        $galeria_badges = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Galeria')
            ->where('qualificacoes = "1"')
            ->getQuery()
            ->execute();
        $this->view->badges = $galeria_badges;

        $services_count_total = Servicos::count();
        $services_count = round($services_count_total / 2);

        $services1 = Servicos::find(array(
            "limit" => $services_count
        ));

        $services2 = Servicos::find(array(
            "offset" => round($services_count),
            "limit" => $services_count_total
        ));


        $this->session->set('services1', $services1);
        $this->view->services1 = $this->session->get('services1');

        $this->session->set('services2', $services2);
        $this->view->services2 = $this->session->get('services2');


        ##### clinic photos #####
        $galeria_clinic = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Galeria')
            ->where('slide_secundario = "1"')
            ->getQuery()
            ->execute();
        $this->view->galeria_clinic = $galeria_clinic ;

        $this->view->uri = $this->url->get();

    }

}