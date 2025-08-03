@if (auth()->check())

<h3>Product Reviews</h3>
@foreach ($reviewSources as $source)
<iframe width="100%" src="{{ $source->url }}" frameborder="0"></iframe>
@endforeach
<p>Average Rating: {{ number_format($product->averageRating(), 1) }}/5</p>
<form method="POST" action="{{ route('reviews.store', $product->slug) }}">
    @csrf
    Rate this product: <input type="number" name="rating" min="1" max="5" required />
    description: <textarea name="body" required></textarea>
    <button type="submit">Submit Review</button>
</form>


@endif

