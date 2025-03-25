<?php
session_start();
require_once 'config/database.php';

$success = $error = '';
$cycle = null;

// Récupération de l'ID du cycle
$id_cycle = $_GET['id'] ?? null;

if (!$id_cycle) {
    header('Location: cycles.php');
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $nbre_annee = $_POST['nbre_annee'] ?? '';

    if (!empty($nom) && !empty($nbre_annee)) {
        try {
            $sql = "UPDATE Cycle SET nom = :nom, nbre_annee = :nbre_annee WHERE id_cycle = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':nbre_annee' => $nbre_annee,
                ':id' => $id_cycle
            ]);
            $success = "Le cycle a été modifié avec succès!";
            header('Location: cycles.php');
            exit();
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
        header('Location: cycles.php');
        exit();
    }
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des données du cycle.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Modifier le Cycle - EduPath</title>
    <?php include_once 'css.php'; ?>
</head>
<body>
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-center mb-4">Modifier le Cycle</h2>
                    
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
                                    <label for="nom" class="form-label">Nom du cycle *</label>
                                    <input type="text" class="form-control" id="nom" name="nom" 
                                           value="<?php echo htmlspecialchars($cycle['nom']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nbre_annee" class="form-label">Nombre d'années *</label>
                                    <input type="text" class="form-control" id="nbre_annee" name="nbre_annee" 
                                           value="<?php echo htmlspecialchars($cycle['nbre_annee']); ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                <a href="cycles.php" class="btn btn-secondary">Retour</a>
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
