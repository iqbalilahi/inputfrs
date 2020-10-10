<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Judulskripsi Read</h2>
        <table class="table">
	    <tr><td>Id Mhs</td><td><?php echo $id_mhs; ?></td></tr>
	    <tr><td>Npm</td><td><?php echo $npm; ?></td></tr>
	    <tr><td>Nama Mhs</td><td><?php echo $nama_mhs; ?></td></tr>
	    <tr><td>Id Prodi</td><td><?php echo $id_prodi; ?></td></tr>
	    <tr><td>Perusahaan</td><td><?php echo $perusahaan; ?></td></tr>
	    <tr><td>Alamat P</td><td><?php echo $alamat_p; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Id Detail Dosen</td><td><?php echo $id_detail_dosen; ?></td></tr>
	    <tr><td>Pembimbing A</td><td><?php echo $pembimbing_a; ?></td></tr>
	    <tr><td>Pembimbing B</td><td><?php echo $pembimbing_b; ?></td></tr>
	    <tr><td>Id Frs</td><td><?php echo $id_frs; ?></td></tr>
	    <tr><td>Tahun Akademik</td><td><?php echo $tahun_akademik; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('judulskripsi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>