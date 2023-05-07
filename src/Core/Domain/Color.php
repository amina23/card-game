<?php

namespace App\Core\Domain;

class Color
{
    private const HEART = 'CO';
    private const SPADES = 'P';
    private const CLOVER = 'T';
    private const DIAMONDS = 'CA';

    public const ALL_COLORS = [self::DIAMONDS,self::CLOVER, self::HEART, self::SPADES];

    public function __construct(
        private string $color,
    )
    {
        if (!in_array($this->color, self::ALL_COLORS, true)) {
            throw new \LogicException("Unexpected color {$this->color}");
        }
    }

    public function getLabel(): string
    {
        return match ($this->color) {
            'CA' => 'diamonds',
            'CO' => 'heart',
            'P' => 'spades',
            'T' => 'clover',
        };
    }

    public function getSymbol(): string
    {
        return match ($this->color) {
            'CA' => '♦',
            'CO' => '♥',
            'P' => '♠',
            'T' => '♣',
        };
    }

    public function isRed(): bool
    {
        return in_array($this->color, [self::DIAMONDS, self::HEART]);
    }

    public function toString(): string
    {
        return $this->color;
    }


    public function isSame(Color $color): bool
    {
        return $color->color === $this->color;
    }
}
