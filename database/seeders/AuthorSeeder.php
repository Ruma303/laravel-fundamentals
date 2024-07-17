<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    protected $model = Author::class;

    public function run(): void
    {
        /* DB::table('authors')->insert([
            'name' => 'Mario Rossi',
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]); */

        /* $authors = [
            ['name' => 'Alessandra Bianchi'],
            ['name' => 'Stefano Moretti'],
            ['name' => 'Laura Ferrari'],
            ['name' => 'Chiara Galli'],
            ['name' => 'Andrea Conti'],
            ['name' => 'Giulia Costa'],
        ]; */

        /* foreach ($authors as $authorData) {
            $author = new Author();
            $author->name = $authorData['name'];
            $author->save();
        } */

        /* foreach ($authors as $author) {
            Author::create($author);
        } */

        /* foreach ($authors as $author) {
            Author::create([
                'name' => $author['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } */
    }
}

