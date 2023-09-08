<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;

class Profil extends AbstractController
{
    public function showProfil()
    {
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('profil.html');
        $view->setFooter('footer.html');
        $view->render([
            'titlePage' => 'Profil',
        ]);
    }
}
