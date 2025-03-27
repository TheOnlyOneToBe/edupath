<?php
session_start();
require_once '../config/database.php';

$error = '';
$article = null;

// Récupération de l'ID de l'article
$id_article = $_GET['id'] ?? null;

if (!$id_article) {
    header('Location: /articles.php');
    exit();
}

// Récupération des détails de l'article
try {
    $sql = "SELECT a.*, u.login as auteur 
            FROM Article a 
            LEFT JOIN Utilisateur u ON a.id_utilisateur = u.id_utilisateur 
            WHERE a.id_article = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_article]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$article) {
        $error = "Article non trouvé.";
    }
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
    <title><?php echo $article ? htmlspecialchars($article['titre']) : 'Article non trouvé'; ?> - EduPath</title>
    <?php include_once 'css.php'; ?>
</head>
                      <body class="ep-magic-cursor"><?php include_once 'include/navbar.php'; ?>
    <?php include_once 'magic.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Start Breadcrumbs Area -->
                <div class="ep-breadcrumbs breadcrumbs-bg background-image" 
                     style="background-image: url('../assets/images/breadcrumbs-bg.png')">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="ep-breadcrumbs__content">
                                    <h3 class="ep-breadcrumbs__title">Détails de l'Article</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li><a href="  dashboard.php">Tableau de bord</a></li>
                                        <li><i class="fi-bs-angle-right"></i></li>
                                        <li><a href="/articles.php">Articles</a></li>
                                        <li><i class="fi-bs-angle-right"></i></li>
                                        <li class="active">Détails</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <!-- Start Article Detail Area -->
                <section class="ep-blog-details section-gap position-relative pd-top-90">
                    <div class="container ep-container">
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                            <div class="text-center mt-4">
                                <a href="/articles.php" class="ep-btn ep-btn-primary">
                                    <i class="fi fi-rs-arrow-left"></i> Retour à la liste
                                </a>
                            </div>
                        <?php elseif ($article): ?>
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="ep-blog-details__content">
                                        <div class="ep-blog-details__meta mb-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span class="me-3"><i class="fi fi-rs-calendar"></i> <?php echo date('d/m/Y', strtotime($article['date_pub'])); ?></span>
                                                    <span class="me-3"><i class="fi fi-rs-user"></i> <?php echo htmlspecialchars($article['auteur'] ?? 'Anonyme'); ?></span>
                                                    <span><i class="fi fi-rs-flag"></i> <?php echo htmlspecialchars($article['statut']); ?></span>
                                                </div>
                                                <div>
                                                    <a href="edit_article.php?id=<?php echo $article['id_article']; ?>" 
                                                       class="ep-btn ep-btn-sm ep-btn-primary me-2">
                                                        <i class="fi fi-rs-edit"></i> Modifier
                                                    </a>
                                                    <a href="delete/delete_article.php?id=<?php echo $article['id_article']; ?>" 
                                                       class="ep-btn ep-btn-sm ep-btn-danger"
                                                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                                                        <i class="fi fi-rs-trash"></i> Supprimer
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <h2 class="ep-blog-details__title mb-4"><?php echo htmlspecialchars($article['titre']); ?></h2>
                                        
                                        <?php if (!empty($article['photo']) && file_exists('../../' . $article['photo'])): ?>
                                            <div class="ep-blog-details__img mb-4">
                                                <img src="../../<?php echo htmlspecialchars($article['photo']); ?>" 
                                                     alt="<?php echo htmlspecialchars($article['titre']); ?>" 
                                                     class="img-fluid rounded">
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="ep-blog-details__text">
                                            <p><?php echo nl2br(htmlspecialchars($article['description_art'])); ?></p>
                                        </div>
                                        
                                        <div class="ep-blog-details__action mt-5">
                                            <a href="/articles.php" class="ep-btn ep-btn-primary">
                                                <i class="fi fi-rs-arrow-left"></i> Retour à la liste
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
                <!-- End Article Detail Area -->
            </main>
            <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>
</html>
