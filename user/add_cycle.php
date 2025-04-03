<?php
session_start();
include_once '../config/database.php';
include_once 'include/auth.php';

if(!isLoggedIn() && !isAdmin()){
    header('Location:../login.php');
    exit();
}

$success = $error = '';

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST['nom'] ?? '');
    $nbre_annee = trim($_POST['nbre_annee'] ?? '');

    if (!empty($nom) && !empty($nbre_annee)) {
        try {
            // Vérifier si le cycle existe déjà
            $check_sql = "SELECT COUNT(*) FROM Cycle WHERE nom = :nom";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->execute([':nom' => $nom]);
            
            if ($check_stmt->fetchColumn() > 0) {
                $error = "Un cycle avec ce nom existe déjà.";
            } else {
                // Validation du nombre d'années (doit être un nombre)
                if (!is_numeric($nbre_annee)) {
                    $error = "Le nombre d'années doit être un nombre.";
                } else {
                    $sql = "INSERT INTO Cycle (nom, nbre_annee) VALUES (:nom, :nbre_annee)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([
                        ':nom' => $nom,
                        ':nbre_annee' => $nbre_annee
                    ]);
                    
                    $_SESSION['success'] = "Le cycle a été ajouté avec succès!";
                    header('Location: cycles.php');
                    exit();
                }
            }
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout du cycle: " . $e->getMessage();
        }
    } else {
        $error = "Tous les champs sont requis.";
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
  <?php include('../favicon.php'); ?>

  <!-- Site Title -->
  <title>Ajouter un cycle | Cycles</title>
  <?php include_once 'css.php'; ?>
</head>

<body class="ep-magic-cursor">
  <?php include_once 'include/navbar.php'; ?>
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
                    Ajouter un cycle
                  </h3>
                  <form method="POST" action="add_cycle.php">
                    <div class="form-group">
                    <label for="nom" class="form-label">Nom du cycle *</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                    <label for="nbre_annee" class="form-label">Nombre d'années *</label>
                    <input type="text" class="form-control" id="nbre_annee" name="nbre_annee" required>
                    </div>
                    <button type="submit" class="ep-btn">Ajouter</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
       
      </main>
      <?php include_once 'include/footer.php' ;?>
    </div>
  </div>

  <?php include_once 'script.php'; ?>

</body>

<!-- Mirrored from <?php include '../name.php' ;  ?>-template.vercel.app/<?php include '../name.php' ;  ?>/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:20 GMT -->

</html>