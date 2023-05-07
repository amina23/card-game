<?php

namespace App\Core\Application;

class SortCard
{
    public function __construct(
        private SortableFactory $factory,
    )
    {
    }
    public function sortCard(array $cards, string $type): array
    {
        $sortable = $this->factory->getSortable($type);
        usort($cards, [$sortable, 'compare']);

        return [
            'sorted' => $cards,
            'sortColor' => $sortable->getSortedColor(),
            'sortValue' => $sortable->getSortedValue(),
            ];
    }
}
