<?php $this->load->view('header-template');?>
<script type="text/javascript" src="<?php echo base_url('assets/js/highcharts.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/exporting.js');?>"></script>

     <!-- /striped datatable inside panel -->


<!--awal bagian konten -->

	<div class="page-container">
 
		<?php
		if($this->session->userdata('ses_lit_level_user')=='1')
		{
	  	   $this->load->view('sidebar-template_karyawan',$location);	
		}
		else 
		{$this->load->view('sidebar-template',$location);}
		?>
	 


	 	<div class="page-content">

 
			<div class="page-header">
				<!--div class="page-title">
					<h3>Dashboard <small>Welcome <b><?php echo $this->session->userdata('username'); ?></b> on Human Resource Information System</small> </h3>
				</div-->

			</div>
			<?php //$this->load->view('breadcrumb');?>
			<div class="panel-heading" width="100%" style="padding:3px;text-align:center;">
						<img src="<?php echo base_url('assets/images/kelas.png')?> ">	
						</div>


			<!-- Page statistics -->
	    	
		

			
<?php $this->load->view('footer-template');?>
 
 		 
 </div>
 
</body>
</html>
