<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorsSeeder extends Seeder
{
    protected $model = Author::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //% DB
        /* DB::table('authors')->insert([
            'name' => 'Mario Rossi',
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]); */


        //% Collection e cicli
        /* $authors = [
            ['name' => 'Alessandra Bianchi'],
            ['name' => 'Stefano Moretti'],
            ['name' => 'Laura Ferrari'],
            ['name' => 'Chiara Galli'],
            ['name' => 'Andrea Conti'],
            ['name' => 'Giulia Costa'],
        ]; */

        /* foreach($authors as $authorData) {
            $author = new Author();
            $author->name = $authorData['name'];
            $author->save();
        } */

        //% create() pt1
        /* foreach($authors as $author) {
            Author::create($author);
        } */


        //% create() pt2
        /* foreach($authors as $author) {
            Author::create([
                'name' => $author['name'],
                'created_at' => date(now()),
                'updated_at' => '2010-08-28 17:01:30'
            ]);
        }
        */

        //% Factory

        /* $this->model::factory(10)->create();
        Author::factory()->count(10)->create();
        Author::factory(10)->make(); */

    }
}
