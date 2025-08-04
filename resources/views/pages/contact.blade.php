<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | HonestReviews</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .contact-section {
            background-color: #f8f9fa;
            padding: 5rem 0;
        }

        .contact-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
        }

        .contact-info {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: white;
            padding: 3rem;
            height: 100%;
        }

        .contact-info-item {
            margin-bottom: 2rem;
        }

        .contact-info-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .contact-form {
            padding: 3rem;
            background-color: white;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #eee;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #4a6bff;
        }

        .map-container {
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 3rem;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

    </style>
</head>
<body>
@include('partials.head')
    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Get In Touch</h2>
                    <p class="lead text-muted">Have questions or feedback? We'd love to hear from you!</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-card">
                        <div class="row g-0">
                            <!-- Contact Info -->
                            <div class="col-lg-4">
                                <div class="contact-info">
                                    <div class="text-center mb-5">
                                        <h3>Contact Information</h3>
                                        <p class="text-white-50">Fill out the form or reach us directly</p>
                                    </div>

                                    <div class="contact-info-item">
                                        <div class="contact-info-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <h4>Our Office</h4>
                                        <p class="text-white-50">123 Review Street, San Francisco, CA 94107</p>
                                    </div>

                                    <div class="contact-info-item">
                                        <div class="contact-info-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <h4>Email Us</h4>
                                        <p class="text-white-50">support@honestreviews.com</p>
                                    </div>

                                    <div class="contact-info-item">
                                        <div class="contact-info-icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <h4>Call Us</h4>
                                        <p class="text-white-50">+1 (555) 123-4567</p>
                                    </div>

                                    <div class="social-icons mt-5">
                                        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                                        <a href="#" class="text-white"><i class="fab fa-linkedin-in fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Form -->
                            <div class="col-lg-8">
                                <div class="contact-form">
                                    <h3 class="mb-4">Send Us a Message</h3>
                                    <form action="{{ route('contact') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="subject" name="subject" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Your Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary px-4 py-2">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Google Map -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.158170833317!2d-122.4194!3d37.7749!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDQ2JzI5LjYiTiAxMjLCsDI1JzA5LjkiVw!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
