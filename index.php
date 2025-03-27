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
  <title><?php include 'name.php';  ?> - Éducation, Cours & Formation en Ligne</title>

  <?php include_once 'includes/head.php'; ?>
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
              <img src="assets/images/logo-3.svg" alt="logo" />
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
                    <a href="formations.php">Course</a>
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
                <a href="contact.php">Contact</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- End Mobile Menu Modal -->

  <?php include_once 'includes/header.php' ;?>

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
                      <a href="contact.php" class="ep-hover-layer-2">
                        <i class="fi fi-ss-arrow-up-right"></i>
                      </a>
                    </div>
                    <!-- Image One -->
                    <div class="ep-hero__widget-img">
                      <img
                        src="assets/img/03.jpg"
                        alt="hero-img" />
                    </div>
                    <!-- Team Widget -->
                    <div class="ep-hero__team">
                      <div class="ep-hero__team-img">
                        <ul class="ep-hero__team-img-list">
                          <li>
                            <img
                              src="assets/images/hero/home-1/team/1.png"
                              alt="team-img" />
                          </li>
                          <li>
                            <img
                              src="assets/images/hero/home-1/team/2.png"
                              alt="team-img" />
                          </li>
                          <li>
                            <img
                              src="assets/images/hero/home-1/team/3.png"
                              alt="team-img" />
                          </li>
                          <li>
                            <img
                              src="assets/images/hero/home-1/team/4.png"
                              alt="team-img" />
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- Shape Image -->
                  <div class="ep-hero__shape updown-ani">
                    <img
                      src="assets/images/hero/home-1/shape.svg"
                      alt="shape" />
                  </div>
                  <!-- Widget Two  -->
                  <div class="ep-hero__widget-column">
                    <div class="ep-hero__course">
                      <span class="counter"></span>
                      <p>Filières<br />disponibles</p>
                    </div>
                    <!-- Image Two -->
                    <div class="ep-hero__widget-img">
                      <img
                        src="assets/img/04.avif"
                        alt="hero-img" />
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
              alt="circle-shape" />
          </div>
          <div class="container ep-container">
            <div class="row align-items-center">
              <div class="col-lg-6 col-12">
                <div class="ep-section__img position-relative">
                  <div class="ep-section__img-shape rotate-ani">
                    <img
                      src="assets/images/about/about-1/pattern-shape.svg"
                      alt="pattern-shape" />
                  </div>
                  <div class="ep-section__img-main">
                    <img
                      src="assets/img/01.avif"
                      alt="about-img" />
                  </div>
                  <div class="overview-card updown-ani">
                    <div class="overview-card__icon">
                      <img
                        src="assets/images/about/about-1/user.svg"
                        alt="user-icon" />
                    </div>
                    <div class="overview-card__info">
                      <h4><span>2</span>k+</h4>
                      <p>Etudiants</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="ep-section__content">
                  <div class="ep-section-head">
                    <span class="ep-section-head__sm-title ep1-color">À propos de nous</span>
                    <h3 class="ep-section-head__big-title ep-split-text left">
                      Libérer la puissance <br /> du <span>Savoir</span>
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
                        <h5>Emflamme ta passion pour apprendre</h5>
                        <p>
                          Grace a nos formateurs expérimentés et a une variété de
                          filières a moindre cout vous pouvez participer a vos reves.
                          <strong><a href="contact.php">LANCEZ VOUS</a></strong>
                        </p>
                      </div>
                    </div>
                    <div class="ep-feature-list">
                      <div class="ep-feature-list__icon">
                        <i class="fi fi-ss-check-circle"></i>
                      </div>
                      <div class="ep-feature-list__info">
                        <h5>Découvre ta passion pour apprendre</h5>
                      </div>
                    </div>
                  </div>
                  <div class="ep-section__btn">
                    <a href="about.php" class="ep-btn border-btn">En apprendre plus<i class="fi fi-rs-arrow-small-right"></i>
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
                    Des outils pour <span>Booster</span> <br />votre Apprentissage
                  </h3>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- Single Card -->
              <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                <a
                  href="formations.php"
                  class="ep-category__card wow fadeInUp"
                  data-wow-delay=".5s"
                  data-wow-duration="1s">
                  <div class="ep-category__icon ep2-bg">
                    <img
                      src="assets/images/category/category-1/2.svg"
                      alt="category-icon" />
                  </div>
                  <div class="ep-category__info">
                    <h3>Cours de répétition</h3>
                  </div>
                </a>
              </div>
              <!-- Single Card -->
              <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                <a
                  href="formations.php"
                  class="ep-category__card wow fadeInUp"
                  data-wow-delay=".9s"
                  data-wow-duration="1s">
                  <div class="ep-category__icon ep3-bg">
                    <img
                      src="assets/images/category/category-1/4.svg"
                      alt="category-icon" />
                  </div>
                  <div class="ep-category__info">
                    <h3>Booster votre cerveau</h3>
                  </div>
                </a>
              </div>
              <!-- Single Card -->
              <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                <a
                  href="formations.php"
                  class="ep-category__card wow fadeInUp"
                  data-wow-delay=".7s"
                  data-wow-duration="1s">
                  <div class="ep-category__icon ep6-bg">
                    <img
                      src="assets/images/category/category-1/7.svg"
                      alt="category-icon" />
                  </div>
                  <div class="ep-category__info">
                    <h3>Apprenez ensemble</h3>
                  </div>
                </a>
              </div>
              <!-- Single Card -->
              <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                <a
                  href="formations.php"
                  class="ep-category__card wow fadeInUp"
                  data-wow-delay=".9s"
                  data-wow-duration="1s">
                  <div class="ep-category__icon ep4-bg">
                    <img
                      src="assets/images/category/category-1/8.svg"
                      alt="category-icon" />
                  </div>
                  <div class="ep-category__info">
                    <h3>Une communité pour vous aider</h3>
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
              alt="shape-img-1" />
            <img
              class="shape-2 updown-ani"
              src="assets/images/course/course-1/shape-2.svg"
              alt="shape-img-2" />
            <img
              class="shape-3 updown-ani"
              src="assets/images/course/course-1/shape-3.svg"
              alt="shape-img-3" />
          </div>
          <div class="container ep-container">
            <div class="row">
              <div class="col-12">
                <div class="ep-section-head d-flex-end-between">
                  <div class="ep-section-head__info">
                    <span class="ep-section-head__sm-title ep3-color">Formations Populaires</span>
                    <h3 class="ep-section-head__big-title ep-split-text left">
                      Accédez à nos <span>Ressources</span> <br />d'Apprentissage
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
                  data-wow-duration="1s">
                  <a href="course-details.html" class="ep-course__img">
                    <img
                      src="assets/images/course/course-1/1.png"
                      alt="course-img" />
                  </a>
                  <a href="formations.php" class="ep-course__tag ep1-bg">Math</a>
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
                      <a href="course-details.html" class="ep-course__btn">Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
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
                  data-wow-duration="1s">
                  <a href="course-details.html" class="ep-course__img">
                    <img
                      src="assets/images/course/course-1/2.png"
                      alt="course-img" />
                  </a>
                  <a href="formations.php" class="ep-course__tag ep2-bg">Math</a>
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
                      <a href="course-details.html" class="ep-course__btn">Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
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
                  data-wow-duration="1s">
                  <a href="course-details.html" class="ep-course__img">
                    <img
                      src="assets/images/course/course-1/3.png"
                      alt="course-img" />
                  </a>
                  <a href="formations.php" class="ep-course__tag ep4-bg">Math</a>
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
                      <a href="course-details.html" class="ep-course__btn">Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
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
                  data-wow-duration="1s">
                  <a href="course-details.html" class="ep-course__img">
                    <img
                      src="assets/images/course/course-1/4.png"
                      alt="course-img" />
                  </a>
                  <a href="formations.php" class="ep-course__tag ep7-bg">Math</a>
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
                      <a href="course-details.html" class="ep-course__btn">Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
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
                  data-wow-duration="1s">
                  <a href="course-details.html" class="ep-course__img">
                    <img
                      src="assets/images/course/course-1/5.png"
                      alt="course-img" />
                  </a>
                  <a href="formations.php" class="ep-course__tag ep4-bg">Math</a>
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
                      <a href="course-details.html" class="ep-course__btn">Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
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
                  data-wow-duration="1s">
                  <a href="course-details.html" class="ep-course__img">
                    <img
                      src="assets/images/course/course-1/6.png"
                      alt="course-img" />
                  </a>
                  <a href="formations.php" class="ep-course__tag ep3-bg">Math</a>
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
                      <a href="course-details.html" class="ep-course__btn">Enroll Now <i class="fi fi-rs-arrow-small-right"></i>
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
              alt="dot-pattern" />
          </div>
          <div class="container ep-container">
            <div class="row">
              <div class="col-12">
                <div class="ep-section-head d-flex-end-between">
                  <div class="ep-section-head__info">
                    <span class="ep-section-head__sm-title ep2-color">Our Mentor</span>
                    <h3 class="ep-section-head__big-title ep-split-text left">
                      Meet Our <span>Inspiring</span> <br />
                      Dedicated Mentor
                    </h3>
                  </div>
                  <div class="ep-section-head__btn">
                    <a href="team.html" class="ep-btn">View More <i class="fi fi-rs-arrow-small-right"></i>
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
                  data-wow-duration="1s">
                  <a href="team-details.html" class="ep-team__img">
                    <img
                      src="assets/images/team/team-1/1.png"
                      alt="team-img" />
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
                  data-wow-duration="1s">
                  <a href="team-details.html" class="ep-team__img">
                    <img
                      src="assets/images/team/team-1/2.png"
                      alt="team-img" />
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
                  data-wow-duration="1s">
                  <a href="team-details.html" class="ep-team__img">
                    <img
                      src="assets/images/team/team-1/3.png"
                      alt="team-img" />
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
                    data-wow-duration="1s">
                    <div class="ep-funfact__icon ep3-bg">
                      <img
                        src="assets/images/funfact/funfact-1/1.svg"
                        alt="funfact-icon" />
                    </div>
                    <div class="ep-funfact__info">
                      <h4><span class="counter">2</span>k+</h4>
                      <p>Etudiants inscrits</p>
                    </div>
                  </div>
                </div>
                <!-- Single Funfact Card -->
                <div class="col-xl-auto col-lg-3 col-md-6 col-12">
                  <div
                    class="ep-funfact__card wow fadeInUp"
                    data-wow-delay=".5s"
                    data-wow-duration="1s">
                    <div class="ep-funfact__icon ep1-bg">
                      <img
                        src="assets/images/funfact/funfact-1/2.svg"
                        alt="funfact-icon" />
                    </div>
                    <div class="ep-funfact__info">
                      <h4><span class="counter">10</span>k+</h4>
                      <p>Seances complétées</p>
                    </div>
                  </div>
                </div>
                <!-- Single Funfact Card -->
                <div class="col-xl-auto col-lg-3 col-md-6 col-12">
                  <div
                    class="ep-funfact__card wow fadeInUp"
                    data-wow-delay=".7s"
                    data-wow-duration="1s">
                    <div class="ep-funfact__icon ep8-bg">
                      <img
                        src="assets/images/funfact/funfact-1/3.svg"
                        alt="funfact-icon" />
                    </div>
                    <div class="ep-funfact__info">
                      <h4><span class="counter">100</span>%</h4>
                      <p>Etudiants satisfaits</p>
                    </div>
                  </div>
                </div>
                <!-- Single Funfact Card -->
                <div class="col-xl-auto col-lg-3 col-md-6 col-12">
                  <div
                    class="ep-funfact__card wow fadeInUp"
                    data-wow-delay=".9s"
                    data-wow-duration="1s">
                    <div class="ep-funfact__icon ep7-bg">
                      <img
                        src="assets/images/funfact/funfact-1/4.svg"
                        alt="funfact-icon" />
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
                alt="pattern-2" />
            </div>
            <div class="container ep-container">
              <div class="ep-faq__inner position-relative">
                <div class="ep-faq__pattern-1 rotate-ani">
                  <img
                    src="assets/images/faq/faq-1/pattern-1.svg"
                    alt="pattern-1" />
                </div>
                <div class="row g-0 align-items-center">
                  <div class="col-lg-12 col-xl-6 col-12">
                    <div class="ep-faq__img">
                      <img
                        src="assets/img/16.avif"
                        alt="faq-img" />
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-6 col-12">
                    <div class="ep-faq__content">
                      <div class="ep-section-head">
                        <span class="ep-section-head__sm-title ep1-color">Faq</span>
                        <h3
                          class="ep-section-head__big-title ep-split-text left">
                          Questions <span>fréquement</span> <br />
                          posées
                        </h3>
                      </div>
                      <div
                        class="ep-faq__accordion faq-inner accordion"
                        id="accordionExample">
                        <!-- Single Faq -->
                        <div class="ep-faq__accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button
                              class="accordion-button"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseOne"
                              aria-expanded="true"
                              aria-controls="collapseOne">
                              <span>01</span>Quels sont les bénéfices de
                              l'education ?
                            </button>
                          </h2>
                          <div
                            id="collapseOne"
                            class="accordion-collapse collapse show"
                            aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
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
                              aria-controls="collapseTwo">
                              <span>02</span>Comment trouver la filière de mes reves ?
                            </button>
                          </h2>
                          <div
                            id="collapseTwo"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="ep-faq__accordion-body">
                              <p class="ep-faq__accordion-text">
                                Visitez notre liste de <strong><a href="formations.php">formations.</a></strong><br>
                                Consultez les avis. Comparez et decidez vous l'avenir vous attend !!!!
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
        

        <!-- Start Event Area -->
        <section class="ep-blog section-gap position-relative">
          <div class="ep-blog__shape-1 rotate-ani">
            <img
              src="assets/images/blog/blog-1/shape-1.svg"
              alt="shape-1" />
          </div>
          <div class="ep-blog__shape-2 updown-ani">
            <img
              src="assets/images/blog/blog-1/shape-2.svg"
              alt="shape-2" />
          </div>
          <div class="container ep-container">
            <div class="row justify-content-center">
              <div class="col-lg-12 col-xl-6 col-md-8 col-12">
                <div class="ep-section-head text-center">
                  <span class="ep-section-head__sm-title ep2-color">Evènements a venir</span>
                  <h3 class="ep-section-head__big-title ep-split-text left">
                    Lisez nos recents<span>Evenements</span> <br />
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
                  data-wow-duration="1s">
                  <a href="event-details.html" class="ep-blog__img">
                    <img
                      src="assets/images/blog/blog-1/1.png"
                      alt="blog-img" />
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
                        <a href="event-details.html">Read More
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
                  data-wow-duration="1s">
                  <a href="event-details.html" class="ep-blog__img">
                    <img
                      src="assets/images/blog/blog-1/2.png"
                      alt="blog-img" />
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
                        <a href="event-details.html">Read More
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
                  data-wow-duration="1s">
                  <a href="event-details.html" class="ep-blog__img">
                    <img
                      src="assets/images/blog/blog-1/3.png"
                      alt="blog-img" />
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
                        <a href="event-details.html">Read More
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
      <?php include_once 'includes/footer.php'; ?>
      <!-- End Footer Area -->
    </div>
  </div>

  <?php include_once 'includes/scripts.php' ;?>
</body>

<!-- Mirrored from <?php include 'name.php';  ?>-template.vercel.app/<?php include 'name.php';  ?>/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:28:30 GMT -->

</html>