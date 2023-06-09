<?php

namespace App\Core\Application;

use App\Core\Domain\Card;
use App\Core\Domain\Color;
use App\Core\Domain\Value;

class CardDistribution
{

    private const CARD_NUMBER = 10;
    /**
     * @return list<Card>
     */
    public function getRandom(): iterable
    {
        $allCards = Card::getAllCards();
        shuffle($allCards);

        return array_slice($allCards, 0, self::CARD_NUMBER);
    }
}
