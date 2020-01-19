<?php $this->load->view('header-template');?>

 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Update Jabatan<small>Informasi Jabatan</small></h3>
				</div>
			</div>
		 
              <?php
              foreach($data_employee->result() as $row){
                  $id = $row->id;
                 // $kode_jabatan = $row->kode_jabatan;
                  $nm_jabatan = $row->nama_jabatan;
                  //$wilayah = $row->wilayah;
              }
              ?>
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('jabatan/pro_update_jabatan')?>">
    		<input type="hidden" name="id" value="<?php echo $id; ?>" >
	 
		 <table class="table table-striped " > 
		      <!--<tr>
		        <td width="150" align="left">Kode Jabatan</td>
		        <td width="10">:</td>
		        <td><input type="text" name="kode_jabatan" placeholder="Kode Jabatan" class="form-control" required value="<?php echo $kode_jabatan; ?>"></td>
		      </tr>-->
		     
		      <tr>
		        <td width="150" align="left">Nama Jabatan</td>
		        <td width="10">:</td>
		        <td><input type="text" name="nm_jabatan" placeholder="Nama Jabatan" class="form-control" required value="<?php echo $nm_jabatan; ?>"></td>
		      </tr>
		      
		      <!--<tr>
		        <td>Wilayah</td>
		        <td width="10">:</td>
		        <td><select name="wilayah" class="form-control" required>
                 <option value=''>--Pilih--</option>
                <option value="D" <?php if($wilayah == 'D'){ echo "selected=selected"; }?> >Darat</option>
                <option value="L"  <?php if($wilayah == 'L'){ echo "selected=selected"; }?>>Laut</option>
            </select></td>
		      </tr>-->
		 </table>

		 <br/><br/>
      <div class="form-actions text-left">
        <button type="submit" class="btn btn-primary"> <span data-icon="&#xe08d;"> </span> Save</button>
        <button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-primary">Cancel</button>
      </div>

    </form>
  </div>
</body>

 