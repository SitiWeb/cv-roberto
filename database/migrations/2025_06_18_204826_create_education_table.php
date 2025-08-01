<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('opleiding'); // vergelijkbaar met 'werkgever'
            $table->string('instituut'); // vergelijkbaar met 'functie'
            $table->date('startdatum');
            $table->date('einddatum')->nullable();
            $table->text('beschrijving')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
