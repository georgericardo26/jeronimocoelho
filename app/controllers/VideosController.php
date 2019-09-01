<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 25/06/19
 * Time: 21:31
 */
use ControllerBase\ControllerBase;
use Phalcon\Mvc\View;
use Phalcon\Paginator\Factory;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
class VideosController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->view->setTemplateAfter('videos');

    }

    public function indexAction()
    {
        $this->view->setRenderLevel(View::LEVEL_LAYOUT);
        $this->view->setLayout("videos");
        $video = $this->modelsManager->createQuery(
            "select * from multimedia INNER JOIN categorias
on multimedia.id_categoria = categorias.id"
        )->execute();

        $this->view->setVars(
            ["video" => $video,
            "resume_blog" => $this->session->get('resume_blog')]
        );

    }


}