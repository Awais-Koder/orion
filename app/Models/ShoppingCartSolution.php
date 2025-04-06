<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartSolution extends Model
{
    /** @use HasFactory<\Database\Factories\ShoppingCartSolutionFactory> */
    use HasFactory;

    public $casts = [
        'sequence',
    ];

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
