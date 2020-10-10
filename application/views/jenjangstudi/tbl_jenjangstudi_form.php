<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_JENJANGSTUDI</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kode Studi <?php echo form_error('kode_studi') ?></td><td><input type="text" class="form-control" name="kode_studi" id="kode_studi" placeholder="Kode Studi" value="<?php echo $kode_studi; ?>" /></td></tr>
	    <tr><td width='200'>Nama Studi <?php echo form_error('nama_studi') ?></td><td><input type="text" class="form-control" name="nama_studi" id="nama_studi" placeholder="Nama Studi" value="<?php echo $nama_studi; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_jenjangstudi" value="<?php echo $id_jenjangstudi; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenjangstudi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>