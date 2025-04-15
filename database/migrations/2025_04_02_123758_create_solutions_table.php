<?php

use App\Models\Brand;
use App\Models\EtaReport;
use App\Models\Manufacturer;
use App\Models\MarkerTypeCategory;
use App\Models\MarkerType;
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
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Brand::class)->constrained();
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
            $table->string('code')->nullable();
            $table->timestamps();

            $table->unique(['brand_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solutions');
    }
};
