<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PropertyChoice extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyChoiceFactory> */
    use HasFactory;

    use HasTranslations;

    public $translatable = [
        'name',
        'explanation',
    ];

    public $casts = [
        'sequence' => 'integer',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
