<?php
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

function withCategoryOrNull($query, $categoryId)
{
    if (!($query instanceof Builder) && !($query instanceof Relation)) {
        throw new InvalidArgumentException('Query must be an instance of Builder or Relation.');
    }

    return $query->where(function ($q) use ($categoryId) {
        if (!is_null($categoryId)) {
            $q->where('marker_type_category_id', $categoryId)
              ->orWhereNull('marker_type_category_id');
        } else {
            $q->whereNull('marker_type_category_id');
        }
    });
}

