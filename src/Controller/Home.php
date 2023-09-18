<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;


class Home extends AbstractController
{
    public function index()
    {
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('index.php');
        $view->setFooter('footer.html');
        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Bienvenue sur votre gestionnaire de projets',
        ]);
    }
}
