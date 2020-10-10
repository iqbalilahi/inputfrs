<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Update Profile Mahasiswa</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Npm <?php echo form_error('npm') ?></td><td><input type="text" class="form-control" name="npm" id="npm" placeholder="Npm" value="<?php echo $npm; ?>" /></td></tr>
	    <tr><td width='200'>Nama Mhs <?php echo form_error('nama_mhs') ?></td><td><input type="text" class="form-control" name="nama_mhs" id="nama_mhs" placeholder="Nama Mhs" value="<?php echo $nama_mhs; ?>" /></td></tr>
	    <tr><td width='200'>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td><td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td><td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td></tr>
	    <tr><td>Jenis Kelamin <?php echo form_error('jeniskelamin') ?></td>
            <td>
                <div class="form-group">
                    <select class="form-control" name="jeniskelamin" id="jeniskelamin">
                        <option value="Laki-laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
            </div>
        </td></tr>
	    <tr><td>Jenis Kelamin <?php echo form_error('agama') ?></td>
            <td>
                <div class="form-group">
                    <select class="form-control" name="agama" id="agama">
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                    </select>
            </div>
        </td></tr>
	    <tr><td width='200'>No hp Mhs <?php echo form_error('nohp_mhs') ?></td><td><input type="text" class="form-control" name="nohp_mhs" id="nohp_mhs" placeholder="No hp Mhs" value="<?php echo $nohp_mhs; ?>" /></td></tr>
	    <tr><td width='200'>Email Mhs <?php echo form_error('email_mhs') ?></td><td><input type="email" class="form-control" name="email_mhs" id="email_mhs" placeholder="Email Mhs" value="<?php echo $email_mhs; ?>" /></td></tr>
	    
	    <!-- <tr><td width='200'>Jenjang Studi <?php echo form_error('id_jenjangstudi') ?></td><td>
                            <?php echo cmb_dinamis('id_jenjangstudi', 'tbl_jenjangstudi', 'nama_studi', 'id_jenjangstudi', $id_jenjangstudi,'DESC') ?> 
	    <tr><td width='200'>Program Studi <?php echo form_error('id_prodi') ?></td><td>
                            <?php echo cmb_dinamis('id_prodi', 'tbl_prodi', 'nama_prodi', 'id_prodi', $id_prodi,'DESC') ?> 
	    
	    <tr><td width='200'>Status Kuliah<?php echo form_error('id_status') ?></td><td>
                            <?php echo cmb_dinamis('id_status', 'tbl_status', 'nama_status', 'id_status', $id_status,'DESC') ?>  -->
	    <tr><td width='200'>Password <?php echo form_error('password') ?></td><td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td></tr>
	    <tr><td width='200'>Foto Mahasiswa <?php echo form_error('images') ?></td><td> <input type="file" name="images"></td></tr>
	    <!-- <tr><td width='200'>Level User <?php echo form_error('id_user_level') ?></td><td>
                            <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level,'DESC') ?> -->
        <!-- <tr><td width='200'>Status Aktif <?php echo form_error('is_aktif') ?></td><td>
                            <?php echo form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $is_aktif, array('class' => 'form-control')); ?> -->
                            <!--<input type="text" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="<?php echo $is_aktif; ?>" />--></td></tr> 
	    <tr><td></td><td><input type="hidden" name="id_mhs" value="<?php echo $id_mhs; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('inputfrs') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>