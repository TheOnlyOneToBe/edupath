<?php
require_once 'config/database.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM evenement WHERE id_evenement = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $event = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$event) {
        header("Location: events.php");
        exit;
    }
} else {
    header("Location: events.php");
    exit;
}
?>
<!DOCTYPE html>
<html class="no-js" lang="ZXX">
  
<!-- Mirrored from <?php include 'name.php' ;  ?>-template.vercel.app/<?php include 'name.php' ;  ?>/event-details.html by HTTrack Website Copier/3.x [XR&CO'2014] -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />
    <meta name="keywords" content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- Site Title -->
    <title><?php include 'name.php' ;  ?> - <?php echo htmlspecialchars($event['nom']); ?></title>

    <?php include_once 'includes/head.php' ;?>
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
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>
    <!-- End Back To Top -->


    <!-- Start Header Area -->
    <?php include_once 'includes/header.php'; ?>
    <!-- End Header Area -->

    <div id="smooth-wrapper">
      <div id="smooth-content">
        <main>
          <!-- Start Breadcrumbs Area -->
          <div class="ep-breadcrumbs breadcrumbs-bg background-image" style="background-image: url('assets/images/breadcrumbs-bg.png')">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="ep-breadcrumbs__content">
                    <h3 class="ep-breadcrumbs__title">Détails de l'évènement</h3>
                    <ul class="ep-breadcrumbs__menu">
                      <li>
                        <a href="index.php">Accueil</a>
                      </li>
                      <li>
                        <i class="fi-bs-angle-right"></i>
                      </li>
                      <li class="active">
                        <a href="event-details.php?id=<?php echo $event['id_evenement']; ?>">Détails</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Breadcrumbs Area -->

          <!-- Start Event Details Area -->
          <section class="ep-event__details section-gap position-relative">
            <div class="container ep-container">
              <div class="row">
                <!-- Main Content -->
                <div class="col-lg-12 col-xl-8 col-12">
                  <div class="ep-event__details-content">
                    <!-- Event Title -->
                    <div class="ep-event__widget">
                      <h3 class="ep-event__widget-title"><?php echo htmlspecialchars($event['nom']); ?></h3>
                      <p class="ep-event__widget-text">
                        <?php echo nl2br(htmlspecialchars($event['description_ev'])); ?>
                      </p>
                    </div>
                    <!-- You can add more dynamic sections if your table contains more fields -->
                    <div class="ep-event__widget">
                      <h3 class="ep-event__widget-title">À propos de l'évènement</h3>
                      <p class="ep-event__widget-text">
                        Ceci est une description détaillée de l'évènement. Vous pouvez compléter en ajoutant d'autres informations spécifiques à l'évènement.
                      </p>
                    </div>
                    <!-- Event Location Section (Static or dynamic if available) -->
                    <div class="ep-event__widget">
                      <h3 class="ep-event__widget-title">Localisation de l'évènement</h3>
                      <ul class="ep-event__widget-meta">
                        <li>
                          <i class="fi fi-rs-marker"></i>Emplacement à définir
                        </li>
                        <li><i class="fi fi-rr-clock"></i>Horaire à définir</li>
                      </ul>
                      <div class="ep-event__location-map">
                        <div class="gmap_canvas">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7298.959613692403!2d90.36501104141328!3d23.83709017812546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c17cf9e11737%3A0x44c49aa5dd7c3f00!2sMirpur%20DOHS%20Cultural%20Center!5e0!3m2!1sen!2sbd!4v1721998237394!5m2!1sen!2sbd" width="830" height="320" style="border: 0"></iframe>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Sidebar (Static Content or add dynamic fields as needed) -->
                <div class="col-lg-8 col-xl-4 col-12">
                  <div class="ep-event__sidebar">
                    <h4 class="ep-event__sidebar-title">Informations sur l'évènement</h4>
                    <p class="ep-event__sidebar-text">
                      Informations complémentaires sur l'évènement. Vous pouvez ajouter des informations comme les coûts ou le nombre total de places.
                    </p>
                    <div class="ep-event__checkout">
                      <ul>
                        <li>Coût: <span class="ep3-color">250000 FCFA</span></li>
                        <li>Total Places: <span>250</span></li>
                        <li>Places Réservées: <span>2</span></li>
                      </ul>
                      <div class="ep-event__checkout-btn">
                        <a href="#" class="ep-btn">
                          Réserver maintenant <i class="fi-rs-arrow-small-right"></i>
                        </a>
                      </div>
                    </div>
                    <div class="ep-event__time">
                      <p class="ep-event__time-title">
                        Temps restant pour l'évènement
                      </p>
                      <ul class="ep-event__time-list">
                        <li><?php echo random_int(20,300);?> Jours</li>
                        <li><?php echo random_int(1,12);?></li>
                        <li> <?php echo random_int(10,60);?> Min</li>
                        <li><?php echo random_int(1,6);?> Sec</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Event Details Area -->
        </main>
        <!-- Start Footer Area -->
        <?php include_once 'includes/footer.php'; ?>
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
    <!-- CounterUp JS -->
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
<!-- Mirrored from <?php include 'name.php' ;  ?>-template.vercel.app/<?php include 'name.php' ;  ?>/event-details.html by HTTrack Website Copier/3.x [XR&CO'2014] -->
</html>
