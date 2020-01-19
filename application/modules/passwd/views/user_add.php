<?php $this->load->view('header-template');?><body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template');?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Add Data user<small>Informasi Manajemen User</small></h3>
				</div>
			</div>
		<!-- /sidebar -->
<form class="form-horizontal" role="form" action="<?php echo base_url('user/pro_add_user');?>" method="POST">

 
			<table class="table table-striped " >	
      <tr>
    <td width="150" align="left">Instance</td>
    <td width="10" align="left">:</td>
    <td><input type="text" name="instance" class="form-control" value="1000D">
    </td>
    </tr>
    <tr>
    <td width="150" align="left">Status</td>
    <td width="10" align="left">:</td>
     <td><input type="text" name="status_process" class="form-control" value="1" >
     </td>
     </tr>
  <tr>
    <td width="150" align="left">Username</td>
    <td width="10">:</td>
    <td>
	<input type="text" placeholder="Username" name="user_id" class="form-control" required >
	</td>
  </tr>
  <tr>
    <td width="150" align="left">Password</td>
    <td width="10">:</td>
    <td>
	<input type="password" placeholder="Password" name="lit_auth_password" class="form-control" required>
	</td>
  </tr>
<tr>
            <td>Kode Unit</td>
            <td width="10">:</td>
            <td><select name="lit_code_core_orm" class="select-full" data-placeholder="Kode Unit" required>
            <option value=""></option>
                                    <?php 
                                      foreach($opt_orm->result() as $roworm){
                                          echo "<option value=".$roworm->code.">".$roworm->code." - ".$roworm->name."</option>";
                                          }
                                      ?> 
            </select></td>
          </tr>


  <tr>
    <td>User Level</td>
    <td width="10">:</td>
    <td>
	<select name="lit_level_user" class="form-control" required>
						<option value=''>--Pilih--</option>
						<option value='3'>Super Admin</option>
						<option value='2'>Admin</option>
            <option value='1'>Pegawai</option>
		</select>
	 </td>
  </tr>                        
</table>
						
						          

 <!-- Page tabs -->
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#master" data-toggle="tab"><i class="icon-icon"></i> Master</a></li>
                    <li><a href="#organisasi" data-toggle="tab"><i class="icon-tree2"></i> Manajemen Organisasi</a></li>
                    <li><a href="#kapal" data-toggle="tab"><i class="icon-boat"></i> Manajemen Kapal</a></li>
                    <li><a href="#personil" data-toggle="tab"><i class="icon-man"></i> Administrasi Personil</a></li>
                    <li><a href="#kpi" data-toggle="tab"><i class="icon-quill2"></i> KPI</a></li>

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
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>1.2. Posisi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt12 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt12 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt12 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>1.3. Manajemen User</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt13 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt13 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt13 value=2 size=20></TD>
                          </TR>

                        </table>            
                    </div>


                            <div class="tab-pane fade" id="organisasi">
            <table id=data class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>2. MANAJEMEN ORGANISASI  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                            <TD>2.1. Manajemen Organisasi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt21 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt21 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt21 value=2 size=20></TD>
                          </TR>

                        </table>            
                    </div>


                            <div class="tab-pane fade" id="kapal">
            <table id=data class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>3. MANAJEMEN KAPAL  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                           <TR >
                            <TD>3.1. Data Kapal</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt31 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt31 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt31 value=2 size=20></TD>
                          </TR>
                           <TR >
                            <TD>3.2. Pindah Operasi Kapal</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt32 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt32 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt32 value=2 size=20></TD>
                          </TR>

                        </table>            
                    </div>



                    <div class="tab-pane fade" id="personil">
            <table id=adk class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>4. ADMINISTRASI PERSONIL  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                            <TD>4.1. Data Pribadi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad41 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad41 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad41 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>4.2. Alamat</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad42 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad42 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad42 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.3. Keluarga </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad43 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad43 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad43 value=2 size=20></TD>
                          </TR>
              
                          <TR>
                            <TD>4.4. Pendidikan </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad44 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad44 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad44 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.5. Identifikasi Pribadi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad45 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad45 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad45 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.6. Kemampuan Bahasa</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad46 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad46 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad46 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.7. Jabatan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad47 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad47 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad47 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.8. Penugasan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad48 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad48 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad48 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.9. Riwayat Pekerjaan </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad49 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad49 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad49 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.10. Penghargaan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad410 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad410 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad410 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.11. Hukuman</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad411 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad411 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad411 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.12. Komunikasi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad412 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad412 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad412 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.13. Pelatihan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad413 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad413 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad413 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.14. Fasiltas</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad414 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad414 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad414 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.15. Endorsment</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad415 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad415 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad415 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.16. Medical Check Up </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad416 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad416 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad416 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.17. Buku Pelaut </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad417 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad417 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad417 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>4.18. Dokumen Pribadi </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad418 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad418 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad418 value=2 size=20></TD>
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
                            <TD>5.1. Setting Target KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad51 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad51 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad51 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>5.2. Input Realisasi KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad52 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad52 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad52 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.3. Monitoring KPI </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad53 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad53 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad53 value=2 size=20></TD>
                          </TR>
              
                          <TR>
                            <TD>5.4. Coaching and Counselling </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad54 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad54 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad54 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.5. Nilai KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad55 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad55 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad55 value=2 size=20></TD>
                          </TR>
                             </table>
                    </div>

                </div>
            </div>
          <!-- /page tabs -->




<br />




                                 <div class="form-actions text-left">
							<button type="submit" class="btn btn-primary">Save</button>   
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