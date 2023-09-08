<?php

namespace Seb\GestionDeProjets\Security;

use PDO;

class Authenticator
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function login(string $email, string $password): bool
    {
        $stmt = $this->db->prepare("SELECT password FROM Users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_email'] = $email;
            return true;
        } else {
            return false;
        }
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['user_email']);
    }

    public function logout(): void
    {
        unset($_SESSION['user_email']);
        session_destroy();
    }
}
