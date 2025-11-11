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
        Schema::create('table_interesting_places', function (Blueprint $table) {
            $table->id();
            $table->int('gps', 500);
            $table->int('name', 500);
            $table->int('place_types_id', 500);
            $table->foreign('place_types_id')->references('id')->on('place_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_interesting_places');
    }
};
