<?php $this->load->view($header);?>
<!-- ======= Navbar ======= -->
<?php $this->load->view($navbar);?>

<!-- ======= Sidebar ======= -->
<?php $this->load->view($sidebar);?>


<main id="main" class="main" style="margin-top:80px;">
	<?php
                  foreach(
                    $member as $key
                  ):
                  ?>
	<div class="pagetitle">
		<h1>Halo, <?=$key['nama_lengkap']?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active">Selamat datang di Sistem Pencatatan Nutrisi</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<?php endforeach;?>
	<section class="section dashboard">
		<div class="row">
			<!-- Total kalori -->
			<div class="col-xxl-3 col-md-6">
				<div class="card info-card sales-card">
					<div class="card-body">
						<h5 class="card-title">Total Kalori <span>| Today</span></h5>
						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
								<i class="bi bi-fire"></i>
							</div>
							<div class="ps-3">
								<h6><?=number_format($total_kalori, 0, '.', '');?> kkal</h6>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!--end total kalori-->

			<!-- total karbohidrat -->
			<div class="col-xxl-3 col-md-6">
				<div class="card info-card revenue-card">
					<div class="card-body">
						<h5 class="card-title">Total Karbohidrat <span>| Today</span></h5>

						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
								<i class="bi bi-droplet"></i>
							</div>
							<div class="ps-3">
								<h6><?= number_format($total_karbohidrat, 2, '.', '');?> gr</h6>
							</div>
						</div>
					</div>

				</div>
			</div><!-- end total karbohidrat -->

			<!-- Customers Card -->
			<div class="col-xxl-3 col-xl-12">
				<div class="card info-card customers-card">
					<div class="card-body">
						<h5 class="card-title">Total Protein <span>| Today</span></h5>

						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
								<i class="bi bi-droplet"></i>
							</div>
							<div class="ps-3">
								<h6><?= number_format($total_protein, 2, '.', '')?> gr</h6>
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
								<i class="bi bi-droplet"></i>
							</div>
							<div class="ps-3">
								<h6><?= number_format($total_lemak, 2, '.', '');?> gr</h6>

							</div>
						</div>
					</div>

				</div>
			</div><!-- End Sales Card -->

			<!-- standar nutrisi -->
			<div class="col-12">
				<div class="card recent-sales overflow-auto">
					<div class="card-body">
						<div class="pagetitle d-flex justify-content-center align-items-center">
							<h1>Standar Nutrisi Member</h1>
						</div><!-- End Page Title -->
						<hr>
						
						<div class="row">
							<!-- Sales Card -->
							<div class="col-xxl-3 col-md-6">
								<div class="card info-card sales-card">
									<div class="card-body">
										<h5 class="card-title">Kebutuhan Kalori</h5>
										<div class="d-flex align-items-center">
											<div
												class="card-icon rounded-circle d-flex align-items-center justify-content-center">
												<i class="bi bi-people"></i>
											</div>
											<div class="ps-3">
												<h6><?=number_format($kalori_harian, 0, '.', '');?> kkal</h6>
											</div>
										</div>
									</div>

								</div>
							</div><!-- End Sales Card -->

							<!-- Revenue Card -->
							<div class="col-xxl-3 col-md-6">
								<div class="card info-card revenue-card">
									<div class="card-body">
										<h5 class="card-title">Kebutuhan Karbohidrat</h5>
										<div class="d-flex align-items-center">
											<div
												class="card-icon rounded-circle d-flex align-items-center justify-content-center">
												<i class="bi bi-people"></i>
											</div>
											<div class="ps-3">
												<h6><?= number_format($kebutuhan_karbohidrat, 2, '.', '');?> gr</h6>
											</div>
										</div>
									</div>

								</div>
							</div><!-- End Revenue Card -->

							<!-- Customers Card -->
							<div class="col-xxl-3 col-xl-12">
								<div class="card info-card customers-card">
									<div class="card-body">
										<h5 class="card-title">Kebutuhan Protein</span></h5>

										<div class="d-flex align-items-center">
											<div
												class="card-icon rounded-circle d-flex align-items-center justify-content-center">
												<i class="bi bi-people"></i>
											</div>
											<div class="ps-3">
												<h6><?= number_format($kebutuhan_protein, 2, '.', '')?> gr</h6>
											</div>
										</div>
									</div>
								</div>
							</div><!-- End Customers Card -->

							<!-- Sales Card -->
							<div class="col-xxl-3 col-md-6">
								<div class="card info-card sales-card">
									<div class="card-body">
										<h5 class="card-title">Kebutuhan Lemak</span></h5>
										<div class="d-flex align-items-center">
											<div
												class="card-icon rounded-circle d-flex align-items-center justify-content-center">
												<i class="bi bi-people"></i>
											</div>
											<div class="ps-3">
												<h6><?= number_format($kebutuhan_lemak, 2, '.', '');?> gr</h6>

											</div>
										</div>
									</div>

								</div>
							</div><!-- End Sales Card -->

								<div class="col-md-12 mb-0">
									<div class="card">
										<div class="card-body">
											<!-- Tampilkan nilai kekurangan nutrisi di dalam HTML -->
											<div>
												<h4 style="font-size: 18px; margin-bottom: 5px;">
												<b>Kalori harian yang belum terpenuhi yaitu : <?= number_format(floatval($kekurangan_nutrisi), 0, '.', '');?> kkal </b>
												</h4>
											</div>

											<h6 style="font-size: 16px; color: #333; margin-bottom: 10px;">
												<?php
												if($pesan=="sudah"):
												?>
												<p>Selamat ! Anda telah berhasil mencapai target harian nutrisi Anda. 
													Dengan mengonsumsi sebanyak<b> <?=number_format($total_kalori, 0, '.', '');?> kkal </b>
													kalori, Anda telah menjaga keseimbangan nutrisi Anda dan mendukung kesehatan tubuh Anda. 
													Terus pertahankan pola makan sehat dan aktifitas fisik yang baik untuk mencapai tujuan kesehatan Anda. 
													Jangan lupa untuk tetap memperhatikan asupan nutrisi yang seimbang dan menjaga gaya hidup sehat. 
													Semoga Anda terus meraih keberhasilan dalam perjalanan menuju kesehatan optimal !</p>
												<?php
												else:
												?>
												<p>
												Nutrisi yang Anda konsumsi belum mencukupi untuk mencapai target harian. 
												Penting untuk memastikan Anda mendapatkan cukup kalori untuk menjaga keseimbangan nutrisi dan mendukung kesehatan tubuh Anda. 
												Pertimbangkan untuk menyesuaikan pola makan Anda agar mencapai tujuan kesehatan yang optimal.
												</p>
												<?php
												endif;
												?>

											</h6>
										</div>
									</div>
								</div>

						
						</div>


							
						</div>
					</div>
				</div>
				<!-- end standar nutrisi -->

				<!-- Recent Sales -->
				<div class="col-12">
					<div class="card recent-sales overflow-auto">
						<div class="card-body">
							<div class="pagetitle">
								<h1>Laporan Nutrisi</h1>
								<nav>
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="<?php echo base_url('cmember') ?>">Home</a>
										</li>
										<li class="breadcrumb-item active">Catatan Nutrisi</li>
									</ol>
								</nav>
							</div><!-- End Page Title -->
							<div class="card">
								<h5 class="card-title" style="padding-left: 15px;">Data Nutrisi Harian<span>/ Day</span>
								</h5>
								<div id="reportsChart">
								</div>
								<div class="card-body">
									<a class="btn btn-primary mb-3"
										href="<?php echo base_url('cmember/catatnutrisi') ?>">Form Catat Nutrisi</a>
									<button type="button" class="btn btn-warning mb-3"
										onclick="cetaknutrisihr(<?= $this->session->userdata('id_member');?>)">Cetak
										Data
										Harian</button>
									<div class="" style="overflow: scroll;">
										<table class="table display" id="myTable">
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
													<td><?php echo date('d-m-Y', strtotime($row['tgl_catatan'])) ?></td>
													<td><?php echo $row['nama_makanan']?></td>
													<td><?php echo $row['jumlah']. " ". $row['satuan'] ?></td>
													<td><?php echo number_format($row['total_karbohidrat'], 2, '.', '') ?>
														gr</td>
													<td><?php echo number_format($row['total_protein'], 2, '.', '')?> gr
													</td>
													<td><?php echo number_format($row['total_lemak'], 2, '.', '')?> gr
													</td>
													<td><?php echo number_format($row['total_kalori'], 0, '.', '')?>
														kkal
													</td>
													<td><?php echo $row['keterangan']?></td>
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
					</div>

				</div>
			</div><!-- End Recent Sales -->


			<!-- Recent Sales -->
			<div class="col-12">
				<div class="card recent-sales overflow-auto">
					<div class="card-body">
						<div class="pagetitle">
							<h1>Laporan Aktivitas</h1>
							<nav>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url('cmember') ?>">Home</a>
									</li>
									<li class="breadcrumb-item active">Catatan Aktivitas</li>
								</ol>
							</nav>
						</div><!-- End Page Title -->
						<div class="card">
							<h5 class="card-title" style="padding-left: 15px;">Data Aktivitas<span>/ Day</span></h5>
							<div id="reportsChart">
							</div>
							<div class="card-body">
								<a class="btn btn-primary mb-3"
									href="<?php echo base_url('cmember/catataktivitas') ?>">Form
									Catat Nutrisi</a>
								<button type="button" class="btn btn-warning mb-3"
									onclick="cetakaktivitashr(<?= $this->session->userdata('id_member');?>)">Cetak Data
									Harian</button>
								<div class="" style="overflow: scroll;">
									<table class="table display" id="myTable">
										<thead>
											<tr>
												<th scope="col">No.</th>
												<th scope="col">Nama Aktivitas</th>
												<th scope="col">Waktu Mulai</th>
												<th scope="col">Waktu Selesai</th>
												<th scope="col">Lama Aktivitas</th>

											</tr>
										</thead>
										<tbody>
											<?php
								$no=1;
								foreach($data_aktivitashr as $row):
								?>
											<tr>
												<th scope="row"><?php echo $no++?></th>
												<td><?php echo $row['nama_aktivitas']?></td>
												<td><?php echo date('d-m-Y', strtotime($row['waktu_mulai'])) ?></td>
												<td><?php echo date('d-m-Y', strtotime($row['waktu_selesai'])) ?></td>
												<td><?php echo $row['lama_aktivitas']?> Menit</td>

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
				</div>

			</div>
		</div><!-- End Recent Sales -->

		</div>
	</section>

</main><!-- End #main -->
<script>
	function cetaknutrisihr(id_member) {
		window.open("<?php echo base_url() ?>cnutrisi/cetaknutrisihr/" + id_member, "_blank");
	}

	function cetakaktivitashr(id_member) {
		window.open("<?php echo base_url() ?>caktivitas/cetakaktivitashr/" + id_member, "_blank");
	}

</script>
<?php $this->load->view($footer);?>
