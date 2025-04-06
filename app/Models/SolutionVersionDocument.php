<?php

namespace App\Models;

use App\Models\Concerns\HasApplications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SolutionVersionDocument extends Model
{
    /** @use HasFactory<\Database\Factories\SolutionVersionDocumentFactory> */
    use HasFactory;

    use HasApplications;

    use HasTranslations;

    public $translatable = ['name'];

    public $casts = [
        'sequence' => 'integer',
    ];

    public function solutionVersion()
    {
        return $this->belongsTo(SolutionVersion::class);
    }
}
