<?php $this->load->view($header);?>

<!-- ======= Navbar ======= -->
<?php $this->load->view($navbar);?>

<!-- ======= Sidebar ======= -->
<?php $this->load->view($sidebaradmin);?>

<!-- Form Catatan Nutrisi -->
<main id="main" class="main" style="margin-top:60px;">
	<div class="pagetitle">
		<h1>Tambah Makanan</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">Tambah Makanan</li>
			</ol>
		</nav>
	</div>
	<div class="card">
		<h5 class="card-title" style="padding-left: 15px;">Tambah Makanan<span>/Today</span></h5>
		<div id="reportsChart">
			<?php
                $pesan = $this->session->flashdata('pesan');
                if(isset($pesan)){
                    echo '<div class="alert alert-success alert-dismissible fade show mt-3 rounded-2 mx-4" role="alert">
                    '.$pesan.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                $this->session->unset_userdata('pesan');
                }
            ?>
		</div>
		<form class="card-body" name="simpanformmakanan" method="post"
			action="<?php echo base_url('cmakanan/psimpanmakanan');?>">
			<input type="hidden" name="id_admin" id="id_admin"
				value="<?php echo $this->session->userdata('id_admin')?>">
			<input type="hidden" name="id_makanan" id="id_makanan">
			<div class="form-group mb-3">
				<h6>Nama Makanan</h6>
				<input type="text" name="nama_makanan" id="nama_makanan" placeholder="Nama Makanan"
					class="form-control">
			</div>

			<div class="form-group mb-3">
				<h6>Porsi</h6>
				<input type="text" name="porsi" id="porsi" placeholder="Porsi" class="form-control">
			</div>

			<div class="form-group mb-3">
				<h6>Satuan</h6>
				<input type="text" name="satuan" id="satuan" placeholder="Satuan" class="form-control">
			</div>

			<div style="display: flex; flex-wrap: wrap;">
				<div style="flex: 1; margin-right: 10px;">
					<div class="form-group mb-3">
						<h6>Karbohidrat</h6>
						<input type="text" name="karbohidrat" id="karbohidrat" placeholder="Karbohidrat"
							class="form-control">
					</div>

					<div class="form-group mb-4">
						<h6>Protein</h6>
						<input type="text" name="protein" id="protein" placeholder="Protein" class="form-control">
					</div>
				</div>
				<div style="flex: 1; margin-left: 10px;">

					<div class="form-group mb-3">
						<h6>Lemak</h6>
						<input type="text" name="lemak" id="lemak" placeholder="Lemak" class="form-control">
					</div>
					<div class="form-group mb-3">
						<h6>Kalori</h6>
						<input type="text" name="kalori" id="kalori" placeholder="Kalori" class="form-control">
					</div>
				</div>
			</div>
			<div style="text-align: center;">
				<button type="submit" class="btn btn-primary">Tambah Makanan</button>
				&nbsp;
				<button type="reset" class="btn btn-warning">Batal</button>
			</div>
		</form>
	</div>
</main>

<!-- Data Catatan Nutrisi -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<main id="main" class="main">
	<div class="card">
		<h5 class="card-title" style="padding-left: 15px;">Data Catatan<span>/All</span></h5>
		<div id="reportsChart">
		</div>
		<div class="card-body">
			<table class="table display" id="myTable">
				<thead>
					<tr>
						<th scope="col">No.</th>
						<th scope="col">Nama Makanan</th>
						<th scope="col">Porsi</th>
						<th scope="col">Satuan</th>
						<th scope="col">Karbohidrat</th>
						<th scope="col">Protein</th>
						<th scope="col">Lemak</th>
						<th scope="col">Kalori</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
$no=1;

foreach($data_makananform as $row):
?>
					<tr>
						<th scope="row"><?php echo $no++?></th>
						<td><?php echo $row->nama_makanan?></td>
						<td><?php echo $row->porsi?></td>
						<td><?php echo $row->satuan?></td>
						<td><?php echo $row->karbohidrat?> gr</td>
						<td><?php echo $row->protein?> gr</td>
						<td><?php echo $row->lemak?> gr</td>
						<td><?php echo $row->kalori?> kkal</td>
						<td>
							<button type="button" class="btn btn-warning"
								onclick="editmakanan(<?php echo $row->id_makanan?>)">Edit</button>
							<button type="button" class="btn btn-danger"
								onclick="hapusmakanan(<?php echo $row->id_makanan?>)">Hapus</button>
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

		function hapusmakanan(id_makanan) {
			if (confirm('Apakah anda ingin menghapus?')) {
				window.open('<?= base_url ("cmakanan/hapusmakanan/")?>' + id_makanan, '_self')
			}
		}

		function editmakanan(id_makanan) {
			load('cmakanan/editmakanan/' + id_makanan, '#script')
		}

	</script>

</main>

<?php $this->load->view($footer);?>
