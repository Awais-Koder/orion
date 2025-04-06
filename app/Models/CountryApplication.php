<?php

namespace App\Models;

use App\Models\Enums\ApplicationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryApplication extends Model
{
    /** @use HasFactory<\Database\Factories\CountryApplicationFactory> */
    use HasFactory;

    public $casts = [
        'type' => ApplicationType::class,
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function subject()
    {
        return $this->morphTo();
    }
}
