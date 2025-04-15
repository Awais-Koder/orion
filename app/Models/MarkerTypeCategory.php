<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Translatable\HasTranslations;

class MarkerTypeCategory extends Model
{
    /** @use HasFactory<\Database\Factories\MarkerTypeCategoryFactory> */
    use HasFactory;

    use NodeTrait;
    use HasTranslations;

    public $translatable = [
        'name',
        'slug',
    ];

    public function markerType()
    {
        return $this->belongsTo(MarkerType::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
}
