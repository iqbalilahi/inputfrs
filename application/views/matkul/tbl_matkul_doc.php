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
        <h2>Tbl_matkul List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Matkul</th>
		<th>Nama Matkul</th>
		<th>Id Sks</th>
		<th>Status Nilai</th>
		<th>Id Dosen</th>
		<th>Id Jenjangstudi</th>
		<th>Id Prodi</th>
		<th>Id Semester</th>
        <th>IdPeriode</th>
		
            </tr><?php
            foreach ($matkul_data as $matkul)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $matkul->kode_matkul ?></td>
		      <td><?php echo $matkul->nama_matkul ?></td>
		      <td><?php echo $matkul->id_sks ?></td>
		      <td><?php echo $matkul->status_nilai ?></td>
		      <td><?php echo $matkul->id_dosen ?></td>
		      <td><?php echo $matkul->id_jenjangstudi ?></td>
		      <td><?php echo $matkul->id_prodi ?></td>
		      <td><?php echo $matkul->id_semester ?></td>	
              <td><?php echo $matkul->id_thperiode ?></td>   
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>