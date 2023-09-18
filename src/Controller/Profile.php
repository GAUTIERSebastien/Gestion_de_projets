<?php


namespace Seb\GestionDeProjets\Controller;

use Seb\GestionDeProjets\Kernel\Views;
use Seb\GestionDeProjets\Kernel\AbstractController;
use Seb\GestionDeProjets\Entity\Users;
use Seb\GestionDeProjets\Entity\Projects;

class Profile extends AbstractController
{
    public function showProfile()
    {
        $view = new Views();
        $projects = [];

        if (isset($_SESSION['id'])) {
            $user = Users::getById($_SESSION['id']);
            if ($user) {
                $projects = Projects::getAllByField('id_user', $user->getId());
            }
        }

        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('profile.php');
        $view->setFooter('footer.html');
        $view->render([
            'user' => $user ?? null,
            'projects' => $projects
        ]);
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $firstname = $_POST['firstname'];
            $password = $_POST['password'];

            Users::update($_SESSION['id'], [
                'name' => $name,
                'firstname' => $firstname,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            header("Location: index.php?controller=Profile&method=showProfile");
            exit;
        }
    }

    public function delete()
    {
        Users::softDelete($_SESSION['id']);

        // Déconnecte l'utilisateur après la suppression
        unset($_SESSION['id']);

        header("Location: index.php");
        exit;
    }
}
