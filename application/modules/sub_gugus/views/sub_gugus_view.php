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
                        <th style="width:10%; text-align:center;">Nama Gugus</th> 
                        <th style="width:10%; text-align:center;">Nama Sub Gugus</th> 
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
                            <form id="formdata" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="id" id="id"> 
                                <div class="form-group">
                                    <div class="col-sm-12"> 
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Nama Sub Gugus:</label>
                                                <input type="text" name="nm_sub_gugus" id="nm_sub_gugus" class="form-control">
                                            </div> 
                                        </div>   
                                        <div class="row">
                                        <div class="col-sm-12">
                                            <label>Nama Kelas Pembelajaran:</label>
                                            <select id="id_gugus" name="id_gugus" class="form-control select2-single"> 
                                            <option></option>
                                            <?php
                                                foreach($select_gugus as $key=>$val){
                                                    echo '<option value="'.$val->id.'">'.$val->nm_gugus.'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div> 
                                        <br>
                                        &nbsp;
                                    </div> 
                                    </div> 
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
   
    var groupColumn = 0;
    var table = $('#example').DataTable({
        "ajax": "<?php echo base_url(); ?>sub_gugus/fetch_sub_gugus",
        "destroy":true,
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5" style="font-weight:700; color:white; background-color:grey;">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );
    function Simpan_Data() {  
        var nm_sub_gugus = $("#nm_sub_gugus").val();
        var id_gugus = $("#id_gugus").val();
        var id = $("#id").val();
         $.ajax({
             url: "<?php echo base_url(); ?>sub_gugus/simpan_data",
             type: "POST",
             data: {id:id,nm_sub_gugus:nm_sub_gugus,id_gugus:id_gugus},
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
             url: "<?php echo base_url(); ?>sub_gugus/get_data_edit/" + id,
             type: "GET",
             dataType: "JSON",
             success: function(result) { 
                 $("#defaultModal").modal('show');
                 $("#id").val(result.id);
                 $("#nm_sub_gugus").val(result.nm_sub_gugus); 
                 $("#id_gugus").select2().select2('val',result.id_gugus); 
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
                 url: "<?php echo base_url('sub_gugus/hapus_data') ?>/" + id,
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
