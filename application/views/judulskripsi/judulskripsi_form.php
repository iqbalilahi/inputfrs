<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA JUDULSKRIPSI</h3>
            </div>
            <form action="<?php echo base_url("judulskripsi/buat")?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Id Mhs <?php echo form_error('id_mhs') ?></td><td><input type="text" class="form-control" name="id_mhs" id="id_mhs" placeholder="Id Mhs" readonly value="<?php echo $id_mhs; ?>" /></td></tr>
	    <tr><td width='200'>Npm <?php echo form_error('npm') ?></td><td><input type="text" class="form-control" name="npm" id="npm" placeholder="Npm" readonly value="<?php echo $npm; ?>" /></td></tr>
	    <tr><td width='200'>Nama Mhs <?php echo form_error('nama_mhs') ?></td><td><input type="text" class="form-control" name="nama_mhs" id="nama_mhs" placeholder="Nama Mhs" readonly value="<?php echo $nama_mhs; ?>" /></td></tr>
	    <tr><td width='200'>Id Prodi <?php echo form_error('id_prodi') ?></td>
	    	<td><input type="hidden" class="form-control" name="id_prodi" id="id_prodi" placeholder="Id Prodi" value="<?php echo $id_prodi; ?>" /><?php echo $nama_prodi; ?></td>
	    </tr>
	    <tr><td width='200'>Judul Skripsi/TA <?php echo form_error('judulskripsi') ?></td><td> <textarea class="form-control" rows="3" name="judulskripsi" id="judulskripsi" placeholder="Input Judul Skripsi / TA"><?php echo $judulskripsi; ?></textarea></td></tr>
	    <tr><td width='200'>Perusahaan <?php echo form_error('perusahaan') ?></td><td><input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan" value="<?php echo $perusahaan; ?>" /></td></tr>
	    
        <tr><td width='200'>Alamat P <?php echo form_error('alamat_p') ?></td><td> <textarea class="form-control" rows="3" name="alamat_p" id="alamat_p" placeholder="Alamat P"><?php echo $alamat_p; ?></textarea></td></tr>
	    <tr><td width='200'>Email <?php echo form_error('email') ?></td><td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td></tr>
	    <tr>
	    	<td>
	    		Pembimbing 1 <?php echo form_error('pembimbing_a') ?>
	    	</td>
	    	<td>
	    		<select class="form-control" name="pembimbing_a" id="pembimbing_a">
	    			<option value="">
	    				Pilih Pembimbing 1
	    			</option>
	    			<?php foreach ($pembimbing_a as $value) {?>
	    				<option value=<?= $value['id_detail_dosen'] ?>><?= $value['dosen'] ?></option>
					<?php } ?>
	    		</select>
	    	</td>
	    </tr>
	    <tr>
	    	<td>
	    		Pembimbing 2 <?php echo form_error('pembimbing_b') ?>
	    	</td>
	    	<td>
	    		<select class="form-control" name="pembimbing_b" id="pembimbing_b">
	    			<option value="">
	    				Pilih Pembimbing 2
	    			</option>
	    			<?php foreach ($pembimbing_b as $value) {?>
	    				<option value=<?= $value['id_detail_dosen'] ?>><?= $value['dosen'] ?></option>
					<?php } ?>
	    		</select>
	    	</td>
	    </tr>
	    
	    <tr><td width='200'>Tahun Akademik <?php echo form_error('tahun_akademik') ?></td><td><input type="text" class="form-control" name="tahun_akademik" readonly id="tahun_akademik" placeholder="Tahun Akademik" value="<?php echo $tahun_akademik; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_judulskripsi" value="<?php echo $id_judulskripsi; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Create</button> 
	    <a href="<?php echo site_url('judulskripsi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        
</div>
</div>
</div>