<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_PRODI</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Kode Prodi <?php echo form_error('kode_prodi') ?></td><td><input type="text" class="form-control" name="kode_prodi" id="kode_prodi" placeholder="Kode Prodi" value="<?php echo $kode_prodi; ?>" /></td></tr>
	    <tr>
        	<td width='200'>Jenjang Studi <?php echo form_error('id_jenjangstudi') ?></td>
        	<td><?php echo cmb_dinamis('id_jenjangstudi', 'tbl_jenjangstudi', 'kode_studi', 'id_jenjangstudi', $id_jenjangstudi,'ASC') ?></td>
        </tr>
	    <tr><td width='200'>Nama Prodi <?php echo form_error('nama_prodi') ?></td><td><input type="text" class="form-control" name="nama_prodi" id="nama_prodi" placeholder="Nama Prodi" value="<?php echo $nama_prodi; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_prodi" value="<?php echo $id_prodi; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('prodi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>