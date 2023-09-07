<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;


class Connection
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
