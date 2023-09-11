<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Entity\Model;

class Participate extends Model
{

    private int $id_user;
    private int $id_project;

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): Participate
    {
        $this->id_user = $id_user;
        return $this;
    }

    public function getIdProject(): int
    {
        return $this->id_project;
    }

    public function setIdProject(int $id_project): Participate
    {
        $this->id_project = $id_project;
        return $this;
    }
}
