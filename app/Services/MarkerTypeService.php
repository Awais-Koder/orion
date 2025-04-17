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
            // helepr function for more accessibility
            'markerType.solutions' => fn($q) => withCategoryOrNull(
                $q->where('marker_type_id', $markerTypeId),
                $categoryId
            ),
        ])
            ->where('marker_type_id', $markerTypeId)
            ->where(function ($query) use ($categoryId) {
                // helepr function for more accessibility
                withCategoryOrNull($query, $categoryId);
            })
            ->whereHas('properties', function ($q) use ($markerTypeId, $categoryId) {
                // using scope here
                $q->filterableForMarker($markerTypeId, $categoryId);
            })
            ->orderBy('sequence')
            ->get();

        // Limit each property's propertyValues to 5
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
