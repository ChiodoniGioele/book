<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // ID univoco del libro
            $table->string('title'); // Titolo del libro
            $table->string('description')->nullable(); // Descrizione del libro (max 800 caratteri, opzionale)
            $table->integer('pages')->nullable(); // Numero di pagine del libro (opzionale)
            $table->foreignId('author_id')->constrained()->onDelete('cascade'); // ID dell’autore
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // ID della categoria
            $table->string('image')->nullable(); // Percorso dell'immagine
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}

