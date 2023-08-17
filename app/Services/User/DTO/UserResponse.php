<?php

namespace App\Services\User\DTO;

use JsonSerializable;

final readonly class UserResponse implements JsonSerializable
{
    public function __construct(
        private int $id,
        private string $name,
        private string $email,
        private ?string $avatar
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

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }
}
