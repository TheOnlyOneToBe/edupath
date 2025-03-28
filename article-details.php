<?php
require_once 'config/database.php';

// Check if article ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: articles.php');
    exit;
}

$id = $_GET['id'];

// Fetch article details
try {
    $sql = "SELECT a.*, u.login as auteur 
            FROM article a 
            LEFT JOIN utilisateur u ON a.id_utilisateur = u.id_utilisateur 
            WHERE a.id_article = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$article) {
        header('Location: articles.php');
        exit;
    }
} catch(PDOException $e) {
    $error = "Une erreur est survenue lors de la récupération de l'article: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="ZXX">
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
    <title><?php include 'name.php' ;  ?> - <?php echo $article['titre']; ?></title>

    <?php include_once 'includes/head.php';?>
</head>
<body class="ep-magic-cursor">
    <!-- ... existing code ... -->

    <!-- Start Header Area -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header Area -->
    <div id="smooth-wrapper">
      <div id="smooth-content">
        <main>
          <!-- Start Breadcrumbs Area -->
          <div
            class="ep-breadcrumbs breadcrumbs-bg background-image"
            style="background-image: url('assets/images/breadcrumbs-bg.png')"
          >
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="ep-breadcrumbs__content">
                    <h3 class="ep-breadcrumbs__title">Détails de l'article</h3>
                    <ul class="ep-breadcrumbs__menu">
                      <li>
                        <a href="index.php">Accueil</a>
                      </li>
                      <li>
                        <i class="fi-bs-angle-right"></i>
                      </li>
                      <li>
                        <a href="articles.php">Articles</a>
                      </li>
                      <li>
                        <i class="fi-bs-angle-right"></i>
                      </li>
                      <li class="active">
                        <a href="#"><?php echo $article['titre']; ?></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Breadcrumbs Area -->
          
          <!-- Start Article Details Area -->
          <section class="ep-course__details section-gap position-relative">
            <div class="container ep-container">
              <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
              <?php else: ?>
                <div class="row">
                  <div class="col-lg-8 mx-auto">
                    <div class="article-details">
                      <?php if(!empty($article['photo'])): ?>
                        <div class="article-image mb-4">
                          <img src="<?php echo $article['photo']; ?>" class="img-fluid rounded" alt="<?php echo $article['titre']; ?>">
                        </div>
                      <?php endif; ?>
                      
                      <div class="article-meta mb-3">
                        <span class="date">Publié le <?php echo date('d/m/Y', strtotime($article['date_pub'])); ?></span>
                        <?php if(!empty($article['auteur'])): ?>
                          <span class="author">par <?php echo $article['auteur']; ?></span>
                        <?php endif; ?>
                      </div>
                      
                      <h2 class="article-title mb-4"><?php echo $article['titre']; ?></h2>
                      
                      <div class="article-content">
                        <p><?php echo nl2br($article['description_art']); ?></p>
                      </div>
                      
                      <div class="article-actions mt-5">
                        <a href="articles.php" class="ep-btn ep-btn--primary">Retour aux articles</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </section>
          <!-- End Article Details Area -->
        </main>
        
        <!-- Start Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- End Footer Area -->
      </div>
    </div>

    <?php include_once 'includes/scripts.php';?>
</body>
</html>