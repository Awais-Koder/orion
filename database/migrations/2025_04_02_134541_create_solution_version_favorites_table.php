<?php

use App\Models\Company;
use App\Models\Solution;
use App\Models\SolutionVersion;
use App\Models\User;
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
        Schema::create('solution_version_favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Company::class)->nullable()->constrained();
            $table->foreignIdFor(SolutionVersion::class)->constrained();
            $table->timestamps();

            $table->unique(['user_id', 'company_id', 'solution_version_id'], 'solution_version_favorites_uq');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solution_version_favorites');
    }
};
