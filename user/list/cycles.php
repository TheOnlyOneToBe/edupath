<?php
session_start();
require_once '../../config/database.php';

$success = $error = '';

// Récupérer le message de succès de la session
if (isset($_SESSION['success'])) {
  $success = $_SESSION['success'];
  unset($_SESSION['success']);
}

// Récupération des cycles existants
try {
  $sql = "SELECT c.*, 
          (SELECT COUNT(DISTINCT id_filiere) FROM Avoir WHERE id_cycle = c.id_cycle) as nb_filieres 
          FROM Cycle c 
          ORDER BY c.nom";
  $stmt = $conn->query($sql);
  $cycles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  $error = "Erreur lors de la récupération des cycles.";
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
  <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.svg" />

  <!-- Site Title -->
  <title>Gestion des Cycles | EduPath</title>
  <?php include_once '../edit/css.php'; ?>
  <link rel="stylesheet" href="style.css">
</head>

<body class="ep-magic-cursor">
  <?php include_once '../magic.php'; ?>

  <!-- End Header Area -->
  <div id="smooth-wrapper">
    <div id="smooth-content">
      <main>
       
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-6 col-12">
                <div class="ep-breadcrumbs__content">
                  <h3 class="ep-breadcrumbs__title">Cycles d'Études</h3>
                  <ul class="ep-breadcrumbs__menu">
                    <li>
                      <a href="../dashboard.php">Tableau de bord</a>
                    </li>
                    <li>
                      <i class="fi-bs-angle-right"></i>
                    </li>
                    <li class="active">
                      <a href="#">Cycles d'études</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Breadcrumbs Area -->

        <!-- Start Event Area -->
        <section class="ep-blog section-gap position-relative pd-top-90">
          <div class="container ep-container">
            <?php if ($success): ?>
              <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>

            <?php if ($error): ?>
              <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="row mb-4">
              <div class="col-12 d-flex justify-content-between align-items-center">
                <h3 class="ep-section__title">Liste des cycles d'études</h3>
                <a href="../add/add_cycle.php" class="ep-btn">
                  <i class="fi fi-rs-plus"></i> Ajouter
                </a>
              </div>
            </div>

            <div class="row">
              <?php foreach ($cycles as $cycle): ?>
                <!-- Single Event Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12 mb-4">
                  <div class="ep-blog__card wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                    <a href="../view/view_cycle.php?id=<?php echo $cycle['id_cycle']; ?>" class="ep-blog__img">
                    </a>
                    <div class="ep-blog__info">
                      <div class="ep-blog__date ep1-bg">
                        <?php echo $cycle['nbre_annee']; ?> <br />
                        an(s)
                      </div>
                      <div class="ep-blog__location">
                        <i class="fi fi-rs-graduation-cap"></i>
                        <span><?php echo $cycle['nb_filieres']; ?> filière(s)</span>
                      </div>
                      <div class="ep-blog__content">
                        <a href="../view/view_cycle.php?id=<?php echo $cycle['id_cycle']; ?>" class="ep-blog__title">
                          <h5><?php echo htmlspecialchars($cycle['nom']); ?></h5>
                        </a>
                        <p class="ep-blog__text">
                          Cycle d'études de <?php echo htmlspecialchars($cycle['nbre_annee']); ?> année(s) avec 
                          <?php echo $cycle['nb_filieres']; ?> filière(s) associée(s).
                        </p>
                        <div class="ep-blog__btn d-flex justify-content-between">
                          <a href="../view/view_cycle.php?id=<?php echo $cycle['id_cycle']; ?>">
                            Détails <i class="fi fi-rs-arrow-small-right"></i>
                          </a>
                          <div>
                            <a href="../edit/edit_cycle.php?id=<?php echo $cycle['id_cycle']; ?>" 
                               class="text-primary me-2">
                              <i class="icofont-edit"></i>
                            </a>
                            <a href="../delete/delete_cycle.php?id=<?php echo $cycle['id_cycle']; ?>" 
                               class="text-danger"
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cycle ?');">
                              <i class="icofont-trash"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </section>
        <!-- End Event Area -->
      </main>
      <?php include_once '../include/footer.php'; ?>
    </div>
  </div>

  <?php include_once '../edit/script.php'; ?>
</body>
</html>
