<?php

namespace App\Services;

use App\Models\PropertyGroup;
use Illuminate\Database\Eloquent\Collection;

class MarkerTypeService
{
    public function getPropertyGroupsWithFilters(int $markerTypeId, ?int $categoryId = null): Collection
    {
        $groups = PropertyGroup::with([
            'properties' => function ($query) use ($markerTypeId, $categoryId) {
                $query->filterableForMarker($markerTypeId, $categoryId)
                    ->orderBy('sequence')
                    ->with(['propertyValues.propertyChoice']);
            },

            'markerType.solutions' => fn($q) => matchCategoryIfGiven(
                $q->where('marker_type_id', $markerTypeId),
                $categoryId
            ),
        ])
            ->where('marker_type_id', $markerTypeId)
            ->tap(fn($query) => matchCategoryIfGiven($query, $categoryId)) // only add category filter if needed
            ->whereHas('properties', function ($q) use ($markerTypeId, $categoryId) {
                $q->filterableForMarker($markerTypeId, $categoryId);
            })
            ->orderBy('sequence')
            ->get();

        foreach ($groups as $group) {
            foreach ($group->properties as $property) {
                $property->setRelation(
                    'propertyValues',
                    $property->propertyValues->take(5)
                );
            }
        }

        return $groups;
    }
}
