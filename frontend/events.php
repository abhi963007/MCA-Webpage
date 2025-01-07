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

// Fetch all events
$sql = "SELECT * FROM events ORDER BY event_date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from miller.bslthemes.com/ashley-demo/portfolio-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2024 11:50:25 GMT -->
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
    <title>MCA-EVENTS</title>

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
                        <p class="mil-h3 mil-muted mil-thin">EVENTS</p>
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
                                    <li class="mil-has-children">
                                        <a href="index.php">Homepage</a>
                                        <ul>
                                            <li><a href="services.html">Overview</a></li>
                                            <li><a href="home-2.html">About MCA</a></li>
                                            <li><a href="portfolio-3.html">Department Highlights</a></li>
                                        </ul>
                                    </li>
                                    <li class="mil-has-children">
                                        <a href="contact.html">Contact</a>
                                        <ul>
                                            <li><a href="team.php">Faculty Directory</a></li>
                                            <li><a href="contact.html">Contact Info</a></li>
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
            
                                            <h6 class="mil-muted mil-mb-30">Upcoming Events</h6>
            
                                            <ul class="mil-menu-list">
                                                <li><a href="event-1.html" class="mil-light-soft">AI and Machine Learning Workshop</a></li>
                                                <li><a href="event-2.html" class="mil-light-soft">Cloud Computing Seminar</a></li>
                                                <li><a href="event-3.html" class="mil-light-soft">Cybersecurity Bootcamp</a></li>
                                                <li><a href="event-4.html" class="mil-light-soft">Web Development Hackathon</a></li>
                                                <li><a href="event-5.html" class="mil-light-soft">Networking for Future Tech</a></li>
                                            </ul>
            
                                        </div>
                                        <div class="col-lg-4 mil-mb-60">
            
                                            <h6 class="mil-muted mil-mb-30">Resources</h6>
            
                                            <ul class="mil-menu-list">
                                                <li><a href="#." class="mil-light-soft">MCA Handbook</a></li>
                                                <li><a href="#." class="mil-light-soft">Event Guidelines</a></li>
                                                <li><a href="#." class="mil-light-soft">Code of Conduct</a></li>
                                                <li><a href="#." class="mil-light-soft">Student Portal</a></li>
                                            </ul>
            
                                        </div>
                                    </div>
                                    <div class="mil-divider mil-mb-60"></div>
                                    <div class="row justify-content-between">
            
                                        <div class="col-lg-4 mil-mb-60">
            
                                            <h6 class="mil-muted mil-mb-30">Campus</h6>
            
                                            <p class="mil-light-soft mil-up">Mangalam College of Engineering, Ettumanoor <span class="mil-no-wrap">+91 12345 67890</span></p>
            
                                        </div>
                                        <div class="col-lg-4 mil-mb-60">
            
                                            <h6 class="mil-muted mil-mb-30">Administration Office</h6>
            
                                            <p class="mil-light-soft">Mangalam Campus, Kottayam <span class="mil-no-wrap">+91 98765 43210</span></p>
            
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
                <a href="home-1.html" class="mil-logo">MCA</a>
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

                <!-- portfolio -->
                <section class="mil-portfolio-slider-frame">
                    <div class="mil-animation-frame">
                        <div class="mil-animation mil-position-4 mil-dark mil-scale" data-value-1="1" data-value-2="2" style="top: -60px; right: -4px;"></div>
                    </div>
                    <div class="container">
                        <div class="row align-items-end">
                            <div class="col-lg-9">
                                <div class="swiper-container mil-portfolio-slider mil-up">
                                    <div class="swiper-wrapper">
                                        <?php
                                        if ($result->num_rows > 0):
                                            while($row = $result->fetch_assoc()):
                                                $image_path = !empty($row['image_path']) ? $row['image_path'] : 'img/events/default.jpg';
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="mil-portfolio-item mil-slider-item" data-swiper-parallax="-30">
                                                <div class="mil-cover-frame mil-drag">
                                                    <div class="mil-cover" data-swiper-parallax-scale="1.3">
                                                        <img src="<?php echo htmlspecialchars($image_path); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                                                    </div>
                                                </div>
                                                <div class="mil-descr" data-swiper-parallax-x="104%" data-swiper-parallax-opacity="0">
                                                    <div class="mil-descr-text" data-swiper-parallax-y="100%" data-swiper-parallax-opacity="0">
                                                        <div class="mil-labels mil-mb-15">
                                                            <div class="mil-label mil-upper mil-accent">MCA EVENT</div>
                                                            <div class="mil-label mil-upper"><?php echo date('M d Y', strtotime($row['event_date'])); ?></div>
                                                        </div>
                                                        <h5><?php echo htmlspecialchars($row['title']); ?></h5>
                                                        <p class="mil-text-sm"><?php echo htmlspecialchars($row['description']); ?></p>
                                                        <p class="mil-text-sm mil-mt-15"><strong>Venue:</strong> <?php echo htmlspecialchars($row['venue']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            endwhile;
                                        else:
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="mil-portfolio-item mil-slider-item">
                                                <div class="mil-descr-text">
                                                    <h5>No events found</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        endif;
                                        $conn->close();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mil-relative">
                                <div class="mil-portfolio-nav">
                                    <div class="mil-portfolio-btns-frame">
                                        <div class="swiper-portfolio-pagination"></div>
                                        <div class="mil-slider-nav">
                                            <div class="mil-slider-arrow mil-prev mil-portfolio-prev mil-arrow-place"></div>
                                            <div class="mil-slider-arrow mil-portfolio-next mil-arrow-place"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>                
                <!-- portfolio end -->

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


<!-- Mirrored from miller.bslthemes.com/ashley-demo/portfolio-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2024 11:50:28 GMT -->
</html>
