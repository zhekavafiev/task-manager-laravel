<?php

namespace App\Services\Team\DTO;

use JsonSerializable;

final readonly class CreateTeamResponse implements JsonSerializable
{
    public function __construct(
        private int $id,
        private string $name,
        private string $components,
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getComponents(): string
    {
        return $this->components;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
