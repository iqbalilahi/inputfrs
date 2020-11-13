
<div class="content-wrapper">
    <section class="content">
    	
        <div class="row">

            <div class="col-xs-12">
            	<div class="info-box">
        	<span class="info-box-icon bg-white">
        		<?php echo "<img src='".base_url('assets/foto_mhs/'.$images)."' >"?>
        	</span>
        	<div class="info-box-content">
        		<span class="info-box-number">
        			NPM : <?php echo $npm; ?>
        		</span>
        		<span class="info-box-hidden">
        			Nama : <?php echo $nama_mhs; ?>
        		</span>
        		<span class="info-box-hidden">
        			Jenjang Studi : <?php echo $nama_studi; echo " - "; echo $nama_prodi; ?>
        		</span>
        		<span class="info-box-hidden">
        			Status Kuliah : <?php echo $nama_status; ?>
        		</span>
        	</div>
        </div>
                <div class="box box-warning box-solid">
                    <div class="box-body">
        <h2 class="box-title" style="margin-top:0px">Input FRS</h2>
        <form action="<?php echo base_url("forinputfrs/insertrow")?>" method="post">
        <table id="tabel-data" class="table table-striped table-bordered">
	    <!-- <tr>
	    	<td>NPM : <?php echo $npm; ?></td>
	    	<td>Jenjang Studi : <?php echo $nama_studi; echo " - "; echo $nama_prodi;  ?></td>
	    </tr>
	    <tr>
	    	<td>Nama Mahasiswa : <?php echo $nama_mhs; ?></td>
	    	<td> Status Kuliah : <?php echo $nama_status; ?></td>\
	    </tr> -->
            <thead>
                <tr>
                    <th width="5px">No</th>
		    <th>Kode Matkul</th>
		    <th>Nama Matkul</th>
            <th>Nama Dosen</th>
		    <th>Sks</th>
		    <th>Status Nilai</th>
		    <th>Jenjangstudi</th>
		    <th>Prodi</th>
		    
                </tr>
            </thead>
        <tbody>
            <?php
            $total_sks = 0;
			$start = 0;
			$index = 0;
            foreach ($matkul_data as $matkul)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?> 
		    <input type="hidden" class="form-control" id="id_mhs" name="id_mhs[]" value="<?php echo $id_mhs; ?>" />
		    <input type="hidden" class="form-control" id="id_matkul" name="id_matkul[]" value="<?php echo $matkul->id_matkul; ?>" />
        </td>
		    <td><?php echo $matkul->kode_matkul; ?>
		    	<input type="hidden" class="form-control" id="kode_matkul" name="kode_matkul[]" value="<?php echo $matkul->kode_matkul; ?>" /></td>
            
		    <td><?php echo $matkul->nama_matkul; ?> </td>
            
                <?php if ($matkul->id_dosen != 0) {
                    echo "<td><input type='hidden' class='form-control' id='id_dosen' name='id_dosen[]' value='".$matkul->id_dosen."' />";
                    echo''. $matkul->nama_dosen.'</td>';
                }else{ 
                    echo "<input type='hidden' class='form-control' id='id_dosen' name='id_dosen[]' value='0' />";
                    echo'<td>'. $matkul->id_dosen.'</td>';
                }?>
            
		    <td><?php echo $matkul->sks; $total_sks += $matkul->sks; ?>
		    	<input type="hidden" class="form-control" id="sks" name="sks[]" value="<?php echo $matkul->sks; ?>" /></td>
		    <td><?php echo $matkul->status_nilai; ?> 
		    	<input type="hidden" class="form-control" id="status_nilai" name="status_nilai[]" value="<?php echo $matkul->status_nilai; ?>" /></td>
            
		    <td><?php echo $matkul->kode_studi; ?>
		    	<input type="hidden" class="form-control" id="kode_studi" name="kode_studi[]" value="<?php echo $matkul->kode_studi; ?>" />
		    </td>
		    <td><?php echo $matkul->nama_prodi; ?>
		    	<input type="hidden" class="form-control" id="nama_prodi" name="nama_prodi[]" value="<?php echo $matkul->nama_prodi; ?>" />
		    </td>
            <td>
		      <input type="hidden" class="form-control" id="semester" name="semester[<?php echo $index; ?>]" value="<?php echo $matkul->semester; ?>" />
            <td>
		   	  <input type="hidden" class="form-control" id="tahun_akademik" name="tahun_akademik[]" value="<?php echo $matkul->tahun_akademik; ?>" />
            </td>
		    <td>
		      <input type="hidden" class="form-control" name="id_frs[]"/> 
			<?php 

			?>
		    </td>
	        </tr>
                <?php
				$index++;
            }
            ?>
            </tbody>

	    <tr>
	    	<td></td>
	    	<td></td>
	    	<td>Total SKS</td>
	    	<td><?php
	    	echo $total_sks; ?></td>         
      </tr>

    </table>
    <div class="box-footer">
    	<?php
    	$a = 24;
    		if ($total_sks <= $a ){

                        echo  "<input type='hidden' class='form-control' id='semester' name='semester' value='".$semester."' />";
                        echo "<input type='hidden' class='form-control' id='tahun_akademik' name='tahun_akademik' value='".$tahun_akademik."' />"; 
                        echo "<input type='hidden' class='form-control' id='nama_prodi' name='nama_prodi' value='".$nama_prodi."' />";
                    echo "<button type='submit' class='btn btn-primary'><i class='fa fa-floppy-o'></i>Cetak</button>";
                }else{
                   echo anchor(site_url('inputfrs'),'<i class="fa fa-clock-o"></i> Cancel','title="Back" class="btn btn-danger btn-sm"');
                }
                //echo json_encode($matkul);
    	?>

	</div>
</form>
    </div>
                </div>
            </div>
    </section>
</div>