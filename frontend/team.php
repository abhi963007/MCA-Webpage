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


<!-- Mirrored from miller.bslthemes.com/ashley-demo/team.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2024 11:50:30 GMT -->
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
    <title>MCA-FACULTY</title>

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
                    <p class="mil-h3 mil-muted mil-thin">Excellence in</p>
                    <p class="mil-h3 mil-muted">Education</p>
                    <p class="mil-h3 mil-muted mil-thin">Innovation</p>
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
                                    <li class="mil-has-children">
                                        <a href="#.">Homepage</a>
                                        <ul>
                                            <li><a href="index.html">Main Page</a></li>
                                            <li><a href="home-2.html">About MCA</a></li>
                                            <li><a href="portfolio-3.html">Programs</a></li>
                                        </ul>
                                    </li>
                                    <li class="mil-has-children">
                                        <a href="#.">Academics</a>
                                        <ul>
                                            <li><a href="curriculum.html">Curriculum</a></li>
                                            <li><a href="research.html">Research</a></li>
                                            <li><a href="publications.html">Publications</a></li>
                                        </ul>
                                    </li>
                                    <li class="mil-has-children">
                                        <a href="#.">Facilities</a>
                                        <ul>
                                            <li><a href="labs.html">Laboratories</a></li>
                                            <li><a href="library.html">Library</a></li>
                                        </ul>
                                    </li>
                                    <li class="mil-has-children">
                                        <a href="#.">News & Events</a>
                                        <ul>
                                            <li><a href="news.html">Latest News</a></li>
                                            <li><a href="events.html">Events</a></li>
                                        </ul>
                                    </li>
                                    <li class="mil-has-children mil-active">
                                        <a href="#.">More</a>
                                        <ul>
                                            <li><a href="faculty.html">Faculty</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
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
            
                                            <h6 class="mil-muted mil-mb-30">Student Projects</h6>
            
                                            <ul class="mil-menu-list">
                                                <li><a href="project-1.html" class="mil-light-soft">Smart Campus Management</a></li>
                                                <li><a href="project-2.html" class="mil-light-soft">IoT-based Security Systems</a></li>
                                                <li><a href="project-3.html" class="mil-light-soft">E-Learning Portal</a></li>
                                                <li><a href="project-4.html" class="mil-light-soft">AI-Driven Education Tools</a></li>
                                                <li><a href="project-5.html" class="mil-light-soft">Blockchain for Data Security</a></li>
                                                <li><a href="project-6.html" class="mil-light-soft">Green Energy Solutions</a></li>
                                            </ul>
            
                                        </div>
                                        <div class="col-lg-4 mil-mb-60">
            
                                            <h6 class="mil-muted mil-mb-30">Quick Links</h6>
            
                                            <ul class="mil-menu-list">
                                                <li><a href="privacy.html" class="mil-light-soft">Privacy Policy</a></li>
                                                <li><a href="terms.html" class="mil-light-soft">Terms and Conditions</a></li>
                                                <li><a href="cookie.html" class="mil-light-soft">Cookie Policy</a></li>
                                                <li><a href="careers.html" class="mil-light-soft">Careers</a></li>
                                            </ul>
            
                                        </div>
                                    </div>
                                    <div class="mil-divider mil-mb-60"></div>
                                    <div class="row justify-content-between">
            
                                        <div class="col-lg-4 mil-mb-60">
            
                                            <h6 class="mil-muted mil-up mil-mb-30">India</h6>
            
                                            <p class="mil-light-soft mil-up">Mangalam College of Engineering, Ettumanoor <span class="mil-no-wrap">+91 481 253 3725</span></p>
            
                                        </div>
                                        <div class="col-lg-4 mil-mb-60">
            
                                            <h6 class="mil-muted mil-up mil-mb-30">Contact Us</h6>
            
                                            <p class="mil-light-soft">Email: mca@mangalam.edu.in <br> Admissions: +91 481 253 3726</p>
            
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
                <div class="mil-inner-banner">
                    <div class="mil-banner-content mil-up">
                        <div class="mil-animation-frame">
                            <div class="mil-animation mil-position-4 mil-dark mil-scale" data-value-1="6" data-value-2="1.4"></div>
                        </div>
                        <div class="container">
                            <ul class="mil-breadcrumbs mil-mb-60">
                                <li><a href="index.html">Homepage</a></li>
                                <li><a href="faculty.html">Faculty</a></li>
                            </ul>
                            <h1 class="mil-mb-60">Meet <span class="mil-thin">Our</span><br> Distinguished <span class="mil-thin">Faculty</span></h1>
                            <a href="#faculty" class="mil-link mil-dark mil-arrow-place mil-down-arrow">
                                <span>Our Faculty</span>
                            </a>
                        </div>
                    </div>
                </div>                
                <!-- banner end -->

                <!-- team -->
                <section id="faculty">
                    <div class="container mil-p-120-90">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="img/divya.jpg" alt="Dr. Divya S.B">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="profile-divya.html">Prof. Divya S.B</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Head of Department, MCA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="img/eldho.jpg" alt="Prof. Eldhose Paul">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="profile-eldhose.html">Prof. Eldhose Paul</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Assistant Professor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="img/ashwani.jpg" alt="Dr. Ashwani Vijayachandran">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="profile-ashwani.html">Prof. Ashwani Vijayachandran</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Assistant Professor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="img/banu.jpg" alt="Prof. Banu Sumayya">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="profile-banu.html">Prof. Banu Sumayya</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Assistant Professor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="img/greeshma.jpg" alt="Prof. Greeshmamol">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="profile-greeshmamol.html">Prof. Greeshmamol</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Assistant Professor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="img/kukku.jpg" alt="Prof. Kukkumol Thomas">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="profile-kukkumol.html">Prof. Kukkumol Thomas</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Assistant Professor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="img/nikhil.jpg" alt="Prof. Nikhil T Das">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="profile-nikhil.html">Prof. Nikhil T Das</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Assistant Professor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="img/anju.jpg" alt="Prof. Anju John">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="profile-anju.html">Prof. Anju John</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Assistant Professor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>                
                <!-- team end -->

                <!-- call to action -->
                <section class="mil-soft-bg">
                    <div class="container mil-p-120-120">
                        <div class="row">
                            <div class="col-lg-10">
                                <span class="mil-suptitle mil-suptitle-right mil-suptitle-dark mil-up">Looking to advance your career in tech? Join us and <br> let us help you shape a successful future.</span>
                            </div>
                        </div>
                        <div class="mil-center">
                            <h2 class="mil-up mil-mb-60">Ready to Begin <span class="mil-thin">journey with</span> us? <br> Our <span class="mil-thin">MCA Department</span> is here for you</h2>
                            <div class="mil-up"><a href="contact.html" class="mil-button mil-arrow-place"><span>Contact the MCA Department</span></a></div>
                        </div>
                    </div>
                </section>                
                <!-- call to action end -->

                <!-- footer -->
                <footer class="mil-dark-bg">
                    <div class="mi-invert-fix">
                        <div class="container mil-p-120-60">
                            <div class="row justify-content-between">
                                <div class="col-md-4 col-lg-4 mil-mb-60">
                
                                    <div class="mil-muted mil-logo mil-up mil-mb-30">Mangalam MCA Dept.</div>
                
                                    <p class="mil-light-soft mil-up mil-mb-30">Subscribe to our newsletter:</p>
                
                                    <form class="mil-subscribe-form mil-up">
                                        <input type="email" placeholder="Enter your email">
                                        <button type="submit" class="mil-button mil-icon-button-sm mil-arrow-place"></button>
                                    </form>
                
                                </div>
                                <div class="col-md-7 col-lg-6">
                                    <div class="row justify-content-end">
                                        <div class="col-md-6 col-lg-7">
                
                                            <nav class="mil-footer-menu mil-mb-60">
                                                <ul>
                                                    <li class="mil-up mil-active">
                                                        <a href="home.html">Home</a>
                                                    </li>
                                                    <li class="mil-up">
                                                        <a href="about.html">About Us</a>
                                                    </li>
                                                    <li class="mil-up">
                                                        <a href="programs.html">Programs</a>
                                                    </li>
                                                    <li class="mil-up">
                                                        <a href="contact.html">Contact</a>
                                                    </li>
                                                    <li class="mil-up">
                                                        <a href="events.html">Events</a>
                                                    </li>
                                                </ul>
                                            </nav>
                
                                        </div>
                                        <div class="col-md-6 col-lg-5">
                
                                            <ul class="mil-menu-list mil-up mil-mb-60">
                                                <li><a href="#." class="mil-light-soft">Privacy Policy</a></li>
                                                <li><a href="#." class="mil-light-soft">Terms & Conditions</a></li>
                                                <li><a href="#." class="mil-light-soft">Accessibility</a></li>
                                                <li><a href="#." class="mil-light-soft">Careers</a></li>
                                            </ul>
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <div class="row justify-content-between flex-sm-row-reverse">
                                <div class="col-md-7 col-lg-6">
                
                                    <div class="row justify-content-between">
                
                                        <div class="col-md-6 col-lg-5 mil-mb-60">
                                            <h6 class="mil-muted mil-up mil-mb-30">India</h6>
                                            <p class="mil-light-soft mil-up">Mangalam College of Engineering, Ettumanoor, Kerala <span class="mil-no-wrap">+91 123 456 7890</span></p>
                                        </div>
                                        <div class="col-md-6 col-lg-5 mil-mb-60">
                                            <h6 class="mil-muted mil-up mil-mb-30">Admissions Office</h6>
                                            <p class="mil-light-soft mil-up">mca.admissions@mangalam.edu.in</p>
                                        </div>
                                    </div>
                
                                </div>
                                <div class="col-md-4 col-lg-6 mil-mb-60">
                
                                    <div class="mil-vert-between">
                                        <p class="mil-light-soft mil-up">© 2023 Mangalam College of Engineering - MCA Dept. All Rights Reserved.</p>
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

</body>


<!-- Mirrored from miller.bslthemes.com/ashley-demo/team.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2024 11:50:31 GMT -->
</html>
