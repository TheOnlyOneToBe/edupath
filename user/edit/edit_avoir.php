<?php
session_start();
require_once '../../config/database.php';

$success = $error = '';
$avoir = null;

// Récupération des IDs
$id_filiere = $_GET['filiere'] ?? null;
$id_cycle = $_GET['cycle'] ?? null;

if (!$id_filiere || !$id_cycle) {
    header('Location: ../list/avoir.php');
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $montant_inscription = $_POST['montant_inscription'] ?? '';
    $montant_scolarite = $_POST['montant_scolarite'] ?? '';

    if (!empty($montant_inscription) && !empty($montant_scolarite)) {
        try {
            $sql = "UPDATE Avoir SET montant_inscription = :montant_inscription, 
                    montant_scolarite = :montant_scolarite 
                    WHERE id_filiere = :id_filiere AND id_cycle = :id_cycle";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':montant_inscription' => $montant_inscription,
                ':montant_scolarite' => $montant_scolarite,
                ':id_filiere' => $id_filiere,
                ':id_cycle' => $id_cycle
            ]);
            $_SESSION['success'] = "Les frais ont été modifiés avec succès!";
            header('Location: ../list/avoir.php');
            exit();
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de la modification des frais: " . $e->getMessage();
        }
    } else {
        $error = "Tous les champs sont requis.";
    }
}

// Récupération des données de l'association
try {
    $sql = "SELECT a.*, f.nom as nom_filiere, c.nom as nom_cycle 
            FROM Avoir a 
            JOIN Filiere f ON a.id_filiere = f.id_filiere 
            JOIN Cycle c ON a.id_cycle = c.id_cycle 
            WHERE a.id_filiere = :id_filiere AND a.id_cycle = :id_cycle";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id_filiere' => $id_filiere,
        ':id_cycle' => $id_cycle
    ]);
    $avoir = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$avoir) {
        header('Location: ../list/avoir.php');
        exit();
    }
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des données.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="ZXX">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />
    <meta
        name="keywords"
        content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- Site Title -->
    <title>Modifier les Frais | EduPath</title>
    <?php include_once 'css.php'; ?>
</head>

<body class="ep-magic-cursor">
    <?php include_once '../magic.php'; ?>

    <!-- End Header Area -->
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Start Contact Area -->
                <section class="ep-contact section-gap position-relative pb-0">
                    <div class="container ep-container">
                        <div class="row">

                            <div class="offset-2 col-lg-11 col-xl-8 col-9">
                                <div class="ep-contact__form">
                                    <?php if ($error): ?>
                                        <div class="alert alert-danger"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                    <h3 class="ep-contact__form-title ep-split-text left">
                                        Modifier les Frais
                                    </h3>
                                    <div class="mb-4">
                                        <h5>Filière : <?php echo htmlspecialchars($avoir['nom_filiere']??null); ?></h5>
                                        <h5>Cycle : <?php echo htmlspecialchars($avoir['nom_cycle']??null); ?></h5>
                                    </div>
                                    <form method="POST" action="">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Montant Inscription (FCFA) *</label>
                                                    <input
                                                        type="number"
                                                        id="montant_inscription" name="montant_inscription" 
                                                        value="<?php echo htmlspecialchars($avoir['montant_inscription']??null); ?>" 
                                                        required min="0" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="montant_scolarite" class="form-label">Montant Scolarité (FCFA) *</label>
                                                    <input 
                                                        type="number" 
                                                        class="form-control" 
                                                        id="montant_scolarite" 
                                                        name="montant_scolarite" 
                                                        value="<?php echo htmlspecialchars($avoir['montant_scolarite']??null); ?>" 
                                                        required min="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <a href="../list/avoir.php" class="ep-btn">Retour</a>
                                            </div>
                                            <div class="col-9">
                                                <button type="submit" class="">Enregistrer les modifications</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <br>
            </main>
            <br>
            <br>
            <?php include_once '../include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>

</body>
</html>
