<?php $this->load->view($header);?>
<!-- ======= Navbar ======= -->
<?php $this->load->view($navbar);?>

<!-- ======= Sidebar ======= -->
<?php $this->load->view($sidebar);?>

<main id="main" class="main" style="margin-top:60px;">
	<div class="pagetitle">
		<h1>Catatan Aktivitas</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">Catatan Aktivitas</li>
			</ol>
		</nav>
	</div>
	<div class="card">

		<h5 class="card-title" style="padding-left: 15px;">Catatan Aktivitas<span>/All</span></h5>
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
			action="<?php echo base_url('caktivitas/psimpanaktivitas');?>">
			<input type="hidden" id="id_aktivitas" name="id_aktivitas">
			<div class="form-group mb-3">
				<h6>Nama Aktivitas</h6>
				<input type="text" name="nama_aktivitas" id="nama_aktivitas" class="form-control">
			</div>

			<div class="form-group mb-3">
				<h6>Waktu Mulai</h6>
				<input type="datetime-local" name="waktu_mulai" id="waktu_mulai"  class="form-control">
			</div>

			<div class="form-group mb-3">
				<h6>Waktu Selesai</h6>
				<input type="datetime-local" name="waktu_selesai" id="waktu_selesai" class="form-control">
			</div>
			<input type="hidden" name="id_member" value="<?php echo $this->session->userdata('id_member')?>">

			<div style="text-align: center;">
				<button type="submit" class="btn btn-primary">Simpan</button>
				&nbsp;
				<!-- Spasi horizontal -->
			<button type="reset" class="btn btn-warning">Batal</button>
			</div>
		</form>
	</div>
</main>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  <main id="main" class="main">
    		<div class="pagetitle">
    			<h1>Catatan Aktivitas</h1>
    			<nav>
    				<ol class="breadcrumb">
    					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
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

<table class="table display" id="myTable" >
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama Aktivitas</th>
      <th scope="col">Waktu Mulai</th>
      <th scope="col">Waktu Selesai</th>
      <th scope="col">Lama Aktivitas</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach($data_aktivitasform as $row):
    ?>
    <tr>
      <th scope="row"><?php echo $no++?></th>
      <td><?php echo $row->nama_aktivitas?></td>
      <td>
        <?php 
        $waktu_mulai = strtotime($row->waktu_mulai);
        // date_default_timezone_set('Asia/Jakarta');
        echo date(' H:i:s', $waktu_mulai);
        ?>
    </td>
    <td>
        <?php 
        $waktu_selesai = strtotime($row->waktu_selesai);
        // date_default_timezone_set('Asia/Jakarta');
        echo date(' H:i:s', $waktu_selesai);
        ?>
    </td>
      <td><?php echo $row->lama_aktivitas?> menit</td>
	<td>
		<button type="button" class="btn btn-warning" onclick="editaktivitas(<?php echo $row->id_aktivitas?>)">Edit</button>
		<button type="button" class="btn btn-danger" onclick="hapusaktivitas(<?php echo $row->id_aktivitas?>)">Hapus</button>
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
    // let table = new DataTable('#myTable', {

    // });
    let table = new DataTable('#myTable');
		function hapusaktivitas(id_aktivitas){
		if(confirm('Apakah anda ingin menghapus?')){
			window.open('<?= base_url ("caktivitas/hapusaktivitas/")?>'+id_aktivitas,'_self')
		}
		}
		
		function editaktivitas(id_aktivitas) {
			load('caktivitas/editaktivitas/' + id_aktivitas, '#script')
		}

</script> 
</main>
<?php $this->load->view($footer);?>
