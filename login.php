<?php
session_start();
require_once 'config/database.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($login) && !empty($password)) {
        try {
            $sql = "SELECT * FROM Utilisateur WHERE login = :login AND password = :password";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':login' => $login,
                ':password' => $password // Note: Dans un cas réel, utiliser password_hash() et password_verify()
            ]);

            if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Création de la session
               $_SESSION['user'] =  [
                'user_id' => $user['id_utilisateur'],
                'user_login' => $user['login'],
                'user_fonction' => $user['fonction'],
               ];

                // Redirection vers la page d'accueil
                header('Location: index.php');
                exit();
            } else {
                $error = "Email ou mot de passe incorrect";
            }
        } catch(PDOException $e) {
            $error = "Une erreur est survenue lors de la connexion.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
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
    <title>Edupath - Connexion</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/plugins/css/bootstrap.min.css" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/plugins/css/animate.min.css" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="assets/plugins/css/owl.carousel.min.css" />
    <!-- Maginific Popup CSS -->
    <link rel="stylesheet" href="assets/plugins/css/maginific-popup.min.css" />
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/plugins/css/nice-select.min.css" />
    <!-- Icofont -->
    <link rel="stylesheet" href="assets/plugins/css/icofont.css" />
    <!-- Uicons -->
    <link rel="stylesheet" href="assets/plugins/css/uicons.css" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="ep-magic-cursor">
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger" style="margin: 20px;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <!-- Start Preloader  -->
    <div id="preloader">
      <div id="ep-preloader" class="ep-preloader">
        <div class="animation-preloader">
          <div class="spinner"></div>
        </div>
      </div>
    </div>

  <?php include_once 'user/magic.php'; ?>

    <!-- End Header Area -->
    <div id="smooth-wrapper">
      <div id="smooth-content">
        <main>
          <!-- Start Auth Area -->
          <section class="ep-auth auth-login section-gap position-relative">
            <div class="container ep-container">
              <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-6 col-md-7 col-9">
                  <div class="ep-auth__card">
                    <div class="ep-auth__card-head">
                      <h3 class="ep-auth__card-title">Bienvenu !</h3>
                      <p class="ep-auth__card-text">Connecte toi a ton compte</p>
                    </div>
                    <div class="ep-auth__card-body">
                      <form action="login.php" method="post" class="ep-auth__card-form">
                        <div class="form-group">
                          <label>Login</label>
                          <input
                            type="text"
                            name="email"
                            placeholder="Entrer votre login"
                            required
                          />
                        </div>
                        <div class="form-group">
                          <label>Mot de passe</label>
                          <div class="form-group-input">
                            <input
                              type="password"
                              id="password"
                              name="password"
                              placeholder="Entrer le mot de passe"
                              required
                            />
                            <span
                              class="toggle-password"
                              onclick="togglePassword('password')"
                              >Show</span
                            >
                          </div>
                        </div>
                        <div class="ep-auth__card-form-btn">
                          <button type="submit" class="ep-btn">Se connecter</button>
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Auth Area -->
        </main>
        
      </div>
    </div>

    <?php 
    include 'includes/scripts.php'; 
    ?>
    <script>
        function togglePassword(id) {
            var element = document.getElementById(id);
            if (element.type === "password") {
                element.type = "text";
            } else {
                element.type = "password";
            }
        }
    </script>
  </body>

<!-- Mirrored from edupath-template.vercel.app/edupath/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:10 GMT -->
</html>