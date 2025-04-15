<?php

namespace App\Models;

use App\Models\Concerns\HasApplications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory;

    use HasApplications;

    use HasTranslations;

    public $translatable = [
        'name',
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

}
