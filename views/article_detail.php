<?php
session_start();
require_once '../config/database.php';

$id_article = $_GET['id'] ?? null;
$error = null;
$article = null;
$articles_recent = null;

if (!$id_article) {
    header('Location: articles_view.php');
    exit();
}

try {
    // Récupération de l'article
    $sql = "SELECT a.*, u.login as auteur 
            FROM Article a 
            LEFT JOIN Utilisateur u ON a.id_utilisateur = u.id_utilisateur 
            WHERE a.id_article = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_article]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        header('Location: articles_view.php');
        exit();
    }

    // Récupération des articles récents pour la sidebar
    $sql_recent = "SELECT id_article, titre, photo, date_pub 
                  FROM Article 
                  WHERE id_article != :id
                  ORDER BY date_pub DESC 
                  LIMIT 3";
    $stmt_recent = $conn->prepare($sql_recent);
    $stmt_recent->execute([':id' => $id_article]);
    $articles_recent = $stmt_recent->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    $error = "Erreur lors de la récupération de l'article.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?php echo htmlspecialchars($article['titre']); ?> - EduPath</title>
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
                                    <h2><?php echo htmlspecialchars($article['titre']); ?></h2>
                                    <nav>
                                        <ul>
                                            <li><a href="../index.php">Accueil</a></li>
                                            <li><a href="articles_view.php">Articles</a></li>
                                            <li><span>Détail</span></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu de l'article -->
                <section class="ep-blog-details section-gap">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="col-lg-12 col-xl-8 col-12">
                                <div class="ep-blog-details__wrapper">
                                    <?php if ($article['photo']): ?>
                                    <div class="ep-blog-details__img">
                                        <img src="<?php echo htmlspecialchars($article['photo']); ?>" 
                                             alt="<?php echo htmlspecialchars($article['titre']); ?>">
                                    </div>
                                    <?php endif; ?>

                                    <div class="ep-blog-details__content">
                                        <div class="ep-blog__meta">
                                            <span><i class="far fa-calendar"></i> <?php echo date('d/m/Y', strtotime($article['date_pub'])); ?></span>
                                            <span><i class="far fa-user"></i> <?php echo htmlspecialchars($article['auteur']); ?></span>
                                            <span><i class="far fa-tag"></i> <?php echo htmlspecialchars($article['statut']); ?></span>
                                        </div>

                                        <div class="ep-blog-details__text">
                                            <?php echo nl2br(htmlspecialchars($article['description_art'])); ?>
                                        </div>

                                        <!-- Partage social -->
                                        <div class="ep-blog-details__social">
                                            <h4>Partager cet article :</h4>
                                            <ul class="social-list">
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" 
                                                       target="_blank">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>&text=<?php echo urlencode($article['titre']); ?>" 
                                                       target="_blank">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>&title=<?php echo urlencode($article['titre']); ?>" 
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
