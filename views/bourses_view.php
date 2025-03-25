<?php
session_start();
require_once '../config/database.php';

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$bourses_par_page = 6;
$offset = ($page - 1) * $bourses_par_page;

try {
    // Nombre total de bourses
    $sql_count = "SELECT COUNT(*) as total FROM Bourse";
    $stmt_count = $conn->query($sql_count);
    $total_bourses = $stmt_count->fetch(PDO::FETCH_ASSOC)['total'];
    $total_pages = ceil($total_bourses / $bourses_par_page);

    // Récupération des bourses avec pagination
    $sql = "SELECT b.*, u.login as gestionnaire 
            FROM Bourse b 
            LEFT JOIN Utilisateur u ON b.id_utilisateur = u.id_utilisateur 
            ORDER BY b.id_bourse DESC
            LIMIT :offset, :limit";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $bourses_par_page, PDO::PARAM_INT);
    $stmt->execute();
    $bourses = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des bourses.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Bourses Disponibles - EduPath</title>
    <?php include '../includes/head.php'; ?>
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
                                    <h2>Bourses Disponibles</h2>
                                    <nav>
                                        <ul>
                                            <li><a href="../index.php">Accueil</a></li>
                                            <li><span>Bourses</span></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Liste des bourses -->
                <section class="ep-scholarship-page section-gap">
                    <div class="container ep-container">
                        <div class="row">
                            <!-- Bourses -->
                            <div class="col-12">
                                <div class="row">
                                    <?php foreach ($bourses as $bourse): ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="ep-scholarship__card">
                                            <div class="ep-scholarship__content">
                                                <div class="ep-scholarship__icon">
                                                    <i class="fas fa-graduation-cap"></i>
                                                </div>
                                                <div class="ep-scholarship__text">
                                                    <p><?php echo nl2br(htmlspecialchars($bourse['caracteristique'])); ?></p>
                                                </div>
                                                <div class="ep-scholarship__meta">
                                                    <span>
                                                        <i class="far fa-user"></i> 
                                                        Gestionnaire: <?php echo htmlspecialchars($bourse['gestionnaire']); ?>
                                                    </span>
                                                </div>
                                                <?php if (isset($_SESSION['user'])): ?>
                                                <a href="#" class="ep-btn ep-btn--primary" 
                                                   onclick="contactGestionnaire('<?php echo htmlspecialchars($bourse['gestionnaire']); ?>')">
                                                    Contacter le gestionnaire
                                                </a>
                                                <?php else: ?>
                                                <a href="../login.php" class="ep-btn ep-btn--primary">
                                                    Connectez-vous pour postuler
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Pagination -->
                                <?php if ($total_pages > 1): ?>
                                <div class="ep-pagination">
                                    <ul class="ep-pagination__list">
                                        <?php if ($page > 1): ?>
                                            <li>
                                                <a href="?page=<?php echo ($page - 1); ?>">
                                                    <i class="far fa-angle-left"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        
                                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                            <li <?php echo $i == $page ? 'class="active"' : ''; ?>>
                                                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endfor; ?>
                                        
                                        <?php if ($page < $total_pages): ?>
                                            <li>
                                                <a href="?page=<?php echo ($page + 1); ?>">
                                                    <i class="far fa-angle-right"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section Contact -->
                <section class="ep-cta-area section-gap-bottom">
                    <div class="container ep-container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="ep-cta-wrapper background-image">
                                    <div class="row align-items-center">
                                        <div class="col-lg-8">
                                            <div class="ep-cta-content">
                                                <h2 class="ep-cta-title">Besoin d'aide pour votre demande de bourse ?</h2>
                                                <p>Notre équipe est là pour vous guider dans vos démarches.</p>
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
    <script>
        function contactGestionnaire(gestionnaire) {
            // Redirection vers le formulaire de contact avec pré-remplissage
            window.location.href = '../contact.php?sujet=Demande de bourse&destinataire=' + encodeURIComponent(gestionnaire);
        }
    </script>
</body>
</html>
