<?php $this->load->view($header); ?>

<!-- ======= Navbar ======= -->
<?php $this->load->view($navbaradmin); ?>

<!-- ======= Sidebar ======= -->
<?php $this->load->view($sidebaradmin); ?>

<!-- Form Catatan Nutrisi -->
<main id="main" class="main" style="margin-top:60px;">
    <div class="pagetitle">
        <h1>Tambah Artikel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Tambah Artikel</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <h5 class="card-title" style="padding-left: 15px;">Tambah Artikel<span>/Today</span></h5>
        <div id="reportsChart">
            <?php
            $pesan = $this->session->flashdata('pesan');
            if (isset($pesan)) {
                echo '<div class="alert alert-success alert-dismissible fade show mt-3 rounded-2 mx-4" role="alert">
                    ' . $pesan . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                $this->session->unset_userdata('pesan');
            }
            ?>
        </div>
        <?php echo form_open_multipart('cartikel/psimpanartikel'); ?>
		<div class="container">
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
				<input type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control">
			</div>
	
			<div class="form-group mb-3">
				<h6>Gambar Artikel</h6>
				<input type="file" name="foto_artikel" id="foto_artikel" class="form-control">
			</div>
	
			<div style="text-align: center;" class="pb-4">
				<button type="submit" class="btn btn-primary">Tambah Artikel</button>
				&nbsp;
				<button type="reset" class="btn btn-warning">Batal</button>
			</div>
		</div>
        <?php echo form_close(); ?>
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
									$imagePath = base_url('assets/imgadmin/' . $row->foto_artikel);
									echo '<img src="' . $imagePath . '" alt="Article Image" style="width: 100px; height: auto;">';
								?>
							</td>


                            <td>
                                <button type="button" class="btn btn-warning"
                                    onclick="editartikel(<?php echo $row->id_artikel ?>)">Edit</button>
                                <button type="button" class="btn btn-danger"
                                    onclick="hapusartikel(<?php echo $row->id_artikel ?>)">Hapus</button>
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

        function hapusartikel(id_artikel) {
            if (confirm('Apakah anda ingin menghapus?')) {
                window.open('<?= base_url("cartikel/hapusartikel/") ?>' + id_artikel, '_self')
            }
        }

        function editartikel(id_artikel) {
            load('cartikel/editmakanan/' + id_artikel, '#script')
        }

    </script>

</main>

<?php $this->load->view($footer); ?>
