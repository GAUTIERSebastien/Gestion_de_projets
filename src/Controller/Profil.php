<?php


namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;
use Seb\GestionDeProjets\Entity\Users;

class Profil extends AbstractController
{
    public function showProfil()
    {
        $view = new Views();
        // Utilise $_SESSION['id'] pour récupérer l'ID de l'utilisateur
        $user = Users::getById($_SESSION['id']);

        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('profil.html');
        $view->setFooter('footer.html');
        $view->render([
            'user' => $user
        ]);
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $firstname = $_POST['firstname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            Users::update($_SESSION['id'], [
                'name' => $name,
                'firstname' => $firstname,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            header("Location: index.php?controller=Profil&method=showProfil");
            exit;
        }
    }

    public function delete()
    {
        Users::delete($_SESSION['id']);

        // Déconnecte l'utilisateur après la suppression
        unset($_SESSION['id']);

        header("Location: index.php");
        exit;
    }
}
