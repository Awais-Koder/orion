<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MarkerType extends Model
{
    /** @use HasFactory<\Database\Factories\MarkerTypeFactory> */
    use HasFactory;

    use HasTranslations;

    public $translatable = [
        'name',
        'slug',
    ];

    public function markerTypeCategories()
    {
        return $this->hasMany(MarkerTypeCategory::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
}
