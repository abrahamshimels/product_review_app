<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $slug)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'body' => 'required|string|max:1000',
        ]);

        $product = Product::where('slug', $slug)->firstOrFail();

        Review::create([
            'user_id' => Auth()->check() ? Auth()->id() : null,
            'product_id' => $product->id,
            'rating' => $request->rating,
            'body' => $request->body,
        ]);

        return redirect()->route('products.show', $slug)->with('success', 'Review submitted!');
    }
}
