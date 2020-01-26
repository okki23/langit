<?php $this->load->view('header-template');?>
<body> 
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">                
                    <h3>Data <?php echo set_title($location);?></h3>
                    
				</div>
			</div>
		<!-- /sidebar -->
        <table class="table table-bordered table-striped table-hover js-basic-example" id="example">
            <thead>
                <tr>
                    <th style="width:5%; text-align:center;">No</th> 
                    <th style="width:10%; text-align:center;">Nama Karyawan</th> 
                    <th style="width:10%; text-align:center;">Posisi</th> 
                    <th style="width:10%; text-align:center;">Kelas</th>   
                    <th style="width:20%; text-align:center;">Opsi</th>
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
                            <form id="formdata" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="id" id="id"> 
                                <div class="form-group">
                                   <div class="col-sm-12"> 
                                            <label>Nama Pegawai</label>
                                            <input type="text" name="nama_pegawai" id="nama_pegawai" readonly="readonly" class="form-control">
                                    </div>  
                                </div>
                                <div class="form-group">
                                   <div class="col-sm-12"> 
                                            <label>Posisi</label>
                                            <input type="text" name="posisi" id="posisi" readonly="readonly" class="form-control">
                                    </div>  
                                </div>
                                <div class="form-group">
                                   <div class="col-sm-12"> 
                                            <label>Kelas</label>
                                            <input type="text" name="kelas" id="kelas" readonly="readonly" class="form-control">
                                    </div>  
                                </div> 
                                &nbsp;
                                <hr>

                                <div align="center">
                                <a href="javascript:void(0)" id="approvebtn" class="btn btn-success" onclick="Approve();" >  <i class="icon-checkmark"></i> Setujui </a>
                                <a href="javascript:void(0)" id="rejectbtn" class="btn btn-danger" onclick="Reject();" > <i class="icon-close"></i>  Tolak </a>
                                </div>
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
             "ajax": "<?php echo base_url(); ?>setuju_pembelajaran/fetch_setuju_pembelajaran",
             "destroy":true
    });    
    function Approve() {  
        var formData = new FormData($('#formdata')[0]);  
        $.ajax({
             url: "<?php echo base_url(); ?>setuju_pembelajaran/approve",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false,
             success: function(result) {
                 var parse = JSON.parse(result); 
                 if(parse.response.status == 'NOK'){
                    sweetAlert("Gagal", "TIDAK DAPAT MENYIMPAN DATA!", "error"); //The error will display
                 }else{
                    $("#defaultModal").modal('hide');
                    $('#example').DataTable().ajax.reload();
                    Bersihkan_Form();
                    $('#formdata')[0].reset(); 
                    sweetAlert("Berhasil", "Data Berhasil Di Setujui!", "success"); 
                 }  
             }
        });
    }
    function Reject() {   
        var formData = new FormData($('#formdata')[0]);  
        $.ajax({
             url: "<?php echo base_url(); ?>setuju_pembelajaran/reject",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false,
             success: function(result) {
                 var parse = JSON.parse(result); 
                 if(parse.response.status == 'NOK'){
                    sweetAlert("Gagal", "TIDAK DAPAT MENYIMPAN DATA!", "error"); //The error will display
                 }else{
                    $("#defaultModal").modal('hide');
                    $('#example').DataTable().ajax.reload();
                    Bersihkan_Form();
                    $('#formdata')[0].reset(); 
                    sweetAlert("Berhasil", "Data Berhasil Di Reject!", "success"); 
                 }  
             }
        });
    } 
    function Approval(id) {
         $("#defaultModalLabel").html("Form Persetujuan");
         $("#defaultModal").modal('show');

         $.ajax({
             url: "<?php echo base_url(); ?>setuju_pembelajaran/get_data/" + id,
             type: "GET",
             dataType: "JSON",
             success: function(result) {    
                 $("#defaultModal").modal('show');
                 $("#id").val(result.id); 
                 $("#nama_pegawai").val(result.name_full);
                 $("#posisi").val(result.name_position);
                 $("#kelas").val(result.nm_kelas); 
             }
         });
     }

    function Bersihkan_Form() {
         $(':input').val('');
         $("#personnel_id").select2().select2('val','');
         $("#id_kelas").select2().select2('val','');
         $('#upload').attr('disabled',false);
         $('.myprogress').css('width', '0');
         $('.msg').text('');

    }
 
</script>
 
</div>
</div>
</html>	
