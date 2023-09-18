<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;
use Seb\GestionDeProjets\Entity\Projects;
use Seb\GestionDeProjets\Entity\Status;
use Seb\GestionDeProjets\Entity\Tasks;
use Seb\GestionDeProjets\Entity\Priority;
use Seb\GestionDeProjets\Kernel\DataBase;


class Project extends AbstractController
{
    public function showProject()
    {
        // Récupère l'ID du projet depuis l'URL
        $projectId = $_GET['id'];

        // Récupère le projet et ses tâches associées
        $project = Projects::getById($projectId);
        $tasks = Tasks::getByProjectId($projectId);
        $statues = Status::getAll();
        $priorities = Priority::getAll();


        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('project.php');
        $view->setFooter('footer.html');
        $view->render([
            'project' => $project,
            'tasks' => $tasks,
            'statues' => $statues,
            'priorities' => $priorities
        ]);
    }

    public function create()
    {
        // Si la méthode de la requête est POST, alors le formulaire de création de projet a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            $description = $_POST['description'];

            // Récupére l'ID de l'utilisateur connecté de la session
            $loggedInUserId = $_SESSION['id'] ?? null;

            // S'assure que l'ID utilisateur est valide 
            if (!$loggedInUserId) {
                die("L'utilisateur doit être connecté pour créer un projet.");
            }

            $success = Projects::insert([
                'title' => $title,
                'description' => $description,
                'id_user' => $loggedInUserId
            ]);

            if ($success) {
                // ID du dernier projet inséré.
                $projectId = DataBase::getInstance()->lastInsertId();
                header("Location: index.php?controller=Project&method=showProject&id=" . $projectId);
                exit;
            } else {
                die("Erreur lors de la création du projet.");
            }
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('createProject.php');
        $view->setFooter('footer.html');
        $view->render([
            'titlePage' => 'Nouveau Projet'
        ]);
    }
}
