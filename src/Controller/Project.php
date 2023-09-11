<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;
use Seb\GestionDeProjets\Entity\Projects;
use Seb\GestionDeProjets\Entity\Status;
use Seb\GestionDeProjets\Entity\Tasks;
use Seb\GestionDeProjets\Entity\Priority;


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
        $view->setHtml('project.html');
        $view->setFooter('footer.html');
        $view->render([
            'project' => $project,
            'tasks' => $tasks,
            'statues' => $statues,
            'priorities' => $priorities
        ]);
    }
}
