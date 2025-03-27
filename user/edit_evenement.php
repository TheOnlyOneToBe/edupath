<?php
session_start();
require_once 'config/database.php';

$success = $error = '';
$evenement = null;

// Récupération de l'ID de l'événement
$id_evenement = $_GET['id'] ?? null;

if (!$id_evenement) {
    header('Location: evenements.php');
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $description = $_POST['description_ev'] ?? '';

    if (!empty($nom) && !empty($description)) {
        try {
            $sql = "UPDATE Evenement SET nom = :nom, description_ev = :description WHERE id_evenement = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':description' => $description,
                ':id' => $id_evenement
            ]);
            $success = "L'événement a été modifié avec succès!";
            header('Location: evenements.php');
            exit();
        } catch (PDOException $e) {
            $error = "Une erreur est survenue lors de la modification de l'événement.";
        }
    } else {
        $error = "Le nom et la description de l'événement sont requis.";
    }
}

// Récupération des données de l'événement
try {
    $sql = "SELECT * FROM Evenement WHERE id_evenement = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_evenement]);
    $evenement = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$evenement) {
        header('Location: evenements.php');
        exit();
    }
} catch (PDOException $e) {
    $error = "Erreur lors de la récupération des données de l'événement.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Modifier l'Événement - EduPath</title>
    <?php include_once 'css.php'; ?>
</head>

<body>
    
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-center mb-4">Modifier l'Événement</h2>

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
                                    <label for="nom" class="form-label">Nom de l'événement *</label>
                                    <input type="text" class="form-control" id="nom" name="nom"
                                        value="<?php echo htmlspecialchars($evenement['nom']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description_ev" class="form-label">Description *</label>
                                    <textarea class="form-control" id="description_ev" name="description_ev"
                                        rows="3" required><?php echo htmlspecialchars($evenement['description_ev']); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                <a href="evenements.php" class="btn btn-secondary">Retour</a>
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