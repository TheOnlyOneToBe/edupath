<?php
session_start();
include_once '../config/database.php';
include_once 'include/auth.php';

if(!isLoggedIn() && isAdmin()){
    header('Location:../login.php');
    exit();
}

// Récupérer des statistiques pour le tableau de bord
$stats = [
    'utilisateurs' => 0,
    'filieres' => 0,
    'cycles' => 0,
    'bourses' => 0,
    'partenaires' => 0,
    'articles' => 0
];

try {
    // Compter les utilisateurs
    $stmt = $conn->query("SELECT COUNT(*) FROM Utilisateur");
    $stats['utilisateurs'] = $stmt->fetchColumn();
    
    // Compter les filières
    $stmt = $conn->query("SELECT COUNT(*) FROM Filiere");
    $stats['filieres'] = $stmt->fetchColumn();
    
    // Compter les cycles
    $stmt = $conn->query("SELECT COUNT(*) FROM Cycle");
    $stats['cycles'] = $stmt->fetchColumn();
    
    // Compter les bourses
    $stmt = $conn->query("SELECT COUNT(*) FROM Bourse");
    $stats['bourses'] = $stmt->fetchColumn();
    
    // Compter les partenaires
    $stmt = $conn->query("SELECT COUNT(*) FROM Partenaire");
    $stats['partenaires'] = $stmt->fetchColumn();
    
    // Compter les articles
    $stmt = $conn->query("SELECT COUNT(*) FROM Article");
    $stats['articles'] = $stmt->fetchColumn();
} catch(PDOException $e) {
    // Gérer l'erreur silencieusement
}
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Tableau de Bord - <?php include '../name.php' ;  ?></title>
    <?php include_once 'css.php'; ?>
    <style>
        .dashboard-card {
            transition: all 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        .dashboard-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        .dashboard-count {
            font-size: 1.8rem;
            font-weight: bold;
        }
        .dashboard-title {
            font-size: 1.2rem;
            color: #666;
        }
    </style>
</head>
<body class="ep-magic-cursor">
    <?php include_once 'include/navbar.php'; ?>
    <?php include_once 'magic.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <!-- Start Breadcrumbs Area -->
                <div class="ep-breadcrumbs breadcrumbs-bg background-image" 
                     style="background-image: url('../assets/images/breadcrumbs-bg.png')">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="ep-breadcrumbs__content">
                                    <h3 class="ep-breadcrumbs__title">Tableau de Bord</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li class="active">Tableau de bord</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <!-- Start Dashboard Area -->
                <section class="ep-blog section-gap position-relative pd-top-90">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <h2>Bienvenue, <?php echo htmlspecialchars($user['login'] ?? 'Utilisateur'); ?></h2>
                                <p>Voici un aperçu de votre plateforme <?php include '../name.php' ;  ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Utilisateurs Card -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="dashboard-card bg-white p-4 text-center">
                                    <div class="dashboard-icon text-primary">
                                        <i class="fi fi-bs-user"></i>
                                    </div>
                                    <div class="dashboard-count"><?php echo $stats['utilisateurs']; ?></div>
                                    <div class="dashboard-title">Utilisateurs</div>
                                    <a href="utilisateurs.php" class="btn btn-sm btn-outline-primary mt-3">Gérer</a>
                                </div>
                            </div>

                            <!-- Filières Card -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="dashboard-card bg-white p-4 text-center">
                                    <div class="dashboard-icon text-success">
                                        <i class="fi fi-bs-book-alt"></i>
                                    </div>
                                    <div class="dashboard-count"><?php echo $stats['filieres']; ?></div>
                                    <div class="dashboard-title">Filières</div>
                                    <a href="filieres.php" class="btn btn-sm btn-outline-success mt-3">Gérer</a>
                                </div>
                            </div>

                            <!-- Cycles Card -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="dashboard-card bg-white p-4 text-center">
                                    <div class="dashboard-icon text-info">
                                        <i class="fi fi-bs-refresh"></i>
                                    </div>
                                    <div class="dashboard-count"><?php echo $stats['cycles']; ?></div>
                                    <div class="dashboard-title">Cycles</div>
                                    <a href="cycles.php" class="btn btn-sm btn-outline-info mt-3">Gérer</a>
                                </div>
                            </div>

                            <!-- Bourses Card -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="dashboard-card bg-white p-4 text-center">
                                    <div class="dashboard-icon text-warning">
                                        <i class="fi fi-bs-usd-circle"></i>
                                    </div>
                                    <div class="dashboard-count"><?php echo $stats['bourses']; ?></div>
                                    <div class="dashboard-title">Bourses</div>
                                    <a href="bourses.php" class="btn btn-sm btn-outline-warning mt-3">Gérer</a>
                                </div>
                            </div>

                            <!-- Partenaires Card -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="dashboard-card bg-white p-4 text-center">
                                    <div class="dashboard-icon text-danger">
                                        <i class="fi fi-bs-users-alt"></i>
                                    </div>
                                    <div class="dashboard-count"><?php echo $stats['partenaires']; ?></div>
                                    <div class="dashboard-title">Partenaires</div>
                                    <a href="partenaires.php" class="btn btn-sm btn-outline-danger mt-3">Gérer</a>
                                </div>
                            </div>

                            <!-- Articles Card -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="dashboard-card bg-white p-4 text-center">
                                    <div class="dashboard-icon text-secondary">
                                        <i class="fi fi-bs-document"></i>
                                    </div>
                                    <div class="dashboard-count"><?php echo $stats['articles']; ?></div>
                                    <div class="dashboard-title">Articles</div>
                                    <a href="articles.php" class="btn btn-sm btn-outline-secondary mt-3">Gérer</a>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions Section -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 class="mb-4">Actions Rapides</h3>
                            </div>
                            
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <a href="add_user.php" class="btn btn-primary w-100 py-3">
                                    <i class="fi fi-bs-user-add me-2"></i> Ajouter un utilisateur
                                </a>
                            </div>
                            
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <a href="add_filiere.php" class="btn btn-success w-100 py-3">
                                    <i class="fi fi-bs-book-alt me-2"></i> Ajouter une filière
                                </a>
                            </div>
                            
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <a href="add_cycle.php" class="btn btn-info w-100 py-3">
                                    <i class="fi fi-bs-refresh me-2"></i> Ajouter un cycle
                                </a>
                            </div>
                            
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <a href="add_bourse.php" class="btn btn-warning w-100 py-3">
                                    <i class="fi fi-bs-usd-circle me-2"></i> Ajouter une bourse
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Dashboard Area -->
            </main>
            <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>
</html>