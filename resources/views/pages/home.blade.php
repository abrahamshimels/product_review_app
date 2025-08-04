<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Review App</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <!-- Custom CSS -->
    <style>
        /* Product card styles from your example */
        .product-card {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease;
            min-height: 400px;
            cursor: pointer;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .product-card .card-img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            opacity: 0.85;
            transition: opacity 0.3s ease;
        }

        .product-card:hover .card-img {
            opacity: 0.7;
        }

        .product-card .card-img-overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.3));
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1.5rem;
        }

        .product-card .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: white;
        }

        .product-card .card-text {
            font-size: 0.95rem;
            color: #eee;
            margin-bottom: 0.5rem;
        }

        .product-list .badge {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            border-radius: 999px;
            align-self: flex-start;
            margin-bottom: 0.8rem;
        }

        .rating-stars {
            margin-bottom: 0.8rem;
        }

        .empty-image {
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 1.2rem;
            height: 100%;
        }

        /* Additional styles from home template */
        .preloader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .section-header {
            margin-bottom: 3rem;
        }

        .section-title {
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #0d6efd;
        }

        .banner-ad {
            border-radius: 15px;
            overflow: hidden;
            height: 100%;
        }

        .product-item {
            background: white;
            border-radius: 10px;
            padding: 15px;
            transition: all 0.3s ease;
            position: relative;
            height: 100%;
        }

        .product-item:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        /* Hero Section Styles */
        .hero-section {
            position: relative;
            overflow: hidden;
        }

        .min-vh-80 {
            min-height: 80vh;
        }

        .text-gradient {
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline;
        }

        /* Product Card Highlight */
        .product-card-highlight {
            border-radius: 16px;
            transition: all 0.3s ease;
            transform: perspective(1000px) rotateY(0deg);
            position: relative;
            z-index: 2;
        }

        .product-card-highlight:hover {
            transform: perspective(1000px) rotateY(5deg) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.3) !important;
        }

        .floating-product-card {
            position: relative;
            padding: 2rem;
        }

        .floating-review-card {
            position: absolute;
            z-index: 3;
            width: 220px;
            animation: float 6s ease-in-out infinite;
        }

        .floating-review-1 {
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .floating-review-2 {
            bottom: 15%;
            right: 5%;
            animation-delay: 1s;
        }

        .review-card {
            border-radius: 12px;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
        }

        /* Community Stats */
        .stat-card {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Swiper Custom Styles */
        .hero-pagination {
            position: absolute;
            bottom: 30px !important;
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .hero-pagination .swiper-pagination-bullet {
            width: 40px;
            height: 4px;
            border-radius: 2px;
            background: rgba(255, 255, 255, 0.3);
            opacity: 1;
            transition: all 0.3s ease;
        }

        .hero-pagination .swiper-pagination-bullet-active {
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            height: 6px;
        }

        .hero-button-next,
        .hero-button-prev {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .hero-button-next:hover,
        .hero-button-prev:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .hero-button-next::after,
        .hero-button-prev::after {
            font-size: 1.2rem;
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate__animated {
            animation-duration: 1s;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero-product-showcase {
                margin-top: 2rem;
            }

            .floating-review-card {
                position: relative;
                margin-bottom: 1rem;
                animation: none;
            }
        }

    </style>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader-wrapper">
        <div class="preloader">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- Header -->
    @include('partials.head')


    <!-- Main Banner -->
    <section class="hero-section" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
        <div class="container-fluid px-0">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 - Featured Highlight -->
                    <div class="swiper-slide">
                        <div class="row g-0 align-items-center min-vh-80">
                            <div class="col-lg-6 px-4 px-md-5 py-5 order-lg-1 order-2">
                                <div class="banner-content animate__animated animate__fadeInLeft">
                                    <span class="badge bg-primary bg-opacity-20 text-primary mb-3 px-3 py-2">Editor's Choice</span>
                                    <h1 class="display-3 fw-bold text-white mb-4">Discover <span class="text-gradient">Authentic</span> Reviews</h1>
                                    <p class="lead text-white-80 mb-5">Explore thousands of honest product reviews from real users. Find the best products based on community ratings and detailed feedback.</p>
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="#trending" class="btn btn-primary btn-lg px-4 py-3 rounded-pill shadow-lg">
                                            <i class="fas fa-star me-2"></i> Top Rated Products
                                        </a>
                                        <a href="#categories" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
                                            <i class="fas fa-list me-2"></i> Browse Categories
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-2 order-1 position-relative">
                                <div class="hero-product-showcase animate__animated animate__fadeIn">
                                    @if($products->isNotEmpty())
                                    @php $product = $products->random() @endphp
                                    <div class="floating-product-card">
                                        <div class="card product-card-highlight border-0 overflow-hidden shadow-lg">
                                            @if($product->image)
                                            <img src="{{ Storage::disk('public')->exists('product_images/'.basename($product->image)) 
                                            ? asset('storage/product_images/'.basename($product->image)) 
                                            : 'https://via.placeholder.com/600x400?text=Featured+Product' }}" class="card-img" alt="{{ $product->title }}">
                                            @else
                                            <div class="empty-image">
                                                <span>No Image Available</span>
                                            </div>
                                            @endif

                                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                <div class="product-badge">
                                                    <span class="badge bg-dark">{{ $product->category->name ?? 'Featured' }}</span>
                                                    <span class="badge bg-warning text-dark ms-2">
                                                        <i class="fas fa-crown me-1"></i> Top Pick
                                                    </span>
                                                </div>

                                                <div class="rating-stars mb-2">
                                                    @for ($i = 1; $i <= 5; $i++) @if ($i <=$product->averageRating())
                                                        <i class="fas fa-star text-warning"></i>
                                                        @else
                                                        <i class="far fa-star text-warning"></i>
                                                        @endif
                                                        @endfor
                                                        <span class="ms-2 text-white">{{ number_format($product->averageRating(),1) }} ({{ $product->reviews->count() ?? 0 }})</span>
                                                </div>

                                                <h3 class="card-title text-white mb-2">{{ $product->title }}</h3>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-light rounded-pill">
                                                        Read Reviews <i class="fas fa-arrow-right ms-2"></i>
                                                    </a>
                                                    <div class="user-avatars">
                                                        @foreach($product->reviews->take(3) as $review)
                                                        <img src="{{ $review->user->avatar ? asset('storage/'.$review->user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($review->user->name).'&background=random' }}" alt="{{ $review->user->name }}" class="avatar-xs rounded-circle border border-2 border-white" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $review->user->name }} rated {{ $review->rating }}/5">
                                                        @endforeach
                                                        @if($product->reviews->count() > 3)
                                                        <span class="avatar-xs bg-primary rounded-circle d-inline-flex align-items-center justify-content-center">
                                                            +{{ $product->reviews->count() - 3 }}
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Floating review cards -->
                                        @foreach($product->reviews->take(2) as $review)
                                        <div class="floating-review-card floating-review-{{ $loop->iteration }}">
                                            <div class="card review-card border-0 shadow-sm">
                                                <div class="card-body p-3">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="rating-stars">
                                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
                                                                <i class="fas fa-star text-warning small"></i>
                                                                @else
                                                                <i class="far fa-star text-warning small"></i>
                                                                @endif
                                                                @endfor
                                                        </div>
                                                        <small class="text-muted ms-2">{{ $review->created_at->diffForHumans() }}</small>
                                                    </div>
                                                    <p class="mb-2">"{{ Str::limit($review->content, 80) }}"</p>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ $review->user->avatar ? asset('storage/'.$review->user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($review->user->name).'&background=random' }}" alt="{{ $review->user->name }}" class="avatar-xs rounded-circle me-2">
                                                        <span class="small fw-bold">{{ $review->user->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 - Community Stats -->
                    <div class="swiper-slide">
                        <div class="row g-0 align-items-center min-vh-80">
                            <div class="col-lg-6 px-4 px-md-5 py-5">
                                <div class="banner-content">
                                    <span class="badge bg-success bg-opacity-20 text-success mb-3 px-3 py-2">Community Powered</span>
                                    <h1 class="display-3 fw-bold text-white mb-4">Join Our <span class="text-gradient">Thriving</span> Community</h1>
                                    <p class="lead text-white-80 mb-5">Be part of a community of passionate reviewers helping others make informed decisions.</p>

                                    <div class="row g-4 mb-5">
                                        <div class="col-md-4">
                                            <div class="stat-card">
                                                <div class="stat-number text-primary">{{ number_format($product->reviews->count()) }}+</div>
                                                <div class="stat-label">Honest Reviews</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="stat-card">
                                                <div class="stat-number text-warning">{{ number_format($products->count()) }}+</div>
                                                <div class="stat-label">Products Rated</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="stat-card">
                                                <div class="stat-number text-info">{{ number_format(7) }}+</div>
                                                <div class="stat-label">Community Members</div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn btn-light btn-lg px-4 py-3 rounded-pill shadow-sm">
                                        <i class="fas fa-user-plus me-2"></i> Join Now
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 position-relative d-none d-lg-block">
                                <div class="community-illustration">
                                    <img src="https://via.placeholder.com/600x500?text=Community+Illustration" alt="Community" class="img-fluid">
                                    <div class="floating-user-avatars">
                                        @foreach($Users->take(8) as $user)
                                        <div class="user-avatar-item" style="transform: rotate({{ $loop->index * 45 }}deg) translate(150px) rotate(-{{ $loop->index * 45 }}deg);">
                                            <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=random' }}" alt="{{ $user->name }}" class="avatar-md rounded-circle border border-3 border-white shadow">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Custom pagination with progress bar -->
                <div class="swiper-pagination hero-pagination"></div>

                <!-- Navigation arrows -->
                <div class="swiper-button-next hero-button-next"></div>
                <div class="swiper-button-prev hero-button-prev"></div>
            </div>
        </div>
    </section>




    <!-- Categories Section -->
    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">Browse Categories</h2>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            @foreach($categories as $category)
                            <a href="{{ route('products.index', $category->slug) }}" class="nav-link category-item swiper-slide">
                                <img src="{{ $category->image ? asset('storage/'.$category->image) : 'https://via.placeholder.com/100?text=Category' }}" alt="{{ $category->name }}">
                                <h3 class="category-title">{{ $category->name }}</h3>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="trending" class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">Trending Products</h2>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('products.index') }}" class="btn-link text-decoration-none">View All Products →</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card product-card text-white h-100">
                        @if($product->image)
                        <img src="{{ Storage::disk('public')->exists('product_images/'.basename($product->image)) 
                            ? asset('storage/product_images/'.basename($product->image)) 
                            : 'https://via.placeholder.com/640x360?text=No+Image' }}" class="card-img" alt="{{ $product->title }}">
                        @else
                        <div class="empty-image">
                            <span>No Image Available</span>
                        </div>
                        @endif

                        <div class="card-img-overlay">
                            <span class="badge bg-primary">{{ $product->category->name ?? 'Uncategorized' }}</span>

                            <div class="rating-stars">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$product->averageRating())
                                    <i class="fas fa-star text-warning"></i>
                                    @else
                                    <i class="far fa-star text-warning"></i>
                                    @endif
                                    @endfor
                                    <span class="ms-2">{{ number_format($product->averageRating(),1) }} ({{ $product->reviews->count() ?? 0 }} reviews)</span>
                            </div>

                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="card-text">
                                <small>Last updated {{ $product->updated_at->diffForHumans() }}</small>
                            </p>
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
    <section class="py-5 bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">New Arrivals</h2>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('products.index') }}" class="btn-link text-decoration-none">View All New Arrivals →</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="products-carousel swiper">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                    <div class="swiper-slide">
                        <div class="product-item">
                            @if($product->is_new)
                            <span class="badge bg-success position-absolute m-3">NEW</span>
                            @endif

                            <a href="#" class="btn-wishlist">
                                <i class="far fa-heart"></i>
                            </a>

                            <figure>
                                <a href="{{ route('products.show', $product->slug) }}" title="{{ $product->title }}">
                                    <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/300?text=No+Image' }}" class="img-fluid rounded" alt="{{ $product->title }}">
                                </a>
                            </figure>

                            <h5 class="mt-3">{{ $product->title }}</h5>
                            <div class="rating-stars mb-2">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$product->averageRating())
                                    <i class="fas fa-star text-warning"></i>
                                    @else
                                    <i class="far fa-star text-warning"></i>
                                    @endif
                                    @endfor
                                    <small class="ms-1">({{ $product->reviews->count() }})</small>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">${{ number_format($product->price, 2) }}</span>
                                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Top Rated Products -->
    <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">Top Rated Products</h2>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('products.index') }}" class="btn-link text-decoration-none">View All Top Rated →</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="position-relative">
                            @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                            @else
                            <div class="empty-image" style="height: 200px;">
                                <span>No Image</span>
                            </div>
                            @endif

                            <div class="position-absolute top-0 end-0 p-2">
                                <a href="#" class="btn btn-sm btn-light rounded-circle">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                        </div>

                        <div class="p-3">
                            <h5>{{ $product->title }}</h5>
                            <div class="rating-stars mb-2">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$product->averageRating())
                                    <i class="fas fa-star text-warning"></i>
                                    @else
                                    <i class="far fa-star text-warning"></i>
                                    @endif
                                    @endfor
                                    <small class="ms-1">({{ $product->reviews->count() }})</small>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price fw-bold">${{ number_format($product->price, 2) }}</span>
                                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-primary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5 bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header mb-5 text-center">
                        <h2 class="section-title">What Our Users Say</h2>
                        <p class="lead">Read reviews from our satisfied customers</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="testimonials-carousel swiper">
                        <div class="swiper-wrapper">
                            @foreach($products as $prduct)
                            @foreach($product->reviews as $review)
                            <div class="swiper-slide">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body p-4">
                                        <div class="rating-stars mb-3">
                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
                                                <i class="fas fa-star text-warning"></i>
                                                @else
                                                <i class="far fa-star text-warning"></i>
                                                @endif
                                                @endfor
                                        </div>
                                        <p class="mb-4">"{{ $review->content }}"</p>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ $review->user->avatar ? asset('storage/'.$review->user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($review->user->name).'&background=random' }}" alt="{{ $review->user->name }}" class="rounded-circle" width="50">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0">{{ $review->user->name }}</h6>
                                                <small class="text-muted">Reviewed {{ $review->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-5">
        <div class="container-fluid">
            <div class="bg-secondary py-5 rounded-5" style="background: url('images/bg-pattern.png') no-repeat;">
                <div class="container py-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="mb-3">Stay Updated</h2>
                            <p class="mb-4">Subscribe to our newsletter to get the latest product updates and reviews.</p>
                        </div>
                        <div class="col-md-6">
                            <form class="row g-2">
                                <div class="col-8">
                                    <input type="email" class="form-control form-control-lg" placeholder="Your email address">
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-dark btn-lg w-100">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Initialize Swiper sliders
        document.addEventListener('DOMContentLoaded', function() {
            // Main banner slider
            new Swiper('.main-swiper', {
                loop: true
                , pagination: {
                    el: '.main-swiper .swiper-pagination'
                    , clickable: true
                , }
                , autoplay: {
                    delay: 5000
                , }
            , });

            // Category carousel
            new Swiper('.category-carousel', {
                slidesPerView: 2
                , spaceBetween: 15
                , navigation: {
                    nextEl: '.category-carousel-next'
                    , prevEl: '.category-carousel-prev'
                , }
                , breakpoints: {
                    576: {
                        slidesPerView: 3
                    , }
                    , 768: {
                        slidesPerView: 4
                    , }
                    , 992: {
                        slidesPerView: 6
                    , }
                    , 1200: {
                        slidesPerView: 8
                    , }
                }
            });

            // Products carousel
            new Swiper('.products-carousel', {
                slidesPerView: 2
                , spaceBetween: 20
                , pagination: {
                    el: '.products-carousel .swiper-pagination'
                    , clickable: true
                , }
                , breakpoints: {
                    576: {
                        slidesPerView: 3
                    , }
                    , 768: {
                        slidesPerView: 4
                    , }
                    , 992: {
                        slidesPerView: 5
                    , }
                }
            });

            // Testimonials carousel
            new Swiper('.testimonials-carousel', {
                slidesPerView: 1
                , spaceBetween: 20
                , pagination: {
                    el: '.testimonials-carousel .swiper-pagination'
                    , clickable: true
                , }
                , breakpoints: {
                    768: {
                        slidesPerView: 2
                    , }
                    , 992: {
                        slidesPerView: 3
                    , }
                }
            });

            // Hide preloader when page loads
            window.addEventListener('load', function() {
                document.querySelector('.preloader-wrapper').style.display = 'none';
            });
        });

        // Initialize Hero Swiper
        document.addEventListener('DOMContentLoaded', function() {
            const heroSwiper = new Swiper('.hero-swiper', {
                loop: true
                , speed: 800
                , effect: 'fade'
                , fadeEffect: {
                    crossFade: true
                }
                , autoplay: {
                    delay: 7000
                    , disableOnInteraction: false
                , }
                , pagination: {
                    el: '.hero-pagination'
                    , clickable: true
                , }
                , navigation: {
                    nextEl: '.hero-button-next'
                    , prevEl: '.hero-button-prev'
                , }
                , on: {
                    init: function() {
                        // Add animation class to active slide elements
                        const activeSlide = this.slides[this.activeIndex];
                        animateSlideElements(activeSlide);
                    }
                    , slideChange: function() {
                        // Animate elements in the new active slide
                        const activeSlide = this.slides[this.activeIndex];
                        animateSlideElements(activeSlide);
                    }
                }
            });

            function animateSlideElements(slide) {
                // Reset animations
                const elements = slide.querySelectorAll('.animate__animated');
                elements.forEach(el => {
                    el.classList.remove('animate__fadeInLeft', 'animate__fadeInRight', 'animate__fadeInUp');
                });

                // Add appropriate animations
                const content = slide.querySelector('.banner-content');
                if (content) {
                    content.classList.add('animate__animated', 'animate__fadeInLeft');
                }

                const showcase = slide.querySelector('.hero-product-showcase');
                if (showcase) {
                    showcase.classList.add('animate__animated', 'animate__fadeInRight');
                }

                const stats = slide.querySelectorAll('.stat-card');
                stats.forEach((stat, index) => {
                    stat.classList.add('animate__animated', 'animate__fadeInUp');
                    stat.style.animationDelay = `${index * 0.1}s`;
                });
            }

            // Initialize tooltips for user avatars
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });

    </script>
</body>
</html>
