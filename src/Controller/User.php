<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Entity\Users;
use Seb\GestionDeProjets\Kernel\Views;


class User
{

    public function index()
    {
        $page = isset($_GET['page']);
        $view = new Views();
        $tabBooks = Users::getAll();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('user.html');
        $view->setFooter('footer.html');
        $view->render([

            'titlePage' => 'Page BookController',
            'tabUsers' => $tabUsers,
            'page' => $page
        ]);
    }
}
