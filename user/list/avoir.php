<?php
session_start();
require_once '../../config/database.php';

$success = $error = '';

// Récupérer le message de succès de la session
if (isset($_SESSION['success'])) {
  $success = $_SESSION['success'];
  unset($_SESSION['success']);
}


// Récupération des filières
try {
  $sql = "SELECT * FROM Filiere ORDER BY nom";
  $stmt = $conn->query($sql);
  $filieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  $error = "Erreur lors de la récupération des filières.";
}

// Récupération des cycles
try {
  $sql = "SELECT * FROM Cycle ORDER BY nom";
  $stmt = $conn->query($sql);
  $cycles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  $error = "Erreur lors de la récupération des cycles.";
}

// Récupération des associations existantes
try {
  $sql = "SELECT a.*, f.nom as nom_filiere, c.nom as nom_cycle 
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
  <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg" />

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
        <!-- Start Contact Area -->
        <section class="ep-contact section-gap position-relative pb-0">
          <div class="container ep-container">
            <div class="row">
              <div class="col-12">
                <h3 class="ep-contact__form-title ep-split-text left mb-4">
                  Gestion des Frais de Scolarité
                </h3>

                <?php if ($success): ?>
                  <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>

                <?php if ($error): ?>
                  <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <!-- Liste des associations -->
                <div class="ep-contact__form">
                  <h4 class="mb-3">Liste des frais de scolarité</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Filière et cycle</th>
                          <th>Inscription</th>
                          <th>Scolarité</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($associations as $assoc): ?>
                          <tr>
                            <td>
                              <a href="../view/view_avoir.php?filiere=<?php echo $assoc['id_filiere']; ?>&cycle=<?php echo $assoc['id_cycle']; ?>">
                                <?php echo htmlspecialchars($assoc['nom_filiere'] ?? null); ?>
                                -
                                <?php echo htmlspecialchars($assoc['nom_cycle'] ?? null); ?>
                              </a>
                            </td>

                            <td><?php echo number_format($assoc['montant_inscription'] ?? null, 0, ',', ' '); ?> FCFA</td>
                            <td><?php echo number_format($assoc['montant_scolarite'] ?? null, 0, ',', ' '); ?> FCFA</td>
                            <td>
                              <a href="../edit/edit_avoir.php?filiere=<?php echo $assoc['id_filiere']; ?>&cycle=<?php echo $assoc['id_cycle']; ?>"
                                class="btn btn-sm btn-primary">
                                <i class="icofont-edit"></i>
                              </a>
                              <a href="../delete/delete_avoir.php?filiere=<?php echo $assoc['id_filiere']; ?>&cycle=<?php echo $assoc['id_cycle']; ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette association ?');">
                                <i class="icofont-trash"></i>
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
        </section>
        <br>
      </main>
      <br>
      <br>
      <?php include_once '../include/footer.php'; ?>
    </div>
  </div>

  <?php include_once '../edit/script.php'; ?>
</body>

</html>