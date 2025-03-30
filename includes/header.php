<!-- Start Header Area -->
  <header class="ep-header ep-header--style2 position-relative">
      <!-- Header Middle -->
      <div
        id="active-sticky"
        class="ep-header__middle ep-header__middle--style2"
      >
        <div class="container ep-container">
          <div class="ep-header__inner ep-header__inner--style2">
            <div class="row align-items-center">
              <div class="col-lg-2 col-6">
                <div class="ep-logo">
                  <a href="index.php">
                    
                  </a>
                </div>
              </div>
              <div class="col-lg-12 col-8">
                <div class="ep-header__inner-right">
                  <nav class="ep-header__navigation">
                    <ul class="ep-header__menu ep-header__menu--style2">
                      <li>
                        <a href="index.php">Accueil</a>
                      </li>
                      <li>
                        <a href="formations.php">Formations</a>
                      </li>
                      <li>
                        <a href="about.php">À propos</a>
                      </li>
                      <li>
                        <a href="events.php">Evenements</a>
                      </li>
                      <li>
                        <a href="articles.php">Articles</a>
                      </li>
                      <li>
                        <a href="contact.php">Contact</a>
                      </li>
                      <?php if(!isset($_SESSION['user'])): ?>
                        <li>
                        <a href="login.php">Se connecter</a>
                      </li>
                    <?php else: ?>
                      <li> 
                        <a href="user/dashboard.php"><?php echo $_SESSION['user']['user_login'] ;?> (User )</a>
                        </li>
                    <?php endif; ?>
                   <?php if(isset($_SESSION['user'])): ?> 
                      <li>
                      <a href="logout.php">Se déconnecter</a>
                      </li>
                    <?php endif; ?>
                      </ul>
                      
                    </nav>
                  <div class="ep-header__btn">
                    <a href="formations.php" class="ep-btn ep5-bg"
                      >Nos formations <i class="fi fi-rs-arrow-small-right"></i>
                    </a>
                  </div>
                </div>
                <!-- Mobile Menu Button -->
                <button
                  type="button"
                  class="mobile-menu-offcanvas-toggler"
                  data-bs-toggle="modal"
                  data-bs-target="#offcanvas-modal"
                >
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
                </button>
                <!-- End Mobile Menu Button -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- End Header Area -->
