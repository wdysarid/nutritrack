<?php $this->load->view($header);?>
<!-- ======= Navbar ======= -->
<?php $this->load->view($navbar);?>

<!-- ======= Sidebar ======= -->
<?php $this->load->view($sidebar);?>

<main id="main" class="main" style="margin-top:80px;">
	<div class="pagetitle" >
		<h1>Halo, <?= $this->session->userdata('nama_lengkap') ?> </h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active">Selamat datang di Sistem Pencatatan Nutrisi</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">
					<!-- Sales Card -->
					<div class="col-xxl-3 col-md-6">
						<div class="card info-card sales-card">

							<div class="filter">
								<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
							</div>
							<div class="card-body">
								<h5 class="card-title">Total Kalori <span>| Today</span></h5>
								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-people"></i>
									</div>
									<div class="ps-3">
										<h6><?= $total_kalori;?> kkal</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End Sales Card -->

					<!-- Revenue Card -->
					<div class="col-xxl-3 col-md-6">
						<div class="card info-card revenue-card">
							<div class="filter">
								<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
							</div>

							<div class="card-body">
								<h5 class="card-title">Total Karbohidrat <span>| Today</span></h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-people"></i>
									</div>
									<div class="ps-3">
										<h6><?= $total_karbohidrat;?> gr</h6>
									</div>
								</div>
							</div>

						</div>
					</div><!-- End Revenue Card -->

					<!-- Customers Card -->
					<div class="col-xxl-3 col-xl-12">
						<div class="card info-card customers-card">
							<div class="card-body">
								<h5 class="card-title">Total Protein <span>| Today</span></h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-people"></i>
									</div>
									<div class="ps-3">
										<h6><?= $total_protein;?> gr</h6>
									</div>
								</div>
							</div>
						</div>
					</div><!-- End Customers Card -->

					<!-- Sales Card -->
					<div class="col-xxl-3 col-md-6">
						<div class="card info-card sales-card">
							<div class="card-body">
								<h5 class="card-title">Total Lemak <span>| Today</span></h5>
								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-people"></i>
									</div>
									<div class="ps-3">
										<h6><?= $total_lemak;?> gr</h6>

									</div>
								</div>
							</div>

						</div>
					</div><!-- End Sales Card -->
				
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
							<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

										<div class="pagetitle">
											<h1>Laporan Nutrisi</h1>
											<nav>
												<ol class="breadcrumb">
													<li class="breadcrumb-item"><a href="index.html">Home</a></li>
													<li class="breadcrumb-item active">Catatan Nutrisi</li>
												</ol>
											</nav>
										</div><!-- End Page Title -->
										<div class="card">
									<h5 class="card-title" style="padding-left: 15px;">Data Nutrisi Harian<span>/ Day</span></h5>
											<div id="reportsChart">
											</div>
							<div class="card-body">
							<button type="button" class="btn btn-warning mb-3" >Cetak Data Harian</button>
							<div class="" style="overflow: scroll;">
							<table class="table display" id="myTable" >
							<thead>
								<tr>
								<th scope="col">No.</th>
								<th scope="col">Tanggal</th>
								<th scope="col">Nama Makanan</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Karbohidrat</th>
								<th scope="col">Protein</th>
								<th scope="col">Lemak</th>
								<th scope="col">Kalori</th>
								<th scope="col">Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								foreach($data_nutrisihr as $row):
								?>
								<tr>
									<th scope="row"><?php echo $no++?></th>
									<td><?php echo date('d-m-Y', strtotime($row->tgl_catatan)) ?></td>
									<td><?php echo $row->nama_makanan?></td>
									<td><?php echo $row->jumlah. " ". $row->satuan ?></td>
									<td><?php echo $row->total_karbohidrat?> gr</td>
									<td><?php echo $row->total_protein?> gr</td>
									<td><?php echo $row->total_lemak?> gr</td>
									<td><?php echo $row->total_kalori?> kkal</td>
									<td><?php echo $row->keterangan?></td>
								</tr>
								<?php
								endforeach;
								?>
							</tbody>
							</table>
							</div>
							</div>
							</div>
							</div>
							<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
							<script>
								// let table = new DataTable('#myTable', {

								// });
								let table = new DataTable('#myTable');

							</script> 


							</div>

						</div>
					</div><!-- End Recent Sales -->

		</div>
	</section>

</main><!-- End #main -->

<?php $this->load->view($footer);?>
