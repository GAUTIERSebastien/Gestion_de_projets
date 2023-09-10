<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Entity\Model;

class Status extends Model
{
    private int $id;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Status
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return ucfirst($this->name);
    }

    public function setName(string $name): Status
    {
        $this->name = $name;
        return $this;
    }
}
