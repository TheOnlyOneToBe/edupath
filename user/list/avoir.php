<?php
session_start();
require_once '../../config/database.php';

$success = $error = '';

// Récupérer le message de succès de la session
if (isset($_SESSION['success'])) {
  $success = $_SESSION['success'];
  unset($_SESSION['success']);
}

// Récupération des associations existantes
try {
  $sql = "SELECT a.*, f.nom as nom_filiere, c.nom as nom_cycle, c.nbre_annee 
            FROM Avoir a 
            JOIN Filiere f ON a.id_filiere = f.id_filiere 
            JOIN Cycle c ON a.id_cycle = c.id_cycle 
            ORDER BY f.nom, c.nom";
  $stmt = $conn->query($sql);
  $associations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  $error = "Erreur lors de la récupération des associations.";
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
  <title>Gestion des Frais de Scolarité | EduPath</title>
  <?php include_once '../edit/css.php'; ?>
  <link rel="stylesheet" href="style.css">
</head>

<body class="ep-magic-cursor">
  <?php include_once '../magic.php'; ?>

  <!-- End Header Area -->
  <div id="smooth-wrapper">
    <div id="smooth-content">
      <main>
        <!-- Start Breadcrumbs Area -->
        <div
          class="ep-breadcrumbs breadcrumbs-bg background-image"
          style="background-image: url('../../assets/images/breadcrumbs-bg.png')"
        >
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-6 col-12">
                <div class="ep-breadcrumbs__content">
                  <h3 class="ep-breadcrumbs__title">Frais de Scolarité</h3>
                  <ul class="ep-breadcrumbs__menu">
                    <li>
                      <a href="../dashboard.php">Tableau de bord</a>
                    </li>
                    <li>
                      <i class="fi-bs-angle-right"></i>
                    </li>
                    <li class="active">
                      <a href="#">Frais de scolarité</a>
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
                <h3 class="ep-section__title">Liste des frais de scolarité</h3>
                <div>
                  <a href="../add/add_avoir.php" class="ep-btn">
                    <i class="fi fi-rs-plus"></i> Ajouter
                  </a>
                </div>
              </div>
            </div>

            <div class="row">
              <?php foreach ($associations as $assoc): ?>
                <!-- Single Event Card -->
                <div class="col-lg-6 col-xl-4 col-md-6 col-12 mb-4">
                  <div class="ep-blog__card wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                    <a href="../view/view_avoir.php?filiere=<?php echo $assoc['id_filiere']; ?>&cycle=<?php echo $assoc['id_cycle']; ?>" class="ep-blog__img">
                      <img src="../../assets/img/souriante-jeune-etudiante-livres-sac_13339-196812.avif" alt="frais-img" />
                    </a>
                    <div class="ep-blog__info">
                      <div class="ep-blog__date ep1-bg">
                        <?php echo $assoc['nbre_annee']; ?> <br />
                        an(s)
                      </div>
                      <div class="ep-blog__location">
                        <i class="fi fi-rs-graduation-cap"></i>
                        <span><?php echo htmlspecialchars($assoc['nom_cycle']); ?></span>
                      </div>
                      <div class="ep-blog__content">
                        <a href="../view/view_avoir.php?filiere=<?php echo $assoc['id_filiere']; ?>&cycle=<?php echo $assoc['id_cycle']; ?>" class="ep-blog__title">
                          <h5><?php echo htmlspecialchars($assoc['nom_filiere']); ?></h5>
                        </a>
                        <p class="ep-blog__text">
                          <strong>Inscription:</strong> <?php echo number_format($assoc['montant_inscription'], 0, ',', ' '); ?> FCFA<br>
                          <strong>Scolarité:</strong> <?php echo number_format($assoc['montant_scolarite'], 0, ',', ' '); ?> FCFA
                        </p>
                        <div class="ep-blog__btn d-flex justify-content-between">
                          <a href="../view/view_avoir.php?filiere=<?php echo $assoc['id_filiere']; ?>&cycle=<?php echo $assoc['id_cycle']; ?>">
                            Détails <i class="fi fi-rs-arrow-small-right"></i>
                          </a>
                          <div>
                            <a href="../edit/edit_avoir.php?filiere=<?php echo $assoc['id_filiere']; ?>&cycle=<?php echo $assoc['id_cycle']; ?>" 
                               class="text-primary me-2">
                              <i class="icofont-edit"></i>
                            </a>
                            <a href="../delete/delete_avoir.php?filiere=<?php echo $assoc['id_filiere']; ?>&cycle=<?php echo $assoc['id_cycle']; ?>" 
                               class="text-danger delete-link">
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

  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Êtes-vous sûr de vouloir supprimer les frais de scolarité pour cette filière et ce cycle ?</p>
          <p class="mb-0"><strong>Filière :</strong> <span id="deleteFiliereName"></span></p>
          <p><strong>Cycle :</strong> <span id="deleteCycleName"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="ep-btn ep-btn--cancel" data-bs-dismiss="modal">Annuler</button>
          <a href="#" id="deleteConfirmBtn" class="ep-btn ep-btn--danger">Supprimer</a>
        </div>
      </div>
    </div>
  </div>

  <?php include_once '../edit/script.php'; ?>

  <!-- Delete Modal Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const deleteModal = document.getElementById('deleteModal');
      const deleteFiliereName = document.getElementById('deleteFiliereName');
      const deleteCycleName = document.getElementById('deleteCycleName');
      const deleteConfirmBtn = document.getElementById('deleteConfirmBtn');

      // Update delete links to use modal
      document.querySelectorAll('.delete-link').forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          const card = this.closest('.ep-blog__card');
          const filiereName = card.querySelector('.ep-blog__title h5').textContent;
          const cycleName = card.querySelector('.ep-blog__location span').textContent;
          const deleteUrl = this.getAttribute('href');

          deleteFiliereName.textContent = filiereName;
          deleteCycleName.textContent = cycleName;
          deleteConfirmBtn.href = deleteUrl;
          
          const bsModal = new bootstrap.Modal(deleteModal);
          bsModal.show();
        });
      });
    });
  </script>
</body>
</html>