<?php
session_start();
require_once '../config/database.php'; // Fixed path

$success = $error = '';
$bourse = null;

// Récupération de l'ID de la bourse
$id_bourse = $_GET['id'] ?? null;

if (!$id_bourse) {
    header('Location: /bourses.php'); // Fixed path
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caracteristique = trim($_POST['caracteristique'] ?? '');

    if (!empty($caracteristique)) {
        try {
            $sql = "UPDATE Bourse SET caracteristique = :caracteristique WHERE id_bourse = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':caracteristique' => $caracteristique,
                ':id' => $id_bourse
            ]);
            $_SESSION['success'] = "La bourse a été modifiée avec succès!";
            header('Location: /bourses.php'); // Fixed path
            exit();
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de la modification de la bourse: " . $e->getMessage();
        }
    } else {
        $error = "La caractéristique de la bourse est requise.";
    }
}

// Récupération des données de la bourse
try {
    $sql = "SELECT b.*, u.login as nom_utilisateur 
            FROM Bourse b 
            LEFT JOIN Utilisateur u ON b.id_utilisateur = u.id_utilisateur 
            WHERE b.id_bourse = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_bourse]);
    $bourse = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$bourse) {
        header('Location: /bourses.php');
        exit();
    }
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des données: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Modifier la Bourse | <?php include '../name.php' ;  ?></title>
    <?php include_once 'css.php'; ?>
</head>
                      <body class="ep-magic-cursor"><?php include_once 'include/navbar.php'; ?>
    <?php include_once 'magic.php'; ?>
    
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <section class="ep-contact section-gap position-relative pb-0">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="offset-2 col-lg-9 col-xl-5 col-9">
                                <div class="ep-contact__form">
                                    <?php if ($error): ?>
                                        <div class="alert alert-danger"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                    
                                    <h3 class="ep-contact__form-title ep-split-text left">
                                        Modifier la Bourse
                                    </h3>
                                    
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="caracteristique" class="form-label">Caractéristiques *</label>
                                            <textarea 
                                                class="form-control" 
                                                id="caracteristique" 
                                                name="caracteristique" 
                                                rows="3" 
                                                required
                                            ><?php echo htmlspecialchars($bourse['caracteristique'] ?? ''); ?></textarea>
                                        </div>
                                        
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <a href="/bourses.php" class="ep-btn">Retour</a>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="submit" class="ep-btn">Enregistrer</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
