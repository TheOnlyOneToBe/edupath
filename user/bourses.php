<?php
session_start();
require_once '../config/database.php';

$success = $error = '';

// Get success message from session
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}

if(isset($_SESSION['error'])){
    $error=$_SESSION['error'];
    unset($_SESSION['error']);
}

// Récupération des bourses existantes
try {
    $sql = "SELECT b.*, u.login as createur
            FROM Bourse b 
            LEFT JOIN Utilisateur u ON b.id_utilisateur = u.id_utilisateur 
            ORDER BY b.id_bourse ASC";
    $stmt = $conn->query($sql);
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
    <title>Gestion des Bourses - <?php include '../name.php' ;  ?></title>
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
                                    <h3 class="ep-breadcrumbs__title">Gestion des Bourses</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li><a href="  dashboard.php">Tableau de bord</a></li>
                                        <li><i class="fi-bs-angle-right"></i></li>
                                        <li class="active">Bourses</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <!-- Start Scholarship Area -->
                <section class="ep-blog section-gap position-relative pd-top-90">
                    <div class="container ep-container">
                        <?php if ($success): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?> 
                        <div class="row">
                            <?php foreach ($bourses as $bourse): ?>
                            <div class="col-lg-6 col-xl-4 col-md-6 col-12 mb-4">
                                <div class="ep-blog__card wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                    <div class="ep-blog__info">
                                        <div class="ep-blog__date ep1-bg">
                                            <i class="fi fi-rs-user"></i><br>
                                            <?php echo htmlspecialchars($bourse['createur'] ?? 'none' ); ?>
                                        </div>
                                        <div class="ep-blog__content">
                                            <a href="view_bourses.php?id=<?php echo $bourse['id_bourse']; ?>" 
                                               class="ep-blog__title">
                                                <h5>Bourse #<?php echo $bourse['id_bourse']; ?></h5>
                                            </a>
                                            <p class="ep-blog__text">
                                                <?php echo htmlspecialchars(substr($bourse['caracteristique']??null, 0, 150 ??null)??null) . '...'; ?>
                                            </p>
                                            <div class="ep-blog__btn d-flex justify-content-between">
                                                <a href="view_bourses.php?id=<?php echo $bourse['id_bourse']; ?>">
                                                    Détails <i class="fi fi-rs-arrow-small-right"></i>
                                                </a>
                                                <div>
                                                    <a href="edit_bourse.php?id=<?php echo $bourse['id_bourse']; ?>" 
                                                       class="text-primary me-2">
                                                        <i class="fi fi-rs-edit"></i>
                                                    </a>
                                                    <a href="delete/delete_bourse.php?id=<?php echo $bourse['id_bourse']; ?>" 
                                                       class="text-danger"
                                                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette bourse ?');">
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
