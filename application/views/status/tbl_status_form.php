<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_STATUS</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kode Status <?php echo form_error('kode_status') ?></td><td><input type="text" class="form-control" name="kode_status" id="kode_status" placeholder="Kode Status" value="<?php echo $kode_status; ?>" /></td></tr>
	    <tr><td width='200'>Nama Status <?php echo form_error('nama_status') ?></td><td><input type="text" class="form-control" name="nama_status" id="nama_status" placeholder="Nama Status" value="<?php echo $nama_status; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_status" value="<?php echo $id_status; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('status') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>