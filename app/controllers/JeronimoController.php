<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 06/01/2019
 * Time: 00:20
 */

use Phalcon\Mvc\Controller;
use ControllerBase\ControllerBase;

class JeronimoController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->view->setTemplateAfter('jeronimo');
    }

    public function indexAction()
    {
        ### ADMIN ###
        $this->view->admin_user = $this->session->get('admin');
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
        // Set a session variable
        $blog = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Blog')
            ->join('Galeria')
            ->orderBy('-Blog.id')
            ->limit(4)
            ->getQuery()
            ->execute();
        $this->session->set('last-blog', $blog);
        $this->view->resume_blog = $this->session->get('resume_blog');


        #### ABOUT US ####
        $galeria_badges = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Galeria')
            ->where('qualificacoes = "1"')
            ->getQuery()
            ->execute();
        $this->view->badges = $galeria_badges;

        $qualifications_count = Qualificacoes::count();
        $qualifications_count = round($qualifications_count / 2);

        $qualifications1 = Qualificacoes::find(array(
            "limit" => $qualifications_count
        ));

        $qualifications2 = Qualificacoes::find(array(
            "offset" => round($qualifications_count),
            "limit" => $qualifications_count
        ));

        $this->session->set('qualifications1', $qualifications1);
        $this->view->qualifications1 = $this->session->get('qualifications1');

        $this->session->set('qualifications2', $qualifications2);
        $this->view->qualifications2 = $this->session->get('qualifications2');

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