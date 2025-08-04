<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row g-4">
            <!-- Logo and About -->
            <div class="col-lg-4 col-md-6">
                <a class="d-flex align-items-center mb-3 text-decoration-none" href="{{ route('home') }}">
                    <span class="fs-4 fw-bold text-white">Honest<span class="text-primary">Reviews</span></span>
                </a>
                <p class="text-white-50 small">Helping millions of users make better purchase decisions through authentic community reviews since 2015.</p>
                <div class="social-icons mt-3">
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h5 class="text-uppercase mb-4">Explore</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('products.index') }}" class="text-white-50 text-decoration-none">All Products</a></li>
                    <li class="mb-2"><a href="{{ route('products.index') }}" class="text-white-50 text-decoration-none">Top Rated</a></li>
                    <li class="mb-2"><a href="{{ route('products.index') }}" class="text-white-50 text-decoration-none">New Arrivals</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div class="col-lg-2 col-md-6">
                <h5 class="text-uppercase mb-4">Company</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-white-50 text-decoration-none">About Us</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Careers</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Press</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Blog</a></li>
                </ul>
            </div>

            <!-- Legal & Support -->
            <div class="col-lg-4 col-md-6">
                <h5 class="text-uppercase mb-4">Support</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Contact Us</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Help Center</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Terms of Service</a></li>
                </ul>

                <!-- Newsletter -->
                <div class="mt-4">
                    <h6 class="text-uppercase mb-3">Get Updates</h6>
                    <form class="d-flex">
                        <input type="email" class="form-control form-control-sm rounded-0" placeholder="Your email">
                        <button class="btn btn-primary btn-sm rounded-0 ms-2" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>

        <hr class="my-4 border-secondary">

        <!-- Copyright -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="small text-white-50 mb-0">&copy; {{ date('Y') }} HonestReviews. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="small text-white-50 mb-0">Made with <i class="fas fa-heart text-danger"></i> for honest shoppers</p>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Footer Styles */
    footer {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%) !important;
    }

    footer a {
        transition: all 0.3s ease;
    }

    footer a:hover {
        color: var(--bs-primary) !important;
        padding-left: 3px;
    }

    .social-icons a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .social-icons a:hover {
        background: var(--bs-primary);
        transform: translateY(-3px);
    }

    hr {
        opacity: 0.1;
    }

</style>
