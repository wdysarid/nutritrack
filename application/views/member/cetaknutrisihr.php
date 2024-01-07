<html>
<head>
	<title>Cetak PDF</title>
</head>

<body>
<table width="100%">
  <tr>
        <td width="20%px" align="right">
        <img src="<?php echo base_url() ?>gambar/logo.png" width="90px"/></td>
        <td align="center">
        <font size="3">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RESET, DAN TEKNOLOGI</font> <br/>
        <font size="5"><b>POLITEKNIK NEGERI BALI</b></font><br/>
 		<font size="2">Jalan Kampus Bukit Jimbaran, Kuta Selatan, Kabupaten Badung, Bali - 80364</font> <br/>
 		<font size="2">Telp.(0361)701981 (Hunting) Fax. 701128</font> <br/>
 		<font size="1">Laman : www.pnb.ac.id, Email : poltek@pnb.ac.id </font>
        
        </td>
    </tr>
</table>

<hr/>
<h3>Data Prodi </h3>
<table border="1" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Jurusan</th>
        <th>Jenjang</th>
      </tr>
    </thead>
    <tbody>
    <?php
		if(empty($hasil))
		{
			echo "Data kosong";
		}
		else
		{
			$no=1;
			foreach ($hasil as $data):
	?>	
    
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data->nama_makanan;  ?></td>
        <td><?php echo $data->total_kalori; ?></td>
        
      </tr>
      
     <?php
	 		$no++;
	 		endforeach;
		}
	 ?>
    </tbody>
  </table>

</body>
</html>
