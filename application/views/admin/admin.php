<?php $this->load->view($header);?>
<!-- ======= Navbar ======= -->
<?php $this->load->view($navbaradmin);?>

<!-- ======= Sidebar ======= -->
<?php $this->load->view($sidebaradmin);?>

<main id="main" class="main" style="margin-top:80px;">
	<div class="pagetitle">
		<h1>Halo, <?= $this->session->userdata('nama_lengkap') ?> </h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active">Selamat datang di Sistem Pencatatan Nutrisi</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">

			<div class="row">
				<!-- Sales Card -->
				<div class="col-xxl-4 col-md-6">
					<div class="card info-card sales-card">

						<div class="card-body">
							<h5 class="card-title">Total Makanan<span></span></h5>

							<div class="d-flex align-items-center">
								<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-cart"></i>
								</div>
								<div class="ps-3">
									<h6>0</h6>
									<span class="text-success small pt-1 fw-bold">0</span> <span
										class="text-muted small pt-2 ps-1">increase</span>

								</div>
							</div>
						</div>

					</div>
				</div><!-- End Sales Card -->

				<!-- Revenue Card -->
				<div class="col-xxl-4 col-md-6">
					<div class="card info-card revenue-card">

						<div class="card-body">
							<h5 class="card-title">Total Artikel <span></span></h5>

							<div class="d-flex align-items-center">
								<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-currency-dollar"></i>
								</div>
								<div class="ps-3">
									<h6>0</h6>
									<span class="text-success small pt-1 fw-bold">0</span> <span
										class="text-muted small pt-2 ps-1">increase</span>

								</div>
							</div>
						</div>

					</div>
				</div><!-- End Revenue Card -->

				<!-- Customers Card -->
				<div class="col-xxl-4 col-xl-12">
					<div class="card info-card customers-card">
						<div class="card-body">
							<h5 class="card-title">Total Akun Member<span></span></h5>

							<div class="d-flex align-items-center">
								<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-people"></i>
								</div>
								<div class="ps-3">
									<h6>0</h6>
									<span class="text-danger small pt-1 fw-bold">0</span> <span
										class="text-muted small pt-2 ps-1">decrease</span>
								</div>
							</div>
						</div>
					</div>
				</div><!-- End Customers Card -->
			</div>

			<!-- Recent Sales -->
			<div class="col-12">
				<div class="card recent-sales overflow-auto">

					<div class="filter">
						<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
						<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
							<li class="dropdown-header text-start">
								<h6>Filter</h6>
							</li>

							<li><a class="dropdown-item" href="#">Today</a></li>
							<li><a class="dropdown-item" href="#">This Month</a></li>
							<li><a class="dropdown-item" href="#">This Year</a></li>
						</ul>
					</div>

					<div class="card-body">
						<div class="pagetitle">
							<h1>Member Terdaftar</h1>
							<nav>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active">Data Member</li>
								</ol>
							</nav>
						</div><!-- End Page Title -->
						<div class="card">
							<h5 class="card-title" style="padding-left: 15px;">Data Member<span></span></h5>
							<div id="reportsChart">
							</div>


						</div>
					</div><!-- End Recent Sales -->
				</div>
	</section>

</main><!-- End #main -->

<?php $this->load->view($footer);?>
