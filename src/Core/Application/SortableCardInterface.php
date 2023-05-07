<?php

namespace App\Core\Application;
use App\Core\Domain\Card;
use App\Core\Domain\Value;

interface SortableCardInterface
{
    /** @return list<Color> */
    public function getSortedColor(): array;

    /** @return list<Value> */
    public function getSortedValue(): array;

    public function compare(Card $card1, Card $card2): int;

    public function isType(string $type): bool;
}

