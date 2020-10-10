<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_tahunperiode List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Periode</th>
		<th>Tahun Akademik</th>
		<th>Ket Periode</th>
		
            </tr><?php
            foreach ($tahunperiode_data as $tahunperiode)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tahunperiode->periode ?></td>
		      <td><?php echo $tahunperiode->tahun_akademik ?></td>
		      <td><?php echo $tahunperiode->ket_periode ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>