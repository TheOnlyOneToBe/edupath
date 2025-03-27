<?php
session_start();
require_once '../config/database.php';

$success = $error = '';

// Traitement du formulaire d'ajout d'utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $fonction = trim($_POST['fonction'] ?? '');

    if (!empty($login) && !empty($password) && !empty($fonction)) {
        try {
            // Vérifier si le login existe déjà
            $check = $conn->prepare("SELECT COUNT(*) FROM Utilisateur WHERE login = ?");
            $check->execute([$login]);
            if ($check->fetchColumn() > 0) {
                $error = "Ce login existe déjà.";
            } else {
                // Hash du mot de passe
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO Utilisateur (login, password, fonction) VALUES (:login, :password, :fonction)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':login' => $login,
                    ':password' => $hashed_password,
                    ':fonction' => $fonction
                ]);

                $_SESSION['success'] = "L'utilisateur a été ajouté avec succès!";
                header('Location: /users.php');
                exit();
            }
        } catch (PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout de l'utilisateur: " . $e->getMessage();
        }
    } else {
        $error = "Tous les champs sont requis.";
    }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.svg" />

    <!-- Site Title -->
    <title>Ajouter un utilisateur | EduPath</title>
    <?php include_once 'css.php'; ?>
</head>

                      <body class="ep-magic-cursor"><?php include_once 'include/navbar.php'; ?>
    <?php include_once 'magic.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <section class="ep-contact section-gap position-relative pb-0">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="offset-2 col-lg-9 col-xl-5 col-9">
                                <div class="ep-contact__form">
                                    <?php if ($error): ?>
                                        <div class="alert alert-danger"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                    <h3 class="ep-contact__form-title ep-split-text left">
                                        Ajouter un utilisateur
                                    </h3>
                                    <form method="POST" action="add_user.php">
                                        <div class="form-group">
                                            <label for="login" class="form-label">Login *</label>
                                            <input type="text" class="form-control" id="login" name="login" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="form-label">Mot de passe *</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="fonction" class="form-label">Fonction *</label>
                                            <select class="form-control" id="fonction" name="fonction" required>
                                                <option value="">Sélectionner une fonction</option>
                                                <option value="admin">Administrateur</option>
                                                <option value="editor">Éditeur</option>
                                                <option value="user">Utilisateur</option>
                                            </select>
                                        </div>
                                        <br>
                                        <button type="submit" class="ep-btn">Ajouter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php include_once '../include/footer.php' ;?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>

</body>

<!-- Mirrored from edupath-template.vercel.app/edupath/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:20 GMT -->

</html>