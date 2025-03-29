<?php
session_start();
require_once '../config/database.php';

// Récupération de l'ID du partenaire
$id_partenaire = $_GET['id'] ?? null;

if (!$id_partenaire) {
    header('Location: /partenaires.php');
    exit();
}

try {
    // Récupération des détails du partenaire
    $sql = "SELECT * FROM Partenaire WHERE id_partenaire = :id_partenaire";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_partenaire' => $id_partenaire]);
    $partenaire = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$partenaire) {
        $_SESSION['error'] = "Ce partenaire n'existe pas.";
        header('Location: /partenaires.php');
        exit();
    }
} catch(PDOException $e) {
    $_SESSION['error'] = "Erreur lors de la récupération des détails du partenaire.";
    header('Location: /partenaires.php');
    exit();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Détails du Partenaire | <?php echo htmlspecialchars($partenaire['nom']); ?></title>
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
                                    <h3 class="ep-breadcrumbs__title">Détails du Partenaire</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li><a href="  dashboard.php">Tableau de bord</a></li>
                                        <li><i class="fi-bs-angle-right"></i></li>
                                        <li><a href="/partenaires.php">Partenaires</a></li>
                                        <li><i class="fi-bs-angle-right"></i></li>
                                        <li class="active"><?php echo htmlspecialchars($partenaire['nom']); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <!-- Start Partner Details Area -->
                <section class="ep-blog section-gap position-relative pd-top-90">
                    <div class="container ep-container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="ep-blog__card wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                    <div class="ep-blog__info">
                                        <div class="ep-blog__content">
                                            <h3 class="ep-blog__title mb-4">
                                                <?php echo htmlspecialchars($partenaire['nom']); ?>
                                            </h3>

                                            <?php if (!empty($partenaire['photo'])): ?>
                                            <div class="text-center mb-4">
                                                <img src="../assets/imgs/partenaires/<?php echo htmlspecialchars($partenaire['photo']); ?>" 
                                                     alt="Logo <?php echo htmlspecialchars($partenaire['nom']); ?>"
                                                     class="img-fluid" style="max-width: 300px;">
                                            </div>
                                            <?php endif; ?>

                                            <div class="ep-blog__btn d-flex justify-content-between mt-4">
                                                <a href="/partenaires.php" class="ep-btn">
                                                    <i class="fi fi-rs-arrow-small-left"></i> Retour à la liste
                                                </a>
                                                <?php if (isset($_SESSION['user']) && $_SESSION['user']['fonction'] === 'admin'): ?>
                                                <div>
                                                    <a href="edit_partenaire.php?id=<?php echo $partenaire['id_partenaire']; ?>" 
                                                       class="ep-btn ep-btn-primary">
                                                        <i class="fi fi-rs-edit"></i> Modifier
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Partner Details Area -->
            </main>
            <?php include_once '    include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>
</html>