<?php

use App\Models\Property;
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
        Schema::create('filter_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Property::class)->constrained();
            $table->string('session_id')->unique();
            $table->string('value'); // TODO High: Or do we store relations to filter values?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_interactions');
    }
};
