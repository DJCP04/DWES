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
        Schema::create('table_treks', function (Blueprint $table) {
            $table->id();
            $table->int('regNumber', 500);
            $table->string('name', 500);
            $table->int('municipalities_id', 500);
            $table->int('status_(y/n)', 500);
            $table->foreign('municipalities')->references('id')->on('municipalities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_treks');
    }
};
