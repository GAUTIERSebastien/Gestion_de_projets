<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Entity\Model;

class Users  extends Model
{
    private int $idUsers;
    private string $email;
    private string $firstname;
    private string $name;
    private string $password;


    public function getIdUsers()
    {
        return $this->idUsers;
    }

    public function setIdUsers($idUsers)
    {
        return $this->$idUsers = $idUsers;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        return $this->$email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        return $this->$name = $name;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        return $this->$firstname = $firstname;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        return $this->$password = $password;
    }
}
