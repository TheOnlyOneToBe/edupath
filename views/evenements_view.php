<?php
session_start();
require_once '../config/database.php';

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$evenements_par_page = 6;
$offset = ($page - 1) * $evenements_par_page;

try {
    // Nombre total d'événements
    $sql_count = "SELECT COUNT(*) as total FROM Evenement";
    $stmt_count = $conn->query($sql_count);
    $total_evenements = $stmt_count->fetch(PDO::FETCH_ASSOC)['total'];
    $total_pages = ceil($total_evenements / $evenements_par_page);

    // Récupération des événements avec pagination
    $sql = "SELECT e.*, u.login as organisateur 
            FROM Evenement e 
            LEFT JOIN Utilisateur u ON e.id_utilisateur = u.id_utilisateur 
            ORDER BY e.id_evenement DESC
            LIMIT :offset, :limit";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $evenements_par_page, PDO::PARAM_INT);
    $stmt->execute();
    $evenements = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Événements à venir (pour la sidebar)
    $sql_upcoming = "SELECT * FROM Evenement 
                    ORDER BY id_evenement DESC 
                    LIMIT 3";
    $stmt_upcoming = $conn->query($sql_upcoming);
    $evenements_upcoming = $stmt_upcoming->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des événements.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Événements - EduPath</title>
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
                                    <h2>Nos Événements</h2>
                                    <nav>
                                        <ul>
                                            <li><a href="../index.php">Accueil</a></li>
                                            <li><span>Événements</span></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Liste des événements -->
                <section class="ep-event-page section-gap">
                    <div class="container ep-container">
                        <div class="row">
                            <!-- Événements -->
                            <div class="col-lg-12 col-xl-8 col-12">
                                <div class="row">
                                    <?php foreach ($evenements as $evenement): ?>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="ep-event__card">
                                            <div class="ep-event__content">
                                                <h3 class="ep-event__title">
                                                    <a href="evenement_detail.php?id=<?php echo $evenement['id_evenement']; ?>">
                                                        <?php echo htmlspecialchars($evenement['nom']); ?>
                                                    </a>
                                                </h3>
                                                <div class="ep-event__meta">
                                                    <span><i class="far fa-user"></i> <?php echo htmlspecialchars($evenement['organisateur']); ?></span>
                                                </div>
                                                <p class="ep-event__text">
                                                    <?php echo substr(htmlspecialchars($evenement['description_ev']), 0, 150) . '...'; ?>
                                                </p>
                                                <a href="evenement_detail.php?id=<?php echo $evenement['id_evenement']; ?>" 
                                                   class="ep-btn ep-btn--primary">
                                                    En savoir plus <i class="far fa-arrow-right"></i>
                                                </a>
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
                                        <h4 class="ep-blog__sidebar-title">Événements à venir</h4>
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
