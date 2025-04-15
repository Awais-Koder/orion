<?php

use App\Models\Country;
use App\Models\Enums\ApplicationType;
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
        Schema::create('country_applications', function (Blueprint $table) {
            $table->id();
            $table->morphs('subject');
            $table->foreignIdFor(Country::class)->constrained();
            $table->enum('type', ApplicationType::values());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_applications');
    }
};
