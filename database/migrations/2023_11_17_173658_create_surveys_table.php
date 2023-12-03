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
            $table->enum('type', ['wordcloud', 'multiple-choice', 'feedback']);
            //$table->string('type', 20)->nullable(); // Typ: Umfrage (WordCloud), Multiple Choice, Ja/Nein, ...
            $table->string('email', 100)->nullable(); // eMail für Ergebnisversand
            $table->string('question', 500); // Die Frage...
            $table->integer('time')->nullable(); // Zeit in Sekunden
            $table->string('answers', 500)->nullable();
            $table->integer('answers_max')->default(0); // Maximale Anzahl an Antworten
            $table->dateTime('start')->nullable(); // Startzeit
            $table->dateTime('end')->nullable(); // Endzeit

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
