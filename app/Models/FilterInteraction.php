<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterInteraction extends Model
{
    /** @use HasFactory<\Database\Factories\FilterInteractionFactory> */
    use HasFactory;

    public $casts = [
        'interactions' => 'number',
    ];
}
