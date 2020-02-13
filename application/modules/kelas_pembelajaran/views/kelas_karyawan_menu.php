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
		{$this->load->view('sidebar-template',$location);}
		?>
	 


 
	 	<div class="page-content">

 
			<div class="page-header">
				<div class="page-title">
					<h3>Selamat Datang <small>Welcome <b><?php echo $this->session->userdata('username'); ?></b> on Human Resource Information System</small> </h3>
				</div>

			</div>


			<div class="panel-heading" width="100%" style="padding:3px;text-align:center;">
			<img src="<?php echo base_url('assets/images/kelas.png')?> ">	
			</div>
			

			

<?php $this->load->view('footer-template');?>
 
 		 
 </div>
 

</body>
</html>
