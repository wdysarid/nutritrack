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
            
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
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
        <td width="20%" align="right">
            <img src="<?php echo base_url() ?>assets/img/logo-top.png" width="100px"/>
        </td>
        <td align="center">
            <font size="5"><b>NUTRITRACK.ID</b></font><br/>
            <font size="2">Email : nutritrack.co.id </font> <br/>
        </td>
    </tr>
</table>

<hr/>
<h2 class="center">Nutrisi Harian Member</h2>
<table border="1" width="100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Makanan</th>
        <th>Total Kalori</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (empty($hasil)) {
        echo "<tr><td colspan='4'>Data kosong</td></tr>";
    } else {
        $no = 1;
        foreach ($hasil as $data):
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data->nama_makanan; ?></td>
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
