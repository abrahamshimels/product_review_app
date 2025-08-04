<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $reviews = Review::all();

        foreach ($reviews as $review) {
            Comment::create([
                'user_id' => $users->random()->id,
                'review_id' => $review->id,
                'body' => 'Very informative review. Thanks!',
            ]);
        }
    }
}
