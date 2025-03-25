<?php
session_start();
require_once '../../config/database.php';

$success = $error = '';

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'] ?? '';
    $description = $_POST['description_art'] ?? '';
    $statut = $_POST['statut'] ?? '';
    $id_utilisateur = $_SESSION['user']['user_id'] ?? null;

    // Traitement de l'upload de photo
    $photo = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['photo']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        
        if (in_array(strtolower($filetype), $allowed)) {
            $newname = uniqid() . '.' . $filetype;
            $upload_dir = '../../assets/imgs/articles/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $newname)) {
                $photo = $upload_dir . $newname;
            }
        }
    }

    if (!empty($titre) && !empty($description) && !empty($statut)) {
        try {
            $sql = "INSERT INTO Article (titre, description_art, date_pub, statut, photo, id_utilisateur) 
                    VALUES (:titre, :description, CURRENT_DATE, :statut, :photo, :id_utilisateur)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':titre' => $titre,
                ':description' => $description,
                ':statut' => $statut,
                ':photo' => $photo,
                ':id_utilisateur' => $id_utilisateur
            ]);
            $success = "L'article a été ajouté avec succès!";
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout de l'article.";
        }
    } else {
        $error = "Les champs titre, description et statut sont requis.";
    }
}

// Récupération des articles existants
try {
    $sql = "SELECT a.*, u.login as auteur FROM Article a 
            LEFT JOIN Utilisateur u ON a.id_utilisateur = u.id_utilisateur 
            ORDER BY a.date_pub DESC";
    $stmt = $conn->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Erreur lors de la récupération des articles.";
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestion des Articles - EduPath</title>
    <?php include_once '../edit/css.php'; ?>
</head>
<body>
    <?php include_once '../magic.php'; ?>

    <section class="section-gap">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="text-center mb-4">Gestion des Articles</h2>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <!-- Liste des articles -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Liste des articles</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Titre</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th>Auteur</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($articles as $article): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($article['id_article']); ?></td>
                                            <td><?php echo htmlspecialchars($article['titre']); ?></td>
                                            <td><?php echo htmlspecialchars($article['date_pub']); ?></td>
                                            <td><?php echo htmlspecialchars($article['statut']); ?></td>
                                            <td><?php echo htmlspecialchars($article['auteur']); ?></td>
                                            <td>
                                                <a href="view_article.php?id=<?php echo $article['id_article']; ?>" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="edit_article.php?id=<?php echo $article['id_article']; ?>" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="delete_article.php?id=<?php echo $article['id_article']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
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
