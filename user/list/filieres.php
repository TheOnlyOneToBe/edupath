<?php
session_start();
require_once '../../config/database.php';


$success = $error = '';

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $description = $_POST['description'] ?? '';
    $id_utilisateur = $_SESSION['user']['user_id'];

    if (!empty($nom)) {
        try {
            $sql = "INSERT INTO Filiere (nom, description, id_utilisateur) VALUES (:nom, :description, :id_utilisateur)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':description' => $description,
                ':id_utilisateur' => $id_utilisateur
            ]);
            $success = "La filière a été ajoutée avec succès!";
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout de la filière.";
        }
    } else {
        $error = "Le nom de la filière est requis.";
    }
}

// Récupération des filières existantes
try {
    $sql = "SELECT f.*, u.login as createur FROM Filiere f 
            LEFT JOIN Utilisateur u ON f.id_utilisateur = u.id_utilisateur 
            ORDER BY f.id_filiere DESC";
    $stmt = $conn->query($sql);
    $filieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des filières.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestion des Filières - EduPath</title>
    <?php include_once '../edit/css.php'; ?>
</head>
<body>
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="text-center mb-4">Gestion des Filières</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <!-- Formulaire d'ajout -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ajouter une nouvelle filière</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom de la filière *</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des filières -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des filières</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Créé par</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($filieres as $filiere): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($filiere['id_filiere' ?? '']); ?></td>
                                            <td><?php echo htmlspecialchars($filiere['nom'] ?? ''); ?></td>
                                            <td><?php echo htmlspecialchars($filiere['description'] ?? ''); ?></td>
                                            <td><?php echo htmlspecialchars($filiere['createur'] ?? ''); ?></td>
                                            <td>
                                                <a href="edit_filiere.php?id=<?php echo $filiere['id_filiere']; ?>" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="delete_filiere.php?id=<?php echo $filiere['id_filiere']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?');">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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
