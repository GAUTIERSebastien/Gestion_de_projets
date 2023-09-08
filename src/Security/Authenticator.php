<?php

namespace Seb\GestionDeProjets\Security;

use Seb\GestionDeProjets\Kernel\DataBase;

class Authenticator
{
    private $db;

    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }

    public function login($email, $password)
    {
        $stmt = $this->db->prepare("SELECT id, password FROM Users WHERE email = :email");
        $stmt->execute([':email' => $email]);

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Stockez l'ID de l'utilisateur dans la session
            $_SESSION['id'] = $user['id'];
            return true;
        }

        return false;
    }
}
