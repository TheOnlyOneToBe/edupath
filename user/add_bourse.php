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
    $caracteristique = trim($_POST['caracteristique'] ?? '');
    $id_utilisateur = $_SESSION['id_utilisateur'] ?? null; // Récupérer l'id de l'utilisateur connecté

    if (!empty($caracteristique)) {
        try {
            $sql = "INSERT INTO Bourse (caracteristique, id_utilisateur) VALUES (:caracteristique, :id_utilisateur)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':caracteristique' => $caracteristique,
                ':id_utilisateur' => $id_utilisateur
            ]);

            $_SESSION['success'] = "La bourse a été ajoutée avec succès!";
            header('Location: bourses.php');
            exit();
            
        } catch (PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout de la bourse: " . $e->getMessage();
        }
    } else {
        $error = "Tous les champs sont requis.";
    }
}

?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
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
                                        Ajouter une bourse
                                    </h3>
                                    <form method="POST" action="add_bourse.php">

                                        <div class="form-group">
                                            <label for="caracteristique" class="form-label">Caractéristiques *</label>
                                            <textarea class="form-control" id="caracteristique" name="caracteristique" rows="3" required></textarea>
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