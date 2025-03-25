<?php
session_start();
require_once 'config/database.php';

$success = $error = '';
$bourse = null;

// Récupération de l'ID de la bourse
$id_bourse = $_GET['id'] ?? null;

if (!$id_bourse) {
    header('Location: bourses.php');
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caracteristique = $_POST['caracteristique'] ?? '';

    if (!empty($caracteristique)) {
        try {
            $sql = "UPDATE Bourse SET caracteristique = :caracteristique WHERE id_bourse = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':caracteristique' => $caracteristique,
                ':id' => $id_bourse
            ]);
            $success = "La bourse a été modifiée avec succès!";
            header('Location: bourses.php');
            exit();
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de la modification de la bourse.";
        }
    } else {
        $error = "La caractéristique de la bourse est requise.";
    }
}

// Récupération des données de la bourse
try {
    $sql = "SELECT * FROM Bourse WHERE id_bourse = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_bourse]);
    $bourse = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$bourse) {
        header('Location: bourses.php');
        exit();
    }
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des données de la bourse.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Modifier la Bourse - EduPath</title>
    <?php include_once 'css.php'; ?>
</head>
<body>
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-center mb-4">Modifier la Bourse</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="caracteristique" class="form-label">Caractéristiques *</label>
                                    <textarea class="form-control" id="caracteristique" name="caracteristique" 
                                              rows="3" required><?php echo htmlspecialchars($bourse['caracteristique']); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                <a href="bourses.php" class="btn btn-secondary">Retour</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <?php include_once '../include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>
</html>
