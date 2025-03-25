<?php
session_start();
require_once '../../config/database.php';

$success = $error = '';

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $nbre_annee = $_POST['nbre_annee'] ?? '';

    if (!empty($nom) && !empty($nbre_annee)) {
        try {
            $sql = "INSERT INTO Cycle (nom, nbre_annee) VALUES (:nom, :nbre_annee)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':nbre_annee' => $nbre_annee
            ]);
            $success = "Le cycle a été ajouté avec succès!";
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout du cycle.";
        }
    } else {
        $error = "Tous les champs sont requis.";
    }
}

// Récupération des cycles existants
try {
    $sql = "SELECT * FROM Cycle ORDER BY id_cycle DESC";
    $stmt = $conn->query($sql);
    $cycles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des cycles.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestion des Cycles - EduPath</title>
    <?php include_once '../edit/css.php'; ?>
</head>
<body>
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row mb-5 align-content-center">
                <div class="col-12">
                    <h2 class="text-center mb-4">Gestion des Cycles</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <!-- Formulaire d'ajout -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ajouter un nouveau cycle</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom du cycle *</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nbre_annee" class="form-label">Nombre d'années *</label>
                                    <input type="text" class="form-control" id="nbre_annee" name="nbre_annee" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des cycles -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des cycles</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Nombre d'années</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cycles as $cycle): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($cycle['id_cycle']); ?></td>
                                            <td><?php echo htmlspecialchars($cycle['nom']); ?></td>
                                            <td><?php echo htmlspecialchars($cycle['nbre_annee']); ?></td>
                                            <td>
                                                <a href="edit_cycle.php?id=<?php echo $cycle['id_cycle']; ?>" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="delete_cycle.php?id=<?php echo $cycle['id_cycle']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cycle ?');">
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
