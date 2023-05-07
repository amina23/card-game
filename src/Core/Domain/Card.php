<?php

namespace App\Core\Domain;

class Card
{
    public function __construct(
        private Color $color,
        private Value $value,
    )
    {
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function getValue(): Value
    {
        return $this->value;
    }

    /**
     * @return list<Card>
     */
    public static function getAllCards(): iterable
    {
        $cards = [];
        foreach (Color::ALL_COLORS as $color) {
            foreach (Value::ALL_VALUES as $value) {
                $cards[] =  new Card(new Color($color), new Value($value));
            }
        }

        return $cards;
    }
}
