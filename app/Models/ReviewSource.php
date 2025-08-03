<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewSource extends Model
{
    protected $fillable = [
        'review_id',
        'type',
        'url',
    ];
    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
