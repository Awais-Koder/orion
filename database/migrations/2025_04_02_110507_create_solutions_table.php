<?php

use App\Models\Brand;
use App\Models\EtaReport;
use App\Models\Manufacturer;
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
            $table->string('name'); // Just an internal name for the manufacturer, so it's not translatable.
            $table->translatable('slug');
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
