<?php
session_start();
include_once '../config/database.php';
include_once 'include/auth.php';

if(!isLoggedIn() && !isAdmin()){
    header('Location:../login.php');
    exit();
}

// Get contact ID from URL parameter
$id_contact = $_GET['id'] ?? null;

if (!$id_contact) {
    header('Location: contacts.php');
    exit();
}

$check=$conn->prepare('SELECT * FROM contact WHERE id_contact=:id');
$check->execute(['id'=>$id_contact]);

if($check->fetchColumn()==0){
    $_SESSION['error']= "Le message n'a pas éte trouvé";
    header('Location: contacts.php');
    exit();
}

try {
    // Get detailed information about the contact
    $sql = "SELECT * FROM Contact WHERE id_contact = :id_contact";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_contact' => $id_contact]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contact) {
        $_SESSION['error'] = "Ce message n'existe pas.";
        header('Location: contacts.php');
        exit();
    }
} catch(PDOException $e) {
    $_SESSION['error'] = "Erreur lors de la récupération des détails du message.";
    header('Location: contacts.php');
    exit();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="ZXX">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="all" />
    <meta name="keywords" content="online learning, education, e-learning, courses, tutorials, educational resources, skill development, career enhancement" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.svg" />

    <!-- Site Title -->
    <title>Détails du Message | <?php include '../name.php' ;  ?></title>
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
                                    <h3 class="ep-breadcrumbs__title">Détails du Message</h3>
                                    <ul class="ep-breadcrumbs__menu">
                                        <li>
                                            <a href="dashboard.php">Tableau de bord</a>
                                        </li>
                                        <li>
                                            <i class="fi-bs-angle-right"></i>
                                        </li>
                                        <li>
                                            <a href="contacts.php">Contacts</a>
                                        </li>
                                        <li>
                                            <i class="fi-bs-angle-right"></i>
                                        </li>
                                        <li class="active">
                                            <a href="#">Détails</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Breadcrumbs Area -->

                <!-- Start Blog Details Area -->
                <section class="ep-blog__details section-gap position-relative">
                    <div class="container ep-container">
                        <div class="row">
                            <div class="col-lg-12 col-xl-8 col-12">
                                <div class="ep-blog__details-main">
                                    <div class="ep-blog__details-top">
                                        <span class="ep-blog__details-category">Message de contact</span>
                                        <h2 class="ep-blog__details-title">
                                            <?php echo htmlspecialchars($contact['sujet']); ?>
                                        </h2>
                                        <div class="ep-blog__details-meta">
                                            <div class="ep-blog__details-author">
                                                <div class="ep-blog__details-author-img">
                                                    <img src="../assets/images/blog/author-1.jpg" alt="author">
                                                </div>
                                                <div class="ep-blog__details-author-content">
                                                    <h5 class="ep-blog__details-author-title"><?php echo htmlspecialchars($contact['nom']); ?></h5>
                                                    <p><?php echo htmlspecialchars($contact['email']); ?></p>
                                                </div>
                                            </div>
                                            <div class="ep-blog__details-date">
                                                <i class="fi fi-rr-calendar"></i>
                                                <?php echo date('d M Y', strtotime($contact['date_envoi'])); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="ep-blog__details-content">
                                        <p><?php echo nl2br(htmlspecialchars($contact['message'])); ?></p>
                                    </div>
                                    
                                    <div class="ep-blog__details-share">
                                        <h4 class="ep-blog__details-share-title">Actions</h4>
                                        <ul class="ep-blog__details-share-list">
                                            <li>
                                                <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>" class="facebook">
                                                    <i class="icofont-email"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="delete/delete_contact.php?id=<?php echo $contact['id_contact']; ?>" 
                                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');" 
                                                   class="twitter">
                                                    <i class="icofont-trash"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="contacts.php" class="linkedin">
                                                    <i class="icofont-listine-dots"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-xl-4 col-12">
                                <div class="ep-blog__sidebar">
                                    <!-- Informations du contact -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-widget-title">Informations du message</h4>
                                        <div class="ep-blog__sidebar-category">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <span>Nom</span>
                                                        <span><?php echo htmlspecialchars($contact['nom']); ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span>Email</span>
                                                        <span><?php echo htmlspecialchars($contact['email']); ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span>Date</span>
                                                        <span><?php echo date('d/m/Y H:i', strtotime($contact['date_envoi'])); ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="active">
                                                        <span>Sujet</span>
                                                        <span><?php echo htmlspecialchars($contact['sujet']); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <!-- Boutons d'action -->
                                    <div class="ep-blog__sidebar-widget">
                                        <h4 class="ep-blog__sidebar-widget-title">Actions</h4>
                                        <div class="ep-blog__sidebar-btn">
                                            <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>" class="ep-btn">
                                                <i class="icofont-email"></i> Répondre
                                            </a>
                                        </div>
                                        <div class="ep-blog__sidebar-btn mt-3">
                                            <a href="contacts.php" class="ep-btn ep-btn-secondary">
                                                <i class="icofont-listine-dots"></i> Retour à la liste
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Blog Details Area -->
            </main>
            <?php include_once 'include/footer.php'; ?>
        </div>
    </div>

    <?php include_once 'script.php'; ?>
</body>
</html>