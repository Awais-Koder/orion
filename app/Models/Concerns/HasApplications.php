<?php

namespace App\Models\Concerns;

use App\Models\CountryApplication;
use App\Models\RegionApplication;

trait HasApplications
{
    public function countryApplications()
    {
        return $this->morphMany(CountryApplication::class, 'subject');
    }

    public function regionApplications()
    {
        return $this->morphMany(RegionApplication::class, 'subject');
    }
}
