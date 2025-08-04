<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\VoteController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::middleware('auth')->get('/myactivity', [ProfileController::class, 'index'])->name('profile.myactivity');


Route::get('/', function () {
    $products = Product::with(['categories', 'reviews'])->get();
    return view('pages.home', ['products'=> $products, 'Users' => \App\Models\User::latest()->take(8)->get()]); // Adjusted to use the correct variable
})->name('home');



Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::middleware('auth')->post('/product/{slug}/review', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::middleware('auth')->post('/review/{id}/comment', [CommentController::class, 'store'])->name('comments.store');

Route::middleware('auth')->post('/review/{id}/vote', [VoteController::class, 'vote'])->name('votes.vote');

Route::middleware('auth')->post('/product/{id}/bookmark', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');

Route::get('/head', function () {return view('partials.head');})->middleware(['auth', 'verified'])->name('head');


require __DIR__.'/auth.php';
