<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 17/06/19
 * Time: 20:20
 */

namespace ControllerBase;
use Administrador;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        ##################### VARIABLES BASE ###########################
        $this->view->setVar('title', ' - Urologia');
        $this->view->setVar("text_menu", "Centro Avançado <br>de Medicina Urológica");


        // Javascripts in the header
        $headerCollection = $this->assets->collection('header');
        $headerCollection->addCss("public/assets/css/style.css", true);
        $headerCollection->addCss("public/assets/css/style-mobile.css", true);
        $headerCollection->addCss("public/assets/css/bootstrap.css", true);
        $headerCollection->addCss("public/assets/css/slider.css", true);
        $headerCollection->addCss("public/assets/css/animate.css", true);
        $headerCollection->addCss("public/assets/css/slide-rate.css", true);
        $headerCollection->addCss("public/assets/css/w3.css", true);
        $headerCollection->addCss("public/assets/css/slider-mobile.css", true);
        $headerCollection->addCss("public/assets/css/smartphoto.css", true);
        //js*/
        $headerCollection = $this->assets
            ->collection('footer');
        $headerCollection->setPrefix('')
            ->setLocal(false)
            ->addJs('https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js');
        $headerCollection->setPrefix('')
            ->setLocal(false)
            ->addJs('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
        $headerCollection->setPrefix('')
            ->setLocal(false)
            ->addJs('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');

        // get url
        $baseUri = $this->url->getBaseUri();
        $this->view->baseUri = $baseUri;

        ##### ADMIN #####
        $admin =  $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Administrador')
            ->join('Galeria')
            ->where("Administrador.id = 2")
            ->getQuery()
            ->execute();
            /*$this->modelsManager->createQuery(
            "SELECT * FROM administrador INNER JOIN galeria on administrador.id_galeria = galeria.id"
        )->execute(); */


        $this->session->set('admin', $admin);
        $this->view->setVar('admin_footer', $this->session->get('admin'));

        #### RESUMO BLOG ####
        // Set a session variable
        $blog_last = $this->modelsManager->createBuilder()
            ->columns('*')
            ->from('Blog')
            ->join('Galeria')
            ->orderBy('-Blog.id')
            ->limit(4)
            ->getQuery()
            ->execute();
        $this->session->set('resume_blog', $blog_last);

        #### BLOG ######
        $this->view->resume_blog = $this->session->get('resume_blog');

    }


}