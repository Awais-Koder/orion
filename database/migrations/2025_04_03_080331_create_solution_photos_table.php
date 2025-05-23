<?php

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
        Schema::create('solution_version_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SolutionVersion::class)->constrained();
            $table->string('file');
            $table->string('external_link')->nullable();
            $table->unsignedInteger('sequence');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solution_photos');
    }
};
