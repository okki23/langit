<?php $this->load->view('header-template');?>
<body> 
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
                    <h3>Data <?php echo set_title($location);?></h3>
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
                    <th style="width:10%;">Nama Kelas</th>
                    <th style="width:10%;">Nama Modul</th> 
                    <th style="width:5%;">Status</th> 
                    <th style="width:20%;">Opsi</th>
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
                                <input type="hidden" name="id" id="id"> 
                                <!-- <input type="text" name="author" id="author" value="<?php echo $this->session->userdata('username'); ?>">  -->
                                <div class="form-group">
                                <div class="col-sm-12">
                                <div class="row">
                                        <div class="col-sm-12">
                                            <label>Nama Kelas:</label>
                                            <select id="kelas_id" name="kelas_id" class="form-control select2-single"> 
                                            <option></option>
                                            <?php 
                                                foreach($listkelas as $keys=>$values){
                                                echo "<option value='".$values->id."'> ".$values->nm_kelas." </option>";
                                                }
                                            ?> 
                                            </select>
                                        </div> 
                                        <br>
                                        &nbsp;
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Nama Modul:</label>
                                            <input type="text" name="nm_modul" id="nm_modul" class="form-control">
                                        </div> 
                                    </div>
                                    <br> 
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <label>File Materi:</label>
                                        <input type="file" name="filemateri" id="filemateri" onchange="PreviewFile(this);" />
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
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Status:</label>
                                            <select id="status" name="status" class="form-control select2-single"> 
                                                <option></option>
                                                <option value="0"> Tidak Aktif </option>
                                                <option value="1"> Aktif </option>
                                            </select>
                                        </div> 
                                    </div>
                                    <br>
                                    &nbsp; 
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Materi:</label>
                                            <input type="text" name="materi" id="materi" class="form-control">
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


	<!-- detail materi -->
	<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Materi</h4>
                        </div>
                        <div class="modal-body">
                            <div align="center">
                            <div class="row">
                            <h3> Isi Materi </h3> 
                            <div class="col-md-12">
                                <div id="parsedata"></div>       
                            </div>                    
                            </div>                    
					   </div>
                       <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
						</div>
                     
                    </div>
                </div>
    </div>
     
 
</body>

<script type="text/javascript">
function elFinderBrowser(callback, value, meta) {
    tinymce.activeEditor.windowManager.open({
        file: '<?php echo base_url("file_manager/filetes"); ?>', // use an absolute path!
        title: 'Files Manager',
        width: 900,
        height: 450,
        resizable: 'yes'
    }, {
        oninsert: function (file, elf) {
            var url, reg, info; 
            // URL normalization
            url = file; 
            reg = "\/[^/]+?\/\.\.\/";
            while (url.match(reg)) {
                url = url.replace(reg, '/');
            }   
            var split_info = file.split("/"); 
            var filename = split_info[split_info.length - 1]; 
            var getsize = 0;
            get_filesize(file, function (size) {
                //alert("The size of " + filename + " is: " + size + " bytes.");
                getsize = size;
            }); 
            // Make file info
            info = filename + ' (' + elf.formatSize(getsize) + ')'; 
            // Provide file and text for the link dialog
            if (meta.filetype == 'file') {
                callback(url, {text: info, title: info});
            } 
            // Provide image and alt text for the image dialog
            if (meta.filetype == 'image') {
                callback(url, {alt: info});
            } 
            // Provide alternative source and posted for the media dialog
            if (meta.filetype == 'media') {
                callback(url);
            }
        }
    });
    return false;
}

// TinyMCE init
tinymce.init({
    selector: "#materi",

    force_p_newlines: false,
    setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
    height: 200,
        plugins: [
        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker"
    ],
    relative_urls: false,
    remove_script_host: false,

toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media',
    file_picker_callback: elFinderBrowser
}); 

function get_filesize(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open("HEAD", url, true); // Notice "HEAD" instead of "GET",
    //  to get only the header
    xhr.onreadystatechange = function () {
        if (this.readyState == this.DONE) {
            callback(parseInt(xhr.getResponseHeader("Content-Length")));
        }
    };
    xhr.send();
}
 </script>
<script type="text/javascript">	
    $('#example').DataTable({
             "ajax": "<?php echo base_url(); ?>materi_video/fetch_materi_video",
             "destroy":true
    }); 
    function PreviewFile(input) { 
        if (input.files && input.files[0]){
            var reader = new FileReader(); 
            reader.onload = function (e) {
                var tmp = $('#filemateri').val().replace(/C:\\fakepath\\/i, ''); 
                $("#pathfile").val(tmp.replace(' ','_'));
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
            url: "<?php echo base_url('materi_video/savefilemateri'); ?>",
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
        var id = $("#id").val();
        var kelas_id = $("#kelas_id").val();
        var nm_modul = $("#nm_modul").val();
        var status = $("#status").val(); 
        var pathfile = $("#pathfile").val(); 
        var materi = tinymce.get('materi').getContent(); 
         $.ajax({
             url: "<?php echo base_url(); ?>materi_video/simpan_data",
             type: "POST",
             data: {id:id,kelas_id:kelas_id,nm_modul:nm_modul,status:status,pathfile:pathfile,materi:materi}, 
             dataType:"json",
             success: function(result) {
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload();
                 Bersihkan_Form(); 
                 tinymce.activeEditor.setContent('');
                 $('#MateriVideo')[0].reset(); 
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
             url: "<?php echo base_url(); ?>materi_video/get_data_edit/" + id,
             type: "GET",
             dataType: "JSON",
             success: function(result) { 
                 $("#defaultModal").modal('show');
                 $("#id").val(result.id);
                 $("#nm_modul").val(result.nm_modul); 
                 tinymce.get("materi").setContent(result.materi); 
                 $("#kelas_id").select2().select2('val',result.kelas_id); 
                 $("#status").select2().select2('val',result.status); 
                 $(".exist").html("File Exist : <a href='<?php echo base_url('file_manager_dir'); ?>/"+result.pathfile+"' class='btn btn-primary' target='_blank'> "+result.pathfile+"  </a>");
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
                 url: "<?php echo base_url('materi_video/hapus_data') ?>/" + id,
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

     function Detail(id){ 
		$("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
		$.ajax({
			 url:"<?php echo base_url(); ?>materi_video/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){   
                 $("#parsedata").html(result.materi); 
			 }
		 });
	 } 
</script> 
</div>
</div>
</html>	
