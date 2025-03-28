<?php
session_start();
require_once 'config/database.php';

// Récupérer les formations populaires (limité à 3)
$sql_formations = "SELECT f.*,c.*, COUNT(a.id_filiere) as nb_inscriptions 
                  FROM Filiere f 
                  LEFT JOIN Avoir a ON f.id_filiere = a.id_filiere 
                  GROUP BY f.id_filiere 
                  ORDER BY nb_inscriptions DESC 
                  ";
$stmt_formations = $conn->query($sql_formations);
$formations = $stmt_formations->fetchAll();

// Récupérer les partenaires
$sql_partenaires = "SELECT * FROM Partenaire ORDER BY nom";
$stmt_partenaires = $conn->query($sql_partenaires);
$partenaires = $stmt_partenaires->fetchAll();

// Récupérer les derniers évènements (3 éléments)
$sql_events = "SELECT * FROM evenement ORDER BY id_evenement DESC LIMIT 3";
$stmt_events = $conn->query($sql_events);
$events = $stmt_events->fetchAll();

// Récupérer les derniers articles (3 éléments)
$sql_articles = "SELECT * FROM article ORDER BY date_pub DESC LIMIT 3";
$stmt_articles = $conn->query($sql_articles);
$articles = $stmt_articles->fetchAll();
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
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
    <title>À propos de <?php include 'name.php' ;  ?> - Votre partenaire éducatif</title>

    <?php include_once 'includes/head.php'; ?>
