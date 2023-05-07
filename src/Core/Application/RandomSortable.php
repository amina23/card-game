<?php

namespace App\Core\Application;

use App\Core\Domain\Card;
use App\Core\Domain\Color;
use App\Core\Domain\Value;

class RandomSortable implements SortableCardInterface
{
    public const TYPE = 'random';

    /** @var array list<Color> */
    private array $sortedColors;

    /** @var array list<Value> */
    private array $sortedValues;


    public function __construct()
    {
        $this->sortedColors = $this->randomSortColor();
        $this->sortedValues = $this->randomSortValues();
    }

    /**
     * @return list<Color>
     */
    private function randomSortColor(): array
    {
        $allColors = array_map(static fn ($color) => new Color($color),  Color::ALL_COLORS);

        shuffle($allColors);

        return $allColors;
    }

    /**
     * @return list<Value>
     */
    private function randomSortValues(): array
    {
        $allValues = array_map(static fn ($value) => new Value($value),  Value::ALL_VALUES);

        shuffle($allValues);

        return $allValues;
    }

    public function getSortedColor(): array
    {
        return $this->sortedColors;
    }

    public function getSortedValue(): array
    {
        return $this->sortedValues;
    }

    public function compare(Card $card1, Card $card2): int
    {
            if (
                $card1->getColor()->isSame($card2->getColor())
                && $card1->getValue()->isSame($card2->getValue())
            ) {
                return 0;
            }

            if (
                $card1->getColor()->isSame($card2->getColor())
            ) {
                $sortedValues = array_map(static fn(Value $value) => $value->toInteger(), $this->sortedValues);

                $indexSortCard1 = array_search($card1->getValue()->toInteger(), $sortedValues, true);
                $indexSortCard2 = array_search($card2->getValue()->toInteger(), $sortedValues, true);

                return ($indexSortCard1 > $indexSortCard2) ? 1 : -1;
            }

            $sortedColors = array_map(static fn(Color $color) => $color->toString(), $this->sortedColors);
            $indexSortCard1 = array_search($card1->getColor()->toString(), $sortedColors, true);
            $indexSortCard2 = array_search($card2->getColor()->toString(), $sortedColors, true);


            return ($indexSortCard1 > $indexSortCard2) ? 1 : -1;
    }

    public function isType(string $type): bool
    {
        return $type === self::TYPE;
    }
}
