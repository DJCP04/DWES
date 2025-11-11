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
        Schema::create('table__relation_1', function (Blueprint $table) {
            $table->id();
            $table->int('interesting_places_id', 500);
            $table->int('order', 500);
            $table->foreign('interesting_places_id')->reference('id')->on('treks')->onDelete('cascade');
            $table->int('order')->reference('id')->on('treks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table__relation_1');
    }
};
