<?php
session_start();
require_once '../../config/database.php';

$success = $error = '';

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caracteristique = $_POST['caracteristique'] ?? '';
    $id_utilisateur = $_SESSION['user']['user_id'] ?? null;

    if (!empty($caracteristique)) {
        try {
            $sql = "INSERT INTO Bourse (caracteristique, id_utilisateur) VALUES (:caracteristique, :id_utilisateur)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':caracteristique' => $caracteristique,
                ':id_utilisateur' => $id_utilisateur
            ]);
            $success = "La bourse a été ajoutée avec succès!";
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout de la bourse.";
        }
    } else {
        $error = "La caractéristique de la bourse est requise.";
    }
}

// Récupération des bourses existantes
try {
    $sql = "SELECT b.*, u.login as createur FROM Bourse b 
            LEFT JOIN Utilisateur u ON b.id_utilisateur = u.id_utilisateur 
            ORDER BY b.id_bourse DESC";
    $stmt = $conn->query($sql);
    $bourses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des bourses.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestion des Bourses - EduPath</title>
    <?php include_once '../edit/css.php'; ?>
</head>
<body>
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="text-center mb-4">Gestion des Bourses</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <!-- Formulaire d'ajout -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Ajouter une nouvelle bourse</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="caracteristique" class="form-label">Caractéristiques *</label>
                                    <textarea class="form-control" id="caracteristique" name="caracteristique" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des bourses -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des bourses</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Caractéristiques</th>
                                            <th>Créé par</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bourses as $bourse): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($bourse['id_bourse']); ?></td>
                                            <td><?php echo htmlspecialchars($bourse['caracteristique']); ?></td>
                                            <td><?php echo htmlspecialchars($bourse['createur']); ?></td>
                                            <td>
                                                <a href="edit_bourse.php?id=<?php echo $bourse['id_bourse']; ?>" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="delete_bourse.php?id=<?php echo $bourse['id_bourse']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette bourse ?');">
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
