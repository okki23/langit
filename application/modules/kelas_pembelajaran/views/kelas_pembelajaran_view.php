<?php $this->load->view('header-template');?>
<body> 
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">                
                    <h3>Data <?php echo set_title($location);?></h3>
                    <?php
                    if($this->session->userdata('username') == 'admin'){
                    ?>  
                        <a href="javascript:void(0);" id="addmodal" class="btn btn-primary">   Tambah Data </a>
                    <?php
                    }else{
                    ?>
                         
                    <?php
                    }
                    ?>
                    <br>
                            
                    <br>
                    &nbsp;
				</div>
			</div>
		<!-- /sidebar -->
        <?php 
         if($this->session->userdata('username') == 'admin'){
        ?>
        <table class="table table-bordered table-striped table-hover js-basic-example" id="example">
            <thead>
                <tr>
                    <th style="width:2%; text-align:center;">No</th>
                    <th style="width:5%; text-align:center;">Nama Gugus</th>
                    <th style="width:5%; text-align:center;">Nama Sub Gugus</th>
                    <th style="width:5%; text-align:center;">Nama Kelas</th>
                    <th style="width:5%; text-align:center;">Tanggal Dibuka</th> 
                    <th style="width:10%; text-align:center;">Is Active</th>  
                    <th style="width:10%; text-align:center;">File Assignment</th>  
                    <th style="width:20%; text-align:center;">Opsi</th>
                </tr>
            </thead>
        </table> 
        <?php 
        }else{
        ?>
        <table class="table table-bordered table-striped table-hover js-basic-example" id="example">
            <thead>
                <tr>
                    <th style="width:2%; text-align:center;">No</th>
                    <th style="width:5%; text-align:center;">Nama Gugus</th>
                    <th style="width:5%; text-align:center;">Nama Sub Gugus</th>
                    <th style="width:5%; text-align:center;">Nama Kelas</th> 
                    <th style="width:5%; text-align:center;">Opsi</th>
                </tr>
            </thead>
        </table> 
        <?php  
        }
        ?>
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
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Nama Kelas:</label>
                                            <input type="text" name="nm_kelas" id="nm_kelas" class="form-control">
                                        </div> 
                                    </div>   
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Tanggal Dibuka:</label>
                                            <input type="text" name="tgl_dibuka" id="tgl_dibuka" class="datepicker form-control">
                                        </div> 
                                    </div>   
                                    <div class="row">
                                    
                                    <div class="col-sm-12">
                                        <label>Is Active:</label> 
                                        <select id="isactive" name="isactive" class="form-control select2-single select2-offscreen" title="" tabindex="-1"> 
                                            <option></option>
                                            <option value="0"> Tidak Aktif </option>
                                            <option value="1"> Aktif </option>
                                        </select>
                                    </div>
                                    <br>
                                    &nbsp;
                                    <div class="col-sm-12">
                                        <label> Gugus:</label> 
                                        <select id="id_gugus" name="id_gugus" class="form-control select2-single select2-offscreen" title="" tabindex="-1"> 
                                            <option></option>
                                            <?php 
                                            foreach($select_gugus as $k=>$v){
                                                echo '<option value='.$v->id.'>'.$v->nm_gugus.'</option>';
                                            }
                                            ?> 
                                        </select>
                                    </div>
                                    <br>
                                    &nbsp;
                                    <div class="col-sm-12">
                                        <label> Sub Gugus:</label> 
                                        <select id="id_sub_gugus" name="id_sub_gugus" class="form-control select2-single select2-offscreen" title="" tabindex="-1"> 
                                            <option></option>
                                            <?php 
                                            foreach($select_subgugus as $ky=>$ve){
                                                echo '<option value='.$ve->id.'>'.$ve->nm_sub_gugus.'</option>';
                                            }
                                            ?> 
                                        </select>
                                    </div>
                                    <br>
                                    &nbsp; 
                                        <div class="col-sm-12">
                                        <label>File Assignment:</label>
                                        <input type="file" name="filemateri" id="filemateri" onchange="PreviewFile(this);" />
                                        <span class="btn btn-warning"> File Extension Only PDF / DOC/ DOCX / XLS / XLSX / PPT / PPTX </span>
                                        <br>
                                            &nbsp; 
                                            <div class="exist"></div> 
                                            <br>
                                            &nbsp; 
                                            <input type="hidden" name="file_assignment" id="file_assignment"> 
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

    <!-- form view -->
	<div class="modal fade" id="ViewMateri" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">View Materi</h4>
                           
                        </div>
                        <div class="modal-body"> 
                            <div class="row">
                            <div class="col-lg-12">
                            <table class="table table-bordered table-striped table-hover js-basic-examplex" id="examplex">
                                <thead>
                                    <tr>
                                        <th style="width:1%; text-align:center;">No</th>
                                        <th style="width:10%; text-align:center;">Nama Modul</th>  
                                    </tr>
                                </thead>
                            </table>   
                        </div>
                        </div>
                       </div>
                       <div class="modal-footer">
						<input type="hidden" name="iddatmodul" id="iddatmodul" class="iddatmodul">

								<button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
							</div>

                    </div>
                </div>
    </div>
 
