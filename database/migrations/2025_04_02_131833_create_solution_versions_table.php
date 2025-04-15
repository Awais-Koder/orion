<?php

use App\Models\EtaReport;
use App\Models\MarkerType;
use App\Models\MarkerTypeCategory;
use App\Models\Solution;
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
        Schema::create('solution_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Solution::class)->constrained();
            $table->foreignIdFor(MarkerType::class)->constrained();
            $table->foreignIdFor(MarkerTypeCategory::class)->nullable()->constrained();
            $table->foreignIdFor(EtaReport::class)->constrained();
            $table->translatable('name');
            $table->translatable('slug');
            $table->translatable('description')->nullable();
            $table->translatable('fire_rating')->nullable();
            $table->json('photos')->nullable();
            $table->json('eta_page_numbers')->nullable();
            $table->json('bim_files')->nullable();
            $table->string('website_url')->nullable();
            $table->unsignedInteger('version_code')->default(1);
            $table->json('version_explanation')->nullable();
            $table->boolean('is_visible')->default(1);
            $table->timestamps();

            $table->unique(['solution_id', 'version_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solution_versions');
    }
};
