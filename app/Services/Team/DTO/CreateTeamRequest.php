<?php

namespace App\Services\Team\DTO;

final readonly class CreateTeamRequest
{
    public function __construct(
        private string $name,
        private string $component,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getComponent(): string
    {
        return $this->component;
    }
}
