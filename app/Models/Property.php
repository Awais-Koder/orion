<?php

namespace App\Models;

use App\Models\Enums\PropertyTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Property extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyFactory> */
    use HasFactory;

    use HasTranslations;

    public $translatable = [
        'name',
        'unit',
        'explanation',
        'explanation_images',
    ];

    public $casts = [
        'type' => PropertyTypeEnum::class,
        'is_filter_collapsed_by_default' => 'bool',
        'is_primary' => 'bool',
        'is_filterable' => 'bool',
        'sequence' => 'integer',
        'sequence_filter' => 'integer',
    ];
    public function getTypeStringAttribute()
    {
        return $this->type->value;
    }

    public function markerType()
    {
        return $this->belongsTo(MarkerType::class);
    }

    public function markerTypeCategory()
    {
        return $this->belongsTo(MarkerTypeCategory::class);
    }

    public function propertyChoices()
    {
        return $this->hasMany(PropertyChoice::class);
    }

    public function propertyGroup()
    {
        return $this->belongsTo(PropertyGroup::class);
    }

    public function propertyValues()
    {
        return $this->hasMany(PropertyValue::class);
    }

    public function scopeFilterableForMarker($query, $markerTypeId, $categoryId = null)
{
    return $query->where('is_filterable', true)
        ->where('marker_type_id', $markerTypeId)
        ->when(!is_null($categoryId), function ($q) use ($categoryId) {
            $q->where('marker_type_category_id', $categoryId);
        }, function ($q) {
            $q->whereNull('marker_type_category_id');
        });
}

}
