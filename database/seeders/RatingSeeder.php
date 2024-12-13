<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\Rating;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $ratingsBatch = [];

        $bookIds = Book::pluck('id')->toArray();
        $batchSize = 500; // Ukuran batch untuk insert
        $totalRatings = 500000; // Total rating yang ingin di-generate

        for ($index = 0; $index < $totalRatings; $index++) {
            $ratingsBatch[] = [
                'book_id' => $faker->randomElement($bookIds),
                'rating' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($ratingsBatch) >= $batchSize) {
                Rating::insert($ratingsBatch);
                $ratingsBatch = [];
            }
        }

        if (count($ratingsBatch) > 0) {
            Rating::insert($ratingsBatch);
        }

        foreach ($bookIds as $bookId) {
            $this->updateBookRatings($bookId);
        }
    }

        /**
         * Update the voter count and average rating for a specific book.
         *
         * @param int $bookId
         * @return void
         */
    
    private function updateBookRatings(int $bookId): void
    {
        // Hitung jumlah pengguna unik yang memberikan rating
        $voter = Rating::where('book_id', $bookId)->select('user_id')->distinct()->count();

        // Hitung rata-rata rating
        $averageRating = Rating::where('book_id', $bookId)->avg('rating') ?? 0;

        // Perbarui tabel books dengan voter dan average_rating
        Book::where('id', $bookId)->update([
            'voter' => $voter,
            'average_rating' => $averageRating,
        ]);
    }
}


