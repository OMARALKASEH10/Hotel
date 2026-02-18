<?php

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
        Schema::table('giveaway_campaigns', function (Blueprint $table) {
             $table->foreignId('winner_id')->nullable()->constrained('giveaway_entries')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('giveaway_campaigns', function (Blueprint $table) {
            //
        });
    }
};
