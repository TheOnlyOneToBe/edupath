<?php
session_start();
include_once '../config/database.php';
include_once 'include/auth.php';

if(!isLoggedIn() && isAdmin()){
    header('Location:../login.php');
    exit();
}

$success = $error = '';

// Get success message from session
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}

// Get error message from session
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

// Récupération des articles existants
try {
    $sql = "SELECT a.*, u.login as auteur FROM Article a 
            LEFT JOIN Utilisateur u ON a.id_utilisateur = u.id_utilisateur 
            ORDER BY a.date_pub DESC";
    $stmt = $conn->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Erreur lors de la récupération des articles.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestion des Articles - <?php include '../name.php' ;  ?></title>
    <?php include_once 'css.php'; ?>
</head>

<body class="ep-magic-cursor">
    <?php include_once 'include/navbar.php'; ?>
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
                                    <h3 class="ep-breadcrumbs__title">Gestion des Articles</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li><a href="dashboard.php">Tableau de bord</a></li>
                                        <li><i class="fi-bs-angle-right"></i></li>
                                        <li class="active">Articles</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <!-- Start Article Area -->
                <section class="ep-blog section-gap position-relative pd-top-90">
                    <div class="container ep-container">
                        <?php if ($success): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <!-- Add Article Button -->
                        <div class="row mb-4">
                            <div class="col-12 text-end">
                                <a href="add_article.php" class="ep-btn ep-btn-primary">
                                    <i class="fi fi-rs-plus"></i> Ajouter un article
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <?php foreach ($articles as $article): ?>
                                <div class="col-lg-6 col-xl-4 col-md-6 col-12 mb-4">
                                    <div class="ep-blog__card wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                        <div class="ep-blog__info">
                                            <div class="ep-blog__date ep1-bg">
                                                <i class="fi fi-rs-calendar"></i><br>
                                                <?php echo htmlspecialchars(date('d/m/Y', strtotime($article['date_pub']))); ?>
                                            </div>
                                            <div class="ep-blog__content">
                                                <a href="view_article.php?id=<?php echo $article['id_article']; ?>"
                                                    class="ep-blog__title">
                                                    <h5><?php echo htmlspecialchars($article['titre']); ?></h5>
                                                </a>
                                                <p class="ep-blog__text">
                                                    <?php echo htmlspecialchars(substr($article['description_art'] ?? '', 0, 100)) . '...'; ?>
                                                </p>
                                                <div class="ep-blog__meta">
                                                    <span><i class="fi fi-rs-user"></i> <?php echo htmlspecialchars($article['auteur'] ?? 'Anonyme'); ?></span>
                                                    <span><i class="fi fi-rs-flag"></i> <?php echo htmlspecialchars($article['statut']); ?></span>
                                                </div>
                                                <div class="ep-blog__btn d-flex justify-content-between">
                                                    <a href="view_article.php?id=<?php echo $article['id_article']; ?>">
                                                        Détails <i class="fi fi-rs-arrow-small-right"></i>
                                                    </a>
                                                    <div>
                                                        <a href="edit_article.php?id=<?php echo $article['id_article']; ?>"
                                                            class="text-primary me-2">
                                                            <i class="fi fi-rs-edit"></i>
                                                        </a>
                                                        <a href="delete/delete_article.php?id=<?php echo $article['id_article']; ?>"
                                                            class="text-danger"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                                                            <i class="fi fi-rs-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            </main>
            <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>

</html>