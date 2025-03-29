<?php
session_start();
require_once 'config/database.php';


$success = $error = '';
$filiere = null;

// Récupération de l'ID de la filière
$id_filiere = $_GET['id'] ?? null;

if (!$id_filiere) {
    header('Location: filieres.php');
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $description = $_POST['description'] ?? '';

    if (!empty($nom)) {
        try {
            $sql = "UPDATE Filiere SET nom = :nom, description = :description WHERE id_filiere = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':description' => $description,
                ':id' => $id_filiere
            ]);
            $success = "La filière a été modifiée avec succès!";
            header('Location: filieres.php');
            exit();
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de la modification de la filière.";
        }
    } else {
        $error = "Le nom de la filière est requis.";
    }
}

// Récupération des données de la filière
try {
    $sql = "SELECT * FROM Filiere WHERE id_filiere = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_filiere]);
    $filiere = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$filiere) {
        $_SESSION['error']= "Cette filière n'as pas été trouvée";
        header('Location: filieres.php');
        exit();
    }
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des données de la filière.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Modifier la Filière - <?php include '../name.php' ;  ?></title>
    <?php include_once 'css.php'; ?>
</head>
<body>
<?php include_once 'include/navbar.php';?>
    <?php include_once 'magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-center mb-4">Modifier la Filière</h2>
                    
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
                                    <label for="nom" class="form-label">Nom de la filière *</label>
                                    <input type="text" class="form-control" id="nom" name="nom" 
                                           value="<?php echo htmlspecialchars($filiere['nom']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" 
                                              rows="3"><?php echo htmlspecialchars($filiere['description']); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                <a href="filieres.php" class="btn btn-secondary">Retour</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>
</html>
