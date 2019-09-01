<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 03/08/19
 * Time: 22:59
 */
use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;
use Phalcon\Assets\Filters\Jsmin;
use Phalcon\Image\Factory;
use Phalcon\Tag;
use ControllerBase\ControllerBase;
use Phalcon\Http\Request;
use Phalcon\Http\Response;


class AjaxController
{

    public function likeAction() {

        $request = new Request();
        $response = new Response();

        // Check if request has made with POST
        if ($request->isPost()) {
            // Access POST data
            $val = $request->getPost('val');
            $post = $request->getPost('post');

            $blog = Blog::findFirst([
                'conditions' => 'id = :post:',
                'bind' => ['post' => $post],
                'bindTypes' => [Phalcon\Db\Column::BIND_PARAM_STR]
            ]);

            $blog->setQtdlike($val);
            $db = $blog->update();


            $response->setContent(json_encode($os =  (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')  ? "win" : "mac"));
            $response->setStatusCode("200");

            return $response;
        }

        return $response->setStatusCode("400");
    }

}