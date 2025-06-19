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
        Schema::create('personalia', function (Blueprint $table) {
            $table->id();
            $table->string('key'); // bv. 'Geboortedatum'
            $table->string('value'); // bv. '12 maart 1988'
            $table->boolean('hidden')->default(false); // tonen/verbergen
            $table->string('icon')->nullable(); // bv. 'fa-solid fa-calendar'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalias');
    }
};
