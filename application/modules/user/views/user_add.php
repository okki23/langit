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

<form class="form-horizontal" name="form_input" role="form" action="<?php echo base_url('user/pro_add_user');?>" method="POST">
<input type="hidden" name="instance" class="form-control" value="1000D">
 <input type="hidden" name="status_process" class="form-control" value="1" >
			<table class="table table-striped " >	
    <!--  <tr>
    <td width="150" align="left">Instance</td>
    <td width="10" align="left">:</td>
    <td>
    </td>
    </tr>
    <tr>
    <td width="150" align="left">Status</td>
    <td width="10" align="left">:</td>
     <td>
     </td>
     </tr>-->
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
	<input type="password" placeholder="Password" name="lit_auth_password" class="form-control" required><font color="red">*Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka</font>
	</td>
  </tr>

  <tr >
    <td width="150" align="left">Nama Karyawan</td>
    <td width="10">:</td>
  <td> <input type="hidden" name="personnel_id" id="pad1" style="width: 88%" placeholder="ID Pegawai">
  <input type="text" name="personnel_nm" id="padnm1" style="width: 88%" placeholder="ID Pegawai">
  <a id="choice1" class="btn btn-xs btnpad" style="padding:5px;background-color:blue;color:white;">Search</a>
  </td>
  </tr>

<tr>
            <td>Kode Unit</td>
            <td width="10">:</td>
            <td><select name="lit_code_core_orm" class="select-full" data-placeholder="Kode Unit" required>
            <option value=""></option>
                                    <?php 
                                      foreach($opt_orm->result() as $roworm){
                                          echo "<option value=".$roworm->kode.">".$roworm->kode." - ".$roworm->nama_unit."</option>";
                                          }
                                      ?> 
            </select></td>
          </tr>


  <tr>
    <td>User Level</td>
    <td width="10">:</td>
    <td>
	<select name="lit_level_user" class="form-control" id="level_user" name="id_level_user" onchange="showleveluser();" required>
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
                    <li class="active"><a href="#master" data-toggle="tab"><i class="icon-icon"></i> Master Employee</a></li>
                    <li><a href="#masterkpi" data-toggle="tab"><i class="icon-stats"></i> Master KPI</a></li>
                    <li><a href="#organisasi" data-toggle="tab"><i class="icon-tree2"></i> Manajemen Organisasi</a></li>
                    <li><a href="#kapal" data-toggle="tab"><i class="icon-boat"></i> Manajemen Kapal</a></li>
                    <li><a href="#personil" data-toggle="tab"><i class="icon-man"></i> Administrasi Personil</a></li>
                    <li><a href="#kpi" data-toggle="tab"><i class="icon-quill2"></i> KPI</a></li>
                    <li><a href="#report" data-toggle="tab"><i class="icon-file"></i> Report</a></li>
                    <li><a href="#cuti" data-toggle="tab"><i class="icon-file"></i> Modul Cuti</a></li>

                </ul>
                <div class="tab-content">

                    <div class="tab-pane active fade in" id="master">
                      <table id=data class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>1. MASTER EMPLOYEE</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                            <TD>1.1. Jabatan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>1.2. Posisi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt12 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt12 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt12 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>1.3. Lintasan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt13 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt13 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt13 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>1.4. Pelabuhan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt14 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt14 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt14 value=2 size=20></TD>
                          </TR>
                          
                          <TR >
                            <TD>1.5. Manajemen User</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt15 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt15 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt15 value=2 size=20></TD>
                          </TR>
						  <TR >
                            <TD>1.6. Setting Aplikasi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt16 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt16 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt16 value=2 size=20></TD>
                          </TR>
                        </table>            
                    </div>

                    <div class="tab-pane active fade" id="masterkpi">
                      <table id=data class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>2. MASTER KPI</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>

                          <TR >
                            <TD>2.1. Area</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt21 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt21 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt21 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>2.2. Perspektif</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt22 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt22 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt22 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>2.3. KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt23 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt23 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt23 value=2 size=20></TD>
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
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt31 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt31 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt31 value=2 size=20></TD>
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
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt41 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt41 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt41 value=2 size=20></TD>
                          </TR>
                           <TR >
                            <TD>4.2. Operasi Kapal</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt42 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt42 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt42 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>4.3. Pindah Operasi Kapal</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt43 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt43 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt43 value=2 size=20></TD>
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
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad51 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad51 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad51 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>5.2. Alamat</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad52 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad52 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad52 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.3. Keluarga </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad53 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad53 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad53 value=2 size=20></TD>
                          </TR>
              
                          <TR>
                            <TD>5.4. Pendidikan </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad54 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad54 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad54 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.5. Identifikasi Pribadi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad55 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad55 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad55 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.6. Kemampuan Bahasa</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad56 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad56 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad56 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.7. Jabatan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad57 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad57 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad57 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.8. Penugasan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad58 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad58 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad58 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.9. Riwayat Pekerjaan </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad59 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad59 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad59 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.10. Penghargaan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad510 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad510 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad510 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.11. Hukuman</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad511 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad511 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad511 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.12. Komunikasi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad512 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad512 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad512 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.13. Pelatihan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad513 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad513 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad513 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.14. Fasilitas</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad514 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad514 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad514 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.15. Endorsment</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad515 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad515 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad515 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.16. Medical Check Up </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad516 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad516 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad516 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.17. Buku Pelaut </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad517 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad517 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad517 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>5.18. Dokumen Pribadi </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad518 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad518 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad518 value=2 size=20></TD>
                          </TR>

                          </table>
                    </div>

                    <div class="tab-pane fade" id="kpi">
            <table id=adk class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>6. KPI  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                            <TD>6.1. Setting Target KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad61 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad61 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad61 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>6.2. Input Realisasi KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad62 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad62 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad62 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>6.3. Monitoring KPI </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad63 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad63 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad63 value=2 size=20></TD>
                          </TR>
              
                          <TR>
                            <TD>6.4. Coaching and Counselling </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad64 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad64 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad64 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>6.5. Nilai KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad65 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad65 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad65 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>6.6. Rekap Nilai KPI</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad66 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad66 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad66 value=2 size=20></TD>
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
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad71 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad71 value=0 size=20 checked></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad71 value=2 size=20></TD>
                          </TR>
                          </table>
                          </div>


                          <div class="tab-pane fade" id="cuti">
            <table id=adk class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>8. Modul Cuti  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                            <TD>8.1. Jadwal Cuti Awak Kapal</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad81 id="iad81_1" value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad81 id="iad81_0" value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad81 id="iad81_2" value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>8.2. Permohonan Cuti</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad82 id="iad82_1" value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad82 id="iad82_0" value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad82 id="iad82_2" value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>8.3. Persetujuan Surat Cuti </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad83 id="iad83_1" value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad83 id="iad83_0" value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad83 id="iad83_2" value=2 size=20></TD>
                          </TR>
              
                          <TR>
                            <TD>8.4. Monitoring Tanggal Jatuh Tempo Cuti </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad84 id="iad84_1" value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad84 id="iad84_0" value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad84 id="iad84_2" value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>8.5. Laporan Realisasi Cuti</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad85 id="iad85_1" value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad85 id="iad85_0" value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad85 id="iad85_2" value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>8.6. Laporan Rekapitulasi Cuti</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad86 id="iad86_1" value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad86 id="iad86_0" value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad86 id="iad86_2" value=2 size=20></TD>
                          </TR>
                             </table>
                    </div>


                </div>
            </div>
          <!-- /page tabs -->
 
                                 <div class="form-actions text-left">
							<button type="submit" class="btn btn-primary">Save</button>   
                      <button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-primary">Cancel</button>
          </div>

  </div>
