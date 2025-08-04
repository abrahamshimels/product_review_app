<header class="bg-white shadow-sm sticky-top py-2 border-bottom">
    <div class="container">
        <!-- First Row: Categories + Search + Profile -->
        <div class="row align-items-center mb-2">
            <!-- Categories Dropdown -->
            <div class="col-md-3 d-flex">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-grid-3x3-gap-fill me-2"></i> All Categories
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                        <li>
                            <a class="dropdown-item" href="{{ route('products.category', $category->id) }}">

                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Search -->
            <div class="col-md-6">
                <form action="{{ route('products.search') }}" method="GET">
                    <div class="input-group input-group-lg">
                        <input type="text" name="q" class="form-control" placeholder="Search products, reviews...">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Profile / Dashboard -->
            <div class="col-md-3 text-end">
                @auth
                <div class="dropdown">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                @endauth
            </div>
        </div>

        <!-- Second Row: Navigation + Submit Button -->
        <nav class="navbar navbar-expand-lg navbar-light pt-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarLinks">
                <!-- Left Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                </ul>

                <!-- Submit Review -->
                <a href="{{ route('products.index') }}" class="btn btn-success d-flex align-items-center">
                    <i class="bi bi-pencil-square me-2"></i> Submit Review
                </a>
            </div>
        </nav>
    </div>
</header>
