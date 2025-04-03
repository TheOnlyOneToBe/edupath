<?php
session_start();
include_once '../config/database.php';
include_once 'include/auth.php';

if(!isLoggedIn() && !isAdmin()){
    header('Location:../login.php');
    exit();
}

// Get user ID from URL parameter
$id_utilisateur = $_GET['id'] ?? null;
$error = '';
$utilisateur = null;

if (!$id_utilisateur) {
    header('Location: utilisateurs.php');
    exit();
}

// Récupération des données de l'utilisateur
try {
    $sql = "SELECT * FROM Utilisateur WHERE id_utilisateur = :id_utilisateur";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_utilisateur' => $id_utilisateur]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$utilisateur) {
        $_SESSION['error'] = "Cet utilisateur n'existe pas.";
        header('Location: utilisateurs.php');
        exit();
    }

    // Get filières created by this user
    $sql_filieres = "SELECT * FROM Filiere WHERE id_utilisateur = :id_utilisateur";
    $stmt_filieres = $conn->prepare($sql_filieres);
    $stmt_filieres->execute([':id_utilisateur' => $id_utilisateur]);
    $filieres = $stmt_filieres->fetchAll(PDO::FETCH_ASSOC);

    // Get articles created by this user
    $sql_articles = "SELECT * FROM Article WHERE id_utilisateur = :id_utilisateur";
    $stmt_articles = $conn->prepare($sql_articles);
    $stmt_articles->execute([':id_utilisateur' => $id_utilisateur]);
    $articles = $stmt_articles->fetchAll(PDO::FETCH_ASSOC);

    // Get bourses managed by this user
    $sql_bourses = "SELECT * FROM Bourse WHERE id_utilisateur = :id_utilisateur";
    $stmt_bourses = $conn->prepare($sql_bourses);
    $stmt_bourses->execute([':id_utilisateur' => $id_utilisateur]);
    $bourses = $stmt_bourses->fetchAll(PDO::FETCH_ASSOC);

    // Get events managed by this user
    $sql_events = "SELECT * FROM Evenement WHERE id_utilisateur = :id_utilisateur";
    $stmt_events = $conn->prepare($sql_events);
    $stmt_events->execute([':id_utilisateur' => $id_utilisateur]);
    $events = $stmt_events->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des données de l'utilisateur.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <!-- Favicon -->
    <?php include('favicon.php'); ?>

    <!-- Site Title -->
    <title>Profil Utilisateur | <?php include '../name.php' ;  ?></title>
    <?php include_once 'css.php'; ?>
    <link rel="stylesheet" href="/style.css">
</head>

