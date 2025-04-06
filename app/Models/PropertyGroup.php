<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PropertyGroup extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyGroupFactory> */
    use HasFactory;

    use HasTranslations;

    public $translatable = [
        'name',
    ];

    public $casts = [
        'is_filter_collapsed_by_default' => 'bool',
        'sequence' => 'int',
    ];

    public function markerType()
    {
        return $this->belongsTo(MarkerType::class);
    }

    public function markerTypeCategory()
    {
        return $this->belongsTo(MarkerTypeCategory::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

}
