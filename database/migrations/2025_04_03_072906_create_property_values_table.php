<?php

use App\Models\Property;
use App\Models\PropertyChoice;
use App\Models\SolutionVersion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('property_values', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Property::class)->constrained();
            $table->foreignIdFor(SolutionVersion::class)->constrained();
            $table->foreignIdFor(PropertyChoice::class)->nullable()->constrained();
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_values');
    }
};
