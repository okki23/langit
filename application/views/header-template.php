<!DOCTYPE html>
<html lang="en">
<head>
	

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title><?php echo $judul;?></title>
<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">-->

<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url('assets/css/londinium-theme.css');?>" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url('assets/css/icons.css');?>" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url('assets/css/fontsext.css');?>" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url('assets/css/w2ui-1.4.2.min.css');?>" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url('assets/css/styles.css');?>" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url('assets/css/alertify.bootstrap.min.css');?>" >
<link rel="stylesheet" href="<?php echo base_url('assets/css/alertify.min.css');?>" >

 
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/charts/sparkline.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/uniform.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/select2.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/inputmask.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/autosize.js');?>" ></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/inputlimit.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/listbox.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/multiselect.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/validate.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/tags.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/switch.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/uploader/plupload.full.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/uploader/plupload.queue.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/wysihtml5/wysihtml5.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/wysihtml5/toolbar.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/daterangepicker.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/fancybox.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/moment.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/jgrowl.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/datatables.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/colorpicker.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/fullcalendar.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/timepicker.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/application.js');?>" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/w2ui-1.4.2.min.js');?>" ></script>
<script src="<?php echo base_url('assets/plugins/alertify.min.js');?>" ></script> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>

<!--jqwidget-->
<!--awal bagian header-->

 
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" style="margin-top:-4px;" href="#"><img  src="<?php echo base_url();?>assets/images/logo_prsh.png" style="width:140px;height:60px;" title="HRIS" alt="HRIS"></a>
			<a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
				<span class="sr-only">Toggle navbar</span>
				<i class="icon-grid3"></i>
			</button>
			<button type="button" class="navbar-toggle offcanvas">
				<span class="sr-only">Toggle navigation</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
		</div>

		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
		<?php
		if($this->session->userdata('ses_lit_level_user')=='3')
		{
			
			?>
			
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-people"></i>
					<?php
					$sql        =   $this->db->query("SELECT 300 as jumlah")->row_array();
$total = $sql['jumlah'];
?>
					<span class="label label-default"><?php echo $total;?></span>
				</a>
				<div class="popup dropdown-menu dropdown-menu-right">
					<div class="popup-header">
						<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
						<span>Daftar Karyawan Inactive</span>
						<a href="#" class="pull-right"><i class="icon-paragraph-justify"></i></a>
					</div>
	                <ul class="activity">
		                <table class="table table-hover">
						<thead>
							<tr>
								<th>Kategori</th>
								<th class="text-center">Jumlah</th>
							</tr>
						</thead>
						<tbody>
				<?php
						$sqlfile = $this->db->query("SELECT '111' as assignment_type,'name' as nmjenis, '10' as jumlah");
		foreach($sqlfile->result() as $row){
                    //print_r $total =+ $row->jumlah;exit;
                  //$jumlah = $row['jumlah'];
                  //$name = $row['name'];
        ?>       		 
							<tr>
								<td> <a href="<?php echo base_url('mpp/view');?>/<?php echo $row->assignment_type ?>"><?php echo $row->nmjenis ?></a></td>
								<td class="text-center"><span class="label label-info"><?php echo $row->jumlah ?></span></td>
							</tr>
		<?php } ?>			
							<tr class="danger">
								<td> <a href="<?php echo base_url('mpp/view');?>/total">TOTAL</a></td>
								<td class="text-center"><span class="label label-danger"><?php echo $total ?></span></td>
							</tr>
						</tbody>
					</table>
	                </ul>
                </div>
			</li>		
		<?php }?>
			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<!--<img src="http://placehold.it/300">-->
					<span><?php echo $this->session->userdata('username');?></span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
					<li><a href="<?php echo base_url('passwd');?>"><i class="icon-key"></i> Change Password</a></li>
					<li><a href="<?php echo base_url('login/logout');?>"><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</div><br/><br/><br/><br/>
 

	<!--akhir bagian header-->
