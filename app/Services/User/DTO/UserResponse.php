<?php

namespace App\Services\User\DTO;

use Carbon\Carbon;
use JsonSerializable;

final readonly class UserResponse implements JsonSerializable
{
    public function __construct(
        private int $id,
        private string $name,
        private ?string $second_name,
        private string $email,
        private ?string $phone,
        private ?string $telegram,
        private ?string $github,
        private ?string $country,
        private ?string $city,
        private ?string $role,
        private bool $email_verified_at,
        private ?Carbon $birthday,
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

    public function getSecondName(): ?string
    {
        return $this->second_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getTelegram(): ?string
    {
        return $this->telegram;
    }

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function isEmailVerifiedAt(): bool
    {
        return $this->email_verified_at;
    }

    public function getBirthday(): ?Carbon
    {
        return $this->birthday;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

}
