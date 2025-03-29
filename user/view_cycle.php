<?php
session_start();
require_once '../config/database.php';

// Get cycle ID from URL parameter
$id_cycle = $_GET['id'] ?? null;

if (!$id_cycle) {
    header('Location: /cycles.php');
    exit();
}

try {
    // Get detailed information about the cycle
    $sql = "SELECT c.*, 
            (SELECT COUNT(DISTINCT id_filiere) FROM Avoir WHERE id_cycle = c.id_cycle) as nb_filieres
            FROM Cycle c 
            WHERE c.id_cycle = :id_cycle";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_cycle' => $id_cycle]);
    $cycle = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cycle) {
        $_SESSION['error'] = "Ce cycle n'existe pas.";
        header('Location: /cycles.php');
        exit();
    }
    
    // Get filières associated with this cycle
    $sql = "SELECT f.id_filiere, f.nom, f.description, a.montant_inscription, a.montant_scolarite
            FROM Avoir a
            JOIN Filiere f ON a.id_filiere = f.id_filiere
            WHERE a.id_cycle = :id_cycle
            ORDER BY f.nom";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_cycle' => $id_cycle]);
    $filieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    $_SESSION['error'] = "Erreur lors de la récupération des détails du cycle.";
    header('Location: /cycles.php');
    exit();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="ZXX">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />
    <meta name="keywords" content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.svg" />

    <!-- Site Title -->
    <title>Détails du Cycle | <?php include '../name.php' ;  ?></title>
    <?php include_once 'css.php'; ?>
</head>

                      <body class="ep-magic-cursor"><?php include_once 'include/navbar.php'; ?>
    <?php include_once 'magic.php'; ?>

    <!-- End Header Area -->
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
              
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="ep-breadcrumbs__content">
                                    <h3 class="ep-breadcrumbs__title">Détails du Cycle</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li>
                                            <a href="  dashboard.php">Tableau de bord</a>
                                        </li>
                                        <li>
                                            <i class="fi-bs-angle-right"></i>
                                        </li>
                                        <li>
                                            <a href="/cycles.php">Cycles</a>
                                        </li>
                                        <li>
                                            <i class="fi-bs-angle-right"></i>
                                        </li>
                                        <li class="active">
                                            <a href="#"><?php echo htmlspecialchars($cycle['nom']); ?></a>
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
                        <div class="row">
                            <div class="col-lg-12 col-xl-8 col-12">
                                <div class="ep-blog__details-main">
                                    <div class="ep-blog__details-top">
                                        <span class="ep-blog__details-category">Cycle d'études</span>
                                        <h2 class="ep-blog__details-title">
                                            <?php echo htmlspecialchars($cycle['nom']); ?>
                                        </h2>
                                        <div class="ep-blog__details-cover">
                                            <div class="ep-blog__details-cover-img">
                                    
                                            </div>
                                            <div class="ep-blog__details-date">
                                                <?php echo htmlspecialchars($cycle['nbre_annee']); ?> <br />
                                                an(s)
                                            </div>
                                            <ul class="ep-blog__details-meta">
                                                <li><i class="fi fi-rr-graduation-cap"></i>Filières associées: <?php echo $cycle['nb_filieres']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <?php if (count($filieres) > 0): ?>
                                    <div class="ep-blog__details-widget">
                                        <h3 class="ep-blog__details-widget-title">
                                            Filières associées à ce cycle
                                        </h3>
                                        
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Filière</th>
                                                        <th>Inscription</th>
                                                        <th>Scolarité</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($filieres as $filiere): ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($filiere['nom']); ?></td>
                                                        <td><?php echo number_format($filiere['montant_inscription'], 0, ',', ' '); ?> FCFA</td>
                                                        <td><?php echo number_format($filiere['montant_scolarite'], 0, ',', ' '); ?> FCFA</td>
                                                        <td>
                                                            <a href="view_avoir.php?filiere=<?php echo $filiere['id_filiere']; ?>&cycle=<?php echo $id_cycle; ?>" 
                                                               class="btn btn-sm btn-info">
                                                                <i class="icofont-info-circle"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="ep-blog__details-widget">
                                        <p>Aucune filière n'est associée à ce cycle pour le moment.</p>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <div class="ep-blog__details-share">
                                        <h4 class="ep-blog__details-share-title">Actions</h4>
                                        <ul class="ep-blog__details-share-list">
                                            <li>
                                                <a href="edit_cycle.php?id=<?php echo $cycle['id_cycle']; ?>" class="facebook">
                                                    <i class="icofont-edit"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="delete/delete_cycle.php?id=<?php echo $cycle['id_cycle']; ?>" 
                                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cycle ?');" 
                                                   class="twitter">
                                                    <i class="icofont-trash"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/cycles.php" class="linkedin">
                                                    <i class="icofont-listine-dots"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-xl-4 col-12">
                                <div class="ep-blog__sidebar">
                                    <!-- Résumé du cycle -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-widget-title">Informations du cycle</h4>
                                        <div class="ep-blog__sidebar-category">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <span>Nom</span>
                                                        <span><?php echo htmlspecialchars($cycle['nom']); ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span>Durée</span>
                                                        <span><?php echo htmlspecialchars($cycle['nbre_annee']); ?> année(s)</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="active">
                                                        <span>Filières associées</span>
                                                        <span><?php echo $cycle['nb_filieres']; ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <!-- Boutons d'action -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-widget-title">Actions</h4>
                                        <div class="ep-blog__sidebar-btn">
                                            <a href="edit_cycle.php?id=<?php echo $cycle['id_cycle']; ?>" class="ep-btn">
                                                <i class="icofont-edit"></i> Modifier
                                            </a>
                                        </div>
                                        <div class="ep-blog__sidebar-btn mt-3">
                                            <a href="/cycles.php" class="ep-btn ep-btn-secondary">
                                                <i class="icofont-listine-dots"></i> Retour à la liste
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Blog Details Area -->
            </main>
            <?php include_once '    include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>
</html>
