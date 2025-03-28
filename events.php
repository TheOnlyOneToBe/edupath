<?php
require_once 'config/database.php';

// Determine current page and calculate offset
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$eventsPerPage = 6;
$offset = ($page - 1) * $eventsPerPage;

// Get total number of events to calculate total pages
$sqlCount = "SELECT COUNT(*) AS total FROM evenement";
$stmtCount = $conn->prepare($sqlCount);
$stmtCount->execute();
$totalEvents = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages = ceil($totalEvents / $eventsPerPage);

// Retrieve the events for the current page
$sql = "SELECT * FROM evenement LIMIT :offset, :limit";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $eventsPerPage, PDO::PARAM_INT);
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html class="no-js" lang="ZXX">
  
<!-- Mirrored from <?php include 'name.php' ;  ?>-template.vercel.app/<?php include 'name.php' ;  ?>/event.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:07 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="robots" content="all" />
    <meta
      name="keywords"
      content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement"
    />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- Site Title -->
    <title><?php include 'name.php' ;  ?> - Evènements</title>

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

   <?php include_once 'includes/header.php' ;?>
    <!-- End Header Area -->
    <div id="smooth-wrapper">
      <div id="smooth-content">
        <main>
          <!-- Start Breadcrumbs Area -->
          <div
            class="ep-breadcrumbs breadcrumbs-bg background-image"
            style="background-image: url('assets/images/breadcrumbs-bg.png')"
          >
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="ep-breadcrumbs__content">
                    <h3 class="ep-breadcrumbs__title">Evènements</h3>
                    <ul class="ep-breadcrumbs__menu">
                      <li>
                        <a href="index.php">Index</a>
                      </li>
                      <li>
                        <i class="fi-bs-angle-right"></i>
                      </li>
                      <li class="active">
                        <a href="events.php">Evènements</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Breadcrumbs Area -->
          <!-- Start Event Area -->
          <section class="ep-blog section-gap position-relative">
            <div class="container ep-container">
              <div class="row">
                <?php foreach ($events as $event) : ?>
                  <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                    <div
                      class="ep-blog__card wow fadeInUp"
                      data-wow-delay=".3s"
                      data-wow-duration="1s"
                    >
                      <a href="event-details.php?id=<?php echo $event['id_evenement']; ?>" class="ep-blog__img">
                        <!-- You can change the image source if needed -->
                        <img src="assets/images/blog/blog-1/1.png" alt="Event Image" />
                      </a>
                      <div class="ep-blog__info">
                        <div class="ep-blog__date ep1-bg">
                          25 <br />
                          Dec
                        </div>
                        <div class="ep-blog__location">
                          <i class="fi fi-rs-marker"></i>
                          <span>Localisation</span>
                        </div>
                        <div class="ep-blog__content">
                          <a href="event-detail.php?id=<?php echo $event['id_evenement']; ?>" class="ep-blog__title">
                            <h5><?php echo htmlspecialchars($event['nom']); ?></h5>
                          </a>
                          <p class="ep-blog__text">
                            <?php echo htmlspecialchars($event['description_ev']); ?>
                          </p>
                          <div class="ep-blog__btn">
                            <a href="event-details.php?id=<?php echo $event['id_evenement']; ?>">
                              En apprendre plus <i class="fi fi-rs-arrow-small-right"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <!-- Pagination -->
              <div class="row">
                <div class="col-12">
                  <ul class="ep-pagination__list" style="list-style:none; display:flex; gap:10px; justify-content:center;">
                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="<?php echo ($i === $page) ? 'active' : ''; ?>">
                      <a href="?page=<?php echo $i; ?>">
                        <?php echo ($i < 10) ? '0' . $i : $i; ?>
                      </a>
                    </li>
                    <?php endfor; ?>
                  </ul>
                </div>
              </div>
            </div>
          </section>
          <!-- End Event Area -->
        </main>
        <?php include_once 'includes/footer.php'; ?>
      </div>
    </div>

    <?php include 'includes/scripts.php' ;  ?>
  </body>

<!-- Mirrored from <?php include 'name.php' ;  ?>-template.vercel.app/<?php include 'name.php' ;  ?>/event.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:07 GMT -->
</html>