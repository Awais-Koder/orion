<?php

namespace App\Models;

use App\Models\Enums\ApplicationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionApplication extends Model
{
    /** @use HasFactory<\Database\Factories\RegionApplicationFactory> */
    use HasFactory;

    public $casts = [
        'type' => ApplicationType::class,
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function subject()
    {
        return $this->morphTo();
    }
}
