<?php

namespace App\Models;

use App\Models\Concerns\HasApplications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SolutionVersion extends Model
{
    /** @use HasFactory<\Database\Factories\SolutionVersionFactory> */
    use HasFactory;

    use HasApplications;

    use HasTranslations;

    public $translatable = [
        'name',
        'slug',
        'description',
        'fire_rating',
        'eta_page_numbers',
        'version_explanation'
    ];

    public $casts = [
        'is_visible' => 'bool',
        'photos' => 'array',
        'bim_files' => 'array',
    ];

    public function etaReport()
    {
        return $this->belongsTo(EtaReport::class);
    }

    public function markerType()
    {
        return $this->belongsTo(MarkerType::class);
    }

    public function markerTypeCategory()
    {
        return $this->belongsTo(MarkerTypeCategory::class);
    }

    public function propertyValues()
    {
        return $this->hasMany(PropertyValue::class);
    }

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }

    public function solutionVersionDocument()
    {
        return $this->hasMany(SolutionVersionDocument::class);
    }

    public function solutionVersionFavorites()
    {
        return $this->hasMany(SolutionVersionFavorite::class);
    }

    public function solutionVersionPhotos()
    {
        return $this->hasMany(SolutionVersionPhoto::class);
    }

    public function solutionVersionProducts()
    {
        return $this->belongsToMany(Product::class);
    }
}
