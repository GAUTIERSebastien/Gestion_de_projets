<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Entity\Model;

class Projects extends Model
{
    private int $id_project;
    private string $title;
    private string $description;
    private int $id_user;

    public function getId(): int
    {
        return $this->id_project;
    }

    public function setId(int $id_project): Projects
    {
        $this->id_project = $id_project;
        return $this;
    }

    public function getTitle(): string
    {
        return ucfirst($this->title);
    }

    public function setTitle(string $title): Projects
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return ucfirst($this->description);
    }

    public function setDescription(string $description): Projects
    {
        $this->description = $description;
        return $this;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): Projects
    {
        $this->id_user = $id_user;
        return $this;
    }
}
