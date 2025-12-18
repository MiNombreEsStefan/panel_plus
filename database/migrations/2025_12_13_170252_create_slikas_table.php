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
        Schema::disableForeignKeyConstraints();

        Schema::create('slikas', function (Blueprint $table) {
            $table->id();
            $table->string('putanja');
            $table->string('opis')->nullable();
            $table->foreignId('zadatak_id')->constrained()->cascadeOnDelete();
            

            $table->timestamps();

        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slikas');
    }
};
