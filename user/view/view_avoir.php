<?php
session_start();
require_once '../../config/database.php';

$id_filiere = $_GET['filiere'] ?? null;
$id_cycle = $_GET['cycle'] ?? null;
$error = '';
$avoir = null;

if (!$id_filiere || !$id_cycle) {
    header('Location: ../list/avoir.php');
    exit();
}

// Récupération des données de l'association
try {
    $sql = "SELECT a.*, f.nom as nom_filiere, f.description as description_filiere, 
            c.nom as nom_cycle, c.nbre_annee 
            FROM Avoir a 
            JOIN Filiere f ON a.id_filiere = f.id_filiere 
            JOIN Cycle c ON a.id_cycle = c.id_cycle 
            WHERE a.id_filiere = :id_filiere AND a.id_cycle = :id_cycle";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id_filiere' => $id_filiere,
        ':id_cycle' => $id_cycle
    ]);
    $avoir = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$avoir) {
        header('Location: ../list/avoir.php');
        exit();
    }
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des données.";
}

// Calcul du coût total pour le cycle complet
$cout_total_cycle = 0;
if ($avoir) {
    $cout_annuel = $avoir['montant_scolarite'];
    $nbre_annees = intval($avoir['nbre_annee']);
    $cout_total_cycle = $avoir['montant_inscription'] + ($cout_annuel * $nbre_annees);
}
?>

<!DOCTYPE html>
<html class="no-js" lang="ZXX">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

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
    <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.svg" />

    <!-- Site Title -->
    <title>Détails des Frais | EduPath</title>
    <?php include_once '../edit/css.php'; ?>
    <link rel="stylesheet" href="../list/style.css">
