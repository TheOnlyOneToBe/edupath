<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />
    <meta name="keywords" content="apprentissage en ligne, éducation, e-learning, cours, tutoriels, ressources éducatives, développement de compétences, amélioration de carrière" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- Titre du site -->
    <title><?php include 'name.php' ;  ?> - Éducation, Cours & Formation en Ligne</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/plugins/css/bootstrap.min.css" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/plugins/css/animate.min.css" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="assets/plugins/css/owl.carousel.min.css" />
    <!-- Maginific Popup CSS -->
    <link rel="stylesheet" href="assets/plugins/css/maginific-popup.min.css" />
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/plugins/css/nice-select.min.css" />
    <!-- Icofont -->
    <link rel="stylesheet" href="assets/plugins/css/icofont.css" />
    <!-- Uicons -->
    <link rel="stylesheet" href="assets/plugins/css/uicons.css" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css" />
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
        viewBox="-1 -1 102 102"
      >
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>
    <!-- End Back To Top -->

    <!-- Mobile Menu Modal -->
    <div
      class="modal mobile-menu-modal offcanvas-modal fade"
      id="offcanvas-modal"
    >
      <div class="modal-dialog offcanvas-dialog">
        <div class="modal-content">
          <div class="modal-header offcanvas-header">
            <!-- offcanvas-logo-start -->
            <div class="offcanvas-logo">
              <a href="index.html">
                <img src="assets/images/logo-3.svg" alt="logo" />
              </a>
            </div>
            <!-- offcanvas-logo-end -->
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
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
                      <a class="menu-active" href="index.html">Home One</a>
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
                      <a href="course.html">Course</a>
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

    <!-- Start Header Area -->
    <header class="ep-header position-relative section-bg-1">
      <!-- Topbar -->
      <div class="ep-topbar">
        <div class="container ep-container">
          <div class="row align-items-center">
            <div class="col-lg-2 col-6">
              <div class="ep-topbar__column">
                <div class="ep-logo">
                  <a href="index.html">
                    <img src="assets/images/logo-3.svg" alt="logo" />
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-10 col-6">
              <div class="ep-topbar__column ep-topbar__column2">
                <div class="ep-topbar__search-widget">
                  <div class="ep-topbar__category">
                    <select>
                      <option data-display="All">All</option>
                      <option value="1">Study Buddy</option>
                      <option value="2">Tutoring Services</option>
                      <option value="3">Digital Advertising</option>
                      <option value="4">Online Courses</option>
                      <option value="5">Tutoring Services</option>
                    </select>
                  </div>
                  <div class="ep-topbar__search">
                    <form action="#" method="post">
                      <input
                        type="search"
                        name="search"
                        placeholder="Search"
                        required
                      />
                      <button type="submit">
                        <i class="fi-rr-search"></i>
                      </button>
                    </form>
                  </div>
                </div>
                <a href="login.html" class="ep-header__account">
                  <i class="fi fi-rr-user"></i>
                  <div class="ep-header__account-info">
                    <span>Sign In</span>
                    <p>Account</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header Middle -->
      <div id="active-sticky" class="ep-header__middle">
        <div class="container ep-container">
          <div class="ep-header__inner">
            <div class="row align-items-center">
              <div class="col-lg-10 col-12">
                <nav class="ep-header__navigation">
                  <ul class="ep-header__menu">
                    <li class="active">
                      <a href="#"
                        >Home <i class="fi fi-ss-angle-small-down"></i>
                      </a>
                      <ul class="sub-menu">
                        <li class="active">
                          <a href="index.html">Home One</a>
                        </li>
                        <li>
                          <a href="index-2.html">Home Two</li>
                      </ul>
                    </li>
                    <li>
                      <a href="#"
                        >Courses <i class="fi fi-ss-angle-small-down"></i>
                      </a>
                      <ul class="sub-menu">
                        <li>
                          <a href="course.html">Course</a>
                        </li>
                        <li>
                          <a href="course-details.html">Course Details</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="#"
                        >Events <i class="fi fi-ss-angle-small-down"></i>
                      </a>
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
                      <a href="#"
                        >Pages <i class="fi fi-ss-angle-small-down"></i>
                      </a>
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
                      <a href="#"
                        >Shop <i class="fi fi-ss-angle-small-down"></i>
                      </a>
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
                      <a href="#"
                        >Blog <i class="fi fi-ss-angle-small-down"></i>
                      </a>
                      <ul class="sub-menu">
                        <li>
                          <a href="blog.html">Blog</a>
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
              <div class="col-lg-12 col-xl-2 col-12">
                <div class="ep-header__right">
                  <div class="ep-topbar__action">
                    <div class="ep-topbar__wishlist">
                      <a href="wishlist.html" class="ep-topbar__action-icon">
                        <i class="fi-rr-heart"></i>
                        <span>4</span>
                      </a>
                    </div>
                    <div class="ep-topbar__cart">
                      <a href="cart.html" class="ep-topbar__action-icon">
                        <i class="fi-rr-shopping-cart"></i>
                        <span>3</span>
                      </a>
                      <div class="ep-topbar__info">
                        <p>Total</p>
                        <span>$496.00</span>
                      </div>
                    </div>
                  </div>
                  <!-- Mobile Menu Button -->
                  <button
                    type="button"
                    class="mobile-menu-offcanvas-toggler"
                    data-bs-toggle="modal"
                    data-bs-target="#offcanvas-modal"
                  >
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                  </button>
                  <!-- End Mobile Menu Button -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- End Header Area -->

    <div id="smooth-wrapper">
      <div id="smooth-content">
        <main>
          <!-- Section Héros -->
          <section class="ep-hero section-bg-1">
            <div class="container ep-container">
              <div class="row align-items-center">
                <div class="col-lg-12 col-xl-6 col-12">
                  <div class="ep-hero__content">
                    <h1 class="ep-hero__title ep-split-text left">
                      Débloquez vos
                      <span>Opportunités</span>
                      d'Apprentissage
                    </h1>
                    <p class="ep-hero__text">
                      Découvrez des formations adaptées à vos besoins et développez 
                      vos compétences avec notre plateforme d'apprentissage innovante.
                    </p>
                    <div class="ep-hero__btn">
                      <a href="about.html" class="ep-btn">
                        Explorer maintenant <i class="fi fi-rs-arrow-small-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-xl-6 col-12 order-top">
                  <div class="ep-hero__widget">
                    <!-- Widget One  -->
                    <div class="ep-hero__widget-column">
                      <!-- Arrow Button -->
                      <div class="ep-hero__widget-arrow ep-hobble">
                        <a href="contact.html" class="ep-hover-layer-2">
                          <i class="fi fi-ss-arrow-up-right"></i>
                        </a>
                      </div>
                      <!-- Image One -->
                      <div class="ep-hero__widget-img">
                        <img
                          src="assets/images/hero/home-1/img-1.png"
                          alt="hero-img"
                        />
                      </div>
                      <!-- Team Widget -->
                      <div class="ep-hero__team">
                        <div class="ep-hero__team-img">
                          <ul class="ep-hero__team-img-list">
                            <li>
                              <img
                                src="assets/images/hero/home-1/team/1.png"
                                alt="team-img"
                              />
                            </li>
                            <li>
                              <img
                                src="assets/images/hero/home-1/team/2.png"
                                alt="team-img"
                              />
                            </li>
                            <li>
                              <img
                                src="assets/images/hero/home-1/team/3.png"
                                alt="team-img"
                              />
                            </li>
                            <li>
                              <img
                                src="assets/images/hero/home-1/team/4.png"
                                alt="team-img"
                              />
                            </li>
                          </ul>
                        </div>
                        <div class="ep-hero__team-info">
                          <h5><span class="counter">3,000</span>+</h5>
                          <p>Experience Team</p>
                        </div>
                      </div>
                    </div>
                    <!-- Shape Image -->
                    <div class="ep-hero__shape updown-ani">
                      <img
                        src="assets/images/hero/home-1/shape.svg"
                        alt="shape"
                      />
                    </div>
                    <!-- Widget Two  -->
                    <div class="ep-hero__widget-column">
                      <div class="ep-hero__course">
                        <span class="counter">500</span>
                        <p>Available <br />Course</p>
                      </div>
                      <!-- Image Two -->
                      <div class="ep-hero__widget-img">
                        <img
                          src="assets/images/hero/home-1/img-2.png"
                          alt="hero-img"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Start Hero Area -->
          <!-- Section À propos -->
          <section class="ep-about ep-section section-gap position-relative">
            <div class="ep-about__shape updown-ani">
              <img
                src="assets/images/about/about-1/circle-shape.svg"
                alt="circle-shape"
              />
            </div>
            <div class="container ep-container">
              <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                  <div class="ep-section__img position-relative">
                    <div class="ep-section__img-shape rotate-ani">
                      <img
                        src="assets/images/about/about-1/pattern-shape.svg"
                        alt="pattern-shape"
                      />
                    </div>
                    <div class="ep-section__img-main">
                      <img
                        src="assets/images/about/about-1/about-img.png"
                        alt="about-img"
                      />
                    </div>
                    <div class="overview-card updown-ani">
                      <div class="overview-card__icon">
                        <img
                          src="assets/images/about/about-1/user.svg"
                          alt="user-icon"
                        />
                      </div>
                      <div class="overview-card__info">
                        <h4><span>2</span>k+</h4>
                        <p>Full Time Student</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="ep-section__content">
                    <div class="ep-section-head">
                      <span class="ep-section-head__sm-title ep1-color">À propos de nous</span>
                      <h3 class="ep-section-head__big-title ep-split-text left">
                        Libérer la puissance <br/> du <span>Savoir</span>
                      </h3>
                      <p class="ep-section-head__text">
                        Notre mission est de rendre l'éducation accessible à tous 
                        et de vous accompagner dans votre réussite professionnelle.
                      </p>
                    </div>
                    <div class="ep-section__widget">
                      <div class="ep-feature-list">
                        <div class="ep-feature-list__icon">
                          <i class="fi fi-ss-check-circle"></i>
                        </div>
                        <div class="ep-feature-list__info">
                          <h5>Ignite your passion for learning</h5>
                          <p>
                            Et purus duis sollicitudin dignissim habitant.
                            Egestas nulla quis venenatis cras sed eu massa eu
                            faucibus.
                          </p>
                        </div>
                      </div>
                      <div class="ep-feature-list">
                        <div class="ep-feature-list__icon">
                          <i class="fi fi-ss-check-circle"></i>
                        </div>
                        <div class="ep-feature-list__info">
                          <h5>Discover the joy of lifelong learning</h5>
                          <p>
                            Et purus duis sollicitudin dignissim habitant.
                            Egestas nulla quis venenatis cras sed eu massa eu
                            faucibus.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="ep-section__btn">
                      <a href="about.html" class="ep-btn border-btn"
                        >Read More <i class="fi fi-rs-arrow-small-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Start About Area -->
          <!-- Section Catégories -->
          <section class="ep-category section-gap pt-0">
            <div class="container ep-container">
              <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-4 col-md-8 col-12">
                  <div class="ep-section-head text-center">
                    <span class="ep-section-head__sm-title ep1-color">Catégories</span>
                    <h3 class="ep-section-head__big-title ep-split-text left">
                      Des outils pour <span>Booster</span> <br/>votre Apprentissage
                    </h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Single Card -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                  <a
                    href="course.html"
                    class="ep-category__card wow fadeInUp"
                    data-wow-delay=".3s"
                    data-wow-duration="1s"
                  >
                    <div class="ep-category__icon ep1-bg">
                      <img
                        src="assets/images/category/category-1/1.svg"
                        alt="category-icon"
                      />
                    </div>
                    <div class="ep-category__info">
                      <h3>Study Buddy</h3>
                    </div>
                  </a>
                </div>
                <!-- Single Card -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                  <a
                    href="course.html"
                    class="ep-category__card wow fadeInUp"
                    data-wow-delay=".5s"
                    data-wow-duration="1s"
                  >
                    <div class="ep-category__icon ep2-bg">
                      <img
                        src="assets/images/category/category-1/2.svg"
                        alt="category-icon"
                      />
                    </div>
                    <div class="ep-category__info">
                      <h3>Tutoring Services</h3>
                    </div>
                  </a>
                </div>
                <!-- Single Card -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                  <a
                    href="course.html"
                    class="ep-category__card wow fadeInUp"
                    data-wow-delay=".7s"
                    data-wow-duration="1s"
                  >
                    <div class="ep-category__icon ep4-bg">
                      <img
                        src="assets/images/category/category-1/3.svg"
                        alt="category-icon"
                      />
                    </div>
                    <div class="ep-category__info">
                      <h3>Digital Advertising</h3>
                    </div>
                  </a>
                </div>
                <!-- Single Card -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                  <a
                    href="course.html"
                    class="ep-category__card wow fadeInUp"
                    data-wow-delay=".9s"
                    data-wow-duration="1s"
                  >
                    <div class="ep-category__icon ep3-bg">
                      <img
                        src="assets/images/category/category-1/4.svg"
                        alt="category-icon"
                      />
                    </div>
                    <div class="ep-category__info">
                      <h3>Brain Boost</h3>
                    </div>
                  </a>
                </div>
                <!-- Single Card -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                  <a
                    href="course.html"
                    class="ep-category__card wow fadeInUp"
                    data-wow-delay=".3s"
                    data-wow-duration="1s"
                  >
                    <div class="ep-category__icon ep4-bg">
                      <img
                        src="assets/images/category/category-1/5.svg"
                        alt="category-icon"
                      />
                    </div>
                    <div class="ep-category__info">
                      <h3>Edu Connect</h3>
                    </div>
                  </a>
                </div>
                <!-- Single Card -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                  <a
                    href="course.html"
                    class="ep-category__card wow fadeInUp"
                    data-wow-delay=".5s"
                    data-wow-duration="1s"
                  >
                    <div class="ep-category__icon ep5-bg">
                      <img
                        src="assets/images/category/category-1/6.svg"
                        alt="category-icon"
                      />
                    </div>
                    <div class="ep-category__info">
                      <h3>Tutoring Services</h3>
                    </div>
                  </a>
                </div>
                <!-- Single Card -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                  <a
                    href="course.html"
                    class="ep-category__card wow fadeInUp"
                    data-wow-delay=".7s"
                    data-wow-duration="1s"
                  >
                    <div class="ep-category__icon ep6-bg">
                      <img
                        src="assets/images/category/category-1/7.svg"
                        alt="category-icon"
                      />
                    </div>
                    <div class="ep-category__info">
                      <h3>Study Buddy</h3>
                    </div>
                  </a>
                </div>
                <!-- Single Card -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                  <a
                    href="course.html"
                    class="ep-category__card wow fadeInUp"
                    data-wow-delay=".9s"
                    data-wow-duration="1s"
                  >
                    <div class="ep-category__icon ep4-bg">
                      <img
                        src="assets/images/category/category-1/8.svg"
                        alt="category-icon"
                      />
                    </div>
                    <div class="ep-category__info">
                      <h3>Online Courses</h3>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </section>
          <!-- End  Category Area -->
          <!-- Section Formations -->
          <section class="ep-course section-gap section-bg-1 position-relative">
            <div class="ep-course__shapes">
              <img
                class="shape-1 rotate-ani"
                src="assets/images/course/course-1/shape-1.svg"
                alt="shape-img-1"
              />
              <img
                class="shape-2 updown-ani"
                src="assets/images/course/course-1/shape-2.svg"
                alt="shape-img-2"
              />
              <img
                class="shape-3 updown-ani"
                src="assets/images/course/course-1/shape-3.svg"
                alt="shape-img-3"
              />
            </div>
            <div class="container ep-container">
              <div class="row">
                <div class="col-12">
                  <div class="ep-section-head d-flex-end-between">
                    <div class="ep-section-head__info">
                      <span class="ep-section-head__sm-title ep3-color">Formations Populaires</span>
                      <h3 class="ep-section-head__big-title ep-split-text left">
                        Accédez à nos <span>Ressources</span> <br/>d'Apprentissage
                      </h3>
                    </div>
                    <div class="ep-section-head__btn">
                      <a href="formations.php" class="ep-btn">
                        Explorer <i class="fi fi-rs-arrow-small-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Single Course Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-course__card wow fadeInUp"
                    data-wow-delay=".3s"
                    data-wow-duration="1s"
                  >
                    <a href="course-details.html" class="ep-course__img">
                      <img
                        src="assets/images/course/course-1/1.png"
                        alt="course-img"
                      />
                    </a>
                    <a href="course.html" class="ep-course__tag ep1-bg">Math</a>
                    <div class="ep-course__body">
                      <div class="ep-course__lesson">
                        <div class="ep-course__student">
                          <i class="fi-rr-user"></i>
                          <p>250 Student</p>
                        </div>
                        <div class="ep-course__teacher">
                          <p>Steve Smith</p>
                        </div>
                      </div>
                      <div class="ep-course__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                          <li>
                            <span>(5.0/ 2 Ratings)</span>
                          </li>
                        </ul>
                      </div>
                      <a href="course-details.html" class="ep-course__title">
                        <h5>World History: Ancient to Modern Times</h5>
                      </a>
                      <div class="ep-course__bottom">
                        <a href="course-details.html" class="ep-course__btn"
                          >Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
                        </a>
                        <span class="ep-course__price">$50.00</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single Course Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-course__card wow fadeInUp"
                    data-wow-delay=".5s"
                    data-wow-duration="1s"
                  >
                    <a href="course-details.html" class="ep-course__img">
                      <img
                        src="assets/images/course/course-1/2.png"
                        alt="course-img"
                      />
                    </a>
                    <a href="course.html" class="ep-course__tag ep2-bg">Math</a>
                    <div class="ep-course__body">
                      <div class="ep-course__lesson">
                        <div class="ep-course__student">
                          <i class="fi-rr-user"></i>
                          <p>250 Student</p>
                        </div>
                        <div class="ep-course__teacher">
                          <p>Steve Smith</p>
                        </div>
                      </div>
                      <div class="ep-course__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                          <li>
                            <span>(5.0/ 2 Ratings)</span>
                          </li>
                        </ul>
                      </div>
                      <a href="course-details.html" class="ep-course__title">
                        <h5>Environmental Science and Sustainability</h5>
                      </a>
                      <div class="ep-course__bottom">
                        <a href="course-details.html" class="ep-course__btn"
                          >Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
                        </a>
                        <span class="ep-course__price">$50.00</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single Course Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-course__card wow fadeInUp"
                    data-wow-delay=".7s"
                    data-wow-duration="1s"
                  >
                    <a href="course-details.html" class="ep-course__img">
                      <img
                        src="assets/images/course/course-1/3.png"
                        alt="course-img"
                      />
                    </a>
                    <a href="course.html" class="ep-course__tag ep4-bg">Math</a>
                    <div class="ep-course__body">
                      <div class="ep-course__lesson">
                        <div class="ep-course__student">
                          <i class="fi-rr-user"></i>
                          <p>250 Student</p>
                        </div>
                        <div class="ep-course__teacher">
                          <p>Steve Smith</p>
                        </div>
                      </div>
                      <div class="ep-course__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                          <li>
                            <span>(5.0/ 2 Ratings)</span>
                          </li>
                        </ul>
                      </div>
                      <a href="course-details.html" class="ep-course__title">
                        <h5>Modern Physics: Concepts and Applications</h5>
                      </a>
                      <div class="ep-course__bottom">
                        <a href="course-details.html" class="ep-course__btn"
                          >Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
                        </a>
                        <span class="ep-course__price">$50.00</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single Course Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-course__card wow fadeInUp"
                    data-wow-delay=".3s"
                    data-wow-duration="1s"
                  >
                    <a href="course-details.html" class="ep-course__img">
                      <img
                        src="assets/images/course/course-1/4.png"
                        alt="course-img"
                      />
                    </a>
                    <a href="course.html" class="ep-course__tag ep7-bg">Math</a>
                    <div class="ep-course__body">
                      <div class="ep-course__lesson">
                        <div class="ep-course__student">
                          <i class="fi-rr-user"></i>
                          <p>250 Student</p>
                        </div>
                        <div class="ep-course__teacher">
                          <p>Steve Smith</p>
                        </div>
                      </div>
                      <div class="ep-course__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                          <li>
                            <span>(5.0/ 2 Ratings)</span>
                          </li>
                        </ul>
                      </div>
                      <a href="course-details.html" class="ep-course__title">
                        <h5>Early Childhood Education Practices</h5>
                      </a>
                      <div class="ep-course__bottom">
                        <a href="course-details.html" class="ep-course__btn"
                          >Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
                        </a>
                        <span class="ep-course__price">$50.00</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single Course Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-course__card wow fadeInUp"
                    data-wow-delay=".5s"
                    data-wow-duration="1s"
                  >
                    <a href="course-details.html" class="ep-course__img">
                      <img
                        src="assets/images/course/course-1/5.png"
                        alt="course-img"
                      />
                    </a>
                    <a href="course.html" class="ep-course__tag ep4-bg">Math</a>
                    <div class="ep-course__body">
                      <div class="ep-course__lesson">
                        <div class="ep-course__student">
                          <i class="fi-rr-user"></i>
                          <p>250 Student</p>
                        </div>
                        <div class="ep-course__teacher">
                          <p>Steve Smith</p>
                        </div>
                      </div>
                      <div class="ep-course__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                          <li>
                            <span>(5.0/ 2 Ratings)</span>
                          </li>
                        </ul>
                      </div>
                      <a href="course-details.html" class="ep-course__title">
                        <h5>Embrace the power of better tomorrow education</h5>
                      </a>
                      <div class="ep-course__bottom">
                        <a href="course-details.html" class="ep-course__btn"
                          >Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
                        </a>
                        <span class="ep-course__price">$50.00</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single Course Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-course__card wow fadeInUp"
                    data-wow-delay=".7s"
                    data-wow-duration="1s"
                  >
                    <a href="course-details.html" class="ep-course__img">
                      <img
                        src="assets/images/course/course-1/6.png"
                        alt="course-img"
                      />
                    </a>
                    <a href="course.html" class="ep-course__tag ep3-bg">Math</a>
                    <div class="ep-course__body">
                      <div class="ep-course__lesson">
                        <div class="ep-course__student">
                          <i class="fi-rr-user"></i>
                          <p>250 Student</p>
                        </div>
                        <div class="ep-course__teacher">
                          <p>Steve Smith</p>
                        </div>
                      </div>
                      <div class="ep-course__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                          <li>
                            <span>(5.0/ 2 Ratings)</span>
                          </li>
                        </ul>
                      </div>
                      <a href="course-details.html" class="ep-course__title">
                        <h5>Basic Programming with Python</h5>
                      </a>
                      <div class="ep-course__bottom">
                        <a href="course-details.html" class="ep-course__btn"
                          >Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
                        </a>
                        <span class="ep-course__price">$50.00</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Course Area -->
          <!-- Start Team Area -->
          <section class="ep-team section-gap position-relative">
            <div class="ep-team__pattern updown-ani">
              <img
                src="assets/images/team/team-1/dot-pattern.svg"
                alt="dot-pattern"
              />
            </div>
            <div class="container ep-container">
              <div class="row">
                <div class="col-12">
                  <div class="ep-section-head d-flex-end-between">
                    <div class="ep-section-head__info">
                      <span class="ep-section-head__sm-title ep2-color"
                        >Our Mentor</span
                      >
                      <h3 class="ep-section-head__big-title ep-split-text left">
                        Meet Our <span>Inspiring</span> <br />
                        Dedicated Mentor
                      </h3>
                    </div>
                    <div class="ep-section-head__btn">
                      <a href="team.html" class="ep-btn"
                        >View More <i class="fi fi-rs-arrow-small-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Single Team -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-team__card wow fadeInUp"
                    data-wow-delay=".3s"
                    data-wow-duration="1s"
                  >
                    <a href="team-details.html" class="ep-team__img">
                      <img
                        src="assets/images/team/team-1/1.png"
                        alt="team-img"
                      />
                    </a>
                    <div class="ep-team__content">
                      <div class="ep-team__author">
                        <a href="team-details.html">
                          <h5>Bessie Cooper</h5>
                        </a>
                        <p>Mentor</p>
                      </div>
                      <div class="ep-team__social">
                        <span class="ep-team__social-btn">
                          <i class="fi-rr-share"></i>
                        </span>
                        <ul>
                          <li>
                            <a href="#">
                              <i class="icofont-twitter"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="icofont-facebook"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="icofont-instagram"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="icofont-linkedin"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single Team -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-team__card wow fadeInUp"
                    data-wow-delay=".5s"
                    data-wow-duration="1s"
                  >
                    <a href="team-details.html" class="ep-team__img">
                      <img
                        src="assets/images/team/team-1/2.png"
                        alt="team-img"
                      />
                    </a>
                    <div class="ep-team__content">
                      <div class="ep-team__author">
                        <a href="team-details.html">
                          <h5>Arlene McCoy</h5>
                        </a>
                        <p>Senior Mentor</p>
                      </div>
                      <div class="ep-team__social">
                        <span class="ep-team__social-btn">
                          <i class="fi-rr-share"></i>
                        </span>
                        <ul>
                          <li>
                            <a href="#">
                              <i class="icofont-twitter"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="icofont-facebook"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="icofont-instagram"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="icofont-linkedin"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single Team -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-team__card wow fadeInUp"
                    data-wow-delay=".7s"
                    data-wow-duration="1s"
                  >
                    <a href="team-details.html" class="ep-team__img">
                      <img
                        src="assets/images/team/team-1/3.png"
                        alt="team-img"
                      />
                    </a>
                    <div class="ep-team__content">
                      <div class="ep-team__author">
                        <a href="team-details.html">
                          <h5>Brooklyn Simmons</h5>
                        </a>
                        <p>Assistant Teacher</p>
                      </div>
                      <div class="ep-team__social">
                        <span class="ep-team__social-btn">
                          <i class="fi-rr-share"></i>
                        </span>
                        <ul>
                          <li>
                            <a href="#">
                              <i class="icofont-twitter"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="icofont-facebook"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="icofont-instagram"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="icofont-linkedin"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Team Area -->
          <div class="ep-section-bg bg-img-1">
            <!-- Start Funfact Area -->
            <section class="ep-funfact section-gap pb-0">
              <div class="container ep-container">
                <div class="row g-0 justify-content-between">
                  <!-- Single Funfact Card -->
                  <div class="col-xl-auto col-lg-3 col-md-6 col-12">
                    <div
                      class="ep-funfact__card wow fadeInUp"
                      data-wow-delay=".3s"
                      data-wow-duration="1s"
                    >
                      <div class="ep-funfact__icon ep3-bg">
                        <img
                          src="assets/images/funfact/funfact-1/1.svg"
                          alt="funfact-icon"
                        />
                      </div>
                      <div class="ep-funfact__info">
                        <h4><span class="counter">14</span>k+</h4>
                        <p>Student Enrolled</p>
                      </div>
                    </div>
                  </div>
                  <!-- Single Funfact Card -->
                  <div class="col-xl-auto col-lg-3 col-md-6 col-12">
                    <div
                      class="ep-funfact__card wow fadeInUp"
                      data-wow-delay=".5s"
                      data-wow-duration="1s"
                    >
                      <div class="ep-funfact__icon ep1-bg">
                        <img
                          src="assets/images/funfact/funfact-1/2.svg"
                          alt="funfact-icon"
                        />
                      </div>
                      <div class="ep-funfact__info">
                        <h4><span class="counter">20</span>k+</h4>
                        <p>Class Completed</p>
                      </div>
                    </div>
                  </div>
                  <!-- Single Funfact Card -->
                  <div class="col-xl-auto col-lg-3 col-md-6 col-12">
                    <div
                      class="ep-funfact__card wow fadeInUp"
                      data-wow-delay=".7s"
                      data-wow-duration="1s"
                    >
                      <div class="ep-funfact__icon ep8-bg">
                        <img
                          src="assets/images/funfact/funfact-1/3.svg"
                          alt="funfact-icon"
                        />
                      </div>
                      <div class="ep-funfact__info">
                        <h4><span class="counter">100</span>%</h4>
                        <p>Happy Customers</p>
                      </div>
                    </div>
                  </div>
                  <!-- Single Funfact Card -->
                  <div class="col-xl-auto col-lg-3 col-md-6 col-12">
                    <div
                      class="ep-funfact__card wow fadeInUp"
                      data-wow-delay=".9s"
                      data-wow-duration="1s"
                    >
                      <div class="ep-funfact__icon ep7-bg">
                        <img
                          src="assets/images/funfact/funfact-1/4.svg"
                          alt="funfact-icon"
                        />
                      </div>
                      <div class="ep-funfact__info">
                        <h4><span class="counter">900</span>+</h4>
                        <p>Top Instructors</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- End Funfact Area -->
            <!-- Start Faq Area -->
            <section class="ep-faq mg-top-80 position-relative">
              <div class="ep-faq__pattern-2 updown-ani">
                <img
                  src="assets/images/faq/faq-1/pattern-2.svg"
                  alt="pattern-2"
                />
              </div>
              <div class="container ep-container">
                <div class="ep-faq__inner position-relative">
                  <div class="ep-faq__pattern-1 rotate-ani">
                    <img
                      src="assets/images/faq/faq-1/pattern-1.svg"
                      alt="pattern-1"
                    />
                  </div>
                  <div class="row g-0 align-items-center">
                    <div class="col-lg-12 col-xl-6 col-12">
                      <div class="ep-faq__img">
                        <img
                          src="assets/images/faq/faq-1/faq-img.png"
                          alt="faq-img"
                        />
                      </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 col-12">
                      <div class="ep-faq__content">
                        <div class="ep-section-head">
                          <span class="ep-section-head__sm-title ep1-color"
                            >Faq</span
                          >
                          <h3
                            class="ep-section-head__big-title ep-split-text left"
                          >
                            Frequently <span>Asked</span> <br />
                            Questions and Answers
                          </h3>
                        </div>
                        <div
                          class="ep-faq__accordion faq-inner accordion"
                          id="accordionExample"
                        >
                          <!-- Single Faq -->
                          <div class="ep-faq__accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                              <button
                                class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseOne"
                                aria-expanded="true"
                                aria-controls="collapseOne"
                              >
                                <span>01</span>What are the benefits of
                                education?
                              </button>
                            </h2>
                            <div
                              id="collapseOne"
                              class="accordion-collapse collapse show"
                              aria-labelledby="headingOne"
                              data-bs-parent="#accordionExample"
                            >
                              <div class="ep-faq__accordion-body">
                                <p class="ep-faq__accordion-text">
                                  The generated is therefore always free from
                                  repetition is the injected humour or words
                                  etc.
                                </p>
                              </div>
                            </div>
                          </div>
                          <!-- Single Faq -->
                          <div class="ep-faq__accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo"
                                aria-expanded="false"
                                aria-controls="collapseTwo"
                              >
                                <span>02</span>How can I find the program for
                                me?
                              </button>
                            </h2>
                            <div
                              id="collapseTwo"
                              class="accordion-collapse collapse"
                              aria-labelledby="headingTwo"
                              data-bs-parent="#accordionExample"
                            >
                              <div class="ep-faq__accordion-body">
                                <p class="ep-faq__accordion-text">
                                  The generated is therefore always free from
                                  repetition is the injected humour or words
                                  etc.
                                </p>
                              </div>
                            </div>
                          </div>
                          <!-- Single Faq -->
                          <div class="ep-faq__accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                              <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseThree"
                                aria-expanded="false"
                                aria-controls="collapseThree"
                              >
                                <span>03</span>Can I get financial for my
                                education?
                              </button>
                            </h2>
                            <div
                              id="collapseThree"
                              class="accordion-collapse collapse"
                              aria-labelledby="headingThree"
                              data-bs-parent="#accordionExample"
                            >
                              <div class="ep-faq__accordion-body">
                                <p class="ep-faq__accordion-text">
                                  The generated is therefore always free from
                                  repetition is the injected humour or words
                                  etc.
                                </p>
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
            <!-- End Faq Area -->
          </div>
          <!-- Start Testimonial Area -->
          <section class="ep-testimonial section-gap">
            <div class="container ep-container">
              <div class="row">
                <div class="col-12">
                  <div class="owl-carousel ep-testimonial__slider">
                    <!-- Single Testimonial -->
                    <div class="ep-testimonial__item position-relative">
                      <div class="ep-testimonial__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                        </ul>
                      </div>
                      <p class="ep-testimonial__desc">
                        Their product exceeded his my daily design routine
                        expectations wa The quality and heres attention to
                        detail were outstanding and it isi has become an
                        essential
                      </p>
                      <div class="ep-testimonial__author">
                        <div class="ep-testimonial__author-img">
                          <img
                            src="assets/images/testimonial/testimonial-1/author-1.png"
                            alt="author-img"
                          />
                        </div>
                        <div class="ep-testimonial__author-info">
                          <h5>Edward Ramirez</h5>
            <div class="container ep-container">
              <div class="row">
                <div class="col-12">
                  <div class="owl-carousel ep-testimonial__slider">
                    <!-- Single Testimonial -->
                    <div class="ep-testimonial__item position-relative">
                      <div class="ep-testimonial__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                        </ul>
                      </div>
                      <p class="ep-testimonial__desc">
                        Their product exceeded his my daily design routine
                        expectations wa The quality and heres attention to
                        detail were outstanding and it isi has become an
                        essential
                      </p>
                      <div class="ep-testimonial__author">
                        <div class="ep-testimonial__author-img">
                          <img
                            src="assets/images/testimonial/testimonial-1/author-1.png"
                            alt="author-img"
                          />
                        </div>
                        <div class="ep-testimonial__author-info">
                          <h5>Edward Ramirez</h5>
                          <p>CEO Of Google</p>
                        </div>
                      </div>
                      <div class="ep-testimonial__shape">
                        <img
                          src="assets/images/testimonial/testimonial-1/dot-shape.svg"
                          alt="dot-pattern"
                        />
                      </div>
                    </div>
                    <!-- Single Testimonial -->
                    <div class="ep-testimonial__item position-relative">
                      <div class="ep-testimonial__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                        </ul>
                      </div>
                      <p class="ep-testimonial__desc">
                        Their product exceeded his my daily design routine
                        expectations wa The quality and heres attention to
                        detail were outstanding and it isi has become an
                        essential
                      </p>
                      <div class="ep-testimonial__author">
                        <div class="ep-testimonial__author-img">
                          <img
                            src="assets/images/testimonial/testimonial-1/author-2.png"
                            alt="author-img"
                          />
                        </div>
                        <div class="ep-testimonial__author-info">
                          <h5>Edward Ramirez</h5>
                          <p>CEO Of Google</p>
                        </div>
                      </div>
                      <div class="ep-testimonial__shape">
                        <img
                          src="assets/images/testimonial/testimonial-1/dot-shape.svg"
                          alt="dot-pattern"
                        />
                      </div>
                    </div>
                    <!-- Single Testimonial -->
                    <div class="ep-testimonial__item position-relative">
                      <div class="ep-testimonial__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                        </ul>
                      </div>
                      <p class="ep-testimonial__desc">
                        Their product exceeded his my daily design routine
                        expectations wa The quality and heres attention to
                        detail were outstanding and it isi has become an
                        essential
                      </p>
                      <div class="ep-testimonial__author">
                        <div class="ep-testimonial__author-img">
                          <img
                            src="assets/images/testimonial/testimonial-1/author-1.png"
                            alt="author-img"
                          />
                        </div>
                        <div class="ep-testimonial__author-info">
                          <h5>Edward Ramirez</h5>
                          <p>CEO Of Google</p>
                        </div>
                      </div>
                      <div class="ep-testimonial__shape">
                        <img
                          src="assets/images/testimonial/testimonial-1/dot-shape.svg"
                          alt="dot-pattern"
                        />
                      </div>
                    </div>
                    <!-- Single Testimonial -->
                    <div class="ep-testimonial__item position-relative">
                      <div class="ep-testimonial__rattings">
                        <ul>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star"></i>
                          </li>
                          <li>
                            <i class="icofont-star off-color"></i>
                          </li>
                        </ul>
                      </div>
                      <p class="ep-testimonial__desc">
                        Their product exceeded his my daily design routine
                        expectations wa The quality and heres attention to
                        detail were outstanding and it isi has become an
                        essential
                      </p>
                      <div class="ep-testimonial__author">
                        <div class="ep-testimonial__author-img">
                          <img
                            src="assets/images/testimonial/testimonial-1/author-2.png"
                            alt="author-img"
                          />
                        </div>
                        <div class="ep-testimonial__author-info">
                          <h5>Edward Ramirez</h5>
                          <p>CEO Of Google</p>
                        </div>
                      </div>
                      <div class="ep-testimonial__shape">
                        <img
                          src="assets/images/testimonial/testimonial-1/dot-shape.svg"
                          alt="dot-pattern"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Testimonial Area -->
          <!-- Start Video Area -->
          <div class="ep-video">
            <div class="container ep-container">
              <div
                class="ep-video__bg background-image ep-hobble position-relative"
                style="
                  background-image: url('assets/images/video/video-1/bg.jpg');
                "
              >
                <a
                  href="https://www.youtube.com/watch?v=gyGsPlt06bo"
                  class="ep-video__btn popup-video ep-hover-layer-2"
                >
                  <i class="fi fi-sr-play"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- End Video Area -->
          <!-- Start Event Area -->
          <section class="ep-blog section-gap position-relative">
            <div class="ep-blog__shape-1 rotate-ani">
              <img
                src="assets/images/blog/blog-1/shape-1.svg"
                alt="shape-1"
              />
            </div>
            <div class="ep-blog__shape-2 updown-ani">
              <img
                src="assets/images/blog/blog-1/shape-2.svg"
                alt="shape-2"
              />
            </div>
            <div class="container ep-container">
              <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-6 col-md-8 col-12">
                  <div class="ep-section-head text-center">
                    <span class="ep-section-head__sm-title ep2-color"
                      >Up coming Events</span
                    >
                    <h3 class="ep-section-head__big-title ep-split-text left">
                      Read Our Latest <span>Events</span> <br />Posts Discover
                    </h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Single Event Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-blog__card wow fadeInUp"
                    data-wow-delay=".3s"
                    data-wow-duration="1s"
                  >
                    <a href="event-details.html" class="ep-blog__img">
                      <img
                        src="assets/images/blog/blog-1/1.png"
                        alt="blog-img"
                      />
                    </a>
                    <div class="ep-blog__info">
                      <div class="ep-blog__date">
                        25 <br />
                        Dec
                      </div>
                      <div class="ep-blog__location">
                        <i class="fi fi-rs-marker"></i>
                        <span>Mirpur Bangladesh</span>
                      </div>
                      <div class="ep-blog__content">
                        <a href="event-details.html" class="ep-blog__title">
                          <h5>Education foundation</h5>
                        </a>
                        <p class="ep-blog__text">
                          Education is the key to stude Unlock your horizons
                          education
                        </p>
                        <div class="ep-blog__btn">
                          <a href="event-details.html"
                            >Read More
                            <i class="fi fi-rs-arrow-small-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single Event Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-blog__card wow fadeInUp"
                    data-wow-delay=".5s"
                    data-wow-duration="1s"
                  >
                    <a href="event-details.html" class="ep-blog__img">
                      <img
                        src="assets/images/blog/blog-1/2.png"
                        alt="blog-img"
                      />
                    </a>
                    <div class="ep-blog__info">
                      <div class="ep-blog__date">
                        25 <br />
                        Dec
                      </div>
                      <div class="ep-blog__location">
                        <i class="fi fi-rs-marker"></i>
                        <span>Mirpur Bangladesh</span>
                      </div>
                      <div class="ep-blog__content">
                        <a href="event-details.html" class="ep-blog__title">
                          <h5>Introduction to Psychology</h5>
                        </a>
                        <p class="ep-blog__text">
                          Education is the key to stude Unlock your horizons
                          education
                        </p>
                        <div class="ep-blog__btn">
                          <a href="event-details.html"
                            >Read More
                            <i class="fi fi-rs-arrow-small-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single Event Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-blog__card wow fadeInUp"
                    data-wow-delay=".7s"
                    data-wow-duration="1s"
                  >
                    <a href="event-details.html" class="ep-blog__img">
                      <img
                        src="assets/images/blog/blog-1/3.png"
                        alt="blog-img"
                      />
                    </a>
                    <div class="ep-blog__info">
                      <div class="ep-blog__date">
                        25 <br />
                        Dec
                      </div>
                      <div class="ep-blog__location">
                        <i class="fi fi-rs-marker"></i>
                        <span>Mirpur Bangladesh</span>
                      </div>
                      <div class="ep-blog__content">
                        <a href="event-details.html" class="ep-blog__title">
                          <h5>Principles of Economics</h5>
                        </a>
                        <p class="ep-blog__text">
                          Education is the key to stude Unlock your horizons
                          education
                        </p>
                        <div class="ep-blog__btn">
                          <a href="event-details.html"
                            >Read More
                            <i class="fi fi-rs-arrow-small-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Event Area -->
        </main>
        <!-- Start Footer Area -->
        <footer class="ep-footer position-relative">
          <div class="container ep-container">
            <div class="ep-footer__top">
              <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                  <div class="ep-footer__widget footer-about">
                    <div class="ep-footer__logo">
                      <a href="index.html">
                        <img
                          src="assets/images/logo-2.svg"
                          alt="footer-logo"
                        />
                      </a>
                    </div>
                    <p class="ep-footer__text">
                      It is a long established fact that a reader will be
                      distracted
                    </p>
                    <div class="ep-footer__contact">
                      <div class="ep-footer__contact-single">
                        <div class="ep-footer__contact-icon">
                          <i class="fi fi-rs-marker"></i>
                        </div>
                        <div class="ep-footer__contact-info">
                          <p>Address</p>
                          <span>66 Broklyant, New York India</span>
                        </div>
                      </div>
                      <div class="ep-footer__contact-single">
                        <div class="ep-footer__contact-icon">
                          <i class="fi fi-rr-phone-call"></i>
                        </div>
                        <div class="ep-footer__contact-info">
                          <p>Phone Number</p>
                          <a href="tel:012 345 678 9101">012 345 678 9101</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                  <div class="ep-footer__widget footer-links">
                    <h4 class="ep-footer__widget-title">About Company</h4>
                    <ul class="ep-footer__links-list">
                      <li>
                        <a href="service.html">Service</a>
                      </li>
                      <li>
                        <a href="faq.html">FAQ</a>
                      </li>
                      <li>
                        <a href="testimonial.html">Testimonial</a>
                      </li>
                      <li>
                        <a href="about.html">About Us</a>
                      </li>
                      <li>
                        <a href="portfolio.html">Portfolio</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                  <div class="ep-footer__widget footer-services">
                    <h4 class="ep-footer__widget-title">Services</h4>
                    <ul class="ep-footer__links-list">
                      <li>
                        <a href="service.html">
                          <i class="fi fi-br-angle-double-small-right"></i
                          >Reliable Rentals
                        </a>
                      </li>
                      <li>
                        <a href="service.html">
                          <i class="fi fi-br-angle-double-small-right"></i
                          >Golden Key Properties
                        </a>
                      </li>
                      <li>
                        <a href="service.html">
                          <i class="fi fi-br-angle-double-small-right"></i>Swift
                          Home Sales
                        </a>
                      </li>
                      <li>
                        <a href="service.html">
                          <i class="fi fi-br-angle-double-small-right"></i>Elite
                          Realty Services
                        </a>
                      </li>
                      <li>
                        <a href="service.html">
                          <i class="fi fi-br-angle-double-small-right"></i>Dream
                          Property Solutions
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                  <div class="ep-footer__widget footer-newsletter">
                    <h4 class="ep-footer__widget-title">Newsletter</h4>
                    <form
                      action="#"
                      method="post"
                      class="ep-footer__newsletter"
                    >
                      <input
                        type="email"
                        name="email"
                        placeholder="Your e-mail"
                        required
                      />
                      <button type="submit">
                        <i class="fi fi-ss-paper-plane"></i>
                      </button>
                    </form>
                    <div class="ep-footer__social">
                      <h5 class="ep-footer__social-title">Follow Us</h5>
                      <ul>
                        <li>
                          <a href="#">
                            <i class="icofont-facebook"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="icofont-twitter"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="icofont-linkedin"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="icofont-pinterest"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="ep-footer__bottom">
              <div class="row">
                <div class="col-lg-6 col-12">
                  <div class="ep-footer__copyright">
                    <p>
                      ©
                      <a target="_blank" href="https://themecorn.com/"
                        >ThemeCorn</a
                      >
                      2024 | All Rights Reserved
                    </p>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="ep-footer__bottom-link">
                    <ul>
                      <li>
                        <a href="#">Terms & Condition</a>
                      </li>
                      <li>
                        <a href="#">Privacy Policy</a>
                      </li>
                      <li>
                        <a href="contact.html">Contact Us</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ep-footer__pattern">
            <img
              src="assets/images/footer/footer-pattern.png"
              alt="footer-pattern"
            />
          </div>
        </footer>
        <!-- End Footer Area -->
      </div>
    </div>

    <!-- Jquery JS -->
    <script src="assets/plugins/js/jquery.min.js"></script>
    <script src="assets/plugins/js/jquery-migrate.js"></script>

    <!-- Bootstrap JS -->
    <script src="assets/plugins/js/bootstrap.min.js"></script>
    <!-- Gsap JS -->
    <script src="assets/plugins/js/gsap/gsap.js"></script>
    <script src="assets/plugins/js/gsap/gsap-scroll-to-plugin.js"></script>
    <script src="assets/plugins/js/gsap/gsap-scroll-smoother.js"></script>
    <script src="assets/plugins/js/gsap/gsap-scroll-trigger.js"></script>
    <script src="assets/plugins/js/gsap/gsap-split-text.js"></script>
    <!-- Wow JS -->
    <script src="assets/plugins/js/wow.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="assets/plugins/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JS -->
    <script src="assets/plugins/js/magnific-popup.min.js"></script>
    <!-- CounterUp  JS -->
    <script src="assets/plugins/js/jquery.counterup.min.js"></script>
    <script src="assets/plugins/js/waypoints.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/plugins/js/nice-select.min.js"></script>
    <!-- Cursor JS -->
    <script src="assets/plugins/js/ep-cursor.js"></script>
    <!-- Back To Top JS -->
    <script src="assets/plugins/js/backToTop.js"></script>
    <!-- Main JS -->
    <script src="assets/plugins/js/active.js"></script>
  </body>

<!-- Mirrored from <?php include 'name.php' ;  ?>-template.vercel.app/<?php include 'name.php' ;  ?>/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:28:30 GMT -->
</html>
