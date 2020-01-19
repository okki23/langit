<?php $this->load->view('header-template');?><body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template');?>
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
                  $personnel_id = $row->personnel_id;
		  $this->load->library('lit_app_lib');
		  $nama=$this->lit_app_lib->getNama($personnel_id);

                  $auth = $row->lit_authority;
                  $dt11 = $row->dt11;
                  $dt12 = $row->dt12;
                  $dt13 = $row->dt13;
                  $dt14 = $row->dt14;
                  $dt15 = $row->dt15;
				  $dt16 = $row->dt16;
                  $dt21 = $row->dt21;
                  $dt22 = $row->dt22;
                  $dt23 = $row->dt23;

                  $dt31 = $row->dt31;

                  $dt41 = $row->dt41;
                  $dt42 = $row->dt42;
                  $dt43 = $row->dt43;

                  $ad51 = $row->ad51;
                  $ad52 = $row->ad52;
                  $ad53 = $row->ad53;
                  $ad54 = $row->ad54;
                  $ad55 = $row->ad55;
                  $ad56 = $row->ad56;
                  $ad57 = $row->ad57;
                  $ad58 = $row->ad58;
                  $ad59 = $row->ad59;
                  $ad510 = $row->ad510;
                  $ad511 = $row->ad511;
                  $ad512 = $row->ad512;
                  $ad513 = $row->ad513;
                  $ad514 = $row->ad514;
                  $ad515 = $row->ad515;
                  $ad516 = $row->ad516;
                  $ad517 = $row->ad517;
                  $ad518 = $row->ad518;

                  $ad61 = $row->ad61;
                  $ad62 = $row->ad62;
                  $ad63 = $row->ad63;
                  $ad64 = $row->ad64;
                  $ad65 = $row->ad65;
                  $ad66 = $row->ad66;
                  $ad71 = $row->ad71;
              }
              ?>
        <form class="form-horizontal" role="form" name="form_input" method="post" action="<?php echo base_url('user/pro_update_user')?>">
 
<table class="table table-striped " >	
  <tr>
    <td width="150" align="left">Instance</td>
    <td width="10" align="left">:</td>
    <td style="padding:2px;"><input type="text" name="instance" value="<?php echo $instance;?>" class="form-control">
    </td>
    </tr>
    <tr>
    <td width="150" align="left">Status</td>
    <td width="10" align="left">:</td>
     <td style="padding:2px;"><input type="text" name="status_process" value="<?php echo $status_process;?>" class="form-control">
     </td>
     </tr>
 <tr>
    <td width="150" align="left">Username</td>
    <td width="10" align="left">:</td>
    <td style="padding:2px;">
  <input type="text" placeholder="Username" name="user_id" class="form-control" value="<?php echo $user_id;?>">
  </td>
  </tr>
  <tr>
    <td width="150" align="left">Password</td>
    <td width="10" align="left">:</td>
    <td style="padding:2px;">
	       <input type="password" placeholder="Password" name="lit_auth_password" class="form-control"><i>*Masukkan Password Jika ingin Merubah Password</i>
	</td>
  </tr>
   <tr >
    <td width="150" align="left">Nama Pegawai</td>
    <td width="10">:</td>
  <td><input type="hidden" name="personnel_id" id="pad1" style="width: 88%" placeholder="ID Pegawai" value="<?php echo $personnel_id;?>">
  <input type="text" name="personnel_nm" id="padnm1" style="width: 88%" placeholder="ID Pegawai" value="<?php echo $nama;?>"> 
	  
	  <!--input type="text" name="personnel_id" id="pad1" style="width: 88%" placeholder="ID Pegawai" value="<?php echo $personnel_id;?>"-->
  <a id="choice1" class="btn btn-xs btnpad" style="padding:5px;background-color:blue;color:white;">Search</a>
  <!--a id="choice1" class="btn btnpad">Search</a-->
  </td>
  </tr>
