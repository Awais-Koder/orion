<?php

use App\Models\PropertyGroup;
use App\Models\MarkerType;
use App\Models\MarkerTypeCategory;
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
        Schema::create('property_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MarkerType::class)->constrained();
            $table->foreignIdFor(MarkerTypeCategory::class)->nullable()->constrained();
            $table->translatable('name');
            $table->boolean('is_filter_collapsed_by_default')->nullable();
            $table->unsignedInteger('sequence');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_groups');
    }
};
