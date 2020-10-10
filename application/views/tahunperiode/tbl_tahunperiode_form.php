<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_TAHUNPERIODE</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Periode <?php echo form_error('periode') ?></td><td><input type="text" class="form-control" name="periode" id="periode" placeholder="Periode" value="<?php echo $periode; ?>" /></td></tr>
	    <tr><td width='200'>Tahun Akademik <?php echo form_error('tahun_akademik') ?></td><td><input type="text" class="form-control" name="tahun_akademik" id="tahun_akademik" placeholder="Tahun Akademik" value="<?php echo $tahun_akademik; ?>" /></td></tr>
	    <tr><td width='200'>Ket Periode <?php echo form_error('ket_periode') ?></td><td><input type="text" class="form-control" name="ket_periode" id="ket_periode" placeholder="Ket Periode" value="<?php echo $ket_periode; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_thperiode" value="<?php echo $id_thperiode; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('tahunperiode') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>