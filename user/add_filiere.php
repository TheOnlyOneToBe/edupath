<?php
session_start();
require_once '../config/database.php';

$success = $error = '';

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'] ?? '';
    $description = $_POST['description'] ?? '';
    $id_utilisateur = $_SESSION['user']['user_id'] ?? null;

    if (!empty($nom)) {
        try {
            // Vérifier si le cycle existe déjà
            $check_sql = "SELECT COUNT(*) FROM filiere WHERE nom = :nom";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->execute([':nom' => $nom]);

            if ($check_stmt->fetchColumn() > 0) {
                $error = "Une filière avec ce nom existe déjà.";
            } else {

                $sql = "INSERT INTO filiere (nom, description) VALUES (:nom, :description)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':nom' => $nom,
                    ':description' => $description
                ]);

                $_SESSION['success'] = "La filière a été ajouté avec succès!";
                header('Location: filieres.php');
                exit();
            }
        } catch (PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout de la filière: " . $e->getMessage();
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
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.svg" />

    <!-- Site Title -->
    <title>Ajouter une filiere | Filières</title>
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

                            <div class="offset-2 col-lg-11 col-xl-6 col-9">
                                <div class="ep-contact__form">
                                    <?php if ($error): ?>
                                        <div class="alert alert-danger"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                    <h3 class="ep-contact__form-title ep-split-text left">
                                        Ajouter une nouvelle filière
                                    </h3>
                                    <form method="POST" action="add_filiere.php">
                                        <div class="form-group">
                                            <label for="nom" class="form-label">Nom de la filière *</label>
                                            <input type="text" class="form-control" id="nom" name="nom" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="2"></textarea>
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