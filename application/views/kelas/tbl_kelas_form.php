<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_KELAS</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kode Kelas <?php echo form_error('kode_kelas') ?></td><td><input type="text" class="form-control" name="kode_kelas" id="kode_kelas" placeholder="Kode Kelas" value="<?php echo $kode_kelas; ?>" /></td></tr>
	    <tr><td width='200'>Nama Kelas <?php echo form_error('nama_kelas') ?></td><td><input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="<?php echo $nama_kelas; ?>" /></td></tr>
	    <tr><td width='200'>Semester<?php echo form_error('id_semester') ?></td><td>
                            <?php echo cmb_dinamis('id_semester', 'tbl_semester', 'semester', 'id_semester', $id_semester,'DESC') ?> 
	    <tr><td></td><td><input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('kelas') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>