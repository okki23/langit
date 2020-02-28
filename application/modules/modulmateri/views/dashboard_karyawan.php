<?php $this->load->view('header-template');?>

<script type="text/javascript">	
           function delete_id(id)
                {
                if(confirm('Anda yakin ingin menghapus data ini ?'))
                {
                    window.location.href='<?php echo base_url();?>evaluasi_belajar/evaluasi_belajar_delete/'+id;
                    
                }
                }
        </script>
      
<head>
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/summernote/summernote-bs4.css';?>">
</head>  
<body>

     <!-- /striped datatable inside panel -->


<!--awal bagian konten -->

	<div class="page-container">
 
		<?php
        foreach($data_xyz->result() as $row){ 
                  $materinya = $row->materinya;
                  $modulnya= $row->modulnya;
                  $kelasnya= $row->nm_kelas;
                  $file = $row->pathfile;
                
              }
		if($this->session->userdata('ses_lit_level_user')=='1')
		{
	  	   $this->load->view('sidebar-karyawan_kelas',$location);	
		}
		else 
		{$this->load->view('sidebar-template',$location);}
		?>
	 


 
	 	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Kelas <?php echo $kelasnya;?>  </h3>
                    <a href="<?php echo base_url('materi_video'); ?>" class="btn btn-primary"><i class="icon-arrow-left3"></i> Back to Home </a>
                    <br>
                    &nbsp;
				</div>
			</div>
		<!-- /sidebar -->
        <form action="<?php echo site_url('modulmateri/save');?>" method="post">
        <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" required>
        <div class="panel panel-info">
        <div class="panel-heading"><h6 class="panel-title"><h3 align="center"> Modul <?php echo $modulnya;?> </h3></h6></div>
            <div class="panel-body">
                <div class="col-sm-12">
                    <br>    
                    <a href="<?php echo base_url('file_manager_dir/'.$file); ?>" target="_blank" class="btn btn-primary"> <i class="icon-book2"></i> Download Materi </a>
                        <table class="table table-striped table-bordered table-hover" style="width:100%; ">
                     
                             <tr>
                               
                                <td style="padding:10px 20px 10px 20px;"> 
                                <?php echo $materinya; ?>
                                </td>
                            </tr> 
                                    
                        </table>
                        <br>
                 </div>   
                  
                 <div align="center">
                    <input type="hidden" name="datkelas" value="<?php echo $this->uri->segment(4); ?>">
                    <input type="hidden" name="idnow" value="<?php echo $idnow; ?>">
                    <input type="hidden" name="idprev"  value="<?php echo $idprev; ?>">
                    <input type="hidden" name="idnext"  value="<?php echo $idnext; ?>">
                    <input type="hidden" name="statnow" value="<?php echo $id; ?>">
                    <input type="hidden" name="idstart" value="<?php echo $idstart; ?>">
                    <input type="hidden" name="idlast" value="<?php echo $idlast; ?>">
                        <?php
                        if($idnow == $idstart){
                        ?>
                            <button type="button" disabled="disabled" class="btn btn-primary"> <i class="icon-arrow-left"></i> Kembali </button>
                        <?php
                        }else{
                        ?>
                             <button type="button" onclick="Back(<?php echo $idprev; ?>,<?php echo $this->uri->segment(4); ?>);" class="btn btn-primary"> <i class="icon-arrow-left"></i> Kembali </button>
                        <?php
                        }
                        ?> 

                        
                        <?php
                        if($idlast == $idnow){
                        ?>
                            <!-- <button type="submit" disabled="disabled" class="btn btn-primary"> Selanjutnya  <i class="icon-arrow-right"></i>  </button> -->
                            <button type="button" class="btn btn-primary" onclick="Finish(<?php echo $id; ?>,<?php echo $this->uri->segment(4); ?>);"> <i class="icon-minus-circle2"></i> Finish  </button>
                        <?php
                        }else{
                        ?>
                             
                             
                             <button type="submit" class="btn btn-primary"> Selanjutnya <i class="icon-arrow-right"></i>  </button>
                        <?php
                        }
                        ?> 
                 </div>
                 </form> 
    <script type="text/javascript">
        
        function Back(id,datkelas){
            window.location='<?php echo base_url('modulmateri/tampil/');?>/'+id+'/'+datkelas;
        }
        
        function Finish(id){
            $.ajax({
                url:"<?php echo base_url('modulmateri/finish'); ?>",
                type:"POST",
                data:{id:id},
                success:function(res){
                    alert("Selamat, Anda telah selesai mengikuti pelajaran!");   
                    window.location='<?php echo base_url('materi_video');?>';
                }
            });
            
        }
    </script>
</body>
 
</div>
</div>
</html>	
