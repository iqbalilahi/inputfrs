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
        <h2>Tbl_dosen List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nid</th>
		<th>Nama Dosen</th>
		<th>Telp Dosen</th>
		<th>Alamat Dosen</th>
		<th>Jeniskelamin</th>
		<th>Pendidikan Akhir</th>
		<th>Agama</th>
		<th>Email Dosen</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		
            </tr><?php
            foreach ($dosen_data as $dosen)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $dosen->nid ?></td>
		      <td><?php echo $dosen->nama_dosen ?></td>
		      <td><?php echo $dosen->telp_dosen ?></td>
		      <td><?php echo $dosen->alamat_dosen ?></td>
		      <td><?php echo $dosen->jeniskelamin ?></td>
		      <td><?php echo $dosen->pendidikan_akhir ?></td>
		      <td><?php echo $dosen->agama ?></td>
		      <td><?php echo $dosen->email_dosen ?></td>
		      <td><?php echo $dosen->tempat_lahir ?></td>
		      <td><?php echo $dosen->tanggal_lahir ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>