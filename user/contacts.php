<?php
session_start();
require_once '../config/database.php';

$success = $error = '';

// Récupérer le message de succès de la session
if (isset($_SESSION['success'])) {
  $success = $_SESSION['success'];
  unset($_SESSION['success']);
}

if(isset($_SESSION['error'])){
  $error=$_SESSION['error'];
  unset($_SESSION['error']);
}
// Récupération des contacts existants
try {
  $sql = "SELECT * FROM Contact ORDER BY date_envoi DESC";
  $stmt = $conn->query($sql);
  $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  $error = "Erreur lors de la récupération des contacts.";
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
  <title>Gestion des Contacts | <?php include '../name.php' ;  ?></title>
  <?php include_once 'css.php'; ?>
</head>

<body class="ep-magic-cursor">
  <?php include_once 'include/navbar.php'; ?>
  <?php include_once 'magic.php'; ?>

  <!-- End Header Area -->
  <div id="smooth-wrapper">
    <div id="smooth-content">
      <main>
        <!-- Start Breadcrumbs Area -->
        <div
          class="ep-breadcrumbs breadcrumbs-bg background-image"
          style="background-image: url('../assets/images/breadcrumbs-bg.png')"
        >
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-6 col-12">
                <div class="ep-breadcrumbs__content">
                  <h3 class="ep-breadcrumbs__title">Gestion des Contacts</h3>
                  <ul class="ep-breadcrumbs__menu">
                    <li>
                      <a href="dashboard.php">Tableau de bord</a>
                    </li>
                    <li>
                      <i class="fi-bs-angle-right"></i>
                    </li>
                    <li class="active">
                      <a href="#">Contacts</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Breadcrumbs Area -->

        <!-- Start Contact List Area -->
        <section class="ep-contact-list section-gap position-relative">
          <div class="container ep-container">
            <?php if ($success): ?>
              <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>

            <?php if ($error): ?>
              <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="row mb-4">
              <div class="col-12">
                <h3 class="ep-section__title">Liste des messages de contact</h3>
              </div>
            </div>

            <div class="row">
              <?php if (count($contacts) > 0): ?>
                <?php foreach ($contacts as $contact): ?>
                  <!-- Single Contact Card -->
                  <div class="col-lg-6 col-xl-4 col-md-6 col-12 mb-4">
                    <div class="ep-contact-card wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                      <div class="ep-contact-card__header">
                        <div class="ep-contact-card__date">
                          <?php echo date('d', strtotime($contact['date_envoi'])); ?> <br />
                          <?php echo date('M', strtotime($contact['date_envoi'])); ?>
                        </div>
                        <div class="ep-contact-card__info">
                          <h5 class="ep-contact-card__name"><?php echo htmlspecialchars($contact['nom']); ?></h5>
                          <p class="ep-contact-card__email"><?php echo htmlspecialchars($contact['email']); ?></p>
                        </div>
                      </div>
                      <div class="ep-contact-card__content">
                        <h6 class="ep-contact-card__subject"><?php echo htmlspecialchars($contact['sujet']); ?></h6>
                        <p class="ep-contact-card__message">
                          <?php 
                            $message = htmlspecialchars($contact['message']);
                            echo (strlen($message) > 100) ? substr($message, 0, 100) . '...' : $message;
                          ?>
                        </p>
                      </div>
                      <div class="ep-contact-card__footer">
                        <a href="view_contact.php?id=<?php echo $contact['id_contact']; ?>" class="ep-btn ep-btn-sm">
                          Voir détails <i class="fi fi-rs-arrow-small-right"></i>
                        </a>
                        <a href="delete/delete_contact.php?id=<?php echo $contact['id_contact']; ?>" 
                           class="ep-btn ep-btn-sm ep-btn-danger"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
                          <i class="icofont-trash"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="col-12">
                  <div class="alert alert-info">Aucun message de contact trouvé.</div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </section>
        <!-- End Contact List Area -->
      </main>
      <?php include_once 'include/footer.php'; ?>
    </div>
  </div>

  <?php include_once 'script.php'; ?>
</body>
</html>