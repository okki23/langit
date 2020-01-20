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
        <table class="table table-bordered table-striped table-hover js-basic-example" id="example">
            <thead>
                <tr>
                    <th style="width:5%;">No</th>
                    <th style="width:10%;">Nama Video</th>
                    <th style="width:10%;">Media</th> 
                    <th style="width:5%;">Opsi</th>
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
                            <form id="uploadImage" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="id" id="id"> 
                                <input type="hidden" name="author" id="author" value="<?php echo $this->session->userdata('username'); ?>"> 
                                <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Nama File:</label>
                                            <input type="text" name="nm_video" id="nm_video" class="form-control">
                                        </div> 
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                            <label>File:</label>
                                             <!--kalo di klik ngambil file detail -->
                                            <input type="file" name="pathfilex" id="pathfilex" onchange="PreviewFile(this);" />
                                            <span class="btn btn-warning"> File Extension Only MP4 / WEBM/ WMV / AVI / MKV </span>
                                            <!--nampilin filename -->
                                            <br>
                                            &nbsp; 
                                            <div class="exist"></div> 
                                            <br>
                                            &nbsp; 
                                            <input type="hidden" name="pathfile" id="pathfile"> 
                                            <button style="float:left; margin-left:0px;" class="btn btn-primary" type="button" name="upload" id="upload" > Upload </button>
                                            <br>
                                            &nbsp; 
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary myprogress" role="progressbar" style="width:0%">0%</div>
                                            </div>
                                            <br>
                                            &nbsp; 
                                            <div class="msg"></div>   
                                        </div> 
                                    </div> 
                                    
                                    <br>
                                    &nbsp;
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
             "ajax": "<?php echo base_url(); ?>upload_video/fetch_upload_video",
             "destroy":true
    }); 
    function PreviewFile(input) { 
        if (input.files && input.files[0]){
            var reader = new FileReader(); 
            reader.onload = function (e) {
                var tmp = $('#pathfilex').val().replace(/C:\\fakepath\\/i, ''); 
                $("#pathfile").val(tmp.replace(' ','_'));
            };
            reader.readAsDataURL(input.files[0]); 
        }
    } 
    $("#upload").on("click",function(){ 
	var file_data = $("#pathfilex").prop("files")[0];
	var form_data = new FormData();   
	form_data.append("file", file_data);
    //filter here...
    var ext = $('#pathfilex').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['mp4','mkv','wmv','avi','webm']) == -1) {
        alert('File yang diperbolehkan hanyalah MP4 / WEBM/ WMV / AVI / MKV saja !');
    }else{
        $('#upload').attr('disabled', 'disabled');
        $.ajax({
            url: "<?php echo base_url('upload_video/saveupload'); ?>",
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,   
            type: 'post', 
            xhr: function () {
                
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        $('.msg').html('Now Loading!');	
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        $('.myprogress').text(percentComplete + '%');
                        $('.myprogress').css('width', percentComplete + '%');
                        if(percentComplete == 100){
                            $('.msg').html('Upload Complete!');	
                        } 
                    }
                }, false); 
                return xhr; 
            },
            success:function(result){ 
                var parse = JSON.parse(result);   
                $('#upload').prop('disabled', false);	  
                $(':input').val(''); 
            } 
        }); 
    } 
	   
    });  

    function Simpan_Data() { 
         var formData = new FormData($('#uploadImage')[0]); 
         $.ajax({
             url: "<?php echo base_url(); ?>upload_video/simpan_data",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false,
             success: function(result) {
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload();
                 Bersihkan_Form();
                 $('#uploadImage')[0].reset(); 
             }
         });
    }

    $("#addmodal").on("click",function(){
            Bersihkan_Form();
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data"); 
            $(".exist").html('');
	}); 

    function Ubah_Data(id) {
         $("#defaultModalLabel").html("Form Ubah Data");
         $("#defaultModal").modal('show');

         $.ajax({
             url: "<?php echo base_url(); ?>upload_video/get_data_edit/" + id,
             type: "GET",
             dataType: "JSON",
             success: function(result) { 
                 $("#defaultModal").modal('show');
                 $("#id").val(result.id);
                 $("#nm_video").val(result.nm_video);
                 $("#pathfile").val(result.pathfile);   
                 //$("#suratx").html("<br> <hr> File Sebelumnya : <a href='upload/"+result.file+"' target='_blank' class='btn btn-primary'> <i class='material-icons'>file_copy</i> "+result.file+" </a> <br> <hr>");
                 $(".exist").html("File Exist : <a href='<?php echo base_url('upload'); ?>/"+result.pathfile+"' class='btn btn-primary' target='_blank'> "+result.pathfile+"  </a>");
             }
         });
     }

    function Bersihkan_Form() {
         $(':input').val('');
         $('#upload').attr('disabled',false);
         $('.myprogress').css('width', '0');
         $('.msg').text('');

    }

    function Hapus_Data(id) {
         if (confirm('Anda yakin ingin menghapus data ini?')) {
             // ajax delete data to database
             $.ajax({
                 url: "<?php echo base_url('upload_video/hapus_data') ?>/" + id,
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
