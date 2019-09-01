<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 06/01/2019
 * Time: 00:20
 */

use Phalcon\Mvc\Controller;

class JeronimoController extends Controller
{

    public function indexAction()
    {
        // Javascripts in the header
        $headerCollection = $this->assets->collection('header');
        /*  $headerCollection->addJs('js/jquery.js');
          $headerCollection->addJs('js/bootstrap.min.js');

        // Javascripts in the footer
          $footerCollection = $this->assets->collection('footer');

          $footerCollection->addJs('js/jquery.js');
          $footerCollection->addJs('js/bootstrap.min.js');*/
        // Add some remote CSS resources
        $headerCollection->addCss('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', false);
    }

    public function registerAction()
    {
        $users = new Administrador();
        // Store and check for errors
        $success = $users->save(
            $this->request->getPost(),
            array('name', 'email', 'phone')
        );
        // passing the result to the view
        $this->view->sucess = $success;
        if ($success) {
            $this->flash->success("Dados inseridos com sucesso!");
        } else {
            // $message = "Sorry, the following problems were generated:<br>" . implode('<br>', $users->getMessages());
            $this->flash->error("erro ao inserir contato");
            $this->view->message = $users->getMessages();
        }
        $this->dispatcher->forward(["action" => "index"]);
        // passing a message to the view
        //$this->view->message = $message;
    }

    public function deleteAction($id)
    {
        $users = Administrador::findFirst($id)->delete();
        if ($users) {
            $this->flash->success("Dados deletados com sucesso");
        } else {
            $this->flash->error("erro ao deletar contato");
        }
        return $this->response->redirect('index');
    }

    public function editAction($id)
    {
        // Javascripts in the header
        $headerCollection = $this->assets->collection('header');
        $headerCollection->addCss('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', false);
        if (!$this->request->getPost()) {
            $users = Administrador::findFirst($id);
            if (!$users) {
                $this->flash->error("error ao carregar informações");
            } else {
                $this->tag->displayTo("id", $users->id);
                $this->tag->displayTo("name", $users->name);
                $this->tag->displayTo("email", $users->email);
                $this->tag->displayTo("phone", $users->phone);
            }
        } else {
            $this->flash->error("erro ao carregar informações");
        }
    }

    public function updateAction()
    {
        $id = $this->request->getPost("id");
        $users = Administrador::findFirst($id);
        if (!$users) {
            $this->flash->error("erro ao atualizar");
            $this->dispatcher->forward(["action" => "index"]);
        } else {
            $sucess = $users->save($this->request->getPost(), array("name", "email", "phone"));
            if ($sucess) {
                $this->flash->success("Alteracao efetuada com sucesso");
                $this->dispatcher->forward([
                    "controller" => "signup",
                    "action" => "index"
                ]);
            }
        }
    }

}