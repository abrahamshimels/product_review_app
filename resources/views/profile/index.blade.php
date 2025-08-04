@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <!-- Profile Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2">{{ $user->name }}'s Profile</h1>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
            </div>

            <!-- Reviews Section -->
            @if($user->relationLoaded('reviews'))
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="h5 mb-0">
                        <i class="fas fa-star text-warning"></i> Your Reviews
                        <span class="badge bg-secondary">{{ $user->reviews->count() }}</span>
                    </h2>
                </div>
                <div class="card-body">
                    @if($user->reviews->isEmpty())
                    <div class="text-center py-3">
                        <p class="text-muted">You haven't written any reviews yet.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-primary">
                            Browse Products
                        </a>
                    </div>
                    @else
                    @foreach($user->reviews as $review)
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-start">
                            <h3 class="h6 mb-1">
                                <a href="{{ route('products.show', $review->product->slug) }}" class="text-decoration-none">
                                    {{ $review->product->name }}
                                </a>
                            </h3>
                            <div class="text-warning">
                                @for ($i = 1; $i <= 5; $i++) <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                            </div>
                        </div>
                        <p class="mb-1">{{ $review->body }}</p>
                        <small class="text-muted">Reviewed on {{ $review->created_at->format('M d, Y') }}</small>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            @endif

            <!-- Saved Products Section -->
            @if($user->relationLoaded('bookmarks'))
            <div class="card">
                <div class="card-header bg-light">
                    <h2 class="h5 mb-0">
                        <i class="fas fa-bookmark text-primary"></i> Saved Products
                        <span class="badge bg-secondary">{{ $user->bookmarks->count() }}</span>
                    </h2>
                </div>
                <div class="card-body">
                    @php
                    $savedProducts = $user->bookmarks->filter(function($bookmark) {
                    return $bookmark->review && $bookmark->review->product;
                    });
                    @endphp

                    @if($savedProducts->isEmpty())
                    <div class="text-center py-3">
                        <p class="text-muted">You haven't saved any products yet.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-primary">
                            Browse Products
                        </a>
                    </div>
                    @else
                    @foreach($savedProducts as $bookmark)
                    <div class="mb-2">
                        <a href="{{ route('products.show', $bookmark->review->product->slug) }}" class="text-decoration-none d-flex align-items-center">
                            <i class="fas fa-chevron-right text-primary me-2"></i>
                            {{ $bookmark->review->product->name }}
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
