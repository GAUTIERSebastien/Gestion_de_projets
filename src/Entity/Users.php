<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Entity\Model;

class Users  extends Model
{
    private $password;
    private $name;
    private $firstname;
    private $email;


    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        return $this->$password = $password;
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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        return $this->$email = $email;
    }
}
