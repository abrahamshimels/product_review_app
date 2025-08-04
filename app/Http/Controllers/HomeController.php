<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {

        $newArrivals = Product::orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $trendingProducts = Product::withCount('reviews')
            ->orderByDesc('reviews_count')
            ->take(5)
            ->get();



        $topRatedProducts = Product::withAvg('reviews', 'rating')
            ->orderBy('reviews_avg_rating', 'desc')
            ->take(4)
            ->get();

            $products = Product::with(['categories', 'reviews'])->get();
            return view('pages.home', ['products' => $products, 'Users' => \App\Models\User::latest()->take(8)->get(), 'newArrivals'=>$newArrivals, 'trendingProducts'=>$trendingProducts, 'topRatedProducts' => $topRatedProducts]); 
        
    }
}
