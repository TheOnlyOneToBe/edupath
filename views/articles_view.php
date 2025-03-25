<?php
session_start();
require_once '../config/database.php';

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$articles_par_page = 6;
$offset = ($page - 1) * $articles_par_page;

try {
    // Récupération du nombre total d'articles
    $sql_count = "SELECT COUNT(*) as total FROM Article";
    $stmt_count = $conn->query($sql_count);
    $total_articles = $stmt_count->fetch(PDO::FETCH_ASSOC)['total'];
    $total_pages = ceil($total_articles / $articles_par_page);

    // Récupération des articles avec pagination
    $sql = "SELECT a.*, u.login as auteur 
            FROM Article a 
            LEFT JOIN Utilisateur u ON a.id_utilisateur = u.id_utilisateur 
            ORDER BY a.date_pub DESC
            LIMIT :offset, :limit";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $articles_par_page, PDO::PARAM_INT);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Récupération des articles récents pour la sidebar
    $sql_recent = "SELECT id_article, titre, photo, date_pub 
                  FROM Article 
                  ORDER BY date_pub DESC 
                  LIMIT 3";
    $stmt_recent = $conn->query($sql_recent);
    $articles_recent = $stmt_recent->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des articles.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Articles - EduPath</title>
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
                                    <h2>Nos Articles</h2>
                                    <nav>
                                        <ul>
                                            <li><a href="../index.php">Accueil</a></li>
                                            <li><span>Articles</span></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Articles -->
                <section class="ep-blog-page section-gap position-relative">
                    <div class="container ep-container">
                        <div class="row">
                            <!-- Liste des articles -->
                            <div class="col-lg-12 col-xl-8 col-12">
                                <div class="ep-blog__list">
                                    <?php foreach ($articles as $article): ?>
                                    <div class="ep-blog__card ep-blog__card--style2">
                                        <a href="article_detail.php?id=<?php echo $article['id_article']; ?>" class="ep-blog__img">
                                            <?php if ($article['photo']): ?>
                                                <img src="<?php echo htmlspecialchars($article['photo']); ?>" alt="<?php echo htmlspecialchars($article['titre']); ?>">
                                            <?php endif; ?>
                                        </a>
                                        <div class="ep-blog__content">
                                            <div class="ep-blog__meta">
                                                <span><i class="far fa-calendar"></i> <?php echo date('d/m/Y', strtotime($article['date_pub'])); ?></span>
                                                <span><i class="far fa-user"></i> <?php echo htmlspecialchars($article['auteur']); ?></span>
                                            </div>
                                            <h3 class="ep-blog__title">
                                                <a href="article_detail.php?id=<?php echo $article['id_article']; ?>">
                                                    <?php echo htmlspecialchars($article['titre']); ?>
                                                </a>
                                            </h3>
                                            <p class="ep-blog__text">
                                                <?php echo substr(htmlspecialchars($article['description_art']), 0, 200) . '...'; ?>
                                            </p>
                                            <a href="article_detail.php?id=<?php echo $article['id_article']; ?>" class="ep-btn ep-btn--primary">
                                                Lire la suite <i class="far fa-arrow-right"></i>
                                            </a>
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
                                        <form action="articles_search.php" method="GET" class="ep-blog__search">
                                            <input type="text" name="q" placeholder="Rechercher un article...">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </form>
                                    </div>

                                    <!-- Articles récents -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-title">Articles Récents</h4>
                                        <div class="ep-blog__latest">
                                            <?php foreach ($articles_recent as $recent): ?>
                                            <div class="ep-blog__latest-item">
                                                <?php if ($recent['photo']): ?>
                                                <div class="ep-blog__latest-img">
                                                    <a href="article_detail.php?id=<?php echo $recent['id_article']; ?>">
                                                        <img src="<?php echo htmlspecialchars($recent['photo']); ?>" 
                                                             alt="<?php echo htmlspecialchars($recent['titre']); ?>">
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                                <div class="ep-blog__latest-content">
                                                    <h5>
                                                        <a href="article_detail.php?id=<?php echo $recent['id_article']; ?>">
                                                            <?php echo htmlspecialchars($recent['titre']); ?>
                                                        </a>
                                                    </h5>
                                                    <span>
                                                        <i class="far fa-calendar"></i>
                                                        <?php echo date('d/m/Y', strtotime($recent['date_pub'])); ?>
                                                    </span>
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
