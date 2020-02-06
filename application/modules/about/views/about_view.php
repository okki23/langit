 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                About
                            </h2>
                            <br>
                       
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
									<thead>
										<tr>
											<th style="width:5%;">No</th>
                                            <th style="width:25%;">Deskripsi</th>   
											<th style="width:5%;">Opsi</th> 
										</tr>
									</thead> 
								</table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>

   
	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                
                                    <input type="hidden" name="id" id="id"> 
									<div class="form-group">
                                        <div class="form-line">
                                               <textarea id="deskripsi" name="deskripsi"> 
                                            </textarea>
                                        </div>
                                    </div>
									 
                                  <br>
								  

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>
	
	<!-- detail data customer -->
	<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail about</h4>
                        </div>
                        <div class="modal-body">
						
						<table class="table table-responsive">
							<tr>
								<td style="font-weight:bold;"> Blok Tower</td>
								<td> : </td>
								<td> <p id="blok_tower_dtl"> </p> </td>
								
								<td style="font-weight:bold;"> Tipe</td>
								<td> : </td>
								<td> <p id="tipe_dtl"> </p> </td> 
							</tr>
							<tr>
								<td style="font-weight:bold;"> Lantai</td>
								<td> : </td>
								<td> <p id="lantai_dtl"> </p> </td>
								
								<td style="font-weight:bold;"> Luas</td>
								<td> : </td>
								<td> <p id="luas_dtl"> </p> </td> 
							</tr>
							<tr>
								 
								<td style="font-weight:bold;"> Harga </td>
								<td> : </td>
								<td> <p id="harga_dtl"> </p> </td> 
							</tr>
							 
							<tr>
								<td style="font-weight:bold;"> Foto about  </td> 
								<td colspan="4">  : </td> 
							</tr> 
							<tr>
								<td colspan="6" align="center">  
								<img src="" class="img responsive" id="foto_about_dtl">
								</td>
							</tr>
						 
							 <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
							 </div>
						</table>
                           
					   </div>
                     
                    </div>
                </div>
    </div>

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
    selector: "#deskripsi",

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
	 
       
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>about/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 tinymce.get("deskripsi").setContent(result.deskripsi);
             
                  
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
        $("#image1").attr('src','<?php echo base_url('upload/image_prev.jpg'); ?>');
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('about/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
			   
               $('#example').DataTable().ajax.reload(); 
			   
			    $.notify("Data berhasil dihapus!", {
					animate: {
						enter: 'animated fadeInRight',
						exit: 'animated fadeOutRight'
					}  
				 },{
					type: 'success'
					});
				 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
	}
    
 
    $('.thumbnail').on('click',function(){
        $('.modal-body').empty();
        var title = $(this).parent('a').attr("title");
        $('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#Prev').modal({show:true});
    });
  
	function Simpan_Data(){
 
	    var id = $("#id").val();
        var deskripsi = tinymce.get('deskripsi').getContent();

            $.ajax({
             url:"<?php echo base_url(); ?>about/simpan_data",
             type:"POST",
             data:{id:id,deskripsi:deskripsi},
             dataType:"json",
             
             success:function(result){ 
                
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 tinymce.activeEditor.setContent('');
                 $('#user_form')[0].reset();
                 
                 $.notify("Data berhasil disimpan!", {
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    } 
                 });
             }
            }); 
 

	}
     

	 $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
     });

	 
       $(document).ready(function() {
		   
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});
		
		$("#addmodalx").on("click",function(){
			$("#defaultModalx").modal({backdrop: 'static', keyboard: false,show:true});
            $("#defaultModalLabel").html("Form Tambah Datax");
		});
		
		$('#example').DataTable( {
			"ajax": "<?php echo base_url(); ?>about/fetch_about" 
		});
	 
	 
		 
	  });
  
		
		 
    </script>