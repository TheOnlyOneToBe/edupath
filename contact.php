<?php
require_once 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $sujet = $_POST['sujet'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!empty($nom) && !empty($email) && !empty($sujet) && !empty($message)) {
        try {
            $sql = "INSERT INTO Contact (nom, email, sujet, message) VALUES (:nom, :email, :sujet, :message)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':email' => $email,
                ':sujet' => $sujet,
                ':message' => $message
            ]);
            $success = "Votre message a été envoyé avec succès!";
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de l'envoi du message.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html class="no-js">
  
<!-- Mirrored from <?php include 'name.php' ;  ?>-template.vercel.app/<?php include 'name.php' ;  ?>/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="robots" content="all" />
    <meta
      name="keywords"
      content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement"
    />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- Site Title -->
    <title><?php include 'name.php' ;  ?> - Contact</title>
<?php include 'includes/head.php'; ?>
  </head>
  <body class="ep-magic-cursor">
    <!-- Start Preloader  -->
    <div id="preloader">
      <div id="ep-preloader" class="ep-preloader">
        <div class="animation-preloader">
          <div class="spinner"></div>
        </div>
      </div>
    </div>
 <?php include 'includes/header.php';
?>



<!-- Start Contact Area -->
<section class="ep-contact section-gap position-relative pb-0">
    <div class="container ep-container">
        <div class="row">
            <div class="col-lg-12">
                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 col-xl-5 col-12">
                <div class="ep-contact__info">
                    <h3>Contactez-nous</h3>
                    <p>N'hésitez pas à nous contacter pour toute question ou information.</p>
                    <div class="ep-contact__info-content">
                        <div class="single-info">
                            <i class="fa-solid fa-location-dot"></i>
                            <div class="info-content">
                                <h5>Notre adresse</h5>
                                <p>123 Rue Example, Ville, Pays</p>
                            </div>
                        </div>
                        <div class="single-info">
                            <i class="fa-solid fa-phone"></i>
                            <div class="info-content">
                                <h5>Téléphone</h5>
                                <p>+1 234 567 890</p>
                            </div>
                        </div>
                        <div class="single-info">
                            <i class="fa-solid fa-envelope"></i>
                            <div class="info-content">
                                <h5>Email</h5>
                                <p>contact@<?php include 'name.php' ;  ?>.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-7 col-12">
                <div class="ep-contact__form">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <input type="text" name="nom" placeholder="Votre nom" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Votre email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="sujet" placeholder="Sujet" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="message" placeholder="Votre message" required></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="ep-btn ep-btn--primary">Envoyer le message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Area -->

<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
  </body>
</html>
