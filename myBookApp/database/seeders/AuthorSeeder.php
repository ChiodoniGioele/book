<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        Author::create(['name' => 'Mario Rossi', 'birthday' => '1980-01-01']);
        Author::create(['name' => 'Luigi Bianchi', 'birthday' => '1975-05-15']);
        Author::create(['name' => 'Giulia Verdi', 'birthday' => '1990-07-20']);
        Author::create(['name' => 'Anna Neri', 'birthday' => '1985-12-12']);
        Author::create(['name' => 'Carlo Gallo', 'birthday' => '1965-05-25']);
    }
}