<tr>
      <td>Kode Unit</td>
      <td width="10">:</td>
       <td style="padding:2px;"><select name="lit_code_core_orm" class="select-full" data-placeholder="Kode Unit" data required>
       <option value=""></option>
                              <?php 
                                foreach($opt_orm->result() as $row){
                                    if($row->kode == $lit_code_core_orm){
                                      echo "<option value=".$row->kode." selected=selected> ".$row->kode." - ".$row->nama_unit."</option>";
                                    }else{
                                     echo "<option value=".$row->kode."> ".$row->kode." - ".$row->nama_unit."</option>";
                                    }
 
                                }
                              ?>
      </select></td>
    </tr>
     <tr>
    <td>User Level</td>
    <td>:</td>
    <td style="padding:2px;">
	<select name="lit_level_user" class="form-control">
             <option value="3" <?php if($lit_level_user == '3'){ echo "selected=selected"; }?> >Super Admin</option>
                <option value="2"  <?php if($lit_level_user == '2'){ echo "selected=selected"; }?>>Admin</option>
                 <option value="1" <?php if($lit_level_user == '1'){ echo "selected=selected"; }?> >Pegawai</option>
		</select>
	</td>
  </tr>
  </table>
  
   

 <!-- Page tabs -->
              <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#master" data-toggle="tab"><i class="icon-icon"></i> Master</a></li>                    <li><a href="#masterkpi" data-toggle="tab"><i class="icon-stats"></i> Master KPI</a></li>
                    <li><a href="#organisasi" data-toggle="tab"><i class="icon-tree2"></i> Manajemen Organisasi</a></li>
                    <li><a href="#kapal" data-toggle="tab"><i class="icon-boat"></i> Manajemen Kapal</a></li>
                    <li><a href="#personil" data-toggle="tab"><i class="icon-man"></i> Administrasi Personil</a></li>
                    <li><a href="#kpi" data-toggle="tab"><i class="icon-quill2"></i> KPI</a></li>
                    <li><a href="#report" data-toggle="tab"><i class="icon-file"></i> Report</a></li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane active fade in" id="master">
                      <table id=data class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>1. MASTER </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                    <TD>1.1. Jabatan</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=1 <?php if($dt11 == '1'){ echo "checked=checked"; }?> size=20></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=0 <?php if($dt11 == '0'){ echo "checked=checked"; }?> size=20></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=2 <?php if($dt11 == '2'){ echo "checked=checked"; }?> size=20></TD>
                  </TR>
                  <TR >
                    <TD>1.2. Posisi</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt12 value=1 <?php if($dt12 == '1'){ echo "checked=checked"; }?> size=20></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt12 value=0 <?php if($dt12 == '0'){ echo "checked=checked"; }?> size=20></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt12 value=2 <?php if($dt12 == '2'){ echo "checked=checked"; }?>size=20></TD>
                  </TR>
                 <TR >
                <TD>1.3. Lintasan</TD>
                <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt13 value=1 <?php if($dt13 == '1'){ echo "checked=checked"; }?> size=20></TD>
                <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt13 value=0 <?php if($dt13 == '0'){ echo "checked=checked"; }?> size=20></TD>
                <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt13 value=2 <?php if($dt13 == '2'){ echo "checked=checked"; }?> size=20></TD>
              </TR>
              <TR >
                <TD>1.4. Pelabuhan</TD>
                <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt14 value=1 <?php if($dt14 == '1'){ echo "checked=checked"; }?> size=20></TD>
                <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt14 value=0 <?php if($dt14 == '0'){ echo "checked=checked"; }?> size=20></TD>
                <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt14 value=2  <?php if($dt14 == '2'){ echo "checked=checked"; }?>size=20></TD>
              </TR>
              
              <TR >
                <TD>1.5. Manajemen User</TD>
                <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt15 value=1 <?php if($dt15 == '1'){ echo "checked=checked"; }?> size=20></TD>
                <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt15 value=0 <?php if($dt15 == '0'){ echo "checked=checked"; }?> size=20></TD>
                <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt15 value=2 <?php if($dt15 == '2'){ echo "checked=checked"; }?> size=20></TD>
              </TR>
				<TR >
                            <TD>1.6. Setting Aplikasi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt16 value=1 <?php if($dt16 == '1'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt16 value=0 <?php if($dt16 == '0'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt16 value=2 <?php if($dt16 == '2'){ echo "checked=checked"; }?> size=20></TD>
                          </TR>
                        </table>            
                    </div>

                    <div class="tab-pane active fade" id="masterkpi">
                      <table id=data class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>2. MASTER </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>

                          <TR >
                            <TD>2.1. Area</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt21 value=1 <?php if($dt21 == '1'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt21 value=0 <?php if($dt21 == '0'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt21 value=2 <?php if($dt21 == '2'){ echo "checked=checked"; }?> size=20></TD>
                          </TR>
                          <TR >
                            <TD>2.2. Objective</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt22 value=1 <?php if($dt22 == '1'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt22 value=0 <?php if($dt22 == '0'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt22 value=2 <?php if($dt22 == '2'){ echo "checked=checked"; }?> size=20></TD>
                          </TR>
                          <TR >
                            <TD>2.3. KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt23 value=1 <?php if($dt23 == '1'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt23 value=0 <?php if($dt23 == '0'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt23 value=2 <?php if($dt23 == '2'){ echo "checked=checked"; }?> size=20></TD>
                          </TR>
                            </table>            
                    </div>


                            <div class="tab-pane fade" id="organisasi">
            <table id=data class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>3. MANAJEMEN ORGANISASI  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                            <TD>3.1. Manajemen Organisasi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt31 value=1 <?php if($dt31 == '1'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt31 value=0 <?php if($dt31 == '0'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt31 value=2 <?php if($dt31 == '2'){ echo "checked=checked"; }?> size=20></TD>
                          </TR>

                        </table>            
                    </div>


                            <div class="tab-pane fade" id="kapal">
            <table id=data class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>4. MANAJEMEN KAPAL  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                           <TR >
                            <TD>4.1. Data Kapal</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt41 value=1 <?php if($dt41 == '1'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt41 value=0 <?php if($dt41 == '0'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt41 value=2 <?php if($dt41 == '2'){ echo "checked=checked"; }?> size=20></TD>
                          </TR>
                           <TR >
                            <TD>4.2. Operasi Kapal</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt42 value=1 <?php if($dt42 == '1'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt42 value=0 <?php if($dt42 == '0'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt42 value=2 <?php if($dt42 == '2'){ echo "checked=checked"; }?> size=20></TD>
                          </TR>
                          <TR >
                            <TD>4.3. Pindah Operasi Kapal</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt43 value=1 <?php if($dt43 == '1'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt43 value=0 <?php if($dt43 == '0'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt43 value=2 <?php if($dt43 == '2'){ echo "checked=checked"; }?> size=20></TD>
                          </TR>

                        </table>            
                    </div>



            <div class="tab-pane fade" id="personil">
            <table id=adk class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>5. ADMINISTRASI PERSONIL  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                    <TD>5.1. Data Pribadi</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad51 value=1 size=20 <?php if($ad51 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad51 value=0 size=20 <?php if($ad51 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad51 value=2 size=20 <?php if($ad51 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR >
                  <TD>5.2. Alamat</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad52 value=1 size=20 <?php if($ad52 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad52 value=0 size=20 <?php if($ad52 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad52 value=2 size=20 <?php if($ad52 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>

                  <TR>                   
                  <TD>5.3. Keluarga </TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad53 value=1 size=20 <?php if($ad53 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad53 value=0 size=20 <?php if($ad53 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad53 value=2 size=20 <?php if($ad53 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
      
                  <TR>
                    <TD>5.4. Pendidikan </TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad54 value=1 size=20 <?php if($ad54 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad54 value=0 size=20 <?php if($ad54 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad54 value=2 size=20 <?php if($ad54 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>

                  <TR>                    
                  <TD>5.5. Identifikasi Pribadi</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad55 value=1 size=20 <?php if($ad55 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad55 value=0 size=20 <?php if($ad55 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad55 value=2 size=20 <?php if($ad55 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.6. Kemampuan Bahasa</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad56 value=1 size=20 <?php if($ad56 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad56 value=0 size=20 <?php if($ad56 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad56 value=2 size=20 <?php if($ad56 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.7. Jabatan</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad57 value=1 size=20 <?php if($ad57 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad57 value=0 size=20 <?php if($ad57 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad57 value=2 size=20 <?php if($ad57 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.8. Penugasan</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad58 value=1 size=20 <?php if($ad58 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad58 value=0 size=20 <?php if($ad58 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad58 value=2 size=20 <?php if($ad58 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>                    
                  <TD>5.9. Riwayat Pekerjaan </TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad59 value=1 size=20 <?php if($ad59 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad59 value=0 size=20 <?php if($ad59 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad59 value=2 size=20 <?php if($ad59 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.10. Penghargaan</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad510 value=1 size=20 <?php if($ad510 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad510 value=0 size=20 <?php if($ad510 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad510 value=2 size=20 <?php if($ad510 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.11. Hukuman</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad511 value=1 size=20 <?php if($ad511 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad511 value=0 size=20 <?php if($ad511 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad511 value=2 size=20 <?php if($ad511 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>

                  <TR>                   
                  <TD>5.12. Komunikasi</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad512 value=1 size=20 <?php if($ad512 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad512 value=0 size=20 <?php if($ad512 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad512 value=2 size=20 <?php if($ad512 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.13. Pelatihan</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad513 value=1 size=20 <?php if($ad513 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad513 value=0 size=20 <?php if($ad513 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad513 value=2 size=20 <?php if($ad513 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.14. Fasilitas</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad514 value=1 size=20 <?php if($ad514 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad514 value=0 size=20 <?php if($ad514 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad514 value=2 size=20 <?php if($ad514 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.15. Endorsment</TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad515 value=1 size=20 <?php if($ad515 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad515 value=0 size=20 <?php if($ad515 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad515 value=2 size=20 <?php if($ad515 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.16. Medical Check Up </TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad516 value=1 size=20 <?php if($ad516 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad516 value=0 size=20 <?php if($ad516 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad516 value=2 size=20 <?php if($ad516 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.17. Buku Pelaut </TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad517 value=1 size=20 <?php if($ad517 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad517 value=0 size=20 <?php if($ad517 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad517 value=2 size=20 <?php if($ad517 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>
                  <TR>
                  <TD>5.18. Dokumen Pribadi </TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad518 value=1 size=20 <?php if($ad518 == '1'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad518 value=0 size=20 <?php if($ad518 == '0'){ echo "checked=checked"; }?>></TD>
                    <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad518 value=2 size=20 <?php if($ad51 == '2'){ echo "checked=checked"; }?>></TD>
                  </TR>

                  </table>
            </div>
             <div class="tab-pane fade" id="kpi">
            <table id=adk class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>5. KPI  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                            <TD>6.1. Setting Target KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad61 value=1 size=20 <?php if($ad61 == '1'){ echo "checked=checked"; }?>></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad61 value=0 size=20 <?php if($ad61 == '0'){ echo "checked=checked"; }?>></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad61 value=2 size=20 <?php if($ad61 == '2'){ echo "checked=checked"; }?>></TD>
                          </TR>
                          <TR >
                            <TD>6.2. Input Realisasi KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad62 value=1 size=20 <?php if($ad62 == '1'){ echo "checked=checked"; }?>></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad62 value=0 size=20 <?php if($ad62 == '0'){ echo "checked=checked"; }?>></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad62 value=2 size=20 <?php if($ad62 == '2'){ echo "checked=checked"; }?>></TD>
                          </TR>
                          <TR>
                            <TD>6.3. Monitoring KPI </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad63 value=1 size=20 <?php if($ad63 == '1'){ echo "checked=checked"; }?>></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad63 value=0 size=20 <?php if($ad63 == '0'){ echo "checked=checked"; }?>></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad63 value=2 size=20 <?php if($ad63 == '2'){ echo "checked=checked"; }?>></TD>
                          </TR>
              
                          <TR>
                            <TD>6.4. Coaching and Counselling </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad64 value=1 size=20 <?php if($ad64 == '1'){ echo "checked=checked"; }?>></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad64 value=0 size=20 <?php if($ad64 == '0'){ echo "checked=checked"; }?>></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad64 value=2 size=20 <?php if($ad64 == '2'){ echo "checked=checked"; }?>></TD>
                          </TR>
                          <TR>
                            <TD>6.6. Nilai KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad66 value=1 size=20 <?php if($ad66 == '1'){ echo "checked=checked"; }?>></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad66 value=0 size=20 <?php if($ad66 == '0'){ echo "checked=checked"; }?>></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad66 value=2 size=20 <?php if($ad66 == '2'){ echo "checked=checked"; }?>></TD>
                          </TR>
                             </table>
                    </div>

                        <div class="tab-pane fade" id="report">
            <table id=adk class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>7. Report  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                           <TR>
                            <TD>7.1. Nominatif</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad71 value=1 <?php if($ad71 == '1'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad71 value=0 <?php if($ad71 == '0'){ echo "checked=checked"; }?> size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad71 value=2 <?php if($ad71 == '2'){ echo "checked=checked"; }?> size=20></TD>
                          </TR>
                          </table>
                          </div>


        </div>
    </div>
  <!-- /page tabs -->


<br />




                                 <div class="form-actions text-left">
              <button type="submit" class="btn btn-primary">Update</button>   
                      <button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-primary">Cancel</button>
          </div>

  </div>
</body>
<div id="divChoices">
	<div class="window">
	<a class="close-button" title="Close">X</a>
    <h3>Pilih Karyawan</h3>
	<br>
	<div id="grids" style="width: 600px; height: 300px;"></div>
	</div>
</div>

  </tbody></table>
  </div>
</div>
</TD>
</tr></tbody></table>


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

	

<script language='JavaScript'>
$( document ).ready(function() {
    //console.log( "ready!" );
//document.getElementById('pad1')='0001';
//document.forms["form_input"]["pad1"].value='0001';
$('.btnpad').on('click', function(){	
    $('#divChoices').show()
    thefield = $(this).prev()
    $('.btnselect').on('click', function(){
        theselected = $(this).prev()
        thefield.val( theselected.val() )
        $('#divChoices').hide()
    })
	$('.close-button').on('click', function(){
        $('#divChoices').hide()
    })
})
});
$(function () {    
    $('#grids').w2grid({ 
        name: 'grids', 
		recid: 'personnel_id',
        show: { 
            toolbar: true,
            footer: true,
           // toolbarAdd: true,
           // toolbarDelete: true,
           // toolbarSave: true,
           // toolbarEdit: true,
			//selectColumn: true
        },
		
        searches: [                
            { field: 'personnel_id', caption: 'Last Name', type: 'text' },
            { field: 'name_full', caption: 'First Name', type: 'text' },            
        ],
        columns: [                
            { field: 'personnel_id', caption: 'ID', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'name_full', caption: 'Nama Pegawai', size: '250px', sortable: true, attr: 'align=left' },
            { field: 'start_date', caption: 'Tanggal Masuk', size: '100px', sortable: true },
            { field: 'opsi', caption: 'Option', size: '100px'}
            
        ],
        onAdd: function (event) {
                   },
        onEdit: function (event) {
            w2alert('edit');
        },
        onDelete: function (event) {
            console.log('delete has default behaviour');
        },
        onClick: function(event){
            var record = this.get(event.recid);
            document.forms["form_input"]["pad1"].value=record.recid;
            document.forms["form_input"]["padnm1"].value=record.name_full;
            $('#divChoices').hide();
            
            //w2alert(record.recid);
	        //window.location='<?php echo base_url();?>alamat/alamat_detail_update/'.concat(record.recid);	      
 
        },
        onSubmit: function (event) {
            w2alert('save');
        }
    });    
	 w2ui['grids'].load('<?php echo base_url('user/get_all_pegawai_json_cek');?>');
	 //w2ui['grid'].select(10000004);
	 
});
</script>
<style>
#divChoices {
width: 100%;
height: 100%;
position: fixed;
background: rgba(0,0,0,.7);
top: 0;
left: 0;
z-index: 9999;
    display: none;
}
.window {
width: 50%;
height: auto;
background: #fff;
border-radius: 10px;
position: relative;
padding: 10px;
box-shadow: 0 0 5px rgba(0,0,0,.4);
text-align: center;
margin: 10% auto;
}
.close-button {
width: 20px;
height: 20px;
background: #000;
border-radius: 50%;
border: 3px solid #fff;
display: block;
text-align: center;
color: #fff;
text-decoration: none;
position: absolute;
top: -10px;
right: -10px;
}
</style>
