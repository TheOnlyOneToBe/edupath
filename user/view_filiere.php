<?php
session_start();
include_once '../config/database.php';
include_once 'include/auth.php';

if(!isLoggedIn() && isAdmin()){
    header('Location:../login.php');
    exit();
}

// Get filiere ID from URL parameter
$id_filiere = $_GET['id'] ?? null;

if (!$id_filiere) {
    header('Location: filieres.php');
    exit();
}

try {
    // Get detailed information about the filiere
    $sql = "SELECT f.*, u.login as createur, u.fonction as fonction_createur
            FROM Filiere f 
            LEFT JOIN Utilisateur u ON f.id_utilisateur = u.id_utilisateur 
            WHERE f.id_filiere = :id_filiere";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_filiere' => $id_filiere]);
    $filiere = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$filiere) {
        $_SESSION['error'] = "Cette filière n'existe pas.";
        header('Location: filieres.php');
        exit();
    }

    // Get cycles associated with this filiere
    $sql_cycles = "SELECT c.*, a.montant_inscription, a.montant_scolarite 
                  FROM Cycle c 
                  JOIN Avoir a ON c.id_cycle = a.id_cycle 
                  WHERE a.id_filiere = :id_filiere";
    
    $stmt_cycles = $conn->prepare($sql_cycles);
    $stmt_cycles->execute([':id_filiere' => $id_filiere]);
    $cycles = $stmt_cycles->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    $_SESSION['error'] = "Erreur lors de la récupération des détails de la filière.";
    header('Location: filieres.php');
    exit();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Détails de la Filière | <?php include '../name.php' ;  ?></title>
    <?php include_once 'css.php'; ?>
</head>

<body class="ep-magic-cursor">
    <?php include_once 'include/navbar.php'; ?>
    <?php include_once 'magic.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <section class="ep-contact section-gap position-relative pb-0">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="ep-contact__form">
                                    <h3 class="ep-contact__form-title ep-split-text left mb-4">
                                        Détails de la Filière
                                    </h3>

                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <h5 class="card-title">Nom de la filière</h5>
                                                    <p class="card-text"><?php echo htmlspecialchars($filiere['nom']); ?></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="card-title">Créateur</h5>
                                                    <p class="card-text">
                                                        <?php echo htmlspecialchars($filiere['createur'] ?? 'Non assigné'); ?>
                                                        (<?php echo htmlspecialchars($filiere['fonction_createur'] ?? 'N/A'); ?>)
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="card-title">Description</h5>
                                                    <p class="card-text"><?php echo nl2br(htmlspecialchars($filiere['description'])); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Cycles associés à cette filière -->
                                    <?php if (!empty($cycles)): ?>
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="mb-0">Cycles associés à cette filière</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Nom du cycle</th>
                                                            <th>Durée</th>
                                                            <th>Montant inscription</th>
                                                            <th>Montant scolarité</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($cycles as $cycle): ?>
                                                        <tr>
                                                            <td><?php echo htmlspecialchars($cycle['nom']); ?></td>
                                                            <td><?php echo htmlspecialchars($cycle['nbre_annee']); ?></td>
                                                            <td><?php echo number_format($cycle['montant_inscription'], 0, ',', ' '); ?> FCFA</td>
                                                            <td><?php echo number_format($cycle['montant_scolarite'], 0, ',', ' '); ?> FCFA</td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <a href="filieres.php" class="ep-btn">Retour à la liste</a>
                                        </div>
                                        <?php if (isset($_SESSION['user']) && ($_SESSION['user']['fonction'] === 'admin' || $_SESSION['user']['id_utilisateur'] === $filiere['id_utilisateur'])): ?>
                                        <div class="col-md-6 text-end">
                                            <a href="edit_filiere.php?id=<?php echo $filiere['id_filiere']; ?>" class="ep-btn">Modifier</a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>
</html>