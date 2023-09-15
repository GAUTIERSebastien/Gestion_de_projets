<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;
use Seb\GestionDeProjets\Entity\Tasks;


class Task extends AbstractController
{
    public function index()
    {
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('task.html');
        $view->setFooter('footer.html');
        $view->render([
            'titlePage' => 'Task'
        ]);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $task = Tasks::deleteById($id);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}
