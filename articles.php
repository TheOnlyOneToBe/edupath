<?php
session_start(); 
require_once 'config/database.php';

$sql = "SELECT * FROM article";
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
                                                    En savoir plus <i class="fi fi-rs-arrow-small-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                     <!-- Conteneur de pagination -->
                     <div class="ep-pagination">
                            <ul class="ep-pagination__list" style="list-style:none; display:flex; gap:10px; justify-content:center;"></ul>
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
    <script>
    document.addEventListener("DOMContentLoaded", function(){
        // Sélectionne toutes les cartes de formation (en tenant compte de l'élément parent colonnes)
        var cardContainers = document.querySelectorAll(".row > .col-lg-6, .row > .col-xl-4, .row > .col-md-6, .row > .col-12");
        // Filtrer uniquement les colonnes contenant une carte de formation
        var cards = [];
        cardContainers.forEach(function(container) {
          if (container.querySelector(".ep-course__card")) {
            cards.push(container);
          }
        });
        
        var cartesParPage = 6; // nombre de formations par page
        var pageActuelle = 1;
        var nombrePages = Math.ceil(cards.length / cartesParPage);

        function afficherPage(page) {
            pageActuelle = page;
            cards.forEach(function(card, index){
                if (index >= (page - 1) * cartesParPage && index < page * cartesParPage){
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
            // Met à jour les liens de pagination
            var liens = document.querySelectorAll(".ep-pagination__list li");
            liens.forEach(function(li, index){
                if(index + 1 === page) {
                    li.classList.add("active");
                } else {
                    li.classList.remove("active");
                }
            });
        }

        // Génère la pagination
        var paginationContainer = document.querySelector(".ep-pagination__list");
        if (paginationContainer) {
            paginationContainer.innerHTML = "";
            for (var i = 1; i <= nombrePages; i++) {
                var li = document.createElement("li");
                // Affichage avec un zéro devant si inférieur à 10 (ex: 01, 02, …)
                var label = (i < 10) ? "0" + i : i;
                li.innerHTML = '<a href="#">' + label + '</a>';
                li.style.cursor = "pointer";
                li.addEventListener("click", (function(page){
                    return function(e) {
                        e.preventDefault();
                        afficherPage(page);
                    }
                })(i));
                paginationContainer.appendChild(li);
            }
        }

        // Affichage initial de la première page
        afficherPage(1);
    });
    </script>
</body>

<!-- Mirrored from edupath-template.vercel.app/edupath/course.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:05 GMT -->

</html>