<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
               
                <div class="box box-warning box-solid">

                    <div class="box-body">
        <h2 class="box-title" style="margin-top:0px">Barang Read</h2>
        <table class="table table-bordered">
	    <tr><td>Kode Matkul</td><td><?php echo $kode_matkul; ?></td></tr>
	    <tr><td>Nama Matkul</td><td><?php echo $nama_matkul; ?></td></tr>
	    <tr><td>Sks</td><td><?php echo $sks; ?></td></tr>
	    <tr><td>Status Nilai</td><td><?php echo $status_nilai; ?></td></tr>
	    <tr><td>Dosen</td><td><?php echo $nama_dosen; ?></td></tr>
	    <tr><td>Jenjangstudi</td><td><?php echo $nama_studi; ?></td></tr>
	    <tr><td>Prodi</td><td><?php echo $nama_prodi; ?></td></tr>
	    <tr><td>Semester</td><td><?php echo $semester; ?></td></tr>
        <tr><td>Periode</td><td><?php echo $tahun_akademik; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('matkul') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
    </div>
                </div>
            </div>
    </section>
</div>