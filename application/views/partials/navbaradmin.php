<header id="header" class="header fixed-top d-flex align-items-center">
<div class="d-flex align-items-center justify-content-between">
  <a href="#" class="logo d-flex align-items-center">
    <img src="<?php echo base_url('assets/img/logo.png')?>" alt="">
    <span class="d-none d-lg-block">Nutri Track</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item dropdown pe-3">
      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="<?=base_url('assets/img/profile-img.jpg')?>" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2 text-white"><?=$this->session->userdata('nama_lengkap')?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li>
            <a class="dropdown-item d-flex align-items-center" href="<?=base_url('cadmin/profileadmin')?>">
                <i class="bi bi-person"></i>
                <span><?=$this->session->userdata('nama_lengkap')?>'s Profile</span>
            </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#" onclick="logout()">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>
      </ul><!-- End Profile Dropdown Items -->  
    </li><!-- End Profile Nav -->

<script>
    // JavaScript Function
    function logout() {
        var confirmLogout = confirm("Apakah anda ingin keluar dari halaman ini?");
        if (confirmLogout) {
            window.location.href = '<?=base_url('auth/logout')?>';
        }
    }
</script>
  </ul>
</nav><!-- End Icons Navigation -->
</header><!-- End Header -->