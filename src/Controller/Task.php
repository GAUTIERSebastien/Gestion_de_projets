<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;
use Seb\GestionDeProjets\Entity\Tasks;
use Seb\GestionDeProjets\Entity\Projects;
use Seb\GestionDeProjets\Entity\Priority;

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
        $view->setHtml('updateTask.html');
        $view->setFooter('footer.html');
        $view->render([
            'titlePage' => 'Task',
            'task' => $task,
        ]);
    }

    public function create()
    {
        // Vérifie que l'ID du projet est fourni
        if (!isset($_GET['id'])) {
            die("ID de projet non spécifié");
        }

        // Récupére l'objet projet à partir de l'ID
        $project = Projects::getById((int)$_GET['id']);
        if (!$project) {
            die("Le projet n'existe pas.");
        }

        $id_project = $project->getId();

        // Si la méthode de la requête est POST, cela signifie que le formulaire de création de tâche a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupére les données du formulaire
            $title = $_POST['title'];
            $description = $_POST['description'];
            $id_user = $_POST['id_user'] ?? NULL;
            $id_status = $_POST['id_status'] ?? 1;
            $id_priority = $_POST['id_priority'];

            Tasks::insert([
                'title' => $title,
                'description' => $description,
                'id_user' => $id_user,
                'id_status' => $id_status,
                'id_priority' => $id_priority,
                'id_project' => $id_project
            ]);

            header("Location: index.php?controller=Project&method=showProject&id=$id_project");
            exit;
        }

        // Récupération de toutes les priorités
        $priorities = Priority::getAll();

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('createTask.html');
        $view->setFooter('footer.html');
        $view->render([
            'titlePage' => 'Task',
            'priorities' => $priorities,
            'id_project' => $id_project
        ]);
    }
}
