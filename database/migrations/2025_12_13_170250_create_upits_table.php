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
        Schema::create('upits', function (Blueprint $table) {
            $table->id();
            $table->string('ime_klijenta');
            $table->string('email');
            $table->string('telefon')->nullable();
            $table->text('opis');
            $table->string('status')->default('Novi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upits');
    }
};
