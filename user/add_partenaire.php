<?php
session_start();
require_once '../config/database.php';

$success = $error = '';

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST['nom'] ?? '');
    
    if (!empty($nom)) {
        try {
            // Vérifier si le partenaire existe déjà
            $check_sql = "SELECT COUNT(*) FROM Partenaire WHERE nom = :nom";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->execute([':nom' => $nom]);
            
            if ($check_stmt->fetchColumn() > 0) {
                $error = "Un partenaire avec ce nom existe déjà.";
            } else {
                // Traitement de l'upload de photo
                $photo = '';
                if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                    $filename = $_FILES['photo']['name'];
                    $filetype = pathinfo($filename, PATHINFO_EXTENSION);
                    
                    if (in_array(strtolower($filetype), $allowed)) {
                        $newname = uniqid() . '.' . $filetype;
                        $upload_dir = '../assets/imgs/partenaires/';
                        $relative_path = 'assets/imgs/partenaires/' . $newname;
                        
                        if (!is_dir($upload_dir)) {
                            mkdir($upload_dir, 0777, true);
                        }
                        
                        if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $newname)) {
                            $photo = $newname;
                        } else {
                            $error = "Erreur lors de l'upload du logo.";
                            exit();
                        }
                    } else {
                        $error = "Format de fichier non autorisé. Formats acceptés: jpg, jpeg, png, gif";
                        exit();
                    }
                }

                $sql = "INSERT INTO Partenaire (nom, photo) VALUES (:nom, :photo)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':nom' => $nom,
                    ':photo' => $photo
                ]);
                
                $_SESSION['success'] = "Le partenaire a été ajouté avec succès!";
                header('Location: /partenaires.php');
                exit();
            }
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout du partenaire: " . $e->getMessage();
        }
    } else {
        $error = "Le nom du partenaire est requis.";
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
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.svg" />

  <!-- Site Title -->
  <title>Ajouter un partenaire | Partenaires</title>
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

              <div class="offset-2 col-lg-9 col-xl-5 col-9">
                <div class="ep-contact__form">     
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                  <h3 class="ep-contact__form-title ep-split-text left">
                  Ajouter un nouveau partenaire
                  </h3>
                  <form method="POST" action="add_partenaire.php" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="nom" class="form-label">Nom du partenaire *</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                    <label for="photo" class="form-label">Logo</label>
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
        
      </main>
      <?php include_once '../include/footer.php' ;?>
    </div>
  </div>

  <?php include_once 'script.php'; ?>

</body>

<!-- Mirrored from edupath-template.vercel.app/edupath/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:20 GMT -->

</html>