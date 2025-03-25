<?php
session_start();
require_once '../../config/database.php';

$success = $error = '';

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    
    // Traitement de l'upload de photo
    $photo = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['photo']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        
        if (in_array(strtolower($filetype), $allowed)) {
            $newname = uniqid() . '.' . $filetype;
            $upload_dir = 'assets/imgs/partenaires/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $newname)) {
                $photo = $upload_dir . $newname;
            }
        }
    }

    if (!empty($nom)) {
        try {
            $sql = "INSERT INTO Partenaire (nom, photo) VALUES (:nom, :photo)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':photo' => $photo
            ]);
            $success = "Le partenaire a été ajouté avec succès!";
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout du partenaire.";
        }
    } else {
        $error = "Le nom du partenaire est requis.";
    }
}

// Récupération des partenaires existants
try {
    $sql = "SELECT * FROM Partenaire ORDER BY id_partenaire DESC";
    $stmt = $conn->query($sql);
    $partenaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des partenaires.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestion des Partenaires - EduPath</title>
    <?php include_once '../edit/css.php'; ?>
</head>
<body>
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="text-center mb-4">Gestion des Partenaires</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <!-- Formulaire d'ajout -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ajouter un nouveau partenaire</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom du partenaire *</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    <small class="text-muted">Formats acceptés : JPG, JPEG, PNG, GIF</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des partenaires -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des partenaires</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach ($partenaires as $partenaire): ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <?php if (!empty($partenaire['photo'])): ?>
                                            <img src="<?php echo htmlspecialchars($partenaire['photo']); ?>" 
                                                 class="card-img-top" alt="<?php echo htmlspecialchars($partenaire['nom']); ?>"
                                                 style="height: 200px; object-fit: contain;">
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo htmlspecialchars($partenaire['nom']); ?></h5>
                                            <div class="btn-group">
                                                <a href="edit_partenaire.php?id=<?php echo $partenaire['id_partenaire']; ?>" 
                                                   class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> Modifier
                                                </a>
                                                <a href="delete_partenaire.php?id=<?php echo $partenaire['id_partenaire']; ?>" 
                                                   class="btn btn-sm btn-danger" 
                                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?');">
                                                    <i class="fas fa-trash"></i> Supprimer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <?php include_once '../include/footer.php'; ?>
        </div>
    </div>

    <?php include_once '../edit/script.php'; ?>
</body>
</html>
