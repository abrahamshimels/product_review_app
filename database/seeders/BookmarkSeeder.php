<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $reviews = Review::all();

        foreach ($users as $user) {
            foreach ($reviews->random(2) as $review) {
                Bookmark::create([
                    'user_id' => $user->id,
                    'review_id' => $review->id,
                ]);
            }
        }
    }
}
