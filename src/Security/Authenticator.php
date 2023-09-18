<?php

namespace Seb\GestionDeProjets\Security;

use Seb\GestionDeProjets\Entity\Users;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


class Authenticator
{
    public function login($email, $password)
    {
        $user = Users::getByEmail($email);

        if ($user && password_verify($password, $user->getPassword())) {

            // Stocke l'ID de l'utilisateur dans la session
            $_SESSION['id'] = $user->getId();
            return true;
        }

        return false;
    }
}
