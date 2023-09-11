<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Entity\Model;

class Priority extends Model
{
    private int $id_priority;
    private string $name_priority;

    public function getId(): int
    {
        return $this->id_priority;
    }

    public function setId(int $id_priority): Priority
    {
        $this->id_priority = $id_priority;
        return $this;
    }

    public function getName(): string
    {
        return ucfirst($this->name_priority);
    }

    public function setName(string $name_priority): Priority
    {
        $this->name_priority = $name_priority;
        return $this;
    }

    protected static function getPrimaryKeyName()
    {
        return "id_priority";
    }
}
