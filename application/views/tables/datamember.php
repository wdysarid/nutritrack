<?php $this->load->view($header);?>
  <!-- ======= Navbar ======= -->
 <?php $this->load->view($navbaradmin);?>

  <!-- ======= Sidebar ======= -->
  <?php $this->load->view($sidebaradmin);?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  <main id="main" class="main" style="margin-top:60px;">
    		<div class="pagetitle">
    			<h1>Data Member</h1>
    			<nav>
    				<ol class="breadcrumb">
    					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
    					<li class="breadcrumb-item active">Data Member</li>
    				</ol>
    			</nav>
    		</div><!-- End Page Title -->
    		<div class="card">
        <h5 class="card-title" style="padding-left: 15px;">Data Member<span>/All</span></h5>
    			<div id="reportsChart">
    			</div>
          <div class="card-body">
<table class="table display" id="myTable" >
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama Member</th>
      <th scope="col">Username</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Email</th>
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
    // let table = new DataTable('#myTable', {

    // });
    let table = new DataTable('#myTable');
    function hapusaktivitas(id_aktivitas){
      if(confirm('Apakah anda ingin menghapus?')){
        window.open('<?= base_url ("caktivitas/hapusaktivitas/")?>'+id_aktivitas,'_self')
      }
    }

</script> 
</main>
<?php $this->load->view($footer);?>
