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

    // Vérifier si l'utilisateur est connecté
   /*  if (!$id_utilisateur) {
        $error = "Vous devez être connecté pour ajouter un article.";
        exit();
    } */

    // Traitement de l'upload de photo
    $photo = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['photo']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        
        if (in_array(strtolower($filetype), $allowed)) {
            $newname = uniqid() . '.' . $filetype;
            $upload_dir = '../../assets/imgs/articles/';
            $relative_path = 'assets/imgs/articles/' . $newname; // Chemin relatif pour la BD
            
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $newname)) {
                $photo = $newname; // Stocker le chemin relatif
            } else {
                $error = "Erreur lors de l'upload de l'image.";
                exit();
            }
        } else {
            $error = "Format de fichier non autorisé. Formats acceptés: jpg, jpeg, png, gif";
            exit();
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
            
            $_SESSION['success'] = "L'article a été ajouté avec succès!";
            header('Location: ../list/articles.php');
            exit();
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout de l'article: " . $e->getMessage();
        }
    } else {
        $error = "Les champs titre, description et statut sont requis.";
    }
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
  <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg" />

  <!-- Site Title -->
  <title>Ajouter un article | Articles</title>
  <?php include_once 'css.php'; ?>
</head>

<body class="ep-magic-cursor">
  <?php include_once '../magic.php'; ?>

  <!-- End Header Area -->
  <div id="smooth-wrapper">
    <div id="smooth-content">
      <main>
        <!-- Start Contact Area -->
        <section class="ep-contact section-gap position-relative pb-0">
          <div class="container ep-container">
            <div class="row">

              <div class="offset-2 col-lg-9 col-xl-5 col-9">
                <div class="ep-contact__form">     
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                  <h3 class="ep-contact__form-title ep-split-text left">
                    Ajouter un article
                  </h3>
                  <form method="POST" action="add_article.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Titre *</label>
                      <input
                        type="text"
                        id="titre" name="titre" required />
                    </div>
                    <div class="form-group">
                      <label for="description_art" class="form-label">Description *</label>
                      <textarea class="form-control" id="description_art" name="description_art" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="statut" class="form-label">Statut *</label>
                      <select class="form-control col-10" id="statut" name="statut" required>
                        <option value="">Sélectionnez un statut</option>
                        <option value="publié">Publié</option>
                        <option value="brouillon">Brouillon</option>
                      </select>

                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      <label for="photo" class="form-label">Photo</label>
                      <input type="file" class="form-control" id="photo" name="photo">
                      <small class="text-muted">Formats acceptés : JPG, JPEG, PNG, GIF</small>
                    </div>
                    <button type="submit" class="ep-btn">Ajouter</button>
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
     <?php include_once '../include/footer.php' ;?>
    </div>
  </div>

  <?php include_once 'script.php'; ?>

</body>

<!-- Mirrored from edupath-template.vercel.app/edupath/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:20 GMT -->

</html>