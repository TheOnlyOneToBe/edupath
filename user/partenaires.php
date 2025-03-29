<?php
session_start();
require_once '../config/database.php';

$success = $error = '';

// Get success message from session
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}

// Récupération des partenaires existants
try {
    $sql = "SELECT * FROM partenaire ORDER BY id_partenaire DESC";
    $stmt = $conn->query($sql);
    $partenaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des partenaires.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestion des Partenaires - <?php include '../name.php' ;  ?></title>
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
                                    <h3 class="ep-breadcrumbs__title">Gestion des Partenaires</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li><a href="  dashboard.php">Tableau de bord</a></li>
                                        <li><i class="fi-bs-angle-right"></i></li>
                                        <li class="active">Partenaires</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <!-- Start Partenaire Area -->
                <section class="ep-blog section-gap position-relative pd-top-90">
                    <div class="container ep-container">
                        <?php if ($success): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <!-- Add Partenaire Button -->
                        <div class="row mb-4">
                            <div class="col-12 text-end">
                                <a href="../add_partenaire.php" class="ep-btn ep-btn-primary">
                                    <i class="fi fi-rs-plus"></i> Ajouter un partenaire
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <?php foreach ($partenaires as $partenaire): ?>
                            <div class="col-lg-6 col-xl-4 col-md-6 col-12 mb-4">
                                <div class="ep-blog__card wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                    <div class="ep-blog__info">
                                        <div class="ep-blog__image">
                                            <img src="../assets/imgs/partenaires/<?php echo htmlspecialchars($partenaire['photo']); ?>" 
                                                 alt="<?php echo htmlspecialchars($partenaire['nom']); ?>"
                                                 class="img-fluid">
                                        </div>
                                        <div class="ep-blog__content">
                                            <h5 class="ep-blog__title">
                                               <a href="view_partenaire.php?id=<?php echo $partenaire['id_partenaire']; ?>"> <?php echo htmlspecialchars($partenaire['nom']); ?></a>
                                            </h5>
                                            <div class="ep-blog__btn d-flex justify-content-end">
                                                <div>
                                                    <a href="edit_partenaire.php?id=<?php echo $partenaire['id_partenaire']; ?>" 
                                                       class="text-primary me-2">
                                                        <i class="fi fi-rs-edit"></i>
                                                    </a>
                                                    <a href="delete/delete_partenaire.php?id=<?php echo $partenaire['id_partenaire']; ?>" 
                                                       class="text-danger"
                                                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?');">
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
            <?php include_once '    include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>
</html>

