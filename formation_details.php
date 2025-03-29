<?php
session_start();
require_once 'config/database.php';

// Récupération des identifiants depuis l'URL
$id_filiere = $_GET['id_filiere'] ?? 0;
$id_cycle   = $_GET['id_cycle'] ?? 0;

$sql = "SELECT avoir.*, filiere.nom AS filiere_nom, filiere.description AS filiere_desc, cycle.nom AS cycle_nom, cycle.nbre_annee AS cycle_annee
        FROM avoir
        JOIN filiere ON filiere.id_filiere = avoir.id_filiere
        JOIN cycle ON cycle.id_cycle = avoir.id_cycle
        WHERE avoir.id_filiere = :id_filiere AND avoir.id_cycle = :id_cycle";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id_filiere' => $id_filiere,
    ':id_cycle' => $id_cycle
]);
$formation = $stmt->fetch(PDO::FETCH_ASSOC);

// Si la formation n'est pas trouvée, afficher un message
if (!$formation) {
  
    header("Location: formations.php");
}
?>
<!DOCTYPE html>
<html class="no-js" lang="ZXX">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />
    <meta name="keywords" content="formation, éducation, cours, inscription" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <!-- Site Title -->
    <title><?php include 'name.php'; ?> - Détails de la formation</title>
    <!-- Styles et autres inclusions -->
    <link rel="stylesheet" href="assets/plugins/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="ep-magic-cursor">
    <!-- Preloader, Header, Menu, etc... -->
    <?php include_once 'includes/header.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Breadcrumbs Area -->
                <div class="ep-breadcrumbs breadcrumbs-bg background-image" style="background-image: url('assets/images/breadcrumbs-bg.png')">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="ep-breadcrumbs__content">
                                    <h3 class="ep-breadcrumbs__title">Détails de la formation</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li><a href="index.php">Accueil</a></li>
                                        <li><i class="fi-bs-angle-right"></i></li>
                                        <li class="active"><a href="#">Détails formation</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <!-- Course Details Area -->
                <section class="ep-course__details section-gap position-relative">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="col-lg-12 col-xl-8 col-12">
                                <div class="ep-course__details-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Tab Menu -->
                                            <div class="ep-course__tab-menu tab-menu">
                                                <div class="list-group" id="list-tab" role="tablist">
                                                    <a class="list-group-item active" data-bs-toggle="list" href="#overview" role="tab">
                                                        Aperçu
                                                    </a> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <!-- Tab Details -->
                                            <div class="ep-course__tab-details tab-details">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!-- Overview -->
                                                    <div class="tab-pane fade show active" id="overview" role="tabpanel">
                                                    <div class="ep-blog__details-cover">
                                                    <div class="ep-blog__details-cover-img">
                                                            <img src="assets/imgs/formations/<?php echo $formation['photo']; ?>"  alt=""  srcset="">
                                                            </div>
                                                            <!-- Vous pouvez ajouter d'autres sections ou éléments dynamiques ici -->
                                                        </div>
                                                    </div>
                                                    <!-- Curriculum, Formateur et Avis restent inchangés ou à adapter -->
                                                    <div class="tab-pane fade" id="curriculum" role="tabpanel">
                                                        <!-- Contenu du curriculum -->
                                                        <p>Contenu du curriculum...</p>
                                                    </div>
                                                    <div class="tab-pane fade" id="instructor" role="tabpanel">
                                                        <!-- Informations sur le formateur -->
                                                        <p>Informations sur le formateur...</p>
                                                    </div>
                                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                        <!-- Avis et commentaires -->
                                                        <p>Avis des étudiants...</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Tab Details -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-4 col-md-8 col-12">
                                <div class="ep-course__sidebar">

                                    <!-- Autres informations complémentaires -->
                                    <div class="ep-course__sidebar-data">
                                        <h4 class="ep-course__sidebar-title">Informations complémentaires</h4>
                                        <ul class="ep-course__sidebar-data-list">
                                            <li><span>Filière :</span> <strong><?php echo htmlspecialchars($formation['filiere_nom']); ?></strong></li>
                                            <li><span>Cycle :</span> <strong><?php echo htmlspecialchars($formation['cycle_nom']); ?></strong></li>
                                            <li><span>Années :</span> <strong><?php echo htmlspecialchars($formation['cycle_annee']); ?> ans</strong></li>
                                            <li><span>Inscription :</span> <strong><?php echo htmlspecialchars($formation['montant_inscription']); ?> FCFA</strong></li>
                                            <li><span>Scolarité :</span> <strong><?php echo htmlspecialchars($formation['montant_scolarite']); ?> FCFA</strong></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Course Details Area -->
            </main>
            <!-- Start Footer Area -->
            <?php include_once 'includes/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'includes/scripts.php'; ?>
</body>

</html>