<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = [];

        $chunkSize = 500;
        for ($i = 0; $i < 3000; $i++) {
            $categories[] = [
                'name' => $faker->word(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            
            if (count($categories) > $chunkSize) {
                Category::insert($categories);
                $categories = [];
            }
        }

        if (count($categories) > 0) {
            Category::insert($categories);
        }
    }
}
