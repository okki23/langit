<?php $this->load->view('header-template');?>
     <!-- /striped datatable inside panel -->


<!--awal bagian konten -->

	<div class="page-container">
 
		<?php
		if($this->session->userdata('ses_lit_level_user')=='1')
		{
	  	   $this->load->view('sidebar-template_karyawan',$location);	
		}
		else if($this->session->userdata('ses_lit_level_user')=='2')
		{
	  	   $this->load->view('sidebar-template-unit',$location);	
		}
		else 
		{$this->load->view('sidebar-template',$location);}
		?>
	 


 
	 	<div class="page-content">

 
			<div class="page-header">
				<!--div class="page-title">
					<h3>Dashboard <small>Welcome <b><?php echo $this->session->userdata('username'); ?></b> on Human Resource Information System</small></h3>
				</div-->

			</div>
			<?php //$this->load->view('breadcrumb');?>
			<div class="panel-heading" width="100%" style="padding:3px;text-align:center;">
						<img src="<?php echo base_url('assets/images/re_asdp.jpg')?> ">	
						</div>
			
			<!-- Page statistics -->
	    	<ul class="page-stats list-justified">
	    		<li class="bg-info">
	    			<div class="page-stats-showcase">
	    				<span>Posisi Tersedia</span>
	    				<h2><?php echo number_format($countpostersedia,0);?></a></h2>
	    			</div>
	    			
	    		</li>
	    		<li class="bg-info">
	    			<div class="page-stats-showcase">
	    				<span>Posisi Lowong</span>
	    				<h2><?php echo number_format($countposlowong,0);?></a></h2>
	    			</div>
	    			
	    		</li>
	    		<li class="bg-info">
	    			<div class="page-stats-showcase">
	    				<span>Total Karyawan</span>
	    				<h2><?php echo number_format($countemp,0);?></a></h2>
	    			</div>
	    			
	    		</li>
	    		<!--<li class="bg-info">
	    			<div class="page-stats-showcase">
	    				<span>Karyawan Pusat</span>
	    				<h2><?php echo number_format($countpst,0);?></a></h2>
	    			</div>
	    			
	    		</li>
	    		<li class="bg-info">
	    			<div class="page-stats-showcase">
	    				<span>Karyawan Cabang</span>
	    				<h2><?php echo number_format($countcab,0);?></a></h2>
	    			</div>
	    			
	    		</li>
	    		<li class="bg-info">
					
	    			<div class="page-stats-showcase">
	    				<span>Jumlah Cabang</span>
	    				<h2><?php echo number_format($countjmlcab,0);?></a></h2>
	    			</div>
	    			
	    		</li>-->
	    		<li class="bg-info">
	    			<div class="page-stats-showcase">
	    				<span>Total Kapal</span>
	    				<h2><?php echo $countkapal;?></a></h2>
	    			</div>
	    			
	    		</li>
	    	</ul>
		
		

			
<?php $this->load->view('footer-template');?>
 
 		 
 </div>
</body>
</html>
