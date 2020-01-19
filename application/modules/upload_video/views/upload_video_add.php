<?php $this->load->view('header-template');?>

 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Add upload_video Kerja<small>Informasi upload_video Kerja</small></h3>
				</div>
			</div>
		 
 
              
   	<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('upload_video/pro_add_upload_video')?>">
		 <table class="table table-striped " > 
		      <!--<tr>
		        <td width="150" align="left">Kode upload_video</td>
		        <td width="10">:</td>
		        <td><input type="text" name="kode_upload_video" placeholder="Kode upload_video" class="form-control" required ></td>
		      </tr>-->
		     
		      <tr>
		        <td width="150" align="left">Nama upload_video</td>
		        <td width="10">:</td>
		        <td><input type="text" name="nm_upload_video" placeholder="Nama upload_video" class="form-control" required></td>
		      </tr>
		      
		     <!-- <tr>
		        <td>Wilayah</td>
		        <td width="10">:</td>
		        <td><select name="wilayah" class="form-control" required>
                               <option value=''>--Pilih--</option>
                <option value='D'>Darat</option>
                <option value='L'>Laut</option>
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
