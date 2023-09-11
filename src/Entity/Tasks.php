<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Entity\Model;

class Tasks extends Model
{
    private int $id_task;
    private string $title;
    private string $description;
    private int $id_user;
    private int $id_status;
    private int $id_priority;
    private int $id_project;

    public function getId(): int
    {
        return $this->id_task;
    }

    public function setId(int $id_task): Tasks
    {
        $this->id_task = $id_task;
        return $this;
    }

    public function getTitle(): string
    {
        return ucfirst($this->title);
    }

    public function setTitle(string $title): Tasks
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return ucfirst($this->description);
    }

    public function setDescription(string $description): Tasks
    {
        $this->description = $description;
        return $this;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): Tasks
    {
        $this->id_user = $id_user;
        return $this;
    }


    public function getIdStatus(): int
    {
        return $this->id_status;
    }

    public function setIdStatus(int $id_status): Tasks
    {
        $this->id_status = $id_status;
        return $this;
    }

    public function getIdPriority(): int
    {
        return $this->id_priority;
    }


    public function setIdPriority(int $id_priority): Tasks
    {
        $this->id_priority = $id_priority;
        return $this;
    }

    public function getIdProject(): int
    {
        return $this->id_project;
    }

    public function setIdProject(int $id_project): Tasks
    {
        $this->id_project = $id_project;
        return $this;
    }

    public static function getByProjectId(int $projectId)
    {
        return self::getAllByField('id_project', $projectId);
    }

    protected static function getPrimaryKeyName()
    {
        return "id_task";
    }
}