<body class="ep-magic-cursor">
    <?php include_once 'include/navbar.php'; ?>
    <?php include_once 'magic.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Start Breadcrumbs Area -->
                <div
                    class="ep-breadcrumbs breadcrumbs-bg background-image"
                    style="background-image: url('../assets/images/breadcrumbs-bg.png')"
                >
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="ep-breadcrumbs__content">
                                    <h3 class="ep-breadcrumbs__title">Profil Utilisateur</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li>
                                            <a href="dashboard.php">Tableau de bord</a>
                                        </li>
                                        <li>
                                            <i class="fi-bs-angle-right"></i>
                                        </li>
                                        <li>
                                            <a href="utilisateurs.php">Utilisateurs</a>
                                        </li>
                                        <li>
                                            <i class="fi-bs-angle-right"></i>
                                        </li>
                                        <li class="active">
                                            <a href="#">Profil</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <!-- Start User Profile Area -->
                <section class="ep-blog__details section-gap position-relative">
                    <div class="container ep-container">
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        
                        <?php if ($utilisateur): ?>
                        <div class="row">
                            <div class="col-lg-12 col-xl-8 col-12">
                                <div class="ep-blog__details-main">
                                    <div class="ep-blog__details-top">
                                        <span class="ep-blog__details-category"><?php echo htmlspecialchars($utilisateur['fonction']); ?></span>
                                        <h2 class="ep-blog__details-title">
                                            <?php echo htmlspecialchars($utilisateur['login']); ?>
                                        </h2>
                                        <div class="ep-blog__details-cover">
                                            <div class="ep-blog__details-cover-img">
                                                <img
                                                    src="../assets/img/user-profile.jpg"
                                                    alt="user-profile"
                                                />
                                            </div>
                                            <ul class="ep-blog__details-meta">
                                                <li><i class="fi-rr-user"></i>ID: <?php echo $utilisateur['id_utilisateur']; ?></li>
                                                <li><i class="fi fi-rr-briefcase"></i>Fonction: <?php echo htmlspecialchars($utilisateur['fonction']); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <!-- Filières créées par l'utilisateur -->
                                    <?php if (!empty($filieres)): ?>
                                    <div class="ep-blog__details-widget">
                                        <h3 class="ep-blog__details-widget-title">
                                            Filières créées
                                        </h3>
                                        <ul class="ep-blog__details-list">
                                            <?php foreach ($filieres as $filiere): ?>
                                            <li>
                                                <i class="fi fi-rs-check"></i> 
                                                <a href="view_filieres.php?id=<?php echo $filiere['id_filiere']; ?>">
                                                    <?php echo htmlspecialchars($filiere['nom']); ?>
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <!-- Articles créés par l'utilisateur -->
                                    <?php if (!empty($articles)): ?>
                                    <div class="ep-blog__details-widget">
                                        <h3 class="ep-blog__details-widget-title">
                                            Articles publiés
                                        </h3>
                                        <ul class="ep-blog__details-list">
                                            <?php foreach ($articles as $article): ?>
                                            <li>
                                                <i class="fi fi-rs-check"></i> 
                                                <a href="view_article.php?id=<?php echo $article['id_article']; ?>">
                                                    <?php echo htmlspecialchars($article['titre']); ?>
                                                </a>
                                                <span class="text-muted">(<?php echo date('d/m/Y', strtotime($article['date_pub'])); ?>)</span>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <!-- Bourses gérées par l'utilisateur -->
                                    <?php if (!empty($bourses)): ?>
                                    <div class="ep-blog__details-widget">
                                        <h3 class="ep-blog__details-widget-title">
                                            Bourses gérées
                                        </h3>
                                        <ul class="ep-blog__details-list">
                                            <?php foreach ($bourses as $bourse): ?>
                                            <li>
                                                <i class="fi fi-rs-check"></i> 
                                                <a href="view_bourses.php?id=<?php echo $bourse['id_bourse']; ?>">
                                                    <?php echo htmlspecialchars($bourse['caracteristique']); ?>
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <!-- Événements gérés par l'utilisateur -->
                                    <?php if (!empty($events)): ?>
                                    <div class="ep-blog__details-widget">
                                        <h3 class="ep-blog__details-widget-title">
                                            Événements gérés
                                        </h3>
                                        <ul class="ep-blog__details-list">
                                            <?php foreach ($events as $event): ?>
                                            <li>
                                                <i class="fi fi-rs-check"></i> 
                                                <a href="view_evenement.php?id=<?php echo $event['id_evenement']; ?>">
                                                    <?php echo htmlspecialchars($event['nom']); ?>
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <div class="ep-blog__details-share">
                                        <h4 class="ep-blog__details-share-title">Actions</h4>
                                        <ul class="ep-blog__details-share-list">
                                            <li>
                                                <a href="edit_utilisateur.php?id=<?php echo $utilisateur['id_utilisateur']; ?>" class="facebook">
                                                    <i class="icofont-edit"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="delete/delete_utilisateur.php?id=<?php echo $utilisateur['id_utilisateur']; ?>" 
                                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.');" 
                                                   class="twitter">
                                                    <i class="icofont-trash"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="utilisateurs.php" class="linkedin">
                                                    <i class="icofont-listine-dots"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-xl-4 col-12">
                                <div class="ep-blog__sidebar">
                                    <!-- Informations utilisateur -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-widget-title">Informations utilisateur</h4>
                                        <div class="ep-blog__sidebar-category">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <span>Identifiant</span>
                                                        <span><?php echo htmlspecialchars($utilisateur['login']); ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span>Fonction</span>
                                                        <span><?php echo htmlspecialchars($utilisateur['fonction']); ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="active">
                                                        <span>ID</span>
                                                        <span><?php echo $utilisateur['id_utilisateur']; ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <!-- Statistiques -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-widget-title">Statistiques</h4>
                                        <div class="ep-blog__sidebar-category">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <span>Filières</span>
                                                        <span><?php echo count($filieres); ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span>Articles</span>
                                                        <span><?php echo count($articles); ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span>Bourses</span>
                                                        <span><?php echo count($bourses); ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span>Événements</span>
                                                        <span><?php echo count($events); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <!-- Boutons d'action -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-widget-title">Actions</h4>
                                        <div class="ep-blog__sidebar-btn">
                                            <a href="edit_utilisateur.php?id=<?php echo $utilisateur['id_utilisateur']; ?>" class="ep-btn">
                                                <i class="icofont-edit"></i> Modifier
                                            </a>
                                        </div>
                                        <div class="ep-blog__sidebar-btn mt-3">
                                            <a href="utilisateurs.php" class="ep-btn ep-btn-secondary">
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
                <!-- End User Profile Area -->
            </main>
            <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>
</html>
