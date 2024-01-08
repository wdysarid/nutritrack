  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Nutri Track</h1>
        <span>.</span>
      </a>
      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu" id="home">
        <ul>
        <a class="nav-link" href="<?=base_url('clandingpg/tampil')?>">Home</a></li>
        <a class="nav-link" href="#about">About</a></li>
        <a class="nav-link" href="#services">Benefit</a></li>
        <a class="nav-link" href="#recent-posts">Artikel</a></li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      <div class="auth-buttons">
                <button class="login-btn btn btn-warning" onclick="login()">Login</button>
            </div>
    </div>
  </header><!-- End Header -->
