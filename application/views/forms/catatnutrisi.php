	<?php $this->load->view($header);?>

	<!-- ======= Navbar ======= -->
	<?php $this->load->view($navbar);?>

	<!-- ======= Sidebar ======= -->
	<?php $this->load->view($sidebar);?>
	
	<!-- Form Catatan Nutrisi -->
	<main id="main" class="main" style="margin-top:60px;">
		<div class="pagetitle">
			<h1>Catatan Nutrisi</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item active">Catatan Nutrisi</li>
				</ol>
			</nav>
		</div>
		<div class="card">
			<h5 class="card-title" style="padding-left: 15px;">Catatan Nutrisi<span> /form</span></h5>
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
			<form class="card-body" name="simpanformcatat" method="post"
				action="<?php echo base_url('cnutrisi/psimpannutrisi');?>">
				<input type="hidden" name="id_member" id="id_member"
					value="<?php echo $this->session->userdata('id_member')?>">
				<input type="hidden" name="id_nutrisi" id="id_nutrisi">
				<div class="form-group mb-3">
					<h6>Tanggal Catatan</h6>
					<input type="date" name="tgl_catatan" id="tgl_catatan" class="form-control">
				</div>
				<div class="form-group mb-3">
					<h6>Makanan</h6>
					<select name="id_makanan" id="id_makanan" class="form-control">
						<option value=""HIDDEN >====PILIH MAKANAN====</option>
						<?php foreach($data_makanan as $row):?>
						<option value="<?=$row->id_makanan?>">
							<?=$row->nama_makanan." ". $row->porsi." ". $row->satuan?></option>
						<?php endforeach;?>
					</select>
				</div>

				<div class="form-group mb-3">
					<h6>Jumlah</h6>
					<input type="text" name="jumlah" id="jumlah" placeholder="Jumlah" class="form-control">
				</div>

				<div class="form-group mb-3">
					<h6>Keterangan</h6>
					<input type="text" name="keterangan" id="keterangan" placeholder="keterangan" class="form-control">
				</div>

				<div style="text-align: center;">
					<button type="submit" class="btn btn-primary">Simpan</button>
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
			<h5 class="card-title" style="padding-left: 15px;">Data Catatan<span> /All</span></h5>
			<div id="reportsChart">
			</div>
			<div class="card-body">
			<div class="" style="overflow: scroll;">

				<table class="table display" id="myTable">
					<thead>
						<tr>
							<th scope="col">No.</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Nama Makanan</th>
							<th scope="col">Jumlah</th>
							
							<th scope="col">Total Kalori</th>
							<th scope="col">Keterangan</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
    $no=1;
    
    foreach($data_nutrisiform as $row):
    ?>
						<tr>
							<th scope="row"><?php echo $no++?></th>
							<td><?php echo date('d-m-Y', strtotime($row->tgl_catatan)) ?></td>
							<td><?php echo $row->nama_makanan?></td>
							<td><?php echo $row->jumlah. " ". $row->satuan ?></td>
							
							<td><?php echo $row->total_kalori?> kkal</td>
							<td><?php echo $row->keterangan?></td>
							<td>
								<button type="button" class="btn btn-warning"
									onclick="editnutrisi(<?php echo $row->id_nutrisi?>)">Edit</button>
								<button type="button" class="btn btn-danger"
									onclick="hapusnutrisi(<?php echo $row->id_nutrisi?>)">Hapus</button>
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

			function hapusnutrisi(id_nutrisi) {
				if (confirm('Apakah anda ingin menghapus?')) {
					window.open('<?= base_url ("cnutrisi/hapusnutrisi/")?>' + id_nutrisi, '_self')
				}
			}

			function editnutrisi(id_nutrisi) {
				load('cnutrisi/editnutrisi/' + id_nutrisi, '#script')
			}

		</script>

	</main>

	<?php $this->load->view($footer);?>
