<?php
session_start();
require_once '../config/database.php';

$success = $error = '';
$article = null;

// Récupération de l'ID de l'article
$id_article = $_GET['id'] ?? null;

if (!$id_article) {
    header('Location: /articles.php');
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'] ?? '';
    $description = $_POST['description_art'] ?? '';
    $statut = $_POST['statut'] ?? '';

    // Traitement de l'upload de photo
    $photo = $article['photo'] ?? '';

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['photo']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array(strtolower($filetype), $allowed)) {
            $newname = uniqid() . '.' . $filetype;
            $upload_dir = '../assets/imgs/articles/';
            $relative_path = 'assets/imgs/articles/' . $newname;

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $newname)) {
                // Supprimer l'ancienne photo si elle existe
                if (!empty($article['photo']) && file_exists('../../' . $article['photo'])) {
                    unlink('../../' . $article['photo']);
                }
                $photo = $relative_path;
            } else {
                $error = "Erreur lors de l'upload de l'image.";
            }
        } else {
            $error = "Format de fichier non autorisé. Formats acceptés: jpg, jpeg, png, gif";
        }
    }

    if (!empty($titre) && !empty($description) && !empty($statut)) {
        try {
            $sql = "UPDATE Article SET titre = :titre, description_art = :description, 
                    statut = :statut";

            $params = [
                ':titre' => $titre,
                ':description' => $description,
                ':statut' => $statut,
                ':id' => $id_article
            ];

            // Ajouter la photo à la requête seulement si elle a été modifiée
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                $sql .= ", photo = :photo";
                $params[':photo'] = $photo;
            }

            $sql .= " WHERE id_article = :id";

            $stmt = $conn->prepare($sql);
            $stmt->execute($params);

            $_SESSION['success'] = "L'article a été modifié avec succès!";
            header('Location: /articles.php');
            exit();
        } catch (PDOException $e) {
            $error = "Une erreur est survenue lors de la modification de l'article: " . $e->getMessage();
        }
    } else {
        $error = "Les champs titre, description et statut sont requis.";
    }
}

// Récupération des données de l'article
try {
    $sql = "SELECT * FROM Article WHERE id_article = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id_article]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        header('Location: /articles.php');
        exit();
    }
} catch (PDOException $e) {
    $error = "Erreur lors de la récupération des données de l'article: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="ZXX">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />
    <meta
        name="keywords"
        content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.svg" />

    <!-- Site Title -->
    <title>Modifier un article | Articles</title>
    <?php include_once 'css.php'; ?>
</head>

<body class="ep-magic-cursor"><?php include_once 'include/navbar.php'; ?>
    
    <?php include_once 'magic.php'; ?>

    <!-- End Header Area -->
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Start Contact Area -->
                <section class="ep-contact section-gap position-relative pb-0">
                    <div class="container ep-container">
                        <div class="row">

                            <div class="offset-2 col-lg-11 col-xl-8 col-9">
                                <div class="ep-contact__form">
                                    <?php if ($error): ?>
                                        <div class="alert alert-danger"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                    <h3 class="ep-contact__form-title ep-split-text left">
                                        Modifier un article
                                    </h3>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Titre *</label>
                                                    <input
                                                        type="text"
                                                        id="titre" name="titre" value="<?php echo htmlspecialchars($article['titre']); ?>" required />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="description_art" class="form-label">Description *</label>
                                                    <textarea class="form-control" id="description_art" name="description_art" rows="3" required><?php echo htmlspecialchars($article['description_art']); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="statut" class="form-label">Statut *</label>
                                                    <select class="form-control col-10" id="statut" name="statut" required>
                                                        <option value="publié" <?php echo $article['statut'] == 'publié' ? 'selected' : ''; ?>>Publié</option>
                                                        <option value="brouillon" <?php echo $article['statut'] == 'brouillon' ? 'selected' : ''; ?>>Brouillon</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="photo" class="form-label">Photo</label>
                                                    <?php if (!empty($article['photo'])): ?>
                                                        <div class="mb-2">
                                                            <img src="../..//assets/imgs/articles/<?php echo htmlspecialchars($article['photo']); ?>"
                                                                alt="Photo actuelle" style="max-width: 200px;">
                                                        </div>
                                                    <?php endif; ?>
                                                    <input type="file" class="form-control" id="photo" name="photo">
                                                    <small class="text-muted">Formats acceptés : JPG, JPEG, PNG, GIF</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <a href="/articles.php" class="ep-btn ep-btn-secondary">Retour</a>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="submit" class="ep-btn ep-btn-primary">Modifier</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <br>
            </main>
            <br>
            <br>
            <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>

</body>

</html>