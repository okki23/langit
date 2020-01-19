<?php $this->load->view('header-template');?><body>
<!-- Page container -->
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
				<div class="page-title">
					<h3>Edit Data user<small>Informasi Manajemen User</small></h3>
				</div>
			</div>
		<!-- /sidebar -->
	
		<?php
              foreach($data_employee->result() as $row){
                  $user_id = $row->user_id;
                  $lit_auth_password = $row->lit_auth_password;
                  $instance = $row->instance;
                  $status_process = $row->status_process;
                  $lit_level_user = $row->lit_level_user;
                  $lit_code_core_orm = $row->lit_code_core_orm;
                  $auth = $row->lit_authority;
                  $dt11 = $row->dt11;
                  $dt12 = $row->dt12;
                  $dt13 = $row->dt13;

                  $dt21 = $row->dt21;

                  $dt31 = $row->dt31;
                  $dt32 = $row->dt32;

                  $ad41 = $row->ad41;
                  $ad42 = $row->ad42;
                  $ad43 = $row->ad43;
                  $ad44 = $row->ad44;
                  $ad45 = $row->ad45;
                  $ad46 = $row->ad46;
                  $ad47 = $row->ad47;
                  $ad48 = $row->ad48;
                  $ad49 = $row->ad49;
                  $ad410 = $row->ad410;
                  $ad411 = $row->ad411;
                  $ad412 = $row->ad412;
                  $ad413 = $row->ad413;
                  $ad414 = $row->ad414;
                  $ad415 = $row->ad415;
                  $ad416 = $row->ad416;
                  $ad417 = $row->ad417;
                  $ad418 = $row->ad418;
                  
                  $ad51 = $row->ad51;
                  $ad52 = $row->ad52;
                  $ad53 = $row->ad53;
                  $ad54 = $row->ad54;
                  $ad55 = $row->ad55;
              }
              ?>
        <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('passwd/pro_update_user')?>">
 
<table class="table table-striped " >	
  <tr>
    <td width="150" align="left">Instance</td>
    <td width="10" align="left">:</td>
    <td style="padding:2px;"><input type="text" name="instance" value="<?php echo $instance;?>" readonly="true" class="form-control">
    </td>
    </tr>
    <tr>
    <td width="150" align="left">Status</td>
    <td width="10" align="left">:</td>
     <td style="padding:2px;"><input type="text" name="status_process" value="<?php echo $status_process;?>" readonly="true" class="form-control">
     </td>
     </tr>
 <tr>
    <td width="150" align="left">Username</td>
    <td width="10" align="left">:</td>
    <td style="padding:2px;">
  <input type="text" placeholder="Username" name="user_id" class="form-control" value="<?php echo $user_id;?>" readonly="true">
  </td>
  </tr>
  <tr>
    <td width="150" align="left">Password</td>
    <td width="10" align="left">:</td>
    <td style="padding:2px;">
	       <input type="password" placeholder="Password" name="lit_auth_password" required class="form-control"><i>*Masukkan Password Jika ingin Merubah Password</i>
         <br><font color="red">*Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka</font>
	</td>
  </tr>
 
  </table>
  
   

 


<br />




                                 <div class="form-actions text-left">
              <button type="submit" class="btn btn-primary">Update</button>   
                      <button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-primary">Cancel</button>
          </div>

  </div>
</body>


<style type="text/css">
    #fm{
      margin:0;
      padding:10px 30px;
    }
    .ftitle{
      font-size:12px;
      font-weight:bold;
      padding:5px 0;
      margin-bottom:10px;
      border-bottom:1px solid #ccc;
    }
    .fitem{
      margin-bottom:5px;
    }
    .fitem label{
      display:inline-block;
      width:80px;
    }
    .fitem input{
      width:160px;
    }
  </style>
  <script type="text/javascript">
       $.fn.datebox.defaults.formatter = function(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    return (d<10?('0'+d):d)+'-'+(m<10?('0'+m):m)+'-'+y;
  };
  $.fn.datebox.defaults.parser = function(s){
    if (!s) return new Date();
    var ss = s.split('-');
    var d = parseInt(ss[0],10);
    var m = parseInt(ss[1],10);
    var y = parseInt(ss[2],10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
      return new Date(y,m-1,d);
    } else {
      return new Date();
    }
  };
    </script>
</html>
