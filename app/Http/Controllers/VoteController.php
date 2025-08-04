<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request, $id)
    {
        $request->validate(['is_upvote' => 'required|boolean']);
        $review = Review::findOrFail($id);

        Vote::updateOrCreate(
            ['user_id' => auth()->id(), 'review_id' => $review->id],
            ['is_upvote' => $request->is_upvote]
        );

        return back();
    }
}
