
<div class="content-wrapper">
    <section class="content">
    	<?php echo alert('alert-info', 'Selamat Datang', 'Selamat Datang Di Halaman Utama')?> 
        <div class="row">
            <div class="col-xs-12">
               
                <div class="box box-warning box-solid">

                    <div class="box-body">
        <h2 class="box-title" style="margin-top:0px">Input FRS</h2>
        <form method="get" action="<?php echo base_url("inputfrs/cari_matkul/")?>">
        <table class="table table-bordered">
	    <tr>
	    	<td>NPM : <?php echo $npm; ?></td>
	    	<td>Jenjang Studi : <?php echo $nama_studi; echo " - "; echo $nama_prodi;  ?></td>
	    	<input type="hidden" name="id_prodi" id="id_prodi" value="<?php echo $id_prodi; ?>"/>
	    	<!-- <td> Kelas : <?php echo $nama_status; ?></td> -->
	    </tr>
	    <tr>
	    	<td>Nama Mahasiswa : <?php echo $nama_mhs; ?></td>
	    	<td> Status Kuliah : <?php echo $nama_status; ?></td>
	    <!-- <td> Kelas : <?php echo $nama_status; ?></td> -->
	    </tr>
	    <tr>
	    	<td width='200'>Semester <?php echo form_error('id_semester') ?></td>
	    	<td><?php echo cmb_dinamis('id_semester', 'tbl_semester', 'semester', 'id_semester', $id_semester,'ASC') ?></td>
	    </tr>
        <tr>
        	<td width='200'>Periode <?php echo form_error('id_thperiode') ?></td>
        	<td><?php echo cmb_dinamis('id_thperiode', 'tbl_tahunperiode', 'tahun_akademik', 'id_thperiode', $id_thperiode,'ASC') ?></td>
        </tr>
	    

	    <tr>
	    	<td><button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button></td>
		</tr>
    </table>
</form>
    </div>
                </div>
            </div>
    </section>
</div>
