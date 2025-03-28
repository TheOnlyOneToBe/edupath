<?php
require_once 'config/database.php';

$sql = "SELECT * FROM article LIMIT 6";
$stmt = $conn->prepare($sql);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html class="no-js" lang="ZXX">

<!-- Mirrored from edupath-template.vercel.app/edupath/course.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:05 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />
    <meta
        name="keywords"
        content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- Site Title -->
    <title><?php include 'name.php';  ?> - Articles</title>
    <?php include 'includes/head.php'; ?>
</head>

<body class="ep-magic-cursor">
    <!-- Start Preloader  -->
    <div id="preloader">
        <div id="ep-preloader" class="ep-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Start Cursor To Top  -->
    <div class="cursor"></div>
    <div class="cursor2"></div>
    <!-- End Cursor To Top -->

    <!-- Start Begin Magic Cursor -->
    <div id="magic-cursor">
        <div id="ball"></div>
    </div>
    <!-- End Begin Magic Cursor -->

    <!-- Start Back To Top  -->
    <div class="progress-wrap">
        <svg
            class="progress-circle svg-content"
            width="100%"
            height="100%"
            viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- End Back To Top -->

    <!-- Mobile Menu Modal -->
    <div
        class="modal mobile-menu-modal offcanvas-modal fade"
        id="offcanvas-modal">
        <div class="modal-dialog offcanvas-dialog">
            <div class="modal-content">
                <div class="modal-header offcanvas-header">
                    <!-- offcanvas-logo-start -->
                    <div class="offcanvas-logo">
                        <a href="index.html">
                            <img src="assets/images/logo.svg" alt="logo" />
                        </a>
                    </div>
                    <!-- offcanvas-logo-end -->
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fi fi-ss-cross"></i>
                    </button>
                </div>
                <div class="mobile-menu-modal-main-body">
                    <!-- offcanvas-menu start -->
                    <nav id="offcanvas-menu" class="navigation offcanvas-menu">
                        <ul id="nav mobile-nav" class="list-none offcanvas-men-list">
                            <li>
                                <a class="menu-arrow" href="javascript:void(0)">Home</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="index.html">Home One</a>
                                    </li>
                                    <li>
                                        <a href="index-2.html">Home Two</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="menu-arrow" href="javascript:void(0)">Courses</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a class="menu-active" href="course.html">Course</a>
                                    </li>
                                    <li>
                                        <a href="course-details.html">Course Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="menu-arrow" href="javascript:void(0)">Events</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="event.html">Event</a>
                                    </li>
                                    <li>
                                        <a href="event-details.html">Event Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="menu-arrow" href="javascript:void(0)">Pages</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="about.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="team.html">Team</a>
                                    </li>
                                    <li>
                                        <a href="team-details.html">Team Details</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Login</a>
                                    </li>
                                    <li>
                                        <a href="register.html">Register</a>
                                    </li>
                                    <li>
                                        <a href="404.html">404 Error</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="menu-arrow" href="javascript:void(0)">Shop</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="shop.html">Shop</a>
                                    </li>
                                    <li>
                                        <a href="shop-single.html">Shop Single</a>
                                    </li>
                                    <li>
                                        <a href="cart.html">Cart</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="checkout.html">Checkout</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="menu-arrow" href="javascript:void(0)">Blog</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="blog.html">Blog </a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">Blog Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile Menu Modal -->

    <?php include 'includes/header.php';
    ?>


    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Start Breadcrumbs Area -->
                <div
                    class="ep-breadcrumbs breadcrumbs-bg background-image"
                    style="background-image: url('assets/images/breadcrumbs-bg.png')">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="ep-breadcrumbs__content">
                                    <h3 class="ep-breadcrumbs__title">Articles</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li>
                                            <a href="index.php">Accueil</a>
                                        </li>
                                        <li>
                                            <i class="fi-bs-angle-right"></i>
                                        </li>
                                        <li class="active">
                                            <a href="articles.php">Articles</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->
                <!-- Start Course Area -->
                <section class="ep-course section-gap position-relative">
                    <div class="container ep-container">
                        <div class="row">
                            <?php foreach ($articles as $article): ?>
                                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                                    <div
                                        class="ep-course__card wow fadeInUp"
                                        data-wow-delay=".3s"
                                        data-wow-duration="1s">
                                        <a href="article-details.php?id=<?php echo $article['id_article']; ?>" class="ep-course__img">
                                            <img
                                                src="assets/imgs/articles/<?php echo $article['photo']; ?>"
                                                alt="article-img" />
                                        </a>
                                        <div class="ep-course__body">
                                            <a href="article-details.php?id=<?php echo $article['id_article']; ?>" class="ep-course__title">
                                                <h5><?php echo $article['titre']; ?></h5>
                                            </a>
                                            <p><?php echo $article['description_art']; ?></p>
                                            <div class="ep-course__bottom">
                                                <span class="ep-course__price"><?php echo $article['date_pub']; ?></span>
                                                <a href="article-details.php?id=<?php echo $article['id_article']; ?>" class="ep-course__btn">
                                                    S'inscrire <i class="fi fi-rs-arrow-small-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
                <!-- End Course Area -->
            </main>
            <!-- Start Footer Area -->
            <?php include 'includes/footer.php'; ?>
            <?php include 'includes/scripts.php'; ?>
            <!-- End Footer Area -->
        </div>
    </div>
</body>

<!-- Mirrored from edupath-template.vercel.app/edupath/course.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:05 GMT -->

</html>