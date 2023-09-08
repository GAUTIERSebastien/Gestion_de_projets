<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;
use Seb\GestionDeProjets\Security\Authenticator;
use Seb\GestionDeProjets\Kernel\DataBase;

class Connexion extends AbstractController
{
    public function signIn($errorMessage = null)
    {
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('connexion.html');
        $view->setFooter('footer.html');
        $view->render([
            'titlePage' => 'Connectez-vous',
            'errorMessage' => $errorMessage
        ]);
    }

    public function handleSignIn()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = DataBase::getInstance();  // Utilise l'instance Singleton de DataBase
            $auth = new Authenticator($db);

            if ($auth->login($email, $password)) {
                header("Location: index.html"); // Redirigez vers la page de tableau de bord ou la page d'accueil
                exit;
            } else {
                $this->signIn("Email ou mot de passe incorrect.");
            }
        } else {
            $this->signIn();
        }
    }
}
