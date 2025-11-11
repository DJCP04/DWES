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
        Schema::create('table__relation_2', function (Blueprint $table) {
            $table->id();
            $table->integer('meetings_appDateIni', 500);
            $table->integer('meetings_id', 500);
            $table->integer('user_id', 500);
            $table->foreign('meetings_appDateIni')->references('id')->on('meetings')->onDelete('cascade');
            $table->foreign('meetings_id')->references('id')->on('meetings')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user_id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table__relation_2');
    }
};
