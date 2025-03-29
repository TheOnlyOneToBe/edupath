<?php
session_start();
require_once '../config/database.php';

// Get bourse ID from URL parameter
$id_bourse = $_GET['id'] ?? null;

if (!$id_bourse) {
    header('Location: bourses.php');
    exit();
}

try {
    // Get detailed information about the scholarship
    $sql = "SELECT b.*, u.login as gestionnaire, u.fonction as fonction_gestionnaire
            FROM Bourse b 
            LEFT JOIN Utilisateur u ON b.id_utilisateur = u.id_utilisateur 
            WHERE b.id_bourse = :id_bourse";

    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_bourse' => $id_bourse]);
    $bourse = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$bourse) {
        $_SESSION['error'] = "Cette bourse n'existe pas.";
        header('Location: bourses.php');
        exit();
    }
} catch (PDOException $e) {
    $_SESSION['error'] = "Erreur lors de la récupération des détails de la bourse.";
    header('Location: bourses.php');
    exit();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Détails de la Bourse | <?php include '../name.php';  ?></title>
    <?php include_once 'css.php'; ?>
</head>

<body class="ep-magic-cursor">
    <?php include_once 'include/navbar.php'; ?>
    <?php include_once 'magic.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <section class="ep-contact section-gap position-relative pb-0">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="ep-contact__form">
                                    <h3 class="ep-contact__form-title ep-split-text left mb-4">
                                        Détails de la Bourse
                                    </h3>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <h5 class="card-title">Caractéristiques</h5>
                                                    <p class="card-text"><?php echo nl2br(htmlspecialchars($bourse['caracteristique'])); ?></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="card-title">Gestionnaire</h5>
                                                    <p class="card-text">
                                                        <?php echo htmlspecialchars($bourse['gestionnaire'] ?? 'Non assigné'); ?>
                                                        (<?php echo htmlspecialchars($bourse['fonction_gestionnaire'] ?? 'N/A'); ?>)
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                            <a href="delete/delete_bourse.php?id=<?php echo $bourse['id_bourse']; ?>"
                                                class="text-danger"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette bourse ?');">
                                                <i class="fi fi-rs-trash"></i>
                                            </a>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <a href="bourses.php" class="ep-btn">Retour à la liste</a>
                                        </div>

                                        <div class="col-md-3">

                                            <a href="edit_bourse.php?id=<?php echo $bourse['id_bourse']; ?>" class="ep-btn">Modifier</a>
                                        </div>
                                    </div>
                                </div>
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