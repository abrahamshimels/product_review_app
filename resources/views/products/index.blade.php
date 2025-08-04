<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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

    </style>
</head>
<body>
@include('partials.head')
    <div class="product-list container my-5">
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
                        
                                <span class="ms-2"> {{ $product->reviews->first()->body ?? null }} </span>
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

                        <p class="card-text">
                            By {{ $product->user->name ?? 'Admin' }}
                        </p>
                        <p class="card-text">
                            <small>{{ $product->created_at->format('F j, Y') }}</small>
                        </p>

                        <a href="{{ route('products.show', $product->slug) }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links('vendor.pagination.bootstrap-5') }}
    </div>
@include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
