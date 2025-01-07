<?php
// Database connection
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'college_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- bootstrap grid css -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/plugins/bootstrap-grid.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="css/plugins/font-awesome.min.css">
    <!-- swiper css -->
    <link rel="stylesheet" href="css/plugins/swiper.min.css">
    <!-- fancybox css -->
    <link rel="stylesheet" href="css/plugins/fancybox.min.css">
    <!-- ashley scss -->
    <link rel="stylesheet" href="css/style.css">
    <!-- page name -->
    <title>MCA Department - Mangalam College of Engineering</title>

</head>

<body>

    <!-- wrapper -->
    <div class="mil-wrapper" id="top">

        <!-- cursor -->
        <div class="mil-ball">
            <span class="mil-icon-1">
                <svg viewBox="0 0 128 128">
                    <path d="M106.1,41.9c-1.2-1.2-3.1-1.2-4.2,0c-1.2,1.2-1.2,3.1,0,4.2L116.8,61H11.2l14.9-14.9c1.2-1.2,1.2-3.1,0-4.2	c-1.2-1.2-3.1-1.2-4.2,0l-20,20c-1.2,1.2-1.2,3.1,0,4.2l20,20c0.6,0.6,1.4,0.9,2.1,0.9s1.5-0.3,2.1-0.9c1.2-1.2,1.2-3.1,0-4.2	L11.2,67h105.5l-14.9,14.9c-1.2,1.2-1.2,3.1,0,4.2c0.6,0.6,1.4,0.9,2.1,0.9s1.5-0.3,2.1-0.9l20-20c1.2-1.2,1.2-3.1,0-4.2L106.1,41.9	z" />
                </svg>
            </span>
            <div class="mil-more-text">More</div>
            <div class="mil-choose-text">Сhoose</div>
        </div>
        <!-- cursor end -->

        <!-- preloader -->
        <div class="mil-preloader">
            <div class="mil-preloader-animation">
                <div class="mil-pos-abs mil-animation-1">
                    <p class="mil-h3 mil-muted mil-thin">Pioneering</p>
                    <p class="mil-h3 mil-muted">Creative</p>
                    <p class="mil-h3 mil-muted mil-thin">Excellence</p>
                </div>
                <div class="mil-pos-abs mil-animation-2">
                    <div class="mil-reveal-frame">
                        <p class="mil-reveal-box"></p>
                        <p class="mil-h3 mil-muted mil-thin">MASTER OF COMPUTER APPLICATIONS</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->

        <!-- scrollbar progress -->
        <div class="mil-progress-track">
            <div class="mil-progress"></div>
        </div>
        <!-- scrollbar progress end -->

        <!-- menu -->
        <div class="mil-menu-frame">
            <!-- frame clone -->
            <div class="mil-frame-top">
                <a href="index.html" class="mil-logo">MCA</a>
                <div class="mil-menu-btn">
                    <span></span>
                </div>
            </div>
            <!-- frame clone end -->
            <div class="container">
                <div class="mil-menu-content">
                    <div class="row">
                        <div class="col-xl-5">
            
                            <nav class="mil-main-menu" id="swupMenu">
                                <ul>
                                    <li class="mil-has-children mil-active">
                                        <a href="#.">Homepage</a>
                                        <ul>
                                            <li><a href="index.php">Main Page</a></li>
                                            <li><a href="admin/admin_login.php">Admin Portal</a></li>
                                        </ul>
                                    </li>
                                    <li class="mil-has-children">
                                        <a href="#.">Academics</a>
                                        <ul>
                                            <li><a href="services.html">Syllabus</a></li>
                                            <li><a href="team.php">Faculty</a></li>
                                        </ul>
                                    </li>
                                    <li class="mil-has-children">
                                        <a href="Gallery.php">Gallery</a>
                                    </li>
                                    <li class="mil-has-children">
                                        <a href="events.php">Events</a>
                                    </li>
                                    <li class="mil-has-children">
                                        <a href="#.">Research</a>
                                        <ul>
                                            <li><a href="https://drive.google.com/drive/u/0/folders/1GAw28Hh1tjXPW2Fs6dVtT6HVLdIkYRE4">Projects</a></li>
                                        </ul>
                                    </li>
                                    <li class="mil-has-children">
                                        <a href="#.">Resources</a>
                                        <ul>
                                            <li><a href="library.html">Library</a></li>
                                            <li><a href="lab.html">Labs</a></li>
                                            <li><a href="404.html">Alumni Network</a></li>
                                        </ul>
                                    </li>
                                    <li class="mil-has-children">
                                        <a href="placement/index.php">Placement</a>
                                    </li>
                                </ul>
                            </nav>
            
                        </div>
                        <div class="col-xl-7">
            
                            <div class="mil-menu-right-frame">
                                <div class="mil-animation-in">
                                    <div class="mil-animation-frame">
                                        <div class="mil-animation mil-position-1 mil-scale" data-value-1="2" data-value-2="2"></div>
                                    </div>
                                </div>
                                <div class="mil-menu-right">
                                    <div class="row">
                                        <div class="col-lg-8 mil-mb-60">
            
                                            <h6 class="mil-muted mil-mb-30">Popular Research Projects</h6>
            
                                            <ul class="mil-menu-list">
                                                <li><a href="project-ai.html" class="mil-light-soft">AI in Education</a></li>
                                                <li><a href="project-iot.html" class="mil-light-soft">IoT in Agriculture</a></li>
                                                <li><a href="project-cyber.html" class="mil-light-soft">Cybersecurity Measures</a></li>
                                                <li><a href="project-data.html" class="mil-light-soft">Data Analytics</a></li>
                                                <li><a href="project-cloud.html" class="mil-light-soft">Cloud Computing Solutions</a></li>
                                            </ul>
            
                                        </div>
                                        <div class="col-lg-4 mil-mb-60">
            
                                            <h6 class="mil-muted mil-mb-30">Quick Links</h6>
            
                                            <ul class="mil-menu-list">
                                                <li><a href="privacy.html" class="mil-light-soft">Privacy Policy</a></li>
                                                <li><a href="terms.html" class="mil-light-soft">Terms and Conditions</a></li>
                                                <li><a href="support.html" class="mil-light-soft">Student Support</a></li>
                                                <li><a href="career.html" class="mil-light-soft">Career Opportunities</a></li>
                                            </ul>
            
                                        </div>
                                    </div>
                                    <div class="mil-divider mil-mb-60"></div>
                                    <div class="row justify-content-between">
            
                                        <div class="col-lg-4 mil-mb-60">
            
                                            <h6 class="mil-muted mil-mb-30">Campus Address</h6>
                                            <p class="mil-light-soft mil-up">Mangalam College of Engineering, Kottayam, Kerala <span class="mil-no-wrap">+91 123 456 7890</span></p>
            
                                        </div>
                                        <div class="col-lg-4 mil-mb-60">
            
                                            <h6 class="mil-muted mil-mb-30">Admissions Office</h6>
                                            <p class="mil-light-soft">123 College Road, Kottayam <span class="mil-no-wrap">+91 987 654 3210</span></p>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <!-- menu -->
        
        <!-- curtain -->
        <div class="mil-curtain"></div>
        <!-- curtain end -->

        <!-- frame -->
        <div class="mil-frame">
            <div class="mil-frame-top">
                <a href="index.html" class="mil-logo">MCA</a>
                <div class="mil-menu-btn">
                    <span></span>
                </div>
            </div>
            <div class="mil-frame-bottom">
                <div class="mil-current-page"></div>
                <div class="mil-back-to-top">
                    <a href="#top" class="mil-link mil-dark mil-arrow-place">
                        <span>Back to top</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- frame end -->

        <!-- content -->
        <div class="mil-content">
            <div id="swupMain" class="mil-main-transition">

                <!-- banner -->
                <section class="mil-banner mil-dark-bg">
                    <div class="mi-invert-fix">
                        <div class="mil-animation-frame">
                            <div class="mil-animation mil-position-1 mil-scale" data-value-1="7" data-value-2="1.6"></div>
                            <div class="mil-animation mil-position-2 mil-scale" data-value-1="4" data-value-2="1"></div>
                            <div class="mil-animation mil-position-3 mil-scale" data-value-1="1.2" data-value-2=".1"></div>
                        </div>

                        <div class="mil-gradient"></div>

                        <div class="container">
                            <div class="mil-banner-content mil-up">

                                <h1 class="mil-muted mil-mb-60">MASTER <span class="mil-thin">OF</span><br> COMPUTER <span class="mil-thin">APPLICATIONS</span></h1>
                                <div class="row">
                                    <div class="col-md-7 col-lg-5">
                                        <p class="mil-light-soft mil-mb-60">
                                            Welcome to Mangalam College of Engineering’s MCA department. Explore, innovate, and excel in the world of technology. Here, your journey to expertise begins.
                                        </p>
                                    </div>
                                </div>                                                               

                                <a href="services.html" class="mil-button mil-arrow-place mil-btn-space">
                                    <span>Overview</span>
                                </a>

                                <div class="mil-circle-text">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve" class="mil-ct-svg mil-rotate" data-value="360">
                                        <defs>
                                            <path id="circlePath" d="M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 " />
                                        </defs>
                                        <circle cx="150" cy="100" r="75" fill="none" />
                                        <g>
                                            <use xlink:href="#circlePath" fill="none" />
                                            <text style="letter-spacing: 6.5px">
                                                <!-- circle text -->
                                                <textPath xlink:href="#circlePath">Scroll down - Scroll down - </textPath>
                                            </text>
                                        </g>
                                    </svg>
                                    <a href="#about" class="mil-button mil-arrow-place mil-icon-button mil-arrow-down"></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- banner end -->

                <!-- about -->
                <section id="about">
                    <div class="container mil-p-120-30">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6 col-xl-5">
                                <div class="mil-mb-90">
                                    <h2 class="mil-up mil-mb-60">Our <br><span class="mil-thin">Department</span></h2>
                                    <p class="mil-up mil-mb-30">
                                        In the MCA department at Mangalam College of Engineering, we are dedicated to shaping future tech leaders. Our faculty and students collaborate passionately to push the boundaries of innovation and research.
                                    </p>
                                    <p class="mil-up mil-mb-60">
                                        Collaboration and creativity drive our department forward. By blending diverse perspectives and expertise, we cultivate a learning environment that prepares our students for impactful careers in technology.
                                    </p>
                                    <div class="mil-about-quote">
                                        <div class="mil-avatar mil-up">
                                            <img src="img/faces/customers/logo.png" alt="Mca Logo">
                                        </div>
                                        <h6 class="mil-quote mil-up">
                                            Nurturing <span class="mil-thin">Tech Visionaries:</span> Fostering <span class="mil-thin">Innovation & Excellence</span>
                                        </h6>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-lg-5">

                                <div class="mil-about-photo mil-mb-90">
                                    <div class="mil-lines-place"></div>
                                    <div class="mil-up mil-img-frame" style="padding-bottom: 160%;">
                                        <img src="img/dpt/dept.jpg" alt="img" class="mil-scale" data-value-1="1" data-value-2="1.2">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- about end -->

                <!-- services -->
                <section class="mil-dark-bg">
                    <div class="mi-invert-fix">
                        <div class="mil-animation-frame">
                            <div class="mil-animation mil-position-1 mil-scale" data-value-1="2.4" data-value-2="1.4" style="top: 300px; right: -100px"></div>
                            <div class="mil-animation mil-position-2 mil-scale" data-value-1="2" data-value-2="1" style="left: 150px"></div>
                        </div>
                        <div class="container mil-p-120-0">
                            <div class="mil-mb-120">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <span class="mil-suptitle mil-light-soft mil-suptitle-right mil-up">
                                            Shaping Future Tech Leaders <br> with Innovation and Excellence.
                                        </span>
                                    </div>
                                </div>
                        
                                <div class="mil-complex-text justify-content-center mil-up mil-mb-15">
                                    <span class="mil-text-image"><img src="img/photo/2.jpg" alt="MCA Department"></span>
                                    <h2 class="mil-h1 mil-muted mil-center">Innovative <span class="mil-thin">Learning</span></h2>
                                </div>
                        
                                <div class="mil-complex-text justify-content-center mil-up">
                                    <h2 class="mil-h1 mil-muted mil-center">For Your <span class="mil-thin">Career.</span></h2>
                                    <a href="services.html" class="mil-services-button mil-button mil-arrow-place"><span>Our Programs</span></a>
                                </div>
                            </div>
                        
                            <div class="row mil-services-grid m-0">
                                <div class="col-md-6 col-lg-3 mil-services-grid-item p-0">
                                    <a href="Advanced-Programming.html" class="mil-service-card-sm mil-up">
                                        <h5 class="mil-muted mil-mb-30">Advanced Programming <br>and Development</h5>
                                        <p class="mil-light-soft mil-mb-30">Our curriculum equips students with skills in modern programming languages and frameworks to meet industry demands.</p>
                                        <div class="mil-button mil-icon-button-sm mil-arrow-place"></div>
                                    </a>
                                </div>
                                
                                <div class="col-md-6 col-lg-3 mil-services-grid-item p-0">
                                    <a href="Data-science.html" class="mil-service-card-sm mil-up">
                                        <h5 class="mil-muted mil-mb-30">Data Science <br>and Analytics</h5>
                                        <p class="mil-light-soft mil-mb-30">Learn the fundamentals of data science, machine learning, and analytical skills needed in today’s data-driven world.</p>
                                        <div class="mil-button mil-icon-button-sm mil-arrow-place"></div>
                                    </a>
                                </div>
                        
                                <div class="col-md-6 col-lg-3 mil-services-grid-item p-0">
                                    <a href="cybersecurity.html" class="mil-service-card-sm mil-up">
                                        <h5 class="mil-muted mil-mb-30">Cybersecurity <br>and Ethical Hacking</h5>
                                        <p class="mil-light-soft mil-mb-30">Develop expertise in cybersecurity practices to safeguard digital infrastructure and manage cyber threats.</p>
                                        <div class="mil-button mil-icon-button-sm mil-arrow-place"></div>
                                    </a>
                                </div>
                        
                                <div class="col-md-6 col-lg-3 mil-services-grid-item p-0">
                                    <a href="Ai-ml.html" class="mil-service-card-sm mil-up">
                                        <h5 class="mil-muted mil-mb-30">AI and Machine Learning <br>Innovations</h5>
                                        <p class="mil-light-soft mil-mb-30">Explore the world of AI with hands-on projects and prepare to make an impact in the field of machine learning.</p>
                                        <div class="mil-button mil-icon-button-sm mil-arrow-place"></div>
                                    </a>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </section>
                <!-- services end -->

                <!-- team -->
                <section>
                    <div class="container mil-p-120-30">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-5 col-xl-4">
                
                                <div class="mil-mb-90">
                                    <h2 class="mil-up mil-mb-60">Meet <br>Our Faculty</h2>
                                    <p class="mil-up mil-mb-30">Our MCA department is led by dedicated faculty members who bring a wealth of expertise in various domains of computer applications, guiding students toward academic and professional excellence.</p>
                
                                    <p class="mil-up mil-mb-60">Our faculty specializes in areas like Artificial Intelligence, Cloud Computing, Web Development, and Cybersecurity, creating a comprehensive learning environment.</p>
                
                                    <div class="mil-up"><a href="team.php" class="mil-button mil-arrow-place mil-mb-60"><span>Faculties</span></a></div>
                
                                    <h4 class="mil-up"><span class="mil-thin">We</span> Inspire <br><span class="mil-thin">Academic Excellence</span></h4>
                                </div>
                
                            </div>
                            <div class="col-lg-6">
                
                                <div class="mil-team-list">
                                    <div class="mil-lines-place"></div>
                
                                    <div class="row mil-mb-60">
                                        <div class="col-sm-6">
                
                                            <div class="mil-team-card mil-up mil-mb-30">
                                                <img src="img/divya.jpg" alt="Divya SB">
                                                <div class="mil-description">
                                                    <div class="mil-secrc-text">
                                                        <h5 class="mil-muted mil-mb-5"><a href="faculty-detail.html">Divya SB</a></h5>
                                                        <p class="mil-link mil-light-soft mil-mb-10">Head of Department, PhD in Computer Science</p>
                                                        <p class="mil-specialization">Specialization: Artificial Intelligence and Machine Learning</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                        </div>
                                    </div>
                
                                </div>
                
                            </div>
                        </div>
                    </div>
                </section>                                                
                <!-- team end -->

                <!-- reviews -->
                <section class="mil-soft-bg">
                    <div class="container mil-p-120-120">
                
                        <div class="row">
                            <div class="col-lg-10">
                                <span class="mil-suptitle mil-suptitle-right mil-suptitle-dark mil-up">
                                    Our MCA students and alumni share their journey of growth and success.
                                </span>
                            </div>
                        </div>
                
                        <h2 class="mil-center mil-up mil-mb-60">Student <span class="mil-thin">Voices:</span> <br>Hear What <span class="mil-thin">They Say!</span></h2>
                
                        <div class="mil-revi-pagination mil-up mil-mb-60"></div>
                
                        <div class="row mil-relative justify-content-center">
                            <div class="col-lg-8">
                
                                <div class="mil-slider-nav mil-soft mil-reviews-nav mil-up">
                                    <div class="mil-slider-arrow mil-prev mil-revi-prev mil-arrow-place"></div>
                                    <div class="mil-slider-arrow mil-revi-next mil-arrow-place"></div>
                                </div>
                
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="mil-quote-icon mil-up">
                                    <path d="M 13.5 10 A 8.5 8.5 0 0 0 13.5 27 A 8.5 8.5 0 0 0 18.291016 25.519531 C 17.422273 29.222843 15.877848 31.803343 14.357422 33.589844 C 12.068414 36.279429 9.9433594 37.107422 9.9433594 37.107422 A 1.50015 1.50015 0 1 0 11.056641 39.892578 C 11.056641 39.892578 13.931586 38.720571 16.642578 35.535156 C 19.35357 32.349741 22 27.072581 22 19 A 1.50015 1.50015 0 0 0 21.984375 18.78125 A 8.5 8.5 0 0 0 13.5 10 z M 34.5 10 A 8.5 8.5 0 0 0 34.5 27 A 8.5 8.5 0 0 0 39.291016 25.519531 C 38.422273 29.222843 36.877848 31.803343 35.357422 33.589844 C 33.068414 36.279429 30.943359 37.107422 30.943359 37.107422 A 1.50015 1.50015 0 1 0 32.056641 39.892578 C 32.056641 39.892578 34.931586 38.720571 37.642578 35.535156 C 40.35357 32.349741 43 27.072581 43 19 A 1.50015 1.50015 0 0 0 42.984375 18.78125 A 8.5 8.5 0 0 0 34.5 10 z" fill="#000000" />
                                </svg>
                
                                <div class="swiper-container mil-reviews-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200" data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Mahesh</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Class of 2023-2025</p>
                                                <p class="mil-text-xl mil-up">
                                                    "My MCA journey at Mangalam College has been transformative. The faculty's support and the hands-on projects have provided the foundation I need to excel in Artificial Intelligence, and I'm excited about my future career in AI."
                                                </p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200" data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Abin</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Class of 2023-2025</p>
                                                <p class="mil-text-xl mil-up">
                                                    "Studying MCA here has given me the skills to thrive in web development. The curriculum is robust, and the faculty ensure we understand both the theory and practical aspects. I'm currently gaining valuable experience as I prepare for a career in web development."
                                                </p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200" data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Nandhakumar</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Class of 2023-2025</p>
                                                <p class="mil-text-xl mil-up">
                                                    "The MCA program is preparing me well for the field of cybersecurity. With expert guidance and ample resources, I feel confident about entering the industry after graduation and pursuing a career as a security analyst."
                                                </p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="mil-review-frame mil-center" data-swiper-parallax="-200" data-swiper-parallax-opacity="0">
                                                <h5 class="mil-up mil-mb-10">Aswin</h5>
                                                <p class="mil-mb-5 mil-upper mil-up mil-mb-30">Class of 2023-2025</p>
                                                <p class="mil-text-xl mil-up">
                                                    "Mangalam College’s MCA department has opened doors to amazing opportunities in big data and analytics. The experience I am gaining here is invaluable and is shaping my future as a data scientist."
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                
                            </div>
                        </div>
                
                    </div>
                </section>                
                <!-- reviews end -->

                <!-- partners -->
                <div class="mil-soft-bg">
                    <div class="container mil-p-0-120">
                        <div class="swiper-container mil-infinite-show mil-up">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="#." class="mil-partner-frame" style="width: 60px;"><img src="img/partners/mca.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#." class="mil-partner-frame" style="width: 100px;"><img src="img/partners/mca.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#." class="mil-partner-frame" style="width: 60px;"><img src="img/partners/mca.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#." class="mil-partner-frame" style="width: 100px;"><img src="img/partners/mca.svg" alt="logo"></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- partners end -->

                <!-- blog -->
                <section>
                    <div class="container mil-p-120-60">
                        <div class="row align-items-center mil-mb-30">
                            <div class="col-lg-6 mil-mb-30">
                                <h3 class="mil-up">Recent Events</h3>
                            </div>
                            <div class="col-lg-6 mil-mb-30">
                                <div class="mil-adaptive-right mil-up">
                                    <a href="events.php" class="mil-link mil-dark mil-arrow-place">
                                        <span>View all</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            // Fetch 2 most recent events
                            $sql = "SELECT * FROM events ORDER BY event_date DESC LIMIT 2";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    // Set default image if no image path is available
                                    $image_path = !empty($row['image_path']) ? $row['image_path'] : 'img/events/default.jpg';
                                    // Ensure the image path is correct
                                    if (strpos($image_path, 'img/') === 0) {
                                        $image_path = $image_path; // Keep as is if it starts with img/
                                    } else {
                                        $image_path = 'img/events/' . basename($image_path);
                                    }
                            ?>
                            <div class="col-lg-6">
                                <a href="events.php" class="mil-blog-card mil-mb-60">
                                    <div class="mil-cover-frame mil-up">
                                        <img src="<?php echo htmlspecialchars($image_path); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                                    </div>
                                    <div class="mil-post-descr">
                                        <div class="mil-labels mil-up mil-mb-30">
                                            <div class="mil-label mil-upper mil-accent">MCA EVENT</div>
                                            <div class="mil-label mil-upper"><?php echo date('F d, Y', strtotime($row['event_date'])); ?></div>
                                        </div>
                                        <h4 class="mil-up mil-mb-30"><?php echo htmlspecialchars($row['title']); ?></h4>
                                        <p class="mil-post-text mil-up mil-mb-30"><?php echo htmlspecialchars(substr($row['description'], 0, 150)) . '...'; ?></p>
                                        <div class="mil-link mil-dark mil-arrow-place mil-up">
                                            <span>Read more</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                                }
                            } else {
                            ?>
                            <div class="col-12">
                                <div class="alert alert-info">No upcoming events found.</div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </section>
                <!-- blog end -->

                <!-- footer -->
                <footer class="mil-dark-bg">
                    <div class="mi-invert-fix">
                        <div class="container mil-p-120-60">
                            <div class="row justify-content-between">
                                <div class="col-md-4 col-lg-4 mil-mb-60">
                
                                    <div class="mil-muted mil-logo mil-up mil-mb-30">MANGALAM COLLEGE OF ENGINEERING</div>
                
                                    <p class="mil-light-soft mil-up mil-mb-30">Subscribe to our MCA department newsletter:</p>
                
                                    <form class="mil-subscribe-form mil-up">
                                        <input type="text" placeholder="Enter your email">
                                        <button type="submit" class="mil-button mil-icon-button-sm mil-arrow-place"></button>
                                    </form>
                
                                </div>
                                <div class="col-md-7 col-lg-6">
                                    <div class="row justify-content-end">
                                        <div class="col-md-6 col-lg-7">
                
                                            <nav class="mil-footer-menu mil-mb-60">
                                                <ul>
                                                    <li class="mil-up mil-active">
                                                        <a href="home-1.html">Home</a>
                                                    </li>
                                                    <li class="mil-up">
                                                        <a href="team.php">Faculty</a>
                                                    </li>
                                                    <li class="mil-up">
                                                        <a href="courses.html">Courses</a>
                                                    </li>
                                                    <li class="mil-up">
                                                        <a href="contact.html">Contact</a>
                                                    </li>
                                                </ul>
                                            </nav>
                
                                        </div>
                                        <div class="col-md-6 col-lg-5">
                
                                            <ul class="mil-menu-list mil-up mil-mb-60">
                                                <li><a href="#." class="mil-light-soft">Privacy Policy</a></li>
                                                <li><a href="#." class="mil-light-soft">Terms and Conditions</a></li>
                                                <li><a href="404.html" class="mil-light-soft">Alumni</a></li>
                                                <li><a href="#." class="mil-light-soft">Career Opportunities</a></li>
                                            </ul>
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <div class="row justify-content-between flex-sm-row-reverse">
                                <div class="col-md-7 col-lg-6">
                
                                    <div class="row justify-content-between">
                
                                        <div class="col-md-6 col-lg-5 mil-mb-60">
                                            <h6 class="mil-muted mil-up mil-mb-30">MCA Department</h6>
                                            <p class="mil-light-soft mil-up">Mangalam College of Engineering, Kottayam, Kerala <span class="mil-no-wrap">+91 123 456 7890</span></p>
                                        </div>
                                        <div class="col-md-6 col-lg-5 mil-mb-60">
                                            <h6 class="mil-muted mil-up mil-mb-30">Admissions Office</h6>
                                            <p class="mil-light-soft mil-up">123 College Road, Kottayam <span class="mil-no-wrap">+91 987 654 3210</span></p>
                                        </div>
                                    </div>
                
                                </div>
                                <div class="col-md-4 col-lg-6 mil-mb-60">
                                    <div class="mil-vert-between">
                                        <p class="mil-light-soft mil-up"> 2024 Mangalam College of Engineering - MCA Department. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>                
                <!-- footer end -->

                <!-- hidden elements -->
                <div class="mil-hidden-elements">
                    <div class="mil-dodecahedron">
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="mil-pentagon">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mil-arrow">
                        <path d="M 14 5.3417969 C 13.744125 5.3417969 13.487969 5.4412187 13.292969 5.6367188 L 13.207031 5.7226562 C 12.816031 6.1136563 12.816031 6.7467188 13.207031 7.1367188 L 17.070312 11 L 4 11 C 3.448 11 3 11.448 3 12 C 3 12.552 3.448 13 4 13 L 17.070312 13 L 13.207031 16.863281 C 12.816031 17.254281 12.816031 17.887344 13.207031 18.277344 L 13.292969 18.363281 C 13.683969 18.754281 14.317031 18.754281 14.707031 18.363281 L 20.363281 12.707031 C 20.754281 12.316031 20.754281 11.682969 20.363281 11.292969 L 14.707031 5.6367188 C 14.511531 5.4412187 14.255875 5.3417969 14 5.3417969 z" />
                    </svg>

                    <svg width="250" viewBox="0 0 300 1404" fill="none" xmlns="http://www.w3.org/2000/svg" class="mil-lines">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 892L1 941H299V892C299 809.71 232.29 743 150 743C67.7096 743 1 809.71 1 892ZM0 942H300V892C300 809.157 232.843 742 150 742C67.1573 742 0 809.157 0 892L0 942Z" class="mil-move" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M299 146V97L1 97V146C1 228.29 67.7096 295 150 295C232.29 295 299 228.29 299 146ZM300 96L0 96V146C0 228.843 67.1573 296 150 296C232.843 296 300 228.843 300 146V96Z" class="mil-move" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M299 1H1V1403H299V1ZM0 0V1404H300V0H0Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M150 -4.37115e-08L150 1404L149 1404L149 0L150 -4.37115e-08Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M150 1324C232.29 1324 299 1257.29 299 1175C299 1092.71 232.29 1026 150 1026C67.7096 1026 1 1092.71 1 1175C1 1257.29 67.7096 1324 150 1324ZM150 1325C232.843 1325 300 1257.84 300 1175C300 1092.16 232.843 1025 150 1025C67.1573 1025 0 1092.16 0 1175C0 1257.84 67.1573 1325 150 1325Z" class="mil-move" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M300 1175H0V1174H300V1175Z" class="mil-move" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M150 678C232.29 678 299 611.29 299 529C299 446.71 232.29 380 150 380C67.7096 380 1 446.71 1 529C1 611.29 67.7096 678 150 678ZM150 679C232.843 679 300 611.843 300 529C300 446.157 232.843 379 150 379C67.1573 379 0 446.157 0 529C0 611.843 67.1573 679 150 679Z" class="mil-move" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M299 380H1V678H299V380ZM0 379V679H300V379H0Z" class="mil-move" />
                    </svg>
                </div>
                <!-- hidden elements end -->

            </div>
        </div>
        <!-- content -->
    </div>
    </script>    
    <!-- wrapper end -->

    <!-- jQuery js -->
    <script src="js/plugins/jquery.min.js"></script>
    <!-- swup js -->
    <script src="js/plugins/swup.min.js"></script>
    <!-- swiper js -->
    <script src="js/plugins/swiper.min.js"></script>
    <!-- fancybox js -->
    <script src="js/plugins/fancybox.min.js"></script>
    <!-- gsap js -->
    <script src="js/plugins/gsap.min.js"></script>
    <!-- scroll smoother -->
    <script src="js/plugins/smooth-scroll.js"></script>
    <!-- scroll trigger js -->
    <script src="js/plugins/ScrollTrigger.min.js"></script>
    <!-- scroll to js -->
    <script src="js/plugins/ScrollTo.min.js"></script>
    <!-- ashley js -->
    <script src="js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bannerContent = document.querySelector('.mil-banner-content');
            const logo = document.querySelector('.mil-logo');
    
            if (bannerContent && logo) {
                // Observe banner content for scrolling or class changes
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            // Hide the logo if `.mil-up` is present on `.mil-banner-content`
                            if (bannerContent.classList.contains('mil-up')) {
                                logo.setAttribute('style', 'display: none;');
                            } else {
                                logo.setAttribute('style', 'display: block;');
                            }
                        } else {
                            // Show the logo if `.mil-banner-content` is out of view
                            logo.setAttribute('style', 'display: block;');
                        }
                    });
                });
    
                // Start observing
                observer.observe(bannerContent);
            }
        });
    </script>    
</body>


<!-- Mirrored from miller.bslthemes.com/ashley-demo/home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2024 11:50:25 GMT -->
</html>
