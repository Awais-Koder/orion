<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    /** @use HasFactory<\Database\Factories\ManufacturerFactory> */
    use HasFactory;

    public $casts = [
        'can_receive_requests' => 'bool',
    ];

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function etaReports()
    {
        return $this->hasMany(EtaReport::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
