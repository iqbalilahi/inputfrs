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
        <h2>Tbl_mhs List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Npm</th>
		<th>Nama Mhs</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jeniskelamin</th>
		<th>Agama</th>
		<th>Nohp Mhs</th>
		<th>Email Mhs</th>
		<th>Id Jenjangstudi</th>
		<th>Id Prodi</th>
		<th>Id Status</th>
        <th>Id User Level</th>
        <th>Is Aktif</th>

		
            </tr><?php
            foreach ($mhs_data as $mhs)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mhs->npm ?></td>
		      <td><?php echo $mhs->nama_mhs ?></td>
		      <td><?php echo $mhs->tempat_lahir ?></td>
		      <td><?php echo $mhs->tanggal_lahir ?></td>
		      <td><?php echo $mhs->jeniskelamin ?></td>
		      <td><?php echo $mhs->agama ?></td>
		      <td><?php echo $mhs->nohp_mhs ?></td>
		      <td><?php echo $mhs->email_mhs ?></td>
		      <td><?php echo $mhs->id_jenjangstudi ?></td>
		      <td><?php echo $mhs->id_prodi ?></td>
		      <td><?php echo $mhs->id_status ?></td>
		      <td><?php echo $user->id_user_level ?></td>
              <td><?php echo $user->is_aktif ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>