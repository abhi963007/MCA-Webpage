<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerLink - Your Gateway to Success</title>
    
    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a237e',
                        secondary: '#ff5252',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Custom Styles -->
    <style>
        /* Update existing gradient-bg class */
        .gradient-bg {
            background: linear-gradient(rgba(26, 35, 126, 0.7), rgba(13, 71, 161, 0.7)), 
                        url('img/new-professional-bg.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            position: relative;
        }

        /* Remove or comment out these styles */
        /*
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        */

        /* Update glass-card for better visibility */
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Image loading optimization */
        .hero-image {
            opacity: 0;
            transition: opacity 0.5s ease-in;
        }

        .hero-image.loaded {
            opacity: 1;
        }

        /* Add loading skeleton */
        .image-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 8px;
            height: 400px;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>
<body class="font-poppins">
<!-- Navigation -->
    <nav class="fixed w-full z-50 glass-card">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex-shrink-0">
                    <a href="index.php" class="text-white text-2xl font-bold">CAREERLINK</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-8">
                        <a href="search.php" class="text-white hover:text-secondary transition-colors">
                            <i class="fas fa-search mr-2"></i>Search Jobs
                        </a>
                        <a href="mainregister.php" class="text-white hover:text-secondary transition-colors">
                            <i class="fas fa-user-plus mr-2"></i>Register
                        </a>
                        <a href="mainlogin.php" class="px-6 py-2 rounded-full bg-secondary text-white hover:bg-opacity-90 transition-all transform hover:-translate-y-0.5">
                            <i class="fas fa-sign-in-alt mr-2"></i>Login
                        </a>
                        <a href="../index.php" class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:bg-gray-100 transition-colors">
                            <i class="fas fa-home text-primary text-lg"></i>
                        </a>
                    </div>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center space-x-4">
                    <a href="../index.php" class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:bg-gray-100 transition-colors">
                        <i class="fas fa-home text-primary text-lg"></i>
                    </a>
                    <button type="button" class="text-white hover:text-secondary" id="mobile-menu-button">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div class="hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="search.php" class="block px-3 py-2 text-white hover:text-secondary">
                    <i class="fas fa-search mr-2"></i>Search Jobs
                </a>
                <a href="mainregister.php" class="block px-3 py-2 text-white hover:text-secondary">
                    <i class="fas fa-user-plus mr-2"></i>Register
                </a>
                <a href="mainlogin.php" class="block px-3 py-2 text-white hover:text-secondary">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
            </div>
        </div>
    </nav>

<!-- Hero Section -->
    <section class="gradient-bg min-h-screen pt-20 flex items-center relative overflow-hidden">
        <!-- Remove or comment out the particles-js div -->
        <!-- <div id="particles-js"></div> -->

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl font-bold mb-6 animate-fade-in text-white">Find Your Dream Job Today</h1>
                <p class="text-xl mb-8 text-white">Connect with top companies and discover opportunities that match your skills and aspirations.</p>
                <div class="space-x-4">
                    <a href="search.php" class="px-8 py-3 bg-secondary text-white rounded-full hover:bg-opacity-90 transition-all transform hover:-translate-y-0.5 inline-block">
                        <i class="fas fa-search mr-2"></i>Search Jobs
                    </a>
                    <a href="mainregister.php" class="px-8 py-3 bg-white text-primary rounded-full hover:bg-opacity-90 transition-all transform hover:-translate-y-0.5 inline-block">
                        <i class="fas fa-user-plus mr-2"></i>Join Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12 text-primary">Why Choose CareerLink?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-briefcase text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Top Companies</h3>
                    <p class="text-gray-600">Connect with leading companies and access exclusive job opportunities.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Career Growth</h3>
                    <p class="text-gray-600">Find opportunities that align with your career goals and aspirations.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-users text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Professional Network</h3>
                    <p class="text-gray-600">Build your professional network and connect with industry leaders.</p>
                </div>
    </div>
</div>
    </section>

<!-- Latest Jobs Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12 text-primary">Latest Job Opportunities</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
                require_once("db.php");
                $sql = "SELECT * FROM job_post ORDER BY createdat DESC LIMIT 6";
                $result = $conn->query($sql);
                if($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Safely get values with defaults if not set
                        $jobTitle = isset($row['jobtitle']) ? htmlspecialchars($row['jobtitle']) : 'Untitled Position';
                        $experience = isset($row['experience']) ? htmlspecialchars($row['experience']) : 'Not specified';
                        $description = isset($row['description']) ? htmlspecialchars($row['description']) : 'No description available';
                        $location = isset($row['location']) ? htmlspecialchars($row['location']) : 'Location not specified';
                        $jobId = isset($row['id_jobpost']) ? (int)$row['id_jobpost'] : 0;
                        ?>
                        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-lg font-semibold text-primary"><?php echo $jobTitle; ?></h3>
                                <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm">
                                    <?php echo $experience; ?>
                                </span>
                            </div>
                            <p class="text-gray-600 mb-4"><?php echo substr($description, 0, 100) . '...'; ?></p>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-500 text-sm">
                                    <i class="fas fa-map-marker-alt mr-2"></i><?php echo $location; ?>
                                </span>
                                <?php if($jobId > 0): ?>
                                <a href="job-details.php?id=<?php echo $jobId; ?>" 
                                   class="text-secondary hover:text-primary transition-colors">
                                    Learn More →
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<div class="col-span-full text-center text-gray-500">No job postings available at the moment.</div>';
                }
                ?>
            </div>
            <div class="text-center mt-12">
                <a href="search.php" class="px-8 py-3 bg-primary text-white rounded-full hover:bg-opacity-90 transition-all transform hover:-translate-y-0.5 inline-block">
                    View All Jobs
                </a>
    </div>
</div>
    </section>

<!-- Footer -->
    <footer class="gradient-bg text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">CareerLink</h3>
                    <p class="text-gray-300">Your gateway to professional success and career growth.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="search.php" class="text-gray-300 hover:text-white">Search Jobs</a></li>
                        <li><a href="mainregister.php" class="text-gray-300 hover:text-white">Register</a></li>
                        <li><a href="mainlogin.php" class="text-gray-300 hover:text-white">Login</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white text-2xl">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white text-2xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white text-2xl">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
    <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><i class="fas fa-envelope mr-2"></i>info@careerlink.com</li>
                        <li><i class="fas fa-phone mr-2"></i>+1 234 567 890</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i>123 Career Street, City</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-white/10 mt-12 pt-8 text-center">
                <p class="text-gray-300">&copy; 2024 CareerLink. All rights reserved.</p>
            </div>
    </div>
</footer>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Remove particles.js script -->
    <!-- <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> -->
    <!-- Remove particles initialization script -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Initialize particles
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: '#ffffff' },
                opacity: { value: 0.1 },
                size: { value: 3 },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.1,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: { enable: true, mode: 'repulse' },
                    onclick: { enable: true, mode: 'push' },
                    resize: true
                }
            },
            retina_detect: true
        });

        // Image loading handler
        document.addEventListener('DOMContentLoaded', function() {
            const heroImage = document.getElementById('heroImage');
            const imageSkeleton = document.getElementById('imageSkeleton');

            heroImage.onload = function() {
                heroImage.classList.add('loaded');
                imageSkeleton.style.display = 'none';
            };

            // Mobile menu optimization
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            let isMenuOpen = false;

            mobileMenuButton.addEventListener('click', () => {
                isMenuOpen = !isMenuOpen;
                mobileMenu.classList.toggle('hidden');
                mobileMenuButton.innerHTML = isMenuOpen ? 
                    '<i class="fas fa-times text-2xl"></i>' : 
                    '<i class="fas fa-bars text-2xl"></i>';
            });

            // Lazy load images in job cards
            const lazyImages = document.querySelectorAll('img[data-src]');
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(img => imageObserver.observe(img));
        });

        // Optimize job cards loading
        function createJobCard(job) {
            return `
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold text-primary">${job.jobtitle}</h3>
                        <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm">
                            ${job.experience}
                        </span>
                    </div>
                    <p class="text-gray-600 mb-4">${job.description.substring(0, 100)}...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500 text-sm">
                            <i class="fas fa-map-marker-alt mr-2"></i>${job.location}
                        </span>
                        <a href="job-details.php?id=${job.id_jobpost}" 
                           class="text-secondary hover:text-primary transition-colors">
                            Learn More →
                        </a>
                    </div>
                </div>
            `;
        }
    </script>
</body>
</html>
