<?php
require_once 'config.php';
require_once 'database_connect.php';
require_once 'variables.php';

if(isset($_GET['id'])) {
    $project_id = $_GET['id'];
    $project = getProjectDetails($mysqlClient, $project_id);
    if(!$project) {
        echo "Projet non trouvé.";
        exit;
    }
} else {
    echo "Aucun projet spécifié.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo htmlspecialchars($project['name']) . ' - ' . htmlspecialchars($siteName); ?></title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Poppins&family=Raleway&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="portfolio-details-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="" class="img-fluid rounded-circle">
    </div>

    <a href="index.php" class="logo d-flex align-items-center justify-content-center">
      <h1 class="sitename"><?php echo htmlspecialchars($siteName); ?></h1>
    </a>

    <div class="social-links text-center">
      <a href="<?php echo htmlspecialchars($socialLinks['twitter']); ?>" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="<?php echo htmlspecialchars($socialLinks['facebook']); ?>" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="<?php echo htmlspecialchars($socialLinks['instagram']); ?>" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="<?php echo htmlspecialchars($socialLinks['skype']); ?>" class="google-plus"><i class="bi bi-skype"></i></a>
      <a href="<?php echo htmlspecialchars($socialLinks['linkedin']); ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php#hero"><i class="bi bi-house navicon"></i>Home</a></li>
        <li><a href="index.php#about"><i class="bi bi-person navicon"></i> About</a></li>
        <li><a href="index.php#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
      </ul>
    </nav>

  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0"><?php echo htmlspecialchars($project['name']); ?></h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Accueil</a></li>
            <li class="current"><?php echo htmlspecialchars($project['name']); ?></li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="<?php echo htmlspecialchars($project['image_link']); ?>" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
              <h3>Informations sur le projet</h3>
              <ul>
                <li><strong>Nom</strong>: <?php echo htmlspecialchars($project['name']); ?></li>
                <li><strong>Catégorie</strong>: <?php echo htmlspecialchars($project['category']); ?></li>
                <li><strong>Client</strong>: <?php echo htmlspecialchars($project['client']); ?></li>
                <li><strong>Date du projet</strong>: <?php echo date('d M, Y', strtotime($project['project_date'])); ?></li>
              </ul>
            </div>
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2><?php echo htmlspecialchars($project['name']); ?></h2>
              <p><?php echo nl2br(htmlspecialchars($project['detail_description'])); ?></p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename"><?php echo htmlspecialchars($siteName); ?></strong> <span>All Rights Reserved</span></p>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
