<?php

namespace App\Models;

use App\Models\Concerns\HasApplications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtaReport extends Model
{
    /** @use HasFactory<\Database\Factories\EtaReportFactory> */
    use HasFactory;

    use HasApplications;

    public $casts = [
        'main_pages' => 'json',
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
