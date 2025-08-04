<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} | Product Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --success-color: #2e8b57;
            --light-bg: #f8f9fa;
            --dark-text: #212529;
            --light-text: #6c757d;
            --border-radius: 12px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark-text);
            line-height: 1.6;
            padding: 20px;
        }

        .product-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        @media (min-width: 992px) {
            .product-container {
                grid-template-columns: 1fr 1fr;
            }
        }

        .product-media {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
        }

        .product-info {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
        }

        .product-title {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--dark-text);
        }

        .product-description {
            margin-bottom: 1.5rem;
            color: var(--light-text);
        }

        .price {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 1.5rem;
            margin: 1.5rem 0 1rem;
            color: var(--dark-text);
            position: relative;
            padding-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--primary-color);
        }

        .video-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .video-thumbnail {
            position: relative;
            border-radius: var(--border-radius);
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .video-thumbnail:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .video-thumbnail img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .play-button i {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-left: 5px;
        }

        .video-thumbnail:hover .play-button {
            background: rgba(255, 255, 255, 0.95);
        }

        .video-title {
            padding: 0.8rem;
            background: white;
            font-weight: 500;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            width: 90%;
            max-width: 900px;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            font-size: 1.8rem;
            cursor: pointer;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: var(--border-radius);
        }

        .review-section,
        .comments-container {
            margin: 2rem 0;
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .rating-display {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .stars {
            color: #ffc107;
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        .average-rating {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .review-count {
            color: var(--light-text);
            margin-left: 0.5rem;
        }

        .toggle-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            margin-bottom: 1.5rem;
            transition: var(--transition);
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .toggle-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .toggle-btn i {
            font-size: 1rem;
        }

        .review-form,
        .comment-form,
        .reply-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 1.5rem;
            background: var(--light-bg);
            padding: 1.5rem;
            border-radius: var(--border-radius);
        }

        textarea,
        input[type="number"],
        input[type="text"] {
            padding: 0.8rem;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            resize: vertical;
            font-size: 1rem;
            transition: var(--transition);
        }

        textarea:focus,
        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        button[type="submit"] {
            background-color: var(--success-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            align-self: flex-start;
        }

        button[type="submit"]:hover {
            background-color: #256d46;
            transform: translateY(-2px);
        }

        .review-card {
            background: white;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--primary-color);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .review-user {
            font-weight: 600;
            color: var(--dark-text);
        }

        .review-rating {
            color: #ffc107;
        }

        .review-text {
            margin-bottom: 1rem;
        }

        .review-meta {
            font-size: 0.9rem;
            color: var(--light-text);
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .vote-form {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .vote-btn {
            background: var(--light-bg);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .vote-btn:hover {
            background: #e9ecef;
        }

        .upvote:hover {
            color: var(--success-color);
        }

        .downvote:hover {
            color: #dc3545;
        }

        .comment-thread {
            margin-top: 1.5rem;
            padding-left: 1rem;
            border-left: 2px solid #eee;
        }

        .comment {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: var(--light-bg);
            border-radius: var(--border-radius);
        }

        .comment-user {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .toggle-btn.small {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .bookmark-form {
            text-align: center;
            margin: 2rem 0;
        }

        .bookmark-btn {
            background-color: var(--accent-color);
            padding: 0.8rem 2rem;
            font-size: 1rem;
            border-radius: 50px;
            transition: var(--transition);
        }

        .bookmark-btn:hover {
            background-color: #3aa8d8;
            transform: translateY(-2px);
        }

        .hidden {
            display: none;
        }

        .tag {
            display: inline-block;
            background: var(--light-bg);
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            color: var(--light-text);
        }

        .product-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .action-btn {
            flex: 1;
            padding: 0.8rem;
            border-radius: var(--border-radius);
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .primary-btn {
            background: var(--primary-color);
            color: white;
        }

        .primary-btn:hover {
            background: var(--secondary-color);
        }

        .secondary-btn {
            background: white;
            border: 1px solid #ddd;
            color: var(--dark-text);
        }

        .secondary-btn:hover {
            background: #f1f1f1;
        }


        /* AI Review Section Styles */
        .ai-review-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin: 1.5rem 0;
            border: 1px solid #e0e0e0;
            box-shadow: var(--box-shadow);
        }

        .ai-review-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .ai-review-header h3 {
            font-size: 1.3rem;
            margin: 0;
        }

        .ai-badge {
            background: #4cc9f0;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .ai-review-content {
            display: grid;
            gap: 1.5rem;
        }

        .ai-rating-summary .stars {
            margin-bottom: 1rem;
        }

        .ai-rating-summary .stars span {
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .ai-summary {
            font-size: 1rem;
            line-height: 1.6;
            background: white;
            padding: 1rem;
            border-radius: var(--border-radius);
            border-left: 3px solid var(--accent-color);
        }

        .ai-highlights ul {
            list-style: none;
            padding-left: 0;
        }

        .ai-highlights li {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .ai-disclaimer {
            margin-top: 1rem;
            font-size: 0.8rem;
            color: var(--light-text);
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="product-container">
        <div class="product-media">
            <!-- Product Image Gallery would go here -->
            <h1 class="product-title">{{ $product->name }}</h1>

            <!-- YouTube Video Gallery -->
            <h3 class="section-title">Product Videos</h3>
            <div class="video-gallery">
                @foreach ($reviewSources as $source)
                @if(str_contains($source->url, 'youtube.com') || str_contains($source->url, 'youtu.be'))
                <div class="video-thumbnail" onclick="openVideoModal('{{ $source->url }}')">
                    <img src="https://img.youtube.com/vi/{{ getYouTubeId($source->url) }}/hqdefault.jpg" alt="Video thumbnail">
                    <div class="play-button">
                        <i class="fas fa-play"></i>
                    </div>
                    <div class="video-title">Product Review</div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="product-info">
            {{-- <div class="price">${{ number_format($product->price, 2) }}</div> --}}
            <p class="product-description">{{ $product->description }}</p>

            {{-- <!-- Product Tags -->
            <div>
                <span class="tag">In Stock</span>
                <span class="tag">Free Shipping</span>
                <span class="tag">1 Year Warranty</span>
            </div> --}}
            <<!-- AI Review Section -->
                <div class="ai-review-section">
                    <div class="ai-review-header">
                        <img src="https://cdn-icons-png.flaticon.com/512/2491/2491917.png" alt="AI Icon" width="40">
                        <h3>AI-Powered Product Summary</h3>
                        <span class="ai-badge">Generated by Gemini</span>
                    </div>

                    <div class="ai-review-content">
                        <div class="ai-rating-summary">
                            {{-- <div class="stars">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($aiRating)) <i class="fas fa-star"></i>
                                    @elseif ($i == ceil($aiRating) && $aiRating - floor($aiRating) >= 0.5)
                                    <i class="fas fa-star-half-alt"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                                    <span>{{ number_format($aiRating, 1) }}/5</span>
                            </div> --}}
                            <p class="ai-summary">{{ $aiReview }}</p>
                        </div>

                        {{-- <div class="ai-highlights">
                            <h4>Key Highlights:</h4>
                            <ul>
                                @foreach ($aiHighlights as $highlight)
                                <li>
                                    <i class="fas fa-check-circle" style="color: #2e8b57;"></i>
                                    {{ $highlight }}
                                </li>
                                @endforeach --}}
                            </ul>
                        </div>
                    </div>

                    <div class="ai-disclaimer">
                        <small>This AI-generated summary is based on product data and customer reviews. It updates regularly for accuracy.</small>
                    </div>
                </div>
                <button id="refresh-ai-review" class="toggle-btn small">
                    <i class="fas fa-sync-alt"></i> Regenerate AI Summary
                </button>




                <!-- Product Actions -->
                {{-- <div class="product-actions">
                    <button class="action-btn primary-btn">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    <button class="action-btn secondary-btn">
                        <i class="fas fa-heart"></i> Wishlist
                    </button>
                </div> --}}

                <!-- Reviews Summary -->
                <h3 class="section-title">Customer Reviews</h3>
                <div class="rating-display">
                    <div class="stars">
                        @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($product->averageRating()))
                            <i class="fas fa-star"></i>
                            @elseif ($i == ceil($product->averageRating()) && $product->averageRating() - floor($product->averageRating()) >= 0.5)
                            <i class="fas fa-star-half-alt"></i>
                            @else
                            <i class="far fa-star"></i>
                            @endif
                            @endfor
                    </div>
                    <div>
                        <span class="average-rating">{{ number_format($product->averageRating(), 1) }}</span>
                        <span class="review-count">({{ $product->reviews->count() }} reviews)</span>
                    </div>
                </div>

                @if (auth()->check())
                <div class="review-section">
                    <button class="toggle-btn" onclick="toggleVisibility('review-form')">
                        <i class="fas fa-edit"></i> Write a Review
                    </button>

                    <form id="review-form" class="review-form hidden" method="POST" action="{{ route('reviews.store', $product->slug) }}">
                        @csrf
                        <div>
                            <label>Your Rating:</label>
                            <div class="stars rating-input">
                                @for ($i = 1; $i <= 5; $i++) <i class="far fa-star" data-rating="{{ $i }}"></i>
                                    @endfor
                                    <input type="hidden" name="rating" id="rating-value" required>
                            </div>
                        </div>
                        <div>
                            <label for="review-body">Your Review:</label>
                            <textarea id="review-body" name="body" rows="4" required></textarea>
                        </div>
                        <button type="submit">Submit Review</button>
                    </form>
                </div>
                @endif
        </div>
    </div>

    <!-- Comments Section -->
    <div class="comments-container">
        <h3 class="section-title">Customer Questions & Answers</h3>

        @foreach ($product->reviews as $review)
        <div class="review-card">
            <div class="review-header">
                <span class="review-user">{{ $review->user->name }}</span>
                <span class="review-rating">
                    @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
                        <i class="fas fa-star"></i>
                        @else
                        <i class="far fa-star"></i>
                        @endif
                        @endfor
                </span>
            </div>
            <p class="review-text">{{ $review->body }}</p>
            <div class="review-meta">
                <span>{{ $review->created_at->format('M d, Y') }}</span>
                {{-- <span>Helpful: {{ $review->votes->count()}}</span> --}}
            </div>

            {{-- @if(auth()->check())
            <form class="vote-form" method="POST" action="{{ route('votes.vote', $review->id) }}">
                @csrf
                <button type="submit" name="is_upvote" value="1" class="vote-btn upvote">
                    <i class="fas fa-thumbs-up"></i> Helpful
                </button>
                <button type="submit" name="is_upvote" value="0" class="vote-btn downvote">
                    <i class="fas fa-thumbs-down"></i> Not Helpful
                </button>
            </form>
            @endif --}}

            <div class="comment-thread">
                @foreach ($review->comments as $comment)
                <div class="comment">
                    <div class="comment-user">{{ $comment->user->name }}</div>
                    <p>{{ $comment->body }}</p>
                    <div class="review-meta">{{ $comment->created_at->format('M d, Y') }}</div>

                    @if(auth()->check())
                    {{-- <button class="toggle-btn small" onclick="toggleVisibility('reply-form-{{ $comment->id }}')">
                        <i class="fas fa-reply"></i> Reply
                    </button> --}}

                    <form id="reply-form-{{ $comment->id }}" class="reply-form hidden" method="POST" action="{{ route('comments.store', $review->id) }}">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <textarea name="body" placeholder="Write your reply..." required></textarea>
                        <button type="submit">Post Reply</button>
                    </form>
                    @endif
                </div>
                @endforeach
            </div>

            @if(auth()->check())
            <button class="toggle-btn small" onclick="toggleVisibility('root-comment-form-{{ $review->id }}')">
                <i class="fas fa-comment"></i> Add Comment
            </button>

            <form id="root-comment-form-{{ $review->id }}" class="comment-form hidden" method="POST" action="{{ route('comments.store', $review->id) }}">
                @csrf
                <textarea name="body" placeholder="Ask a question or share your thoughts..." required></textarea>
                <button type="submit">Post Comment</button>
            </form>
            @endif
        </div>
        @endforeach
    </div>

    {{-- @if(auth()->check())
    <form class="bookmark-form" method="POST" action="{{ route('bookmarks.toggle', $review->id) }}">
        @csrf
        <button type="submit" class="bookmark-btn">
            <i class="fas fa-bookmark"></i> {{ auth()->user()->bookmarks->contains('review_id', $review->id) ? 'Saved' : 'Save for Later' }}
        </button>
    </form>
    @endif --}}

    <!-- Video Modal -->
    <div id="videoModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeVideoModal()">&times;</span>
            <div class="video-container">
                <iframe id="youtubeFrame" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <script>
        // Toggle form visibility
        function toggleVisibility(id) {
            const el = document.getElementById(id);
            if (el) {
                el.classList.toggle('hidden');
            }
        }

        // YouTube video modal
        function openVideoModal(url) {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('youtubeFrame');

            // Extract YouTube ID from various URL formats
            const videoId = getYouTubeId(url);
            if (videoId) {
                iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }
        }

        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('youtubeFrame');

            iframe.src = '';
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('videoModal');
            if (event.target == modal) {
                closeVideoModal();
            }
        }

        // Star rating input
        document.querySelectorAll('.rating-input i').forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                const stars = document.querySelectorAll('.rating-input i');

                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.remove('far');
                        s.classList.add('fas');
                    } else {
                        s.classList.remove('fas');
                        s.classList.add('far');
                    }
                });

                document.getElementById('rating-value').value = rating;
            });
        });

        // Helper function to extract YouTube ID from URL
        function getYouTubeId(url) {
            if (!url) return null;

            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
            const match = url.match(regExp);

            return (match && match[2].length === 11) ? match[2] : null;
        }

        ocument.getElementById('refresh-ai-review').addEventListener('click', async function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';

            try {
                const response = await fetch('/refresh-ai-review/{{ $product->id }}');
                const data = await response.json();

                document.querySelector('.ai-summary').textContent = data.review;
                document.querySelector('.ai-highlights ul').innerHTML = data.highlights
                    .map(h => `<li><i class="fas fa-check-circle" style="color: #2e8b57;"></i>${h}</li>`)
                    .join('');

                // Update stars
                const starsContainer = document.querySelector('.ai-rating-summary .stars');
                starsContainer.innerHTML = '';
                for (let i = 1; i <= 5; i++) {
                    const star = document.createElement('i');
                    star.className = i <= Math.floor(data.rating) ? 'fas fa-star' : (i == Math.ceil(data.rating) && data.rating % 1 >= 0.5 ? 'fas fa-star-half-alt' : 'far fa-star');
                    starsContainer.appendChild(star);
                }
                starsContainer.innerHTML += `<span>${data.rating.toFixed(1)}/5</span>`;

            } catch (error) {
                console.error('Error:', error);
            } finally {
                this.innerHTML = '<i class="fas fa-sync-alt"></i> Regenerate AI Summary';
            }
        });

    </script>
</body>
</html>
