<?php
session_start();
require_once '../../config/database.php';

$success = $error = '';

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $description = $_POST['description_ev'] ?? '';
    $id_utilisateur = $_SESSION['user']['user_id'] ?? null;

    if (!empty($nom) && !empty($description)) {
        try {
            $sql = "INSERT INTO Evenement (nom, description_ev, id_utilisateur) VALUES (:nom, :description, :id_utilisateur)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':description' => $description,
                ':id_utilisateur' => $id_utilisateur
            ]);
            $success = "L'événement a été ajouté avec succès!";
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout de l'événement.";
        }
    } else {
        $error = "Le nom et la description de l'événement sont requis.";
    }
}

// Récupération des événements existants
try {
    $sql = "SELECT e.*, u.login as createur FROM Evenement e 
            LEFT JOIN Utilisateur u ON e.id_utilisateur = u.id_utilisateur 
            ORDER BY e.id_evenement DESC";
    $stmt = $conn->query($sql);
    $evenements = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des événements.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestion des Événements - EduPath</title>
    <?php include_once '../edit/css.php'; ?>
</head>
<body>
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="text-center mb-4">Gestion des Événements</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <!-- Formulaire d'ajout -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ajouter un nouvel événement</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom de l'événement *</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description_ev" class="form-label">Description *</label>
                                    <textarea class="form-control" id="description_ev" name="description_ev" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des événements -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des événements</h4>
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
                                        <?php foreach ($evenements as $evenement): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($evenement['id_evenement']); ?></td>
                                            <td><?php echo htmlspecialchars($evenement['nom']); ?></td>
                                            <td><?php echo htmlspecialchars($evenement['description_ev']); ?></td>
                                            <td><?php echo htmlspecialchars($evenement['createur']); ?></td>
                                            <td>
                                                <a href="edit_evenement.php?id=<?php echo $evenement['id_evenement']; ?>" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="delete_evenement.php?id=<?php echo $evenement['id_evenement']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">
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
