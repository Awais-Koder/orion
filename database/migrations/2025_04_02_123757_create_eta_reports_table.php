<?php

use App\Models\Manufacturer;
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
        Schema::create('eta_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Manufacturer::class)->constrained();
            $table->string('file'); // Can be in Storage or be external (starting with https://)
            $table->json('main_pages')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eta_reports');
    }
};
