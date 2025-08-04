<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();

        foreach ($products as $product) {
            foreach ($users->random(2) as $user) {
                Review::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'body' => 'Great product! Recommended for buyers.',
                    'rating' => rand(3, 5),
                ]);
            }
        }
    }
}
