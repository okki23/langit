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
                    <th style="width:10%;">Materi</th> 
                    <th style="width:5%;">Status</th> 
                    <th style="width:10%;">Opsi</th>
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
            url: "<?php echo base_url('materi_video/saveupload'); ?>",
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
         var formData = new FormData($('#MateriVideo')[0]); 
         $.ajax({
             url: "<?php echo base_url(); ?>materi_video/simpan_data",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false,
             success: function(result) {
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload();
                 Bersihkan_Form();
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



</script>
 
</div>
</div>
</html>	
