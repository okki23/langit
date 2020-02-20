<?php $this->load->view('header-template');?>
<body> 
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
                    <h3>Data <?php echo set_title($location);?></h3>  
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary">   Tambah Data </a>
                    <br>
                    &nbsp;
				</div>
			</div> 
             
            <table class="table table-bordered table-striped table-hover js-basic-example" id="example">
                <thead>
                    <tr>
                        <th style="width:2%; text-align:center;">No</th>
                        <th style="width:20%; text-align:center;">Nama Gugus</th> 
                        <th style="width:5%; text-align:center;">Opsi</th>
                    </tr>
                </thead>
            </table>  
             
	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4> 
                        </div>
                        <div class="modal-body"> 
                            <form id="MateriVideo" enctype="multipart/form-data" method="post">
                                <input type="text" name="id" id="id"> 
                                <!-- <input type="text" name="author" id="author" value="<?php echo $this->session->userdata('username'); ?>">  -->
                                <div class="form-group">
                                <div class="col-sm-12">
                                <div class="row"> 
                                        <br>
                                        &nbsp;
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Nama Gugus:</label>
                                            <input type="text" name="nm_gugus" id="nm_gugus" class="form-control">
                                        </div> 
                                    </div>
                                    <br> 
                                   
                                </div>
                                </div>  
                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="Simpan_Data();">  Simpan </button>
                                <button type="button" name="cancel" id="cancel" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                                <br>
                                &nbsp;
							</form>
					   </div>
                      
                    </div>
                </div>
    </div>

  
</body>
 
<script type="text/javascript">	
    $('#example').DataTable({
             "ajax": "<?php echo base_url(); ?>gugus/fetch_gugus",
             "destroy":true
    });   
    function Simpan_Data() {  
        var nm_gugus = $("#nm_gugus").val();
        var id = $("#id").val();
         $.ajax({
             url: "<?php echo base_url(); ?>gugus/simpan_data",
             type: "POST",
             data: {id:id,nm_gugus:nm_gugus},
             dataType:"json",
             success: function(result) {
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload();
                 Bersihkan_Form();  
             }
         });
    } 

    $("#addmodal").on("click",function(){
            Bersihkan_Form();
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");  
	}); 

    function Ubah_Data(id) {
         $("#defaultModalLabel").html("Form Ubah Data");
         $("#defaultModal").modal('show');

         $.ajax({
             url: "<?php echo base_url(); ?>gugus/get_data_edit/" + id,
             type: "GET",
             dataType: "JSON",
             success: function(result) { 
                 $("#defaultModal").modal('show');
                 $("#id").val(result.id);
                 $("#nm_gugus").val(result.nm_gugus); 
             }
         });
     }

    function Bersihkan_Form() {
         $(':input').val('');
         $("#kelas_id").select2().select2('val','');
         $("#status").select2().select2('val',''); 
    }

    function Hapus_Data(id) {
         if (confirm('Anda yakin ingin menghapus data ini?')) { 
             $.ajax({
                 url: "<?php echo base_url('gugus/hapus_data') ?>/" + id,
                 type: "GET",
                 dataType: "JSON",
                 success: function(data) { 
                     $('#example').DataTable().ajax.reload();  
                 },
                 error: function(jqXHR, textStatus, errorThrown) {
                     alert('Error deleting data');
                 }
             }); 
         }
     }    
</script> 
</div>
</div>
</html>	
