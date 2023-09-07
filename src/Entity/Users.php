<?php

class Users
{
    private $id_user;
    private $name;
    private $firstname;
    private $email;
    private $password;

    public function getId_user()
    {
        return $this->id_user;
    }

    public function setId_user($id_user)
    {
        return $this->id_user = $id_user;
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

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        return $this->$password = $password;
    }
}