</head>

                      <body class="ep-magic-cursor"><?php include_once '../include/navbar.php'; ?>
    <?php include_once '../magic.php'; ?>

    <!-- End Header Area -->
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Start Breadcrumbs Area -->
                <div
                    class="ep-breadcrumbs breadcrumbs-bg background-image"
                    style="background-image: url('../../assets/images/breadcrumbs-bg.png')"
                >
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="ep-breadcrumbs__content">
                                    <h3 class="ep-breadcrumbs__title">Détails des Frais</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li>
                                            <a href="../dashboard.php">Tableau de bord</a>
                                        </li>
                                        <li>
                                            <i class="fi-bs-angle-right"></i>
                                        </li>
                                        <li>
                                            <a href="../list/avoir.php">Frais de scolarité</a>
                                        </li>
                                        <li>
                                            <i class="fi-bs-angle-right"></i>
                                        </li>
                                        <li class="active">
                                            <a href="#">Détails</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <!-- Start Blog Details Area -->
                <section class="ep-blog__details section-gap position-relative">
                    <div class="container ep-container">
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        
                        <?php if ($avoir): ?>
                        <div class="row">
                            <div class="col-lg-12 col-xl-8 col-12">
                                <div class="ep-blog__details-main">
                                    <div class="ep-blog__details-top">
                                        <span class="ep-blog__details-category"><?php echo htmlspecialchars($avoir['nom_cycle']); ?></span>
                                        <h2 class="ep-blog__details-title">
                                            <?php echo htmlspecialchars($avoir['nom_filiere']); ?>
                                        </h2>
                                        <div class="ep-blog__details-cover">
                                            <div class="ep-blog__details-cover-img">
                                                <img
                                                    src="../../assets/img/concept-technologie-apprentissage-electronique-webinar-education-ligne-cours-ligne-ai-apprentissage-automatique_1006743-555.jpg"
                                                    alt="filiere-img"
                                                />
                                            </div>
                                            <div class="ep-blog__details-date">
                                                <?php echo htmlspecialchars($avoir['nbre_annee']); ?> année(s)
                                            </div>
                                            <ul class="ep-blog__details-meta">
                                                <li><i class="fi-rr-money-check"></i>Inscription: <?php echo number_format($avoir['montant_inscription'], 0, ',', ' '); ?> FCFA</li>
                                                <li><i class="fi fi-rr-book-alt"></i>Scolarité: <?php echo number_format($avoir['montant_scolarite'], 0, ',', ' '); ?> FCFA</li>
                                            </ul>
                                        </div>
                                        <?php if (!empty($avoir['description_filiere'])): ?>
                                        <p class="ep-blog__details-text">
                                            <?php echo htmlspecialchars($avoir['description_filiere']); ?>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="ep-blog__details-widget">
                                        <h3 class="ep-blog__details-widget-title">
                                            Détails des frais de scolarité
                                        </h3>
                                        <p class="ep-blog__details-text">
                                            Voici le détail des frais pour la filière <?php echo htmlspecialchars($avoir['nom_filiere']); ?> 
                                            en cycle <?php echo htmlspecialchars($avoir['nom_cycle']); ?>.
                                        </p>
                                        
                                        <ul class="ep-blog__details-list">
                                            <li>
                                                <i class="fi fi-rs-check"></i> Frais d'inscription: 
                                                <strong><?php echo number_format($avoir['montant_inscription'], 0, ',', ' '); ?> FCFA</strong>
                                            </li>
                                            <li>
                                                <i class="fi fi-rs-check"></i> Frais de scolarité annuels: 
                                                <strong><?php echo number_format($avoir['montant_scolarite'], 0, ',', ' '); ?> FCFA</strong>
                                            </li>
                                            <li>
                                                <i class="fi fi-rs-check"></i> Durée du cycle: 
                                                <strong><?php echo htmlspecialchars($avoir['nbre_annee']); ?> année(s)</strong>
                                            </li>
                                            <li>
                                                <i class="fi fi-rs-check"></i> Coût total pour le cycle complet: 
                                                <strong><?php echo number_format($cout_total_cycle, 0, ',', ' '); ?> FCFA</strong>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="ep-blog__details-share">
                                        <h4 class="ep-blog__details-share-title">Actions</h4>
                                        <ul class="ep-blog__details-share-list">
                                            <li>
                                                <a href="../edit/edit_avoir.php?filiere=<?php echo $avoir['id_filiere']; ?>&cycle=<?php echo $avoir['id_cycle']; ?>" class="facebook">
                                                    <i class="icofont-edit"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../delete/delete_avoir.php?filiere=<?php echo $avoir['id_filiere']; ?>&cycle=<?php echo $avoir['id_cycle']; ?>" 
                                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette association ?');" 
                                                   class="twitter">
                                                    <i class="icofont-trash"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../list/avoir.php" class="linkedin">
                                                    <i class="icofont-listine-dots"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-xl-4 col-12">
                                <div class="ep-blog__sidebar">
                                    <!-- Résumé des coûts -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-widget-title">Résumé des coûts</h4>
                                        <div class="ep-blog__sidebar-category">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <span>Inscription</span>
                                                        <span><?php echo number_format($avoir['montant_inscription'], 0, ',', ' '); ?> FCFA</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span>Scolarité (annuelle)</span>
                                                        <span><?php echo number_format($avoir['montant_scolarite'], 0, ',', ' '); ?> FCFA</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span>Durée du cycle</span>
                                                        <span><?php echo htmlspecialchars($avoir['nbre_annee']); ?> année(s)</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="active">
                                                        <span>Coût total</span>
                                                        <span><?php echo number_format($cout_total_cycle, 0, ',', ' '); ?> FCFA</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <!-- Boutons d'action -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-widget-title">Actions</h4>
                                        <div class="ep-blog__sidebar-btn">
                                            <a href="../edit/edit_avoir.php?filiere=<?php echo $avoir['id_filiere']; ?>&cycle=<?php echo $avoir['id_cycle']; ?>" class="ep-btn">
                                                <i class="icofont-edit"></i> Modifier
                                            </a>
                                        </div>
                                        <div class="ep-blog__sidebar-btn mt-3">
                                            <a href="../list/avoir.php" class="ep-btn ep-btn-secondary">
                                                <i class="icofont-listine-dots"></i> Retour à la liste
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
                <!-- End Blog Details Area -->
            </main>
            <?php include_once '../include/footer.php'; ?>
        </div>
    </div>

    <?php include_once '../edit/script.php'; ?>
</body>
</html>