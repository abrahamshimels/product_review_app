<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Dom\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate(['body' => 'required|string|max:500']);
        $review = Review::findOrFail($id);

        Comment::create([
            'user_id' => auth()->id(),
            'review_id' => $review->id,
            'parent_id' => $request->input('parent_id'),
            'body' => $request->body,
        ]);

        return back()->with('success', 'Comment added!');
    }
}
