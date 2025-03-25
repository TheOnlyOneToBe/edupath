<?php
session_start();
require_once '../config/database.php';

$id_evenement = $_GET['id'] ?? null;
$error = null;
$evenement = null;
$evenements_upcoming = null;

if (!$id_evenement) {
    header('Location: evenements_view.php');
    exit();
}

try {
    // Récupération de l'événement
    $sql = "SELECT e.*, u.login as organisateur 
            FROM Evenement e 
            LEFT JOIN Utilisateur u ON e.id_utilisateur = u.id_utilisateur 
            WHERE e.id_evenement = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_evenement]);
    $evenement = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$evenement) {
        header('Location: evenements_view.php');
        exit();
    }

    // Récupération des événements à venir
    $sql_upcoming = "SELECT * FROM Evenement 
                    WHERE id_evenement != :id
                    ORDER BY id_evenement DESC 
                    LIMIT 3";
    $stmt_upcoming = $conn->prepare($sql_upcoming);
    $stmt_upcoming->execute([':id' => $id_evenement]);
    $evenements_upcoming = $stmt_upcoming->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    $error = "Erreur lors de la récupération de l'événement.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?php echo htmlspecialchars($evenement['nom']); ?> - EduPath</title>
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
                                    <h2><?php echo htmlspecialchars($evenement['nom']); ?></h2>
                                    <nav>
                                        <ul>
                                            <li><a href="../index.php">Accueil</a></li>
                                            <li><a href="evenements_view.php">Événements</a></li>
                                            <li><span>Détail</span></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu de l'événement -->
                <section class="ep-event-details section-gap">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="col-lg-12 col-xl-8 col-12">
                                <div class="ep-event-details__wrapper">
                                    <div class="ep-event-details__content">
                                        <div class="ep-event__meta">
                                            <span><i class="far fa-user"></i> Organisateur: <?php echo htmlspecialchars($evenement['organisateur']); ?></span>
                                        </div>

                                        <div class="ep-event-details__text">
                                            <?php echo nl2br(htmlspecialchars($evenement['description_ev'])); ?>
                                        </div>

                                        <!-- Partage social -->
                                        <div class="ep-event-details__social">
                                            <h4>Partager cet événement :</h4>
                                            <ul class="social-list">
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" 
                                                       target="_blank">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>&text=<?php echo urlencode($evenement['nom']); ?>" 
                                                       target="_blank">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>&title=<?php echo urlencode($evenement['nom']); ?>" 
                                                       target="_blank">
                                                        <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sidebar -->
                            <div class="col-lg-6 col-xl-4 col-md-8 col-12">
                                <div class="ep-blog__sidebar">
                                    <!-- Recherche -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-title">Rechercher</h4>
                                        <form action="evenements_search.php" method="GET" class="ep-blog__search">
                                            <input type="text" name="q" placeholder="Rechercher un événement...">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </form>
                                    </div>

                                    <!-- Événements à venir -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-title">Autres Événements</h4>
                                        <div class="ep-event__latest">
                                            <?php foreach ($evenements_upcoming as $upcoming): ?>
                                            <div class="ep-event__latest-item">
                                                <div class="ep-event__latest-content">
                                                    <h5>
                                                        <a href="evenement_detail.php?id=<?php echo $upcoming['id_evenement']; ?>">
                                                            <?php echo htmlspecialchars($upcoming['nom']); ?>
                                                        </a>
                                                    </h5>
                                                    <p><?php echo substr(htmlspecialchars($upcoming['description_ev']), 0, 100) . '...'; ?></p>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
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
