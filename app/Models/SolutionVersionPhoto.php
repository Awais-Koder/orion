<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionVersionPhoto extends Model
{
    /** @use HasFactory<\Database\Factories\SolutionVersionPhotoFactory> */
    use HasFactory;

    public $casts = [
        'sequence' => 'int',
    ];

    public function solutionVersion()
    {
        return $this->belongsTo(SolutionVersion::class);
    }
}
