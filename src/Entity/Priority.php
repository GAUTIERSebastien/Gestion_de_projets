<?php

namespace Seb\GestionDeProjets\Entity;

class Priority
{
    private int $id;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Priority
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return ucfirst($this->name);
    }

    public function setName(string $name): Priority
    {
        $this->name = $name;
        return $this;
    }
}
