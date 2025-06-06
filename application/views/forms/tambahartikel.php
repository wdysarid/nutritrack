<?php $this->load->view($header);?>

<!-- ======= Navbar ======= -->
<?php $this->load->view($navbaradmin);?>

<!-- ======= Sidebar ======= -->
<?php $this->load->view($sidebaradmin);?>

<!-- Form Catatan Nutrisi -->
<main id="main" class="main" style="margin-top:60px;">
	<div class="pagetitle">
		<h1>Tambah Artikel</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('cadmin') ?>">Home</a></li>
				<li class="breadcrumb-item active">Tambah Artikel</li>
			</ol>
		</nav>
	</div>
	<div class="card">
		<h5 class="card-title" style="padding-left: 15px;">Tambah Artikel<span>/Today</span></h5>
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

				$error_foto = $this->session->flashdata('error_foto');
				if (isset($error_foto)) {
					echo '<div class="alert alert-danger alert-dismissible fade show mt-3 rounded-2 mx-4" role="alert">
							' . $error_foto . '
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
					$this->session->unset_userdata('error_foto');
				}
            ?>
		</div>
		<form class="card-body" name="simpanformartikel" method="post" enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg"
			action="<?php echo base_url('cartikel/psimpanartikel');?>">
			<input type="hidden" name="id_admin" id="id_admin"
				value="<?php echo $this->session->userdata('id_admin')?>">
			<input type="hidden" name="id_artikel" id="id_artikel">
			<div class="form-group mb-3">
				<h6>Judul Artikel</h6>
				<input type="text" name="judul_artikel" id="judul_artikel" placeholder="Judul Artikel"
					class="form-control">
			</div>

			<div class="form-group mb-3">
				<h6>Tanggal Upload</h6>
				<input type="datetime-local" name="tgl_upload" id="tgl_upload" placeholder="Tanggal upload" class="form-control">
			</div>

			<div class="form-group mb-3">
				<h6>Deskripsi</h6>
				<textarea placeholder="Deskripsi" class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5"></textarea>
			</div>

			<div class="form-group mb-3">
				<h6>Keterangan</h6>
				<input type="text" name="keterangan" id="keterangan" placeholder="Keterangan Foto"
					class="form-control">
			</div>

            <div class="form-group mb-3">
				<h6>Gambar Artikel</h6>
				<input type="file" name="foto_artikel" id="foto_artikel" class="form-control">
				<p class="text-secondary px-5">Max. size 2MB</p>
			</div>

			<div style="text-align: center;">
				<button type="submit" class="btn btn-primary">Tambah Artikel</button>
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
        <h5 class="card-title" style="padding-left: 15px;">Data Artikel<span>/All</span></h5>
        <div id="reportsChart">
        </div>
        <div class="card-body">
		<div class="" style="overflow: scroll;">
            <table class="table display" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Judul Artikel</th>
                        <th scope="col">Tanggal Upload</th>
                        <th scope="col">Deskripsi</th>
						<th scope="col">Foto Artikel</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_artikel as $row) :
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?php echo $row->judul_artikel ?></td>
                            <td><?php echo $row->tgl_upload ?></td>
							<td><?php echo $row->deskripsi ?></td>
							<td>
								<?php 
									$imagePath = base_url('assets/imgadmin/artikel/' . $row->foto_artikel);
									echo '<img src="' . $imagePath . '" alt="Article Image" style="width: 200px; height: auto;">';
								?>
							</td>

							<td>
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-warning" onclick="editartikel(<?php echo $row->id_artikel ?>)">Edit</button>
									<button type="button" class="btn btn-danger" onclick="hapusartikel(<?php echo $row->id_artikel ?>)">Hapus</button>
								</div>
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
	</div>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
	<script>
		let table = new DataTable('#myTable');

		function hapusartikel(id_artikel) {
			if (confirm('Apakah anda yakin ingin menghapus?')) {
				window.open('<?= base_url ("cartikel/hapusartikel/")?>' + id_artikel, '_self')
			}
		}

		function editartikel(id_artikel) {
			load('cartikel/editartikel/' + id_artikel, '#script')
		}

	</script>

</main>

<?php $this->load->view($footer);?>
