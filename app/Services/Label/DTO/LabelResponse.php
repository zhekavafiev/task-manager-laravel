<?php

namespace App\Services\Label\DTO;

use JsonSerializable;

final readonly class LabelResponse implements JsonSerializable
{
    public function __construct(
        private int $id,
        private string $text,
        private string $textColor,
        private string $color
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTest(): string
    {
        return $this->text;
    }

    public function getTextColor(): string
    {
        return $this->textColor;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

}
