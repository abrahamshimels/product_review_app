<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Tech Products
            ['name' => 'Infinix Zero 30', 'description' => 'Affordable and fast phone for students'],
            ['name' => 'Samsung Galaxy A15', 'description' => 'Best midrange phone in Ethiopian market'],
            ['name' => 'Dell Latitude 5400', 'description' => 'Strong battery and durable for programmers'],

            // Local Clothing
            ['name' => 'Habesha Kemis', 'description' => 'Traditional Ethiopian dress for holidays'],

            // Services
            ['name' => 'Ethio Telecom Super Combo', 'description' => 'Cheap and useful combo for browsing'],
            ['name' => 'Sheba Washing Machine', 'description' => 'Locally available and affordable'],

            // Food Products
            ['name' => 'Selam Injera (Pack of 10)', 'description' => 'Soft and fresh injera, delivered in Addis Ababa'],
            ['name' => 'Ye Harar Bunna', 'description' => 'Highland-grown Harar Coffee Beans, 500g pack'],
            ['name' => 'Kocho Pack – 500g', 'description' => 'Southern Ethiopian Kocho, vacuum-packed'],
        ];


        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'image' => null,
            ]);
        }
    }
}
