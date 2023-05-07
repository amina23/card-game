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

        $pickedKeys = array_rand($allCards, self::CARD_NUMBER);

        return array_filter(
            $allCards,
            function ($key) use ($pickedKeys) {
                return in_array($key, $pickedKeys, true);
                },
            ARRAY_FILTER_USE_KEY,
        );
    }


}
