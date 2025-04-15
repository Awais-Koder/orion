<?php

use App\Models\Enums\PropertyTypeEnum;
use App\Models\MarkerType;
use App\Models\MarkerTypeCategory;
use App\Models\PropertyGroup;
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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MarkerType::class)->constrained();
            $table->foreignIdFor(MarkerTypeCategory::class)->nullable()->constrained();
            $table->foreignIdFor(PropertyGroup::class)->nullable()->constrained();
            $table->translatable('name');
            $table->enum('type', PropertyTypeEnum::values());
            $table->translatable('unit')->nullable();
            $table->boolean('is_primary');
            $table->boolean('is_filterable');
            $table->boolean('is_filter_collapsed_by_default')->nullable();
            $table->json('explanation')->nullable();
            $table->json('explanation_images')->nullable();
            $table->unsignedInteger('sequence');
            $table->unsignedInteger('sequence_filter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
