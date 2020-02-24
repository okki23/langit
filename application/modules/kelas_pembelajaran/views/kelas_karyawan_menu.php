<?php $this->load->view('header-template');?>
     <!-- /striped datatable inside panel -->


<!--awal bagian konten -->

	<div class="page-container">
 
		<?php
		if($this->session->userdata('ses_lit_level_user')=='1')
		{
	  	   // $this->load->view('sidebar-karyawan_kelas',$location);
	  	   $this->load->view('sidebar-karyawan_kelas',$id_kelas);	
		}
		else 
		{
			$this->load->view('sidebar-template',$location);
		}
		?> 
	 	<div class="page-content"> 
			<div class="page-header">
				<div class="page-title">
					<h3>Selamat Datang <small>Welcome <b><?php echo $this->session->userdata('username'); ?></b> on Human Resource Information System</small> </h3>
				</div>

			</div> 
			 <p>Silahkan gunakan menu di sebelah kiri untuk mengakses modul materi di kelas <b><?php echo $kelas; ?></b> </p>
			 
			 <br> 

			  
	
 </div>
 
 <script type="text/javascript"> 

	function Pelajari(id){ 
		$("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
		$.ajax({
			 url:"<?php echo base_url(); ?>kelas_pembelajaran/viewmateri/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){   
                 $("#parsedata").html(result.materi);
				 $(".iddatmodul").val(result.iddatmodul);
				 if(result.status == 1){
					 $("#finishbelajar").prop("disabled",true);
				 }else{
					$("#finishbelajar").prop("disabled",false);
				 }
				 $(".filepath").html("Unduh Materi : <a href='<?php echo base_url('file_manager_dir'); ?>/"+result.pathfile+"' class='btn btn-primary' target='_blank'> "+result.pathfile+"  </a>");
			 }
		 });
	 } 

	 function FinishBelajar(){
		var datkelas = $("#iddatmodul").val(); 
		if(confirm('Anda yakin ingin menghapus data ini?'))
        { 
			$.ajax({
				url : "<?php echo base_url('kelas_pembelajaran/finish_belajar')?>",
				type: "POST",
				data: {datkelas:datkelas}, 
				dataType:"json",
				success: function(data)
				{
				
				$('#example').DataTable().ajax.reload(); 
				location.reload(); 
				
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			}); 
   		}
    }
	 
 	var id_dat = <?php echo $this->uri->segment(3);?> 
    $('#example').DataTable({
        "processing" : true,
        "ajax" : {
            "url" : "<?php echo base_url('kelas_pembelajaran/listing_modul_kelas/'); ?>",
            "type":"GET" ,  
            "data":{"id_dat":id_dat},
        },  
        "columns" : [{
            "data" : "no"
        },{
            "data" : "nm_modul"
        },{
            "data" : "action"
        }],

        "rowReorder": {
            "update": false
        },

        "destroy":true,
    });
</script>
</body>
</html>
