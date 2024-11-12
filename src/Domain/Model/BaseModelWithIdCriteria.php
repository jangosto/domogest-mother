<?php

namespace Domain\Model;

class BaseModelWithIdCriteria
{
    private ?string $id;

    public static function createById(string $id): self
    {
        return (new self())->filterById($id);
    }

    public function filterById(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}