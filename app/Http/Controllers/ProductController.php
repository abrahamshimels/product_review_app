<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\GeminiService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {   
        $products = Product::with(['categories', 'reviews'])->paginate(10);

        return view('products.index', compact('products'));
    }

    public function show($slug, GeminiService $gemini)
    {
        $product = Product::with(['reviews.user', 'reviews.sources'])->where('slug', $slug)->firstOrFail();
        $reviewSources = $product->reviews->flatMap->sources; // Simplified

        $prompt = "Write a short product review based on this name: {$product->name}";
        $aiReview = $gemini->generateReview($prompt);

        return view('products.show', compact('product', 'reviewSources', 'aiReview')); 
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');

        $products = Product::where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%");
        })
            ->paginate(10)
            ->appends(['q' => $keyword]); // Preserve search term in pagination links

        return view('products.index', compact('products', 'keyword'));
    }
}
