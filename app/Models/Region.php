<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Region extends Model
{
    /** @use HasFactory<\Database\Factories\RegionFactory> */
    use HasFactory;

    use HasTranslations;

    public $translatable = [
        'name',
    ];

    public function countries()
    {
        return $this->hasMany(Country::class);
    }
}
