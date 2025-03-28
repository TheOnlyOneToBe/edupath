<?php
session_start();
require_once 'config/database.php';

// Récupérer les formations populaires
$sql_formations = "SELECT f.*, COUNT(a.id_filiere) as nb_inscriptions 
                  FROM Filiere f 
                  LEFT JOIN Avoir a ON f.id_filiere = a.id_filiere 
                  GROUP BY f.id_filiere 
                  ORDER BY nb_inscriptions DESC 
                  LIMIT 4";
$stmt_formations = $conn->query($sql_formations);
$formations = $stmt_formations->fetchAll();

// Récupérer les partenaires
$sql_partenaires = "SELECT * FROM Partenaire ORDER BY nom";
$stmt_partenaires = $conn->query($sql_partenaires);
$partenaires = $stmt_partenaires->fetchAll();
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
                    <img src="assets/images/about-main.jpg" alt="Campus <?php include 'name.php' ;  ?>" class="img-fluid rounded">
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
                <?php foreach ($formations as $formation): ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="course-card">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($formation['nom']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($formation['description']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-4">
                <a href="formations.php" class="ep-btn ep-btn--primary">Consulter nos formations</a>
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