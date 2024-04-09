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
        // Stvaranje tablice projects
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->string('naziv_projekta');
            $table->text('opis_projekta')->nullable();
            $table->decimal('cijena_projekta', 10, 2)->nullable();
            $table->text('obavljeni_poslovi')->nullable();
            $table->dateTime('datum_pocetka')->nullable();
            $table->dateTime('datum_zavrsetka')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
