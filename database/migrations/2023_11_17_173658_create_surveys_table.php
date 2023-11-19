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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->uuid('external_id');
            $table->timestamps();
            $table->string('name', 100)->nullable(); // Name der Umfrage
            $table->string('type', 100)->nullable(); // Typ: Umfrage (WordCloud), Multiple Choice, Ja/Nein, ...
            $table->string('email', 100)->nullable(); // eMail für Ergebnisversand
            $table->string('question', 500); // Die Frage...
            $table->integer('time')->default(30); // Zeit in Sekunden
            $table->string('answers', 500)->nullable();
            $table->dateTime('end')->nullable(); // Startzeit
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
