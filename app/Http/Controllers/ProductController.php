<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('categories')->latest()->paginate(12);
        return view('products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::with(['reviews.user', 'reviews.sources'])->where('slug', $slug)->firstOrFail();
        $reviewSources = $product->reviews->flatMap->sources; // Simplified

        return view('products.show', compact('product', 'reviewSources')); 
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $products = Product::where('name', 'LIKE', "%$keyword%")->paginate(10);
        return view('products.index', compact('products'));
    }
}
