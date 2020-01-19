<?php $this->load->view('header-template');?>
<body> 
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
                    <h3>Data <?php echo ucwords(str_replace("_"," ",$location));?></h3>
                    <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary">   Tambah Data </a>
                    <br>
                    &nbsp;
				</div>
			</div>
		<!-- /sidebar -->
<!--<a href="upload_video/add_upload_video" class="btn btn-xs btn-primary">Add</a><p>-->

<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>


	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                           
                        </div>
                        <div class="modal-body"> 
                                    

                                    
                                            <form id="uploadImage" action="<?php echo base_url('media/upload'); ?>" enctype="multipart/form-data" method="post">
                                            <input type="hidden" name="id" id="id">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="artist" id="artist" class="form-control" placeholder="Artist" />
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" />
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label>File Upload</label>
                                                    <input type="file" name="uploadFile" id="uploadFile" onchange="PreviewGambar(this);" />
                                                    <input type="hidden" name="fileupload" id="fileupload">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" id="uploadSubmit" value="Upload" class="btn btn-info" />
                                                </div>
                                                <div class="progress">  
                                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><div id="percent"> </div></div>
                                                </div>
                                                
                                                <button type="button" name="cancel" id="cancel" class="btn btn-block btn-danger" onclick="javascript:Bersihkan_Form();" data-dismiss="modal">   Batal</button>
                                                <button type="button" name="save" id="save" class="btn btn-block btn-success " onclick="javascript:CloseWindow();" data-dismiss="modal">  Save</button>
                                                  
                                            
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>
 
</body>
<script type="text/javascript">	
$(document).ready( function () {
    $('#table_id').DataTable();
} );
$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
            $("#sign").hide();
            $("#cancel").show();
            $("#save").hide();
		}); 


</script>
 
</div>
</div>
</html>	