</body>
</html>
<div id="divChoices">
	<div class="window">
	<a class="close-button" title="Close">X</a>
    <h3>Pilih Karyawan</h3>
	<br>
	<div id="grids" style="width: 550px; height: 300px;"></div>
	</div>
</div>

  </tbody></table>
  </div>
</div>
</TD>
</tr></tbody></table>


	

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
function showleveluser(){
test = document.getElementById('level_user').value;
if (test == "2" || test == "3")
{
    document.getElementById("iad81_1").checked = true;
    document.getElementById("iad81_0").checked = false;
    document.getElementById("iad81_2").checked = false;
    document.getElementById("iad82_1").checked = true;
    document.getElementById("iad82_0").checked = false;
    document.getElementById("iad82_2").checked = false;
    document.getElementById("iad83_1").checked = true;
    document.getElementById("iad83_0").checked = false;
    document.getElementById("iad83_2").checked = false;
	document.getElementById("iad84_1").checked = true;
    document.getElementById("iad84_0").checked = false;
    document.getElementById("iad84_2").checked = false;
	document.getElementById("iad85_1").checked = true;
    document.getElementById("iad85_0").checked = false;
    document.getElementById("iad85_2").checked = false;
	document.getElementById("iad86_1").checked = true;
    document.getElementById("iad86_0").checked = false;
    document.getElementById("iad86_2").checked = false;   
} else {
    document.getElementById("iad81_1").checked = false;
    document.getElementById("iad81_0").checked = true;
    document.getElementById("iad81_2").checked = false;
    document.getElementById("iad82_1").checked = true;
    document.getElementById("iad82_0").checked = false;
    document.getElementById("iad82_2").checked = false;
    document.getElementById("iad83_1").checked = false;
    document.getElementById("iad83_0").checked = true;
    document.getElementById("iad83_2").checked = false;
	document.getElementById("iad84_1").checked = true;
    document.getElementById("iad84_0").checked = false;
    document.getElementById("iad84_2").checked = false;
	document.getElementById("iad85_1").checked = false;
    document.getElementById("iad85_0").checked = true;
    document.getElementById("iad85_2").checked = false;
	document.getElementById("iad86_1").checked = false;
    document.getElementById("iad86_0").checked = true;
    document.getElementById("iad86_2").checked = false;   
  }
}
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
height: 100;
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

