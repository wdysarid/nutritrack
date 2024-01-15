<?php $this->load->view($header);?>
<!-- ======= Navbar ======= -->
<?php $this->load->view($navbar);?>

<!-- ======= Sidebar ======= -->
<?php $this->load->view($sidebar);?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<main id="main" class="main" style="margin-top:60px;">
	<div class="pagetitle">
		<h1>Catatan Aktivitas</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('cmember') ?>">Home</a></li>
				<li class="breadcrumb-item active">Data Aktivitas</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<div class="card">
		<h5 class="card-title" style="padding-left: 15px;">Data Aktivitas<span>/All</span></h5>
		<div id="reportsChart">
		</div>
		<div class="card-body">
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
    foreach($data_aktivitas as $row):
    ?>
						<tr>
							<th scope="row"><?php echo $no++?></th>
							<td><?php echo $row->nama_aktivitas?></td>
							<td>
								<?php 
        $waktu_mulai = strtotime($row->waktu_mulai);
        // date_default_timezone_set('Asia/Jakarta');
        echo date('d-m-Y H:i:s', $waktu_mulai);
        ?>
							</td>
							<td>
								<?php 
        $waktu_selesai = strtotime($row->waktu_selesai);
        // date_default_timezone_set('Asia/Jakarta');
        echo date('d-m-Y H:i:s', $waktu_selesai);
        ?>
							</td>
							<td><?php echo $row->lama_aktivitas?> menit</td>
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

		function hapusaktivitas(id_aktivitas) {
			if (confirm('Apakah anda ingin menghapus?')) {
				window.open('<?= base_url ("caktivitas/hapusaktivitas/")?>' + id_aktivitas, '_self')
			}
		}

	</script>
</main>
<?php $this->load->view($footer);?>
