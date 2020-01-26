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
                    <th style="width:5%; text-align:center;">No</th>
                    <th style="width:5%; text-align:center;">Personnel ID</th>
                    <th style="width:5%; text-align:center;">NIK</th> 
                    <th style="width:10%; text-align:center;">Nama Karyawan</th> 
                    <th style="width:10%; text-align:center;">Posisi</th> 
                    <th style="width:10%; text-align:center;">Kelas</th> 
                    <th style="width:10%; text-align:center;">Tanggal Daftar</th> 
                    <th style="width:10%; text-align:center;">Status</th> 
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
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Nama Karyawan:</label>
                                            <select id="personnel_id" name="personnel_id" class="form-control select2-single"> 
                                            <option></option>
                                            <?php 
                                                foreach($select_karyawan as $keys=>$values){
                                                echo "<option value='".$values->personnel_id."'> ".$values->name_full." </option>";
                                                }
                                            ?> 
                                            </select>
                                        </div> 
                                        <br>
                                        &nbsp;
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Nama Kelas Pembelajaran:</label>
                                            <select id="id_kelas" name="id_kelas" class="form-control select2-single"> 
                                            <option></option>
                                            <?php 
                                                foreach($select_kelas as $keys=>$values){
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
                                            <label>Tanggal Daftar:</label>
                                            <input type="text" name="tanggal_daftar" id="tanggal_daftar" class="datepicker form-control">
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
    var placeholder = "Pilih";
	$( ".select2-single, .select2-multiple" ).select2( {
    placeholder: placeholder,
    width: null,
    containerCssClass: ':all:'
    } );

    $(".datepicker").datepicker("option","dateFormat","yy-mm-dd");
    $('#example').DataTable({
             "ajax": "<?php echo base_url(); ?>daftar_pembelajaran/fetch_daftar_pembelajaran",
             "destroy":true
    });  
    function Simpan_Data() { 
         var formData = new FormData($('#formdata')[0]);  
         $.ajax({
             url: "<?php echo base_url(); ?>daftar_pembelajaran/simpan_data",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false,
             success: function(result) {
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload();
                 Bersihkan_Form();
                 $('#formdata')[0].reset(); 
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
             url: "<?php echo base_url(); ?>daftar_pembelajaran/get_data_edit/" + id,
             type: "GET",
             dataType: "JSON",
             success: function(result) { 
                 $("#defaultModal").modal('show');
                 $("#id").val(result.id); 
                 $("#tanggal_daftar").val(result.tanggal_daftar);
                 $("#personnel_id").select2().select2('val',result.personnel_id);
                 $("#id_kelas").select2().select2('val',result.id_kelas);
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

    function Hapus_Data(id) {
         if (confirm('Anda yakin ingin menghapus data ini?')) {
             // ajax delete data to database
             $.ajax({
                 url: "<?php echo base_url('daftar_pembelajaran/hapus_data') ?>/" + id,
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
