<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyValue extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyValueFactory> */
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function propertyChoice()
    {
        return $this->belongsTo(PropertyChoice::class);
    }

    public function solutionVersion()
    {
        return $this->belongsTo(SolutionVersion::class);
    }
}
