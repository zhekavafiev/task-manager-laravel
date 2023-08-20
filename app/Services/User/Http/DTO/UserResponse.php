<?php

namespace App\Services\User\Http\DTO;

use JsonSerializable;

final readonly class UserResponse implements JsonSerializable
{
    public function __construct(
        private int $id,
        private string $name,
        private string $email
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
