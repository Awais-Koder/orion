<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    public function solutionVersionFavorites()
    {
        return $this->hasMany(SolutionVersionFavorite::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
