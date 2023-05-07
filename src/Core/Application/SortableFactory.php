<?php

namespace App\Core\Application;

class SortableFactory
{
    /**
     * @param iterable<SortableCardInterface> $sortables
     */
    public function __construct(
        private iterable $sortables
    )
    {
    }

    public function getSortable(string $sortableType): SortableCardInterface
    {
        foreach ($this->sortables as $sortable) {
            if ($sortable->isType($sortableType)) {
                return $sortable;
            }
        }

        throw new \LogicException("Unfound sortable for this type {$sortableType}");
    }
}
