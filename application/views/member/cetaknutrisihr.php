<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            
        }

        th {
            border: 1px solid #ddd;
            padding: 3px;
            text-align: center;
        }
        td {
            border: 0px solid;
            padding: 2px;
            text-align: left;
        }
        td.td1 {
            border: 0px solid;
            padding: 0px;
            text-align: left;
        }
        td.td2 {
            border: 0.5px solid #ddd;
            padding: 3px;
            text-align: center;
        }

        th {
            background-color: #D5F0C1;
            
        }

        h3 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>

<table width="100%">
<tr>
        <td width="15%" align="right">
            <img src="<?php echo base_url() ?>assets/img/logo-top.png" width="100px"/>
        </td>
        <td align="center">
            <font size="5"><b>NUTRITRACK.ID</b></font><br/>
            <font size="2">Email : nutritrackofficial@gmail.com</font> <br/>
        </td>
    </tr>
</table>

<hr/>
<h2 class="center">Nutrisi Harian Member</h2>
<table>
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
									 <td class="td2"><?php echo date('d-m-Y', strtotime($row['tgl_catatan'])) ?></td>
									 <td class="td2"><?php echo $row['nama_makanan']?></td>
									 <td class="td2"><?php echo $row['jumlah']. " ". $row['satuan'] ?></td>
									 <td class="td2"><?php echo number_format($row['total_karbohidrat'], 2, '.', '') ?> gr</td>
									 <td class="td2"><?php echo number_format($row['total_protein'], 2, '.', '')?> gr</td>
									 <td class="td2"><?php echo number_format($row['total_lemak'], 2, '.', '')?> gr</td>
									 <td class="td2"><?php echo number_format($row['total_kalori'], 0, '.', '')?> kkal</td>
									 <td class="td2"><?php echo $row['keterangan']?></td>
								</tr>
								<?php
								endforeach;
								?>
							</tbody>
		</table>
        
        <table>
								<thead>
									<tr>
									<th >Total Karbohidrat Harian</th> 
                                        <td class="td2">
                                            <?php echo number_format($total_karbohidrat, 2, '.', ''); ?> gr
                                        </td>
                                    </tr>
                                    <tr>
                                    <th >Total Protein Harian </th>
                                    <td class="td2"> 
                                            <?php echo number_format($total_protein, 2, '.', ''); ?> gr
                                        </td>
                                    </tr>
                                    <tr>
                                    <th >Total Lemak Harian </th>
                                        <td class="td2">
                                            <?php echo number_format($total_lemak, 2, '.', ''); ?> gr
                                        </td>
                                    </tr>
                                    <tr>
                                    <th >Total Kalori Harian </th>
                                        <td class="td2">
                                            <?php echo number_format($total_kalori, 0, '.', ''); ?> kkal
                                        </td>
									</tr>
								</thead>

</body>
</html>
