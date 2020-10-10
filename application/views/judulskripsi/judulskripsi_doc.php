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
        <h2>Judulskripsi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Mhs</th>
		<th>Npm</th>
		<th>Nama Mhs</th>
		<th>Id Prodi</th>
		<th>Perusahaan</th>
		<th>Alamat P</th>
		<th>Email</th>
		<th>Id Detail Dosen</th>
		<th>Pembimbing A</th>
		<th>Pembimbing B</th>
		<th>Id Frs</th>
		<th>Tahun Akademik</th>
		
            </tr><?php
            foreach ($judulskripsi_data as $judulskripsi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $judulskripsi->id_mhs ?></td>
		      <td><?php echo $judulskripsi->npm ?></td>
		      <td><?php echo $judulskripsi->nama_mhs ?></td>
		      <td><?php echo $judulskripsi->id_prodi ?></td>
		      <td><?php echo $judulskripsi->perusahaan ?></td>
		      <td><?php echo $judulskripsi->alamat_p ?></td>
		      <td><?php echo $judulskripsi->email ?></td>
		      <td><?php echo $judulskripsi->id_detail_dosen ?></td>
		      <td><?php echo $judulskripsi->pembimbing_a ?></td>
		      <td><?php echo $judulskripsi->pembimbing_b ?></td>
		      <td><?php echo $judulskripsi->id_frs ?></td>
		      <td><?php echo $judulskripsi->tahun_akademik ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>