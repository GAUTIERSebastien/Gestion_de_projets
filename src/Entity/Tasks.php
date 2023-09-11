<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Entity\Model;

class Tasks extends Model
{
    private int $id;
    private string $title;
    private string $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Tasks
    {
        $this->id = $id;
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

    public static function getByProjectId(int $projectId)
    {
        return self::getAllByField('id', $projectId);
    }
}
