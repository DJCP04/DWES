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
        Schema::create('table_meetings', function (Blueprint $table) {
            $table->id();
            $table->date('appDateIni');
            $table->date('appDateEnd');
            $table->integer('users_id');
            $table->date('day');
            $table->date('hour');
            $table->foreign('treks_id')->references('id')->on('treks')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_meetings');
    }
};
