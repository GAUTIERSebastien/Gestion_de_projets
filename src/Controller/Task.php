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

    public function update()
    {
        if (isset($_GET['id'])) {
            $task = Tasks::getById($_GET['id']);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_GET['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $id_user = $task->getIdUser();
                $id_status = $task->getIdStatus();
                $id_priority = $task->getIdPriority();
                $id_project = $task->getIdProject();

                Tasks::update($id, [
                    'title' => $title,
                    'description' => $description,
                    'id_user' => $id_user,
                    'id_status' => $id_status,
                    'id_priority' => $id_priority,
                    'id_project' => $id_project
                ]);
                header("Location: index.php?controller=Project&method=showProject&id=$id_project");
            }
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('task.html');
        $view->setFooter('footer.html');
        $view->render([
            'titlePage' => 'Task'
        ]);
    }
}
