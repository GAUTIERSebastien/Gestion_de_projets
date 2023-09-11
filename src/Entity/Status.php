<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Entity\Model;

class Status extends Model
{
    private int $id_status;
    private string $name_status;

    public function getId(): int
    {
        return $this->id_status;
    }

    public function setId(int $id_status): Status
    {
        $this->id_status = $id_status;
        return $this;
    }

    public function getName(): string
    {
        return ucfirst($this->name_status);
    }

    public function setName(string $name_status): Status
    {
        $this->name_status = $name_status;
        return $this;
    }
}
