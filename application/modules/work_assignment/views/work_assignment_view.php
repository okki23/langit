<?php $this->load->view('header-template');?>
<body> 
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
                    <h3>Data <?php echo set_title($location);?></h3> 
                    <!-- Button trigger modal --> 
                    </div>        
			</div>
		<!-- /sidebar -->
        <table class="table table-bordered table-striped table-hover js-basic-example" style="text-align:center;" id="example">
            <thead>
                <tr>
                    <th style="width:1%;">No</th>
                    <th style="width:5%;">Nama Gugus</th>
                    <th style="width:5%;">Nama Sub Gugus</th>
                    <th style="width:5%;">Nama Kelas</th>
                    <th style="width:25%;">Work Assignment</th>
                    <th style="width:25%;">Realisasi</th> 
                </tr>
            </thead>
        </table>

 
    
	<!-- upload assignment -->
	<div class="modal fade" id="UploadAssign" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Upload Work Assignment</h4>
                        </div>
                        <div class="modal-body"> 
                            <div class="row">
                                        <div class="col-sm-12">
                                        <label>File Materi:</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="hidden" name="urltext" id="urltext">
                                        <input type="file" name="filemateri" id="filemateri"   />
                                        <span class="btn btn-warning"> File Extension Only PDF / DOC/ DOCX / XLS / XLSX / PPT / PPTX </span>
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
                       <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
						</div>
                     
                    </div>
                </div>
    </div>

    
    
	<!-- upload realisasi -->
	<div class="modal fade" id="UploadRealisasix" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Upload Realisasi</h4>
                        </div>
                        <div class="modal-body"> 
                               
					   </div> 
                       <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
						</div>
                     
                    </div>
                </div>
    </div>
     
 
</body>
<script type="text/javascript">	 

  
     $(document).ready(function(){
        $('#filemateri').change(function(e){
            var fileName = e.target.files[0].name;
            $("#pathfile").val(e.target.files[0].name); 
        }); 
    });
     
    $('#example').DataTable({
             "ajax": "<?php echo base_url(); ?>work_assignment/fetch_work_assignment",
             "destroy":true
    }); 
   
    $("#upload").on("click",function(){ 
	var file_data = $("#filemateri").prop("files")[0];
	var form_data = new FormData();  
    var idnya = $("#id").attr("value"); 
    var urltext = $("#urltext").attr("value"); 
	form_data.append("file", file_data);
    form_data.append("id", idnya);
    form_data.append("urltext", urltext);
    //filter here...
    var ext = $('#filemateri').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['pdf','doc','docx','xls','xlsx','ppt','pptx']) == -1) {
        alert('File yang diperbolehkan hanyalah PDF/DOC/DOCX/XLS/XLSX/PPT/PPTX saja !');
    }else{
        $('#upload').attr('disabled', 'disabled');
        $.ajax({
            url: "<?php echo base_url(); ?>"+urltext,
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
                            $('#example').DataTable().ajax.reload();
                        } 
                    }
                }, false); 
                return xhr; 
            },
            success:function(result){ 
                var parse = JSON.parse(result);   
                $('#example').DataTable().ajax.reload();
                $('#upload').prop('disabled', false);	  
                $(':input').val(''); 
            } 
        }); 
    } 
	   
    });  

    function Simpan_Data() { 
         var formData = new FormData($('#uploadImage')[0]); 
         $.ajax({
             url: "<?php echo base_url(); ?>work_assignment/simpan_data",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false,
             success: function(result) {
                 $("#FormAssignment").modal('hide');
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

    function UploadAssign(id) { 
        var isi = $("#realbtn").data("id"); 
         $("#urltext").val(isi);
         $("#UploadAssign").modal('show');  
         $("#id").val(id);
     }

    
    function UploadRealisasix(id) { 
        $("#UploadRealisasix").modal({backdrop: 'static', keyboard: false,show:true});
     }

    function Ubah_Data(id) {
         $("#defaultModalLabel").html("Form Ubah Data");
         $("#defaultModal").modal('show');

         $.ajax({
             url: "<?php echo base_url(); ?>work_assignment/get_data_edit/" + id,
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
                 url: "<?php echo base_url('work_assignment/hapus_data') ?>/" + id,
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
