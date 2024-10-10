<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'Il nome della rosa',
            'description' => 'Un romanzo giallo ambientato in un monastero medievale.',
            'pages' => 500,
            'author_id' => 1, // Mario Rossi
            'category_id' => 5, // Giallo
            'image' => null // Nessuna immagine
        ]);

        Book::create([
            'title' => '1984',
            'description' => 'Un romanzo distopico di George Orwell.',
            'pages' => 328,
            'author_id' => 2, // Luigi Bianchi
            'category_id' => 4, // Fantascienza
            'image' => null // Nessuna immagine
        ]);

        Book::create([
            'title' => 'La coscienza di Zeno',
            'description' => 'Un romanzo di Italo Svevo che esplora la psicoanalisi.',
            'pages' => 300,
            'author_id' => 3, // Giulia Verdi
            'category_id' => 1, // Romanzo
            'image' => null // Nessuna immagine
        ]);

        Book::create([
            'title' => 'Il diario di Anna Frank',
            'description' => 'Il diario di una ragazza ebrea durante la Seconda Guerra Mondiale.',
            'pages' => 350,
            'author_id' => 4, // Anna Neri
            'category_id' => 3, // Biografia
            'image' => null // Nessuna immagine
        ]);
    }
}
