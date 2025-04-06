<?php

use App\Models\Product;
use App\Models\Solution;
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
        Schema::create('product_solution_version', function (Blueprint $table) {
            $table->foreignIdFor(Product::class)->constrained();
            $table->foreignIdFor(SolutionVersion::class)->constrained();
            $table->unique(['product_id', 'solution_version_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_solution_version');
    }
};
