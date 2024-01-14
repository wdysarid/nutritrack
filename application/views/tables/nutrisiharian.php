<?php $this->load->view($header);?>
  <!-- ======= Navbar ======= -->
 <?php $this->load->view($navbar);?>

  <!-- ======= Sidebar ======= -->
  <?php $this->load->view($sidebar);?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  <main id="main" class="main" style="margin-top:60px;">
    		<div class="pagetitle">
    			<h1>Laporan Nutrisi</h1>
    			<nav>
    				<ol class="breadcrumb">
    					<li class="breadcrumb-item"><a href="<?php echo base_url('cmember') ?>">Home</a></li>
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
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script>
    // let table = new DataTable('#myTable', {

    // });
    let table = new DataTable('#myTable');

</script> 
</main>

<?php $this->load->view($footer);?>
