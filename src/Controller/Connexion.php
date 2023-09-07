<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;


class Connexion extends AbstractController
{
    public function login()
    {
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('connexion.html');
        $view->setFooter('footer.html');
        $view->render([
            'titlePage' => 'Connectez-vous',
        ]);
    }
}
