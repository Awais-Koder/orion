<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    use HasTranslations;

    public $translatable = [
        'name',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
