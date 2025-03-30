<?php
session_start();
include_once '../config/database.php';
include_once 'include/auth.php';

if(!isLoggedIn() && !isAdmin()){
    header('Location:../login.php');
    exit();
}

$success = $error = '';

// Get list of filieres and cycles for dropdown
try {
    $stmt_filieres = $conn->query("SELECT * FROM Filiere");
    $filieres = $stmt_filieres->fetchAll();

    $stmt_cycles = $conn->query("SELECT * FROM Cycle");
    $cycles = $stmt_cycles->fetchAll();
} catch (PDOException $e) {
    $error = "Erreur de récupération des données: " . $e->getMessage();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_filiere = $_POST['id_filiere'] ?? '';
    $id_cycle = $_POST['id_cycle'] ?? '';
    $montant_inscription = $_POST['montant_inscription'] ?? '';
    $montant_scolarite = $_POST['montant_scolarite'] ?? '';

    if (!empty($id_filiere) && !empty($id_cycle) && !empty($montant_inscription) && !empty($montant_scolarite)) {
        try {
            // Check if combination already exists
            $check_sql = "SELECT COUNT(*) FROM Avoir WHERE id_filiere = :id_filiere AND id_cycle = :id_cycle";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->execute([
                ':id_filiere' => $id_filiere,
                ':id_cycle' => $id_cycle
            ]);

            if ($check_stmt->fetchColumn() > 0) {
                $error = "Cette association filière-cycle existe déjà!";
            } else {
                // Insert new record if combination doesn't exist
                $sql = "INSERT INTO Avoir (id_filiere, id_cycle, montant_inscription, montant_scolarite) 
                        VALUES (:id_filiere, :id_cycle, :montant_inscription, :montant_scolarite)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':id_filiere' => $id_filiere,
                    ':id_cycle' => $id_cycle,
                    ':montant_inscription' => $montant_inscription,
                    ':montant_scolarite' => $montant_scolarite
                ]);

                $_SESSION['success'] = "L'association a été ajoutée avec succès!";
                header('Location: avoir.php');
                exit();
            }
        } catch (PDOException $e) {
            $error = "Une erreur est survenue lors de l'ajout: " . $e->getMessage();
        }
    } else {
        $error = "Tous les champs sont requis.";
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
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />
    <meta
        name="keywords"
        content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.svg" />

    <!-- Site Title -->
    <title>Ajouter une association Filière-Cycle | Avoirs</title>
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

                            <div class="offset-2 col-lg-11 col-xl-7 col-9">
                                <div class="ep-contact__form">
                                    <?php if ($error): ?>
                                        <div class="alert alert-danger"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                    <h3 class="ep-contact__form-title ep-split-text left">
                                        Ajouter une Filière-Cycle
                                    </h3>
                                    <form method="POST" action="add_avoir.php">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class=" form-group">
                                                    <label for="id_filiere" class="form-label">Filière *</label>

                                                    <select class="form-control" id="id_filiere" name="id_filiere" required>
                                                        <option value="">Sélectionnez une filière</option>
                                                        <?php foreach ($filieres as $filiere): ?>
                                                            <option value="<?php echo $filiere['id_filiere']; ?>">
                                                                <?php echo htmlspecialchars($filiere['nom']); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <br>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group ">
                                                    <label for="id_cycle" class="form-label">Cycle *</label>

                                                    <select class="form-control" id="id_cycle" name="id_cycle" required>
                                                        <option class="form-control" value="">Sélectionnez un cycle</option>
                                                        <?php foreach ($cycles as $cycle): ?>
                                                            <option class="form-control" value="<?php echo $cycle['id_cycle']; ?>">
                                                                <?php echo htmlspecialchars($cycle['nom']); ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="montant_inscription" class="form-label">Montant Inscription *</label>
                                                    <input type="number" class="form-control" id="montant_inscription" name="montant_inscription" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="montant_scolarite" class="form-label">Montant Scolarité *</label>
                                                    <input type="number" class="form-control" id="montant_scolarite" name="montant_scolarite" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="ep-btn">Ajouter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Contact Area -->

            </main>
            <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>

</body>

<!-- Mirrored from <?php include '../name.php' ;  ?>-template.vercel.app/<?php include '../name.php' ;  ?>/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:20 GMT -->

</html>