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
									<i class="bi bi-apple"></i>
								</div>
								<div class="ps-3">
									<h6><?php echo $total_makanan?> data</h6>

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
									<i class="bi bi-newspaper"></i>
								</div>
								<div class="ps-3">
									<h6><?php echo $total_artikel?> artikel</h6>
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
									<h6><?php echo $total_akunmember?> member</h6>
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
									<li class="breadcrumb-item"><a href="<?php echo base_url('cadmin') ?>">Home</a></li>
									<li class="breadcrumb-item active">Data Member</li>
								</ol>
							</nav>
						</div><!-- End Page Title -->
						<div class="card">
							<h5 class="card-title" style="padding-left: 15px;">Data Member<span></span></h5>
							<div id="reportsChart">
							</div>

							<!-- p data member -->
							<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
							<div class="card-body">
								<div class="" style="overflow: scroll;">
									<table class="table display" id="myTable">
										<thead>
											<tr>
												<th scope="col">No.</th>
												<th scope="col">Nama Member</th>
												<th scope="col">Username</th>
												<th scope="col">Jenis Kelamin</th>
												<th scope="col">Email</th>
												<th scope="col">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
								$no=1;
								foreach($data_akunmember as $row):
								?>
											<tr>
												<th scope="row"><?php echo $no++?></th>
												<td><?php echo $row->nama_lengkap?></td>
												<td><?php echo $row->username?></td>
												<td><?php echo $row->jenis_kelamin?></td>
												<td><?php echo $row->email?></td>
												<td>
													<button type="button" class="btn btn-danger"
														onclick="hapusmember(<?php echo $row->id_member?>)">Hapus</button>
												</td>
											</tr>
											<?php
								endforeach;
								?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
						<script>
							let table = new DataTable('#myTable');

							function hapusmember(id_member) {
								if (confirm('Apakah anda ingin menghapus member ini?')) {
									window.open('<?= base_url ("cadmin/hapusmember/")?>' + id_member, '_self')
								}
							}

						</script>
						<!-- end data  -->
					</div>
				</div><!-- End Recent Sales -->
			</div>
	</section>

</main><!-- End #main -->

<?php $this->load->view($footer);?>
