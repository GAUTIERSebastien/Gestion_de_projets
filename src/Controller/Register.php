<?php

namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;
use Seb\GestionDeProjets\Security\Authenticator;
use Seb\GestionDeProjets\Kernel\DataBase;
use Seb\GestionDeProjets\Entity\Users;

class Register extends AbstractController
{
    public function signUp($errorMessage = null)
    {
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('register.php');
        $view->setFooter('footer.html');
        $view->render([
            'titlePage' => 'Inscription',
            'errorMessage' => $errorMessage
        ]);
    }

    public function handleSignUp()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $firstname = $_POST['firstname'];

            if (empty($email) || empty($password) || empty($name) || empty($firstname)) {
                $this->signUp("Veuillez remplir tous les champs.");
                return;
            }

            // Vérifie si l'e-mail existe déjà
            if (Users::getByEmail($email)) {
                $this->signUp("L'adresse e-mail est déjà utilisée.");
                return;
            }

            // Si tout est bon, insére le nouvel utilisateur
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            Users::insert([
                'email' => $email,
                'password' => $hashedPassword,
                'name' => $name,
                'firstname' => $firstname,
                'is_deleted' => '0'
            ]);

            // Redirige vers la page de connexion après l'inscription
            header("Location: index.php?controller=Connexion&method=signIn");
            exit;
        } else {
            $this->signUp();
        }
    }
}
