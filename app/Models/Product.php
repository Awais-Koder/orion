<?php

namespace App\Models;

use App\Models\Concerns\HasApplications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    use HasApplications;

    use HasTranslations;

    public $translatable = [
        'name',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function solutions()
    {
        return $this->belongsToMany(Solution::class);
    }
}
