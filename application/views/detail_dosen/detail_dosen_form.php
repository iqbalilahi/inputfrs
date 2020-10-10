<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA DETAIL_DOSEN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Dosen <?php echo form_error('id_dosen') ?></td><td>
                            <?php echo cmb_dinamis('id_dosen', 'tbl_dosen', 'nama_dosen', 'id_dosen', $id_dosen,'DESC') ?>
	    <tr><td width='200'>Jabatan <?php echo form_error('id_jabatan') ?></td><td>
                            <?php echo cmb_dinamis('id_jabatan', 'tbl_jabatan', 'jabatan', 'id_jabatan', $id_jabatan,'DESC') ?>
	    <tr><td></td><td><input type="hidden" name="id_detail_dosen" value="<?php echo $id_detail_dosen; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_dosen') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>