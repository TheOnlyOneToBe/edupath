<?php
session_start();
require_once '../config/database.php';

try {
    // Récupération des filières avec leurs cycles associés
    $sql = "SELECT f.*, c.*, a.frais 
            FROM Filiere f 
            LEFT JOIN Avoir a ON f.id_filiere = a.id_filiere 
            LEFT JOIN Cycle c ON a.id_cycle = c.id_cycle 
            ORDER BY f.nom_filiere, c.nom_cycle";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Regrouper les formations par filière
    $filieres = [];
    foreach ($formations as $formation) {
        $id_filiere = $formation['id_filiere'];
        if (!isset($filieres[$id_filiere])) {
            $filieres[$id_filiere] = [
                'nom' => $formation['nom_filiere'],
                'description' => $formation['description_filiere'],
                'cycles' => []
            ];
        }
        if ($formation['id_cycle']) {
            $filieres[$id_filiere]['cycles'][] = [
                'nom' => $formation['nom_cycle'],
                'description' => $formation['description_cycle'],
                'frais' => $formation['frais']
            ];
        }
    }
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des formations.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Formations - EduPath</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/plugins/css/bootstrap.min.css" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../assets/plugins/css/animate.min.css" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="../assets/plugins/css/owl.carousel.min.css" />
    <!-- Maginific Popup CSS -->
    <link rel="stylesheet" href="../assets/plugins/css/maginific-popup.min.css" />
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="../assets/plugins/css/nice-select.min.css" />
    <!-- Icofont -->
    <link rel="stylesheet" href="../assets/plugins/css/icofont.css" />
    <!-- Uicons -->
    <link rel="stylesheet" href="../assets/plugins/css/uicons.css" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Breadcrumbs -->
                <div class="ep-breadcrumbs breadcrumbs-bg background-image">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb-menu">
                                    <h2>Nos Formations</h2>
                                    <nav>
                                        <ul>
                                            <li><a href="../index.php">Accueil</a></li>
                                            <li><span>Formations</span></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Formations -->
                <section class="ep-course section-gap">
                    <div class="container ep-container">
                        <!-- Liste des formations -->
                        <div class="row">
                            <?php foreach ($filieres as $filiere): ?>
                            <div class="col-lg-6 col-xl-4 col-md-6 col-12">
                                <div class="ep-course__card wow fadeInUp">
                                    <div class="ep-course__content">
                                        <div class="ep-course__category">
                                            <a href="#"><?php echo htmlspecialchars($filiere['nom']); ?></a>
                                        </div>
                                        <h3 class="ep-course__title">
                                            <a href="#"><?php echo htmlspecialchars($filiere['description']); ?></a>
                                        </h3>
                                        
                                        <!-- Cycles disponibles -->
                                        <div class="ep-course__meta">
                                            <h4>Cycles disponibles :</h4>
                                            <ul>
                                                <?php foreach ($filiere['cycles'] as $cycle): ?>
                                                <li>
                                                    <i class="far fa-graduation-cap"></i>
                                                    <?php echo htmlspecialchars($cycle['nom']); ?>
                                                    <?php if ($cycle['frais']): ?>
                                                        <span class="price"><?php echo number_format($cycle['frais'], 0, ',', ' '); ?> FCFA</span>
                                                    <?php endif; ?>
                                                </li>
                                                <li class="description">
                                                    <?php echo htmlspecialchars($cycle['description']); ?>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <div class="ep-course__bottom">
                                            <a href="../contact.php?sujet=Information sur <?php echo urlencode($filiere['nom']); ?>" class="ep-btn ep-btn--primary">
                                                Plus d'informations <i class="far fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>

                <!-- Section CTA -->
                <section class="ep-cta-area section-gap-bottom">
                    <div class="container ep-container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="ep-cta-wrapper background-image">
                                    <div class="row align-items-center">
                                        <div class="col-lg-8">
                                            <div class="ep-cta-content">
                                                <h2 class="ep-cta-title">Besoin d'aide pour choisir votre formation ?</h2>
                                                <p>Notre équipe est là pour vous guider dans votre orientation.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="ep-cta-btn">
                                                <a href="../contact.php" class="ep-btn ep-btn--primary">
                                                    Contactez-nous <i class="far fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <?php include '../includes/footer.php'; ?>
        </div>
    </div>

    <?php include '../includes/scripts.php'; ?>
</body>
</html>
