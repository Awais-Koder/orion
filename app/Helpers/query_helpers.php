<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use InvalidArgumentException;

function matchCategoryIfGiven($query, ?int $categoryId)
{
    if (!($query instanceof Builder) && !($query instanceof Relation)) {
        throw new InvalidArgumentException('Query must be an instance of Builder or Relation.');
    }

    if ($categoryId !== null) {
        $query->where('marker_type_category_id', $categoryId);
    }

    return $query;
}

