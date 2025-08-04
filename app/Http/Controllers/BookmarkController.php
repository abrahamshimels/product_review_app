<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Product;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function toggle($id)
    {
        $product = Product::findOrFail($id);
        Bookmark::updateOrCreate(
            ['user_id' => auth()->id(), 'review_id' => null, 'product_id' => $product->id],
            []
        ) ?: Bookmark::where('user_id', auth()->id())->where('product_id', $product->id)->delete();

        return back();
    }
}
