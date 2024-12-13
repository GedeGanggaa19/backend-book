<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $books = [];

        $authorIds = Author::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();

        $chunkSize = 1000;
        for ($i = 0; $i < 100000; $i++) {
            $books[] = [
                'name' => $faker->word(),
                'category_id' => $faker->randomElement($categoryIds),
                'author_id' => $faker->randomElement($authorIds),
                'average_rating' => 0,
                'voter' =>0,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($books) >= $chunkSize) {
                Book::insert($books);
                $books = [];
            }
        }

        if (count($books) > 0) {
            Book::insert($books);
        }
    }
}
