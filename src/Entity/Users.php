<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Entity\Model;

class Users extends Model
{
    private int $id_user;
    private string $email;
    private string $firstname;
    private string $name;
    private string $password;
    private bool $is_deleted;

    public function getId(): int
    {
        return $this->id_user;
    }

    public function setId(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getIsDeleted(): bool
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(bool $is_deleted): void
    {
        $this->is_deleted = $is_deleted;
    }

    public static function getByEmail(string $email)
    {
        return self::getByField('email', $email);
    }
}
