<?php
require_once 'config/database.php';

// Fetch articles from database
try {
    $sql = "SELECT * FROM article ORDER BY date_pub DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Une erreur est survenue lors de la récupération des articles: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="ZXX">
  
<!-- Mirrored from <?php include 'name.php' ;  ?>-template.vercel.app/<?php include 'name.php' ;  ?>/course-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 03:29:05 GMT -->
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
    <title><?php include 'name.php' ;  ?> - Articles</title>

   <?php include_once'includes/head.php' ;?>
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
                    <h3 class="ep-breadcrumbs__title">Nos Articles</h3>
                    <ul class="ep-breadcrumbs__menu">
                      <li>
                        <a href="index.php">Accueil</a>
                      </li>
                      <li>
                        <i class="fi-bs-angle-right"></i>
                      </li>
                      <li class="active">
                        <a href="articles.php">Articles</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Breadcrumbs Area -->
          
          <!-- Start Articles Area -->
          <section class="ep-course__details section-gap position-relative">
            <div class="container ep-container">
              <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
              <?php endif; ?>
              
              <div class="row">
                <?php if(!empty($articles)): ?>
                  <?php foreach($articles as $article): ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                      <div class="card h-100">
                        <?php if(!empty($article['photo'])): ?>
                          <img src="<?php echo $article['photo']; ?>" class="card-img-top" alt="<?php echo $article['titre']; ?>" style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                          <img src="assets/images/course/1.jpg" class="card-img-top" alt="Default Image" style="height: 200px; object-fit: cover;">
                        <?php endif; ?>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $article['titre']; ?></h5>
                          <p class="card-text"><?php echo substr($article['description_art'], 0, 100); ?>...</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">Publié le <?php echo date('d/m/Y', strtotime($article['date_pub'])); ?></small>
                            <a href="article-details.php?id=<?php echo $article['id_article']; ?>" class="ep-btn ep-btn--primary btn-sm">Lire plus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <div class="col-12">
                    <div class="alert alert-info">Aucun article disponible pour le moment.</div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </section>
          <!-- End Articles Area -->
        </main>
        
        <!-- Start Footer Area -->
        <?php include 'includes/footer.php'; ?>
        <!-- End Footer Area -->
      </div>
    </div>
<?php include_once'includes/scripts.php';?>
    
  </body>
</html>