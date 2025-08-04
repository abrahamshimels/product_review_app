<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Smartphones',
            'Laptops',
            'Traditional Clothing',
            'Household Appliances',
            'Internet Packages',
            'Shoes',
            'Beauty Products',
            'Injera',
            'Packaged Shiro',
            'Coffee Beans',
            'Spices',
            'Bottled Water',
            'Snack Foods',
            'Imported Foods',
        ];


        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
