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
                  $modulnya= $row->nm_modul;
                  $kelasnya= $row->nm_kelas;
                
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
                        <table class="table table-striped table-bordered table-hover" style="width:100%; ">
                    
                           
                            
                            
                             
                             <tr>
                               
                                <td><textarea id="summernote" name="contents" ><?php echo $materinya;?></textarea></td>
                            </tr>

                          
                        </table>
                        <br>
                </div>
                 <button type="submit" class="btn btn-primary">Lanjut</button>
                </form>
                <script type="text/javascript" src="<?php echo base_url().'assets/summernote/summernote-bs4.js';?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#summernote').summernote({toolbar:"false",disableResizeEditor: true});
             $('#summernote').summernote('disable');
                     

           
        });
        
    </script>
</body>
 
</div>
</div>
</html>	
