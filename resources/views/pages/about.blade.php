<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | HonestReviews</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        :root {
            --primary-color: #4a6bff;
            --secondary-color: #ff6b6b;
            --dark-color: #1a1a2e;
            --light-color: #f8f9fa;
            --gray-color: #6c757d;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        /* Hero Section */
        .about-hero {
            background: linear-gradient(135deg, var(--dark-color) 0%, #16213e 100%);
            color: white;
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .about-hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 40%;
            height: 100%;
            background: url('https://via.placeholder.com/800x600?text=Transparent+Pattern') center/cover no-repeat;
            opacity: 0.05;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .hero-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 5px;
            background: var(--secondary-color);
            border-radius: 3px;
        }

        /* Mission Section */
        .mission-section {
            padding: 5rem 0;
            background-color: white;
        }

        .mission-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .mission-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .mission-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        /* Story Section */
        .story-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
            position: relative;
        }

        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline::before {
            content: '';
            position: absolute;
            width: 4px;
            background-color: var(--primary-color);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2px;
        }

        .timeline-item {
            padding: 20px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: white;
            border: 4px solid var(--primary-color);
            border-radius: 50%;
            top: 30px;
            z-index: 1;
        }

        .left {
            left: 0;
            text-align: right;
            padding-right: 60px;
        }

        .right {
            left: 50%;
            padding-left: 60px;
        }

        .left::after {
            right: -12px;
        }

        .right::after {
            left: -12px;
        }

        .timeline-content {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .timeline-date {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        /* Team Section */
        .team-section {
            padding: 5rem 0;
            background-color: white;
        }

        .team-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .team-img {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }

        .team-social {
            position: absolute;
            bottom: -20px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .team-card:hover .team-social {
            bottom: 20px;
            opacity: 1;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background-color: var(--secondary-color);
            transform: translateY(-5px);
        }

        /* Stats Section */
        .stats-section {
            padding: 4rem 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, #6a11cb 100%);
            color: white;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .timeline::before {
                left: 31px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            .timeline-item::after {
                left: 20px;
            }

            .left,
            .right {
                left: 0;
                text-align: left;
                padding-right: 25px;
            }
        }

    </style>
</head>
<body>
    <!-- Navigation -->
    @include('partials.head')

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title animate__animated animate__fadeInDown">Our Story</h1>
                    <p class="lead animate__animated animate__fadeInUp animate__delay-1s">We're revolutionizing how people make purchasing decisions through authentic, community-powered reviews.</p>
                    <div class="mt-4 animate__animated animate__fadeInUp animate__delay-2s">
                        <a href="#mission" class="btn btn-light btn-lg px-4 me-2">Our Mission</a>
                        <a href="#team" class="btn btn-outline-light btn-lg px-4">Meet the Team</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block animate__animated animate__fadeInRight">
                    <img src="https://via.placeholder.com/600x400?text=Team+Illustration" alt="Team" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section id="mission" class="mission-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Our Core Values</h2>
                    <p class="lead text-muted">These principles guide everything we do at HonestReviews</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="mission-card p-4">
                        <div class="mission-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Integrity First</h3>
                        <p class="text-muted">We maintain strict editorial independence and never accept payments for positive reviews. Every review you read is genuine and unbiased.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mission-card p-4">
                        <div class="mission-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Community Powered</h3>
                        <p class="text-muted">Our platform thrives on real user experiences. We empower consumers to share honest feedback and help others make informed choices.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mission-card p-4">
                        <div class="mission-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3>Transparent Insights</h3>
                        <p class="text-muted">We go beyond star ratings with detailed analysis, verified purchases, and helpful voting systems to surface the most useful reviews.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Our Journey</h2>
                    <p class="lead text-muted">How we grew from a small idea to the most trusted review platform</p>
                </div>
            </div>

            <div class="timeline">
                <div class="timeline-item left animate__animated animate__fadeInLeft">
                    <div class="timeline-content">
                        <div class="timeline-date">2015</div>
                        <h3>Founded in a Garage</h3>
                        <p>Three college friends frustrated with fake reviews launched the first version of HonestReviews as a weekend project.</p>
                    </div>
                </div>

                <div class="timeline-item right animate__animated animate__fadeInRight">
                    <div class="timeline-content">
                        <div class="timeline-date">2017</div>
                        <h3>First Million Users</h3>
                        <p>Our authentic approach resonated, reaching 1 million monthly active users and securing our first round of funding.</p>
                    </div>
                </div>

                <div class="timeline-item left animate__animated animate__fadeInLeft">
                    <div class="timeline-content">
                        <div class="timeline-date">2019</div>
                        <h3>Verified Purchase System</h3>
                        <p>Introduced our patented verification system to combat fake reviews and ensure authenticity.</p>
                    </div>
                </div>

                <div class="timeline-item right animate__animated animate__fadeInRight">
                    <div class="timeline-content">
                        <div class="timeline-date">2021</div>
                        <h3>Global Expansion</h3>
                        <p>Launched in 12 new countries with localized content and review teams.</p>
                    </div>
                </div>

                <div class="timeline-item left animate__animated animate__fadeInLeft">
                    <div class="timeline-content">
                        <div class="timeline-date">2023</div>
                        <h3>Industry Recognition</h3>
                        <p>Awarded "Most Trusted Review Platform" by Consumer Reports for three consecutive years.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number" id="reviews-count">0</div>
                        <div class="stat-label">Reviews</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number" id="products-count">0</div>
                        <div class="stat-label">Products</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number" id="users-count">0</div>
                        <div class="stat-label">Community Members</div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number" id="countries-count">0</div>
                        <div class="stat-label">Countries</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="team-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Meet Our Team</h2>
                    <p class="lead text-muted">The passionate people behind HonestReviews</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="position-relative">
                            <img src="https://via.placeholder.com/400x400?text=Founder+CEO" alt="Team Member" class="team-img">
                            <div class="team-social">
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-icon"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h4>Sarah Johnson</h4>
                            <p class="text-muted mb-2">Founder & CEO</p>
                            <p class="small">Started HonestReviews after being misled by fake product reviews.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="position-relative">
                            <img src="https://via.placeholder.com/400x400?text=CTO" alt="Team Member" class="team-img">
                            <div class="team-social">
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-icon"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h4>Michael Chen</h4>
                            <p class="text-muted mb-2">Chief Technology Officer</p>
                            <p class="small">Builds the systems that keep our reviews authentic and useful.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="position-relative">
                            <img src="https://via.placeholder.com/400x400?text=Head+of+Community" alt="Team Member" class="team-img">
                            <div class="team-social">
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-icon"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h4>David Rodriguez</h4>
                            <p class="text-muted mb-2">Head of Community</p>
                            <p class="small">Connects with our reviewers to maintain high standards.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="position-relative">
                            <img src="https://via.placeholder.com/400x400?text=Product+Lead" alt="Team Member" class="team-img">
                            <div class="team-social">
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-icon"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h4>Priya Patel</h4>
                            <p class="text-muted mb-2">Product Lead</p>
                            <p class="small">Designs features that make reviews more helpful and trustworthy.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-primary btn-lg px-4">Join Our Team</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Counter Animation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate stats counters
            function animateCounters() {
                const reviewsTarget = 1250000;
                const productsTarget = 85000;
                const usersTarget = 420000;
                const countriesTarget = 45;

                const reviewsElement = document.getElementById('reviews-count');
                const productsElement = document.getElementById('products-count');
                const usersElement = document.getElementById('users-count');
                const countriesElement = document.getElementById('countries-count');

                const duration = 2000; // Animation duration in ms
                const interval = 20; // Update interval in ms

                animateValue(reviewsElement, 0, reviewsTarget, duration, interval);
                animateValue(productsElement, 0, productsTarget, duration, interval);
                animateValue(usersElement, 0, usersTarget, duration, interval);
                animateValue(countriesElement, 0, countriesTarget, duration, interval);
            }

            function animateValue(element, start, end, duration, interval) {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    const value = Math.floor(progress * (end - start) + start);
                    element.innerHTML = value.toLocaleString();
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }

            // Trigger animation when stats section comes into view
            const statsSection = document.querySelector('.stats-section');
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    animateCounters();
                    observer.unobserve(statsSection);
                }
            }, {
                threshold: 0.5
            });

            observer.observe(statsSection);

            // Add animation classes to timeline items as they come into view
            const timelineItems = document.querySelectorAll('.timeline-item');
            const timelineObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                        timelineObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            timelineItems.forEach(item => {
                timelineObserver.observe(item);
            });
        });

    </script>
</body>
</html>
