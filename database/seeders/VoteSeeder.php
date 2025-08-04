<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Review::all() as $review) {
            Vote::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'review_id' => $review->id,
                'is_upvote' => true,
            ]);
        }
    }
}
