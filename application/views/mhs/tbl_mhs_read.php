<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
               
                <div class="box box-warning box-solid">

                    <div class="box-body">
        <h2 class="box-title" style="margin-top:0px">Detail Mahasiswa</h2>
        <table class="table table-bordered">
	    <tr><td>Npm</td><td><?php echo $npm; ?></td></tr>
	    <tr><td>Nama Mhs</td><td><?php echo $nama_mhs; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Jeniskelamin</td><td><?php echo $jeniskelamin; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Nohp Mhs</td><td><?php echo $nohp_mhs; ?></td></tr>
	    <tr><td>Email Mhs</td><td><?php echo $email_mhs; ?></td></tr>
	    <tr><td>Jenjangstudi</td><td><?php echo $nama_studi; ?></td></tr>
	    <tr><td>Prodi</td><td><?php echo $nama_prodi; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $nama_status; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Images</td><?php echo "<td><img src='".base_url('assets/foto_mhs/'.$images)."' width='100px' height='100px'></td>"?></tr>
	    <tr><td>Id User Level</td><td><?php echo $nama_level; ?></td></tr>
	    <tr><td>Is Aktif</td><td><?php echo $is_aktif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mhs') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
    </div>
                </div>
            </div>
    </section>
</div>