</head>
<body class="ep-magic-cursor">
    <?php include_once 'user/magic.php'; ?>

    <?php include_once 'includes/header.php' ;?>
    <!-- Section À propos -->
    <section class="ep-about section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2>Bienvenue chez <?php include 'name.php' ;  ?></h2>
                        <p class="lead">Votre partenaire de confiance pour l'excellence académique depuis 2020</p>
                        <p><?php include 'name.php' ;  ?> est un établissement d'enseignement supérieur privé reconnu pour son excellence académique 
                           et son engagement envers la réussite des étudiants. Nous offrons une large gamme de formations 
                           adaptées aux besoins du marché du travail.</p>
                        <div class="stats-row mt-4">
                            <div class="stat-item">
                                <h3>1000+</h3>
                                <p>Étudiants formés</p>
                            </div>
                            <div class="stat-item">
                                <h3>50+</h3>
                                <p>Partenaires</p>
                            </div>
                            <div class="stat-item">
                                <h3>95%</h3>
                                <p>Taux d'insertion</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="assets/img/graduation_948100-880.avif" alt="Campus <?php include 'name.php' ;  ?>" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
    <section
            class="ep-about ep-about--style2 ep-section section-gap position-relative"
          >
            <div class="container ep-container">
              <div class="row">
                <div class="col-12">
                  <div class="ep-section-head ep-section-head--style2">
                    <h3
                      class="ep-section-head__color-title ep1-color ep1-border-color"
                    >
                      1.A propos de nous
                    </h3>
                  </div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                  <div
                    class="ep-section__img ep-section__img--style2 position-relative"
                  >
                    <div class="ep-section__img-main">
                      <img
                        src="assets/img/08.avif"
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
                        <p>Etudiants</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="ep-section__content ep-section__content--style2">
                    <h3 class="ep-section__title ep-split-text left">
                      Notre vision inspirante <br />
                      Et decouvrez qui vous etes
                    </h3>
                    <p class="ep-section__text">
                     Venez decouvrir et faire partie d'un des meilleurs cadres de vies en terme de vie universitaire et d'activités extra scolaire.
                     Profitez d'une cadre excellents et des formateurs de qualité. Le tout a moindre cout
                    </p>
                    <div class="ep-section__widget ep-section__widget--style2">
                      <ul class="ep-feature-list">
                        <li>
                          <i class="fi fi-ss-check-circle"></i>Explorer votre esprit
                        </li>
                        
                      </ul>
                      <ul class="ep-feature-list">
                        <li>
                          <i class="fi fi-ss-check-circle"></i>Université de formation
                        </li>
                        <li>
                          <i class="fi fi-ss-check-circle"></i>Apprenez et avancez
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    <!-- Section Formations Populaires -->
    <section class="popular-courses section-gap bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2>Nos formations les plus populaires</h2>
                <p>Découvrez nos programmes d'excellence</p>
            </div>
            <div class="row">
                <div class="owl-carousel ep-event__slider">
                    <?php foreach ($formations as $formation): ?>
                    <div class="ep-event__card">
                        <a href="formation_detail.php?id_filiere=<?php echo $formation['id_filiere']; ?>&&id_cycle=<?php echo $formation['id_cycle']; ?>" class="ep-event__img">
                            <!-- Update the image source if you have a dedicated formation image -->
                            <img src="assets/img/09.jpeg" alt="formation-img" />
                        </a>
                        <div class="ep-event__info">
                            <div class="ep-event__date ep6-bg">
                                <?php echo $formation['nb_inscriptions']; ?> <?php echo random_int(20,200);?> inscriptions
                            </div>
                            <div class="ep-event__location">
                                <i class="fi fi-rs-marker ep6-color"></i> 
                                <?php echo htmlspecialchars($formation['nom']); ?>
                            </div>
                            <a href="formation_detail.php?id=<?php echo $formation['id_filiere']; ?>" class="ep-event__title">
                                <?php echo htmlspecialchars($formation['nom']); ?>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="formations.php" class="ep-btn ep-btn--primary">Consulter nos formations</a>
            </div>
        </div>
    </section>

    <!-- Section Évènements -->
    <section class="ep-events section-gap bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2>Nos Évènements</h2>
                <p>Découvrez nos derniers évènements</p>
            </div>
            <div class="row">
                <div class="owl-carousel ep-event__slider">
                  <?php foreach ($events as $event): ?>
                  <div class="ep-event__card">
                    <a href="event_detail.php?id=<?php echo $event['id_evenement']; ?>" class="ep-event__img">
                      <img
                        src="assets/images/event/event-1/3.png" 
                        alt="event-img"
                      />
                    </a>
                    <div class="ep-event__info">
                      <div class="ep-event__date ep6-bg">
                        <!-- Placeholder date; update with $event date if available -->
                        <?php echo random_int(1,32);?> Dec
                      </div>
                      <div class="ep-event__location">
                        <i class="fi fi-rs-marker ep6-color"></i>Mirpur Bangladesh
                      </div>
                      <a href="event_detail.php?id=<?php echo $event['id_evenement']; ?>" class="ep-event__title">
                        <?php echo htmlspecialchars($event['nom']); ?>
                      </a>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Articles -->
    <section class="ep-articles section-gap">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2>Nos Articles</h2>
                <p>Découvrez nos derniers articles</p>
            </div>
            <div class="row">
                <?php 
                  $delays = [0.3, 0.5, 0.7];
                  // You can update these image paths if your articles provide an image column
                  $images = [
                      "assets/img/05.avif",
                      "assets/img/18.jpg",
                      "assets/img/16.avif"
                  ];
                  $i = 0;
                  foreach ($articles as $article): 
                ?>
                <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                  <div
                    class="ep-blog__card ep-blog__card--style2 wow fadeInUp"
                    data-wow-delay="<?php echo $delays[$i]; ?>s"
                    data-wow-duration="1s"
                  >
                    <a href="article-details.php?id=<?php echo $article['id_article']; ?>" class="ep-blog__img">
                      <img
                        src="<?php echo $images[$i]; ?>"
                        alt="blog-img"
                      />
                    </a>
                    <div class="ep-blog__info">
                      <div class="ep-blog__date">
                        <?php echo date("d M", strtotime($article['date_pub'])); ?>
                      </div>
                      <div class="ep-blog__content">
                        <div class="ep-blog__meta">
                          <ul>
                            <li><i class="fi-rr-comments"></i>Comments (05)</li>
                            <li>
                              <a href="#">
                                <i class="fi-rr-user"></i>By admin
                              </a>
                            </li>
                          </ul>
                        </div>
                        <a href="article-details.php?id=<?php echo $article['id_article']; ?>" class="ep-blog__title">
                          <h5 class="m-0">
                            <?php echo htmlspecialchars($article['titre']); ?>
                          </h5>
                        </a>
                        <div class="ep-blog__btn">
                          <a href="article-details.php?id=<?php echo $article['id_article']; ?>">
                            Read More
                            <i class="fi fi-rs-arrow-small-right"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php 
                    $i++;
                  endforeach; 
                ?>
            </div>
        </div>
    </section>

    <!-- Start Brand -->
    <div class="ep-brand section-gap pt-0">
        <div class="container ep-container">
          <div class="row">
            <div class="col-12">
              <div class="owl-carousel ep-brand__slider">
                <?php foreach ($partenaires as $partenaire): ?>
                  <a href="#" class="ep-brand__logo ep-brand__logo--style2">
                    <img
                      src="assets/imgs/partenaires/<?php echo htmlspecialchars($partenaire['photo']); ?>"
                      alt="<?php echo htmlspecialchars($partenaire['nom']); ?>"
                    />
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <!-- Ajouter le CSS personnalisé -->
    <style>
        .stats-row {
            display: flex;
            justify-content: space-between;
            margin: 2rem 0;
        }
        .stat-item {
            text-align: center;
            padding: 1rem;
        }
        .stat-item h3 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        .course-card {
            transition: transform 0.3s ease;
        }
        .course-card:hover {
            transform: translateY(-5px);
        }
        .partner-card img {
            max-height: 100px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }
        .partner-card:hover img {
            transform: scale(1.1);
        }
    </style>

    <?php include_once 'includes/scripts.php' ;?>

</body>
</html>