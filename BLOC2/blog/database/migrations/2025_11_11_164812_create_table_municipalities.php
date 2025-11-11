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
        Schema::create('table_municipalities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 500);
            $table->int('zones_id', 500);
            $table->int('islands_id', 500);
            $table->foreign('zones_id')->references('id')->on('zones')->onDelete('cascade');
            $table->foreign('islands_id')->references('id')->on('islands')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_municipalities');
    }
};
