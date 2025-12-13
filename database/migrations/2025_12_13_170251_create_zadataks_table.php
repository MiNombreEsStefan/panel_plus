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

        Schema::create('zadataks', function (Blueprint $table) {
            $table->id();
            $table->string('naslov');
            $table->text('opis')->nullable();
            $table->string('lokacija')->nullable();
            $table->dateTime('datum_kreiranja')->nullable();
            $table->string('status')->default('Kreiran');
            $table->foreignId('upit_id')->nullable()->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zadataks');
    }
};
