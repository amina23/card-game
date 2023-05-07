<?php

namespace App\Core\Domain;

class Value
{
    public const ALL_VALUES = [1,2,3,4,5,6,7,8,9,10,11,12,13];

    public function __construct(
        private int $value,
    ) {
        if (!in_array($this->value, self::ALL_VALUES, true)) {
            throw new \LogicException("Unexpected value {$this->value}");
        }
    }

    public function isSame(Value $value): bool
    {
        return $value->value === $this->value;
    }

    public function toInteger(): int
    {
        return $this->value;
    }

    public function getLabel(): string
    {
        if ($this->value > 1 && $this->value <= 10) {
            return (string ) $this->value;
        }

        return match ($this->value) {
            1 => 'A',
            11 => 'V',
            12 => 'R',
            13 => 'D',
        };
    }
}
