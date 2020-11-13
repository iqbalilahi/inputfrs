<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_DOSEN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nid <?php echo form_error('nid') ?></td><td><input type="text" class="form-control" name="nid" id="nid" placeholder="Nid" value="<?php echo $nid; ?>" /></td></tr>
	    <tr><td width='200'>Nama Dosen <?php echo form_error('nama_dosen') ?></td><td><input type="text" class="form-control" name="nama_dosen" id="nama_dosen" placeholder="Nama Dosen" value="<?php echo $nama_dosen; ?>" /></td></tr>
	    <tr><td width='200'>Telp Dosen <?php echo form_error('telp_dosen') ?></td><td><input type="text" class="form-control" name="telp_dosen" id="telp_dosen" placeholder="Telp Dosen" value="<?php echo $telp_dosen; ?>" /></td></tr>
	    <tr><td width='200'>Alamat Dosen <?php echo form_error('alamat_dosen') ?></td><td><input type="text" class="form-control" name="alamat_dosen" id="alamat_dosen" placeholder="Alamat Dosen" value="<?php echo $alamat_dosen; ?>" /></td></tr>
	    <tr><td>Jenis Kelamin <?php echo form_error('jeniskelamin') ?></td>
            <td>
                <div class="form-group">
                    <select class="form-control" name="jeniskelamin" id="jeniskelamin">
                        <option value="Laki-laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
            </div>
        </td></tr>
	    <tr><td width='200'>Pendidikan Akhir <?php echo form_error('pendidikan_akhir') ?></td><td><input type="text" class="form-control" name="pendidikan_akhir" id="pendidikan_akhir" placeholder="Pendidikan Akhir" value="<?php echo $pendidikan_akhir; ?>" /></td></tr>
	    <tr><td>Agama <?php echo form_error('agama') ?></td>
            <td>
                <div class="form-group">
                    <select class="form-control" name="agama" id="agama">
                        <option value="islam">Islam</option>
                    </select>
            </div>
        </td></tr>
	    <tr><td width='200'>Email Dosen <?php echo form_error('email_dosen') ?></td><td><input type="text" class="form-control" name="email_dosen" id="email_dosen" placeholder="Email Dosen" value="<?php echo $email_dosen; ?>" /></td></tr>
	    <tr><td width='200'>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td><td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td><td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_dosen" value="<?php echo $id_dosen; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('dosen') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>