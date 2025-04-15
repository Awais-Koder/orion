<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionVersionFavorite extends Model
{
    /** @use HasFactory<\Database\Factories\SolutionVersionFavoriteFactory> */
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function solutionVersion()
    {
        return $this->belongsTo(SolutionVersion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
