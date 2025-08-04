<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\ReviewSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Review::all() as $review) {
            ReviewSource::create([
                'review_id' => $review->id,
                'type' => 'YouTube',
                'url' => 'https://www.youtube.com/watch?v=-gdvgP5lSjI&pp=ygUcZm9vZCByZXZpZXcgZXRoaW9waWEgYW1oYXJpYw%3D%3D',
            ]);
        }
    }
}
