<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // ID univoco dell’autore
            $table->string('name'); // Nome completo dell’autore
            $table->date('birthdate')->nullable(); // Cambiato 'birthday' in 'birthdate'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
