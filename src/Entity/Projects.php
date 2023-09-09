<?php

class Projects
{
    private int $id;
    private string $title;
    private string $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Projects
    {
        $this->id = $id;
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
}
