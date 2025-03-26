<?php
session_start();
require_once '../../config/database.php';

$success = $error = '';
$partenaire = null;

// Récupération de l'ID du partenaire
$id_partenaire = $_GET['id'] ?? null;

if (!$id_partenaire) {
    header('Location: ../list/partenaires.php');
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';

    // Traitement de l'upload de photo
    $photo = $_POST['current_photo'] ?? '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['photo']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array(strtolower($filetype), $allowed)) {
            $newname = uniqid() . '.' . $filetype;
            $upload_dir = 'uploads/partenaires/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $newname)) {
                // Supprimer l'ancienne photo si elle existe
                if (!empty($_POST['current_photo']) && file_exists($_POST['current_photo'])) {
                    unlink($_POST['current_photo']);
                }
                $photo = $upload_dir . $newname;
            }
        }
    }

    if (!empty($nom)) {
        try {
            $sql = "UPDATE Partenaire SET nom = :nom, photo = :photo WHERE id_partenaire = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':photo' => $photo,
                ':id' => $id_partenaire
            ]);
            $success = "Le partenaire a été modifié avec succès!";
            header('Location: partenaires.php');
            exit();
        } catch (PDOException $e) {
            $error = "Une erreur est survenue lors de la modification du partenaire.";
        }
    } else {
        $error = "Le nom du partenaire est requis.";
    }
}

// Récupération des données du partenaire
try {
    $sql = "SELECT * FROM Partenaire WHERE id_partenaire = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_partenaire]);
    $partenaire = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$partenaire) {
        header('Location: partenaires.php');
        exit();
    }
} catch (PDOException $e) {
    $error = "Erreur lors de la récupération des données du partenaire.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Modifier le Partenaire - EduPath</title>
    <?php include_once 'css.php'; ?>
</head>


<body>
    
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-center mb-4">Modifier le Partenaire</h2>

                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>

                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="current_photo" value="<?php echo htmlspecialchars($partenaire['photo']); ?>">

                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom du partenaire *</label>
                                    <input type="text" class="form-control" id="nom" name="nom"
                                        value="<?php echo htmlspecialchars($partenaire['nom']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Logo</label>
                                    <?php if (!empty($partenaire['photo'])): ?>
                                        <div class="mb-2">
                                            <img src="<?php echo htmlspecialchars($partenaire['photo']); ?>"
                                                alt="Logo actuel" style="max-width: 200px;">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    <small class="text-muted">Formats acceptés : JPG, JPEG, PNG, GIF</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                <a href="partenaires.php" class="btn btn-secondary">Retour</a>
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