</body> 
<script type="text/javascript">
    $("#usernamelist").val('asu');
    var placeholder = "Pilih";
	$( ".select2-single, .select2-multiple" ).select2( {
    placeholder: placeholder,
    width: null,
    containerCssClass: ':all:'
    } );

    $(".datepicker").datepicker("option","dateFormat","yy-mm-dd");
    $('#example').DataTable({
             "ajax": "<?php echo base_url(); ?>kelas_pembelajaran/fetch_kelas_pembelajaran",
             "destroy":true
    });  

    function PreviewFile(input) { 
        if (input.files && input.files[0]){
            var reader = new FileReader(); 
            reader.onload = function (e) {
                var tmp = $('#filemateri').val().replace(/C:\\fakepath\\/i, ''); 
                $("#file_assignment").val(tmp.replace(' ','_'));
            };
            reader.readAsDataURL(input.files[0]); 
        }
    } 

    $("#upload").on("click",function(){ 
	var file_data = $("#filemateri").prop("files")[0];
	var form_data = new FormData();   
	form_data.append("file", file_data); 
    var ext = $('#filemateri').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['pdf','doc','docx','xls','xlsx','ppt','pptx']) == -1) {
        alert('File yang diperbolehkan hanyalah PDF / DOC/ DOCX / XLS / XLSX / PPT / PPTX  saja !');
    }else{
        $('#upload').attr('disabled', 'disabled');
        $.ajax({
            url: "<?php echo base_url('kelas_pembelajaran/saveupload'); ?>",
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
            } 
        }); 
    }  
    });  

    function Simpan_Data() { 
         var formData = new FormData($('#formdata')[0]);  
         $.ajax({
             url: "<?php echo base_url(); ?>kelas_pembelajaran/simpan_data",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false,
             success: function(result) {
                 var parse = JSON.parse(result); 
                 if(parse.response.status == 'NOK'){
                    sweetAlert("Gagal", "TIDAK DAPAT MENYIMPAN DATA YANG SAMA!", "error"); //The error will display
                 }else{
                    $("#defaultModal").modal('hide');
                    $('#example').DataTable().ajax.reload();
                    Bersihkan_Form();
                    $('#formdata')[0].reset(); 
                    sweetAlert("Berhasil", "Data Berhasil Disimpan!", "success"); 
                 }  
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
             url: "<?php echo base_url(); ?>kelas_pembelajaran/get_data_edit/" + id,
             type: "GET",
             dataType: "JSON",
             success: function(result) { 
                 $("#defaultModal").modal('show');
                 $("#id").val(result.id); 
                 $("#tgl_dibuka").val(result.tgl_dibuka);
                 $("#nm_kelas").val(result.nm_kelas);
                 $("#file_assignment").val(result.file_assignment); 
                 if(result.file_assignment == null){
                    $(".exist").html('File Exist : -');
                 }else{
                    $(".exist").html("File Exist : <a href='<?php echo base_url('file_manager_dir'); ?>/"+result.file_assignment+"' class='btn btn-primary' target='_blank'> "+result.file_assignment+"  </a>");
                 }
                 
                  
                 $("#isactive").select2().select2('val',result.isactive); 
                 $("#id_gugus").select2().select2('val',result.id_gugus); 
                 $("#id_sub_gugus").select2().select2('val',result.id_sub_gugus); 

             }
         });
     }



     function ViewMateri(id) {    
        $("#ViewMateri").modal('show');
            $('#examplex').DataTable({
                "processing" : true,
                "ajax" : {
                    "url" : "<?php echo base_url('kelas_pembelajaran/get_materi/'); ?>",
                    "type":"GET" ,  
                    "data":{"id_kelas":id},
                },  
                "columns" : [{
                    "data" : "no"
                },{
                    "data" : "nm_modul"
                }],

                "rowReorder": {
                    "update": false
                },

                "destroy":true,
            });
     
     }

    function Bersihkan_Form() {
         $(':input').val(''); 
         $("#isactive").select2().select2('val','');  
    }

    function Hapus_Data(id) { 
        sweetAlert({
        title: "Anda yakin ingin menghapus item ini?",
        text: "ini akan menghapus item dari daftar anda !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax(
                    { 
                      url: "<?php echo base_url('kelas_pembelajaran/hapus_data') ?>/" + id, 
                      type: "GET",
                      dataType: "JSON",
                      success: function(data){
                      }
                    }
                ).done(function(data) {
                    sweetAlert("Item Dihapus!", "Item berhasil dihapus", "success");
                    $('#example').DataTable().ajax.reload();  
                    }); 
            }else{
                sweetAlert("Batal", "Data Tidak Dihapus!", "info");
          }
        });  
 
     }  
</script>
 
</div>
</div>
</html>	
