<?php
session_start();
require_once '../../config/database.php';

// Get evenement ID from URL parameter
$id_evenement = $_GET['id'] ?? null;

if (!$id_evenement) {
    header('Location: ../list/evenements.php');
    exit();
}

try {
    // Get detailed information about the event
    $sql = "SELECT e.*, u.login as organisateur, u.fonction as fonction_organisateur 
            FROM Evenement e 
            LEFT JOIN Utilisateur u ON e.id_utilisateur = u.id_utilisateur 
            WHERE e.id_evenement = :id_evenement";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_evenement' => $id_evenement]);
    $evenement = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$evenement) {
        $_SESSION['error'] = "Cet événement n'existe pas.";
        header('Location: ../list/evenements.php');
        exit();
    }
} catch(PDOException $e) {
    $_SESSION['error'] = "Erreur lors de la récupération des détails de l'événement.";
    header('Location: ../list/evenements.php');
    exit();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Détails de l'Événement | EduPath</title>
    <?php include_once '../edit/css.php'; ?>
</head>

<body class="ep-magic-cursor">
    <?php include_once '../magic.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Start Breadcrumbs Area -->
                <div class="ep-breadcrumbs breadcrumbs-bg background-image" 
                     style="background-image: url('../../assets/images/breadcrumbs-bg.png')">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="ep-breadcrumbs__content">
                                    <h3 class="ep-breadcrumbs__title">Détails de l'Événement</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li><a href="../dashboard.php">Tableau de bord</a></li>
                                        <li><i class="fi-bs-angle-right"></i></li>
                                        <li><a href="../list/evenements.php">Événements</a></li>
                                        <li><i class="fi-bs-angle-right"></i></li>
                                        <li class="active">Détails</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <section class="ep-contact section-gap position-relative pb-0">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="ep-blog__card wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                    <div class="ep-blog__info">
                                        <div class="ep-blog__date ep1-bg">
                                            <i class="fi fi-rs-calendar"></i>
                                        </div>
                                        <div class="ep-blog__content">
                                            <h3 class="ep-blog__title mb-4">
                                                <?php echo htmlspecialchars($evenement['nom']); ?>
                                            </h3>

                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <h5>Description</h5>
                                                    <p><?php echo nl2br(htmlspecialchars($evenement['description_ev'])); ?></p>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <h5>Organisateur</h5>
                                                    <p>
                                                        <?php echo htmlspecialchars($evenement['organisateur'] ?? 'Non assigné'); ?>
                                                        (<?php echo htmlspecialchars($evenement['fonction_organisateur'] ?? 'N/A'); ?>)
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="ep-blog__btn d-flex justify-content-between">
                                                <a href="../list/evenements.php" class="ep-btn">
                                                    <i class="fi fi-rs-arrow-small-left"></i> Retour à la liste
                                                </a>
                                                <?php if (isset($_SESSION['id_utilisateur']) && $_SESSION['id_utilisateur'] == $evenement['id_utilisateur']): ?>
                                                <div>
                                                    <a href="../edit/edit_evenement.php?id=<?php echo $evenement['id_evenement']; ?>" 
                                                       class="ep-btn ep-btn-primary">
                                                        <i class="fi fi-rs-edit"></i> Modifier
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <?php include_once '../include/footer.php'; ?>
        </div>
    </div>

    <?php include_once '../edit/script.php'; ?>
</body>
</html>