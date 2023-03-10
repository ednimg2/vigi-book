<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*for ($i = 0; $i < 10; $i++) {
            Book::create([
                'name' => fake()->name,
                'page_count' => fake()->numberBetween(1, 700)
            ]);
        }*/

        Book::factory(1000)->create();
    }
}
