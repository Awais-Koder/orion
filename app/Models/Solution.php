<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Solution extends Model
{
    /** @use HasFactory<\Database\Factories\SolutionFactory> */
    use HasFactory;

    use HasTranslations;

    public $translatable = ['name', 'slug', 'description', 'fire_rating'];

    protected $casts = [
        'photos' => 'array',
        'eta_page_numbers' => 'array',
        'bim_files' => 'array',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function shoppingCartSolutions()
    {
        return $this->hasMany(ShoppingCartSolution::class);
    }

    public function solutionVersions()
    {
        return $this->hasMany(SolutionVersion::class);
    }

}
