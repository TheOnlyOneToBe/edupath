<?php
session_start();
require_once '../config/database.php';

$success = $error = '';
$cycle = null;

// Récupération de l'ID du cycle
$id_cycle = $_GET['id'] ?? null;

if (!$id_cycle) {
    header('Location: /cycles.php');
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $nbre_annee = $_POST['nbre_annee'] ?? '';

    if (!empty($nom) && !empty($nbre_annee)) {
        try {
            // Validation du nombre d'années (doit être un nombre)
            if (!is_numeric($nbre_annee)) {
                $error = "Le nombre d'années doit être un nombre.";
            } else {
                $sql = "UPDATE Cycle SET nom = :nom, nbre_annee = :nbre_annee WHERE id_cycle = :id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':nom' => $nom,
                    ':nbre_annee' => $nbre_annee,
                    ':id' => $id_cycle
                ]);
                
                $_SESSION['success'] = "Le cycle a été modifié avec succès!";
                header('Location: /cycles.php');
                exit();
            }
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de la modification du cycle.";
        }
    } else {
        $error = "Tous les champs sont requis.";
    }
}

// Récupération des données du cycle
try {
    $sql = "SELECT * FROM Cycle WHERE id_cycle = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_cycle]);
    $cycle = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cycle) {
        header('Location: /cycles.php');
        exit();
    }
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des données du cycle.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="ZXX">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />
    <meta name="keywords" content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.svg" />

    <!-- Site Title -->
    <title>Modifier un cycle | EduPath</title>
    <?php include_once 'css.php'; ?>
</head>

                      <body class="ep-magic-cursor"><?php include_once 'include/navbar.php'; ?>
    <?php include_once 'magic.php'; ?>

    <!-- End Header Area -->
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Start Contact Area -->
                <section class="ep-contact section-gap position-relative pb-0">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="offset-2 col-lg-9 col-xl-5 col-9">
                                <div class="ep-contact__form">
                                    <?php if ($error): ?>
                                        <div class="alert alert-danger"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                    
                                    <h3 class="ep-contact__form-title ep-split-text left">
                                        Modifier un cycle
                                    </h3>
                                    
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label for="nom" class="form-label">Nom du cycle *</label>
                                            <input type="text" class="form-control" id="nom" name="nom" 
                                                value="<?php echo htmlspecialchars($cycle['nom']??null); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nbre_annee" class="form-label">Nombre d'années *</label>
                                            <input type="text" class="form-control" id="nbre_annee" name="nbre_annee" 
                                                value="<?php echo htmlspecialchars($cycle['nbre_annee']??null); ?>" required>
                                        </div>
                                        <div class="mt-4">
                                            <button type="submit" class="ep-btn">Enregistrer les modifications</button>
                                            <a href="/cycles.php" class="ep-btn ep-btn-secondary">Retour</a>
                                        </div>
                                    </form>
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
