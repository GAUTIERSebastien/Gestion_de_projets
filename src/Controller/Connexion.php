<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;
use Seb\GestionDeProjets\Security\Authenticator;



class Connexion extends AbstractController
{
    private $auth;

    public function __construct()
    {
        $this->auth = new Authenticator();
    }

    public function signIn($errorMessage = null)
    {
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('connexion.php');
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


            if (empty($email) || empty($password)) {
                $this->signIn("Veuillez remplir tous les champs.");
                return;
            }

            if ($this->auth->login($email, $password)) {

                header("Location: index.php?controller=Profile&method=showProfile");
                exit;
            } else {
                $this->signIn("Email ou mot de passe incorrect.");
            }
        } else {
            $this->signIn();
        }
    }
}
