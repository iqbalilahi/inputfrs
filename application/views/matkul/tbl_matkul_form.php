<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_MATKUL</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kode Matkul <?php echo form_error('kode_matkul') ?></td><td><input type="text" class="form-control" name="kode_matkul" id="kode_matkul" placeholder="Kode Matkul" value="<?php echo $kode_matkul; ?>" /></td></tr>
	    <tr><td width='200'>Nama Matkul <?php echo form_error('nama_matkul') ?></td><td><input type="text" class="form-control" name="nama_matkul" id="nama_matkul" placeholder="Nama Matkul" value="<?php echo $nama_matkul; ?>" /></td></tr>
	    <tr><td width='200'>SKS <?php echo form_error('id_sks') ?></td><td>
                            <?php echo cmb_dinamis('id_sks', 'tbl_sks', 'sks', 'id_sks', $id_sks,'ASC') ?>
	    <tr><td width='200'>Status Nilai <?php echo form_error('status_nilai') ?></td><td><input type="text" class="form-control" name="status_nilai" id="status_nilai" placeholder="Status Nilai" value="<?php echo $status_nilai; ?>" /></td></tr>
	    <tr><td width='200'>Dosen <?php echo form_error('id_dosen') ?></td><td>
                            <?php echo cmb_dinamis('id_dosen', 'tbl_dosen', 'nama_dosen', 'id_dosen', $id_dosen,'DESC') ?>

	    <tr><td width='200'>Jenjang Studi <?php echo form_error('id_jenjangstudi') ?></td><td>
                            <?php echo cmb_dinamis('id_jenjangstudi', 'tbl_jenjangstudi', 'nama_studi', 'id_jenjangstudi', $id_jenjangstudi,'DESC') ?>
	    <tr><td width='200'>Prodi <?php echo form_error('id_prodi') ?></td><td>
                            <?php echo cmb_dinamis('id_prodi', 'tbl_prodi', 'nama_prodi', 'id_prodi', $id_prodi,'DESC') ?>
        
	    <tr><td width='200'>Semester <?php echo form_error('id_semester') ?></td><td>
                            <?php echo cmb_dinamis('id_semester', 'tbl_semester', 'semester', 'id_semester', $id_semester,'ASC') ?>
        <tr><td width='200'>Periode <?php echo form_error('id_thperiode') ?></td><td>
                            <?php echo cmb_dinamis('id_thperiode', 'tbl_tahunperiode', 'tahun_akademik', 'id_thperiode', $id_thperiode,'ASC') ?>                   
	    <tr><td></td><td><input type="hidden" name="id_matkul" value="<?php echo $id_matkul; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('matkul') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>