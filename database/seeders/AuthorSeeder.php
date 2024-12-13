<?php

namespace Database\Seeders;

use App\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $author = [];

        $chunkSize = 500;
        for ($i = 0; $i < 1000; $i++) {
            $author[] = [
                'name' => $faker->name(),
                'voter' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            
            if (count($author) > $chunkSize) {
                Author::insert($author);
                $author = [];
            }
        }
        if (count($author) > 0) {
            Author::insert($author);
        }
        
    }
}
