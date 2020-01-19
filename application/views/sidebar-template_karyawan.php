<div class="sidebar">
			<div class="sidebar-content">
								<!-- User dropdown -->
								<?php	
			$id=$this->session->userdata('ses_personnel_id');
			$sql        =   $this->db->query("SELECT a.*,b.bagian,b.lit_code_position,b.name_position,b.status_jabatan,b.id_jabatan, concat(replace(round(DATEDIFF(now(),STR_TO_DATE(birth_date,'%Y%m%d'))/365,1),'.',' Thn '),' Bulan') as usia FROM human_pa_md_emp_personal a left join lit_tab_posisi b on a.personnel_id=b.personnel_id where a.personnel_id = '$id'  order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$nama_posisi = $sql['name_position'];
			$status_jabatan = $sql['status_jabatan'];
			$lit_code_position = $sql['lit_code_position'];
			$id_jabatan = $sql['id_jabatan'];
			$bagian = $sql['bagian'];
			$code_ps = substr($lit_code_position, 0,4);
			//$kode_vp = substr($lit_code_position, 0,7);
		
		$sqldir  =   $this->db->query("SELECT * FROM lit_tab_setting_pejabat where id = '1' ")->row_array();
			$dir = $sqldir['lit_code_position'];	

		$sqlvp  =   $this->db->query("SELECT * FROM lit_tab_setting_pejabat where id = '2' ")->row_array();
			$vp = $sqlvp['lit_code_position'];
	
?>	
				<div class="user-menu dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php if(!empty($litfoto)){
						echo base_url($litfoto);
						}else{
						echo base_url('assets/images/noimage.png');	
						}
						?>">
						<div class="user-info">
							<?php echo $namapegawai;?> <span><?php echo $id;?></span>
						</div>
					</a>
					
				</div>
				 
				<ul class="navigation">	
                                   
								
					<li <?php if($location == 'pegawai') { echo 'class="active"'; }  ?>><a href="#"><span>Employee Administration</span> <i class="icon-clipboard"></i></a>
					<ul>
						<li <?php if($location == 'pegawai') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('pegawai/pegawai_detail/'.$id);?>"><span>Manajemen Karyawan</span></i></a></li>
						<li <?php if($location == 'surat_keterangan') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('surat_keterangan');?>"><span>Surat Keterangan</span></i></a></li>
						
					</ul>
					</li>

					<li><a href="#"><span>Leave Administrasion</span> <i class="icon-clipboard"></i></a>
					<ul>
							<?php if($id_jabatan == '20'){ ?>
							<li <?php if($location == 'jadwal_cuti') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('jadwal_cuti');?>">Jadwal Cuti Awak Kapal</a></li>
							<?php }else{ } ?>
							<li <?php if($location == 'permohonan_cuti') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('permohonan_cuti');?>">Permohonan Cuti</a></li>
							<?php if($status_jabatan == 'Struktural'){ ?>
							<?php $sqlpersonelid =  $this->db->query("select count(status) as total from lit_dat_cuti where status = '0' and personnel_id_atasan = '$id' order by id asc");
						            $availpersonelid = $sqlpersonelid->num_rows();
						            $getpersonelid = $sqlpersonelid->row();
						            if($availpersonelid > 0){
						                $total = $getpersonelid->total;
						            }else{
						                 $total = '';
						            }
						    ?>
							<li <?php if($location == 'persetujuan_cuti') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('persetujuan_cuti');?>">Persetujuan Cuti <span style="	display: inline-block;
  font-size: 11px;  padding: 5px 5px 6px 5px;  line-height: 10px;  font-weight: 600;  color: #FFF;  border-radius: 2px;  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;background-color: #D65C4F;"><?php echo $total;?></span></a></li>
  						<?php }else{ } ?>

  						 <?php if($lit_code_position == $dir or $lit_code_position == $vp or $id_jabatan == 9 ){ ?>
							<?php 

							if($id_jabatan == 9){
								/*$unit_kerja = $this->session->userdata('ses_lit_code_core_orm'); 
									$sqlpersonelid_vp = $this->db->query("select count(*) as total_vp,c.lit_code_position,c.id_jabatan,d.name_full, a.*,a.id as idnya, date_format(a.tgl_dari, '%d-%m-%Y') as mulai,date_format(a.tgl_sampai, '%d-%m-%Y') as sampai,b.cuti,case when a.status_progress = '1' then 'Inprogress' when a.status_progress = '2' then 'Selesai' else 'Tolak' end as keterangan from lit_dat_cuti a left join lit_tab_cuti b on a.id_cuti = b.id 
									left join lit_tab_posisi c on a.personnel_id=c.personnel_id 
									left join human_pa_md_emp_personal d on a.personnel_id = d.personnel_id 
								left join 
								(select kode,kdposisiorm,nama_unit from view_orm where level='6' or (level='8' and SUBSTR(kode, 4, 1)=2)) e on substring(c.lit_code_position,1,7)=e.kdposisiorm 
									where e.kode = '$unit_kerja' and a.status_admin = '1' and status_vp_sdm = 0 order by a.id asc");*/
									$unit_kerja = substr($lit_code_position,0,6);
	$sqlpersonelid_vp = $this->db->query("select count(*) as total_vp,c.lit_code_position,c.id_jabatan,d.name_full, a.*,a.id as idnya, date_format(a.tgl_dari, '%d-%m-%Y') as mulai,date_format(a.tgl_sampai, '%d-%m-%Y') as sampai,b.cuti,case when a.status_progress = '1' then 'Inprogress' when a.status_progress = '2' then 'Selesai' else 'Tolak' end as keterangan from lit_dat_cuti a left join lit_tab_cuti b on a.id_cuti = b.id 
									left join lit_tab_posisi c on a.personnel_id=c.personnel_id 
									left join human_pa_md_emp_personal d on a.personnel_id = d.personnel_id 
								left join 
								(select kode,kdposisiorm,nama_unit from view_orm where level='6' or (level='8' and SUBSTR(kode, 4, 1)=2)) e on substring(c.lit_code_position,1,7)=e.kdposisiorm 
									where substring(c.lit_code_position,1,6) = '$unit_kerja' and a.status_admin = '1' and status_vp_sdm = 0 order by a.id asc");

								}elseif($id_jabatan == 6){
									$sqlpersonelid_vp = $this->db->query("select count(*) as total_vp,c.lit_code_position,c.id_jabatan,d.name_full, a.*,a.id as idnya, date_format(a.tgl_dari, '%d-%m-%Y') as mulai,date_format(a.tgl_sampai, '%d-%m-%Y') as sampai,b.cuti,case when a.status_progress = '1' then 'Inprogress' when a.status_progress = '2' then 'Selesai' else 'Tolak' end as keterangan from lit_dat_cuti a left join lit_tab_cuti b on a.id_cuti = b.id 
									left join lit_tab_posisi c on a.personnel_id=c.personnel_id 
									left join human_pa_md_emp_personal d on a.personnel_id = d.personnel_id where a.status_admin = '1' and c.id_jabatan != '9' and c.id_jabatan > 6 and substr(c.lit_code_position,5,2) = '00' and status_vp_sdm = 0 order by a.id asc");

									}elseif($id_jabatan == 3){
										$sqlpersonelid_vp = $this->db->query("select count(*) as total_vp,c.lit_code_position,c.id_jabatan,d.name_full, a.*,a.id as idnya, date_format(a.tgl_dari, '%d-%m-%Y') as mulai,date_format(a.tgl_sampai, '%d-%m-%Y') as sampai,b.cuti,case when a.status_progress = '1' then 'Inprogress' when a.status_progress = '2' then 'Selesai' else 'Tolak' end as keterangan from lit_dat_cuti a left join lit_tab_cuti b on a.id_cuti = b.id 
									left join lit_tab_posisi c on a.personnel_id=c.personnel_id 
									left join human_pa_md_emp_personal d on a.personnel_id = d.personnel_id where a.status_admin = '1'  and a.status_progress = 1 and c.id_jabatan <= 6 or c.id_jabatan = '9' and status_vp_sdm = 0 order by a.id asc");
									}


						            $availpersonelid_vp = $sqlpersonelid_vp->num_rows();
						            $getpersonelid_vp = $sqlpersonelid_vp->row();
						            if($availpersonelid_vp > 0){
						                $total_vp = $getpersonelid_vp->total_vp;
						            }else{
						                 $total_vp = '';
						            }
						    ?>

						   
							<li <?php if($location == 'persetujuan_cuti_vp') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('persetujuan_cuti_vp');?>">Persetujuan Cuti DIR/VP/GM <span style="	display: inline-block;
  font-size: 11px;  padding: 5px 5px 6px 5px;  line-height: 10px;  font-weight: 600;  color: #FFF;  border-radius: 2px;  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;background-color: #D65C4F;"><?php echo $total_vp;?></span></a></li>
  <?php }else{ } ?>

							<li <?php if($location == 'monitoring_cuti') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('monitoring_cuti');?>">Monitoring Tanggal Jatuh Tempo Cuti</a></li>
							

							 <?php if($lit_code_position == $dir or $lit_code_position == $vp or $id_jabatan == 9 ){ ?>
							
							<li <?php if($location == 'realisasi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('lap_realisasi_cuti/realisasi');?>">Laporan Realisasi Cuti</a></li>
							<li <?php if($location == 'rekapitulasi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('lap_realisasi_cuti/rekapitulasi');?>">Laporan Rekapitulasi Cuti</a></li>
							<?php }else{ } ?>
							

					</ul>
					</li>

					<li><a href="#"><span>Time Management</span> <i class="icon-profile"></i></a>
						<ul>
						
						<li <?php if($location == 'verifikasi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('verifikasi');?>">Permohonan Koreksi</a></li>
						<?php if($status_jabatan == 'Struktural'){ ?>
							<?php $sqlpersonelid =  $this->db->query("select count(status) as total from lit_tm_dat_kehadiran where status = '0' and personnel_id_atasan = '$id' order by id asc");
						            $availpersonelid = $sqlpersonelid->num_rows();
						            $getpersonelid = $sqlpersonelid->row();
						            if($availpersonelid > 0){
						                $total = $getpersonelid->total;
						            }else{
						                 $total = '';
						            }
						    ?>

						    <?php $sqlpersonelid_lembur =  $this->db->query("select count(status_lembur) as total_lembur from lit_tm_dat_kehadiran where status_lembur = '0' and personnel_id_atasan_lembur = '$id' order by id asc");
						            $availpersonelid_lembur = $sqlpersonelid_lembur->num_rows();
						            $getpersonelid_lembur = $sqlpersonelid_lembur->row();
						            if($availpersonelid_lembur > 0){
						                $total_lembur = $getpersonelid_lembur->total_lembur;
						            }else{
						                 $total_lembur = '';
						            }
						    ?>

							<li <?php if($location == 'persetujuan_kehadiran') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('persetujuan_kehadiran');?>">Persetujuan Koreksi <span style="	display: inline-block;
  font-size: 11px;  padding: 5px 5px 6px 5px;  line-height: 10px;  font-weight: 600;  color: #FFF;  border-radius: 2px;  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;background-color: #D65C4F;"><?php echo $total;?></span></a></li>
  		<li <?php if($location == 'persetujuan_lembur') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('persetujuan_lembur');?>">Persetujuan Lembur <span style="	display: inline-block;
  font-size: 11px;  padding: 5px 5px 6px 5px;  line-height: 10px;  font-weight: 600;  color: #FFF;  border-radius: 2px;  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;background-color: #D65C4F;"><?php echo $total_lembur;?></span></a></li>
  						<?php }else{ } ?>
						
						<li><a href="#"><span>Laporan</span></a>
						<ul>
							<li <?php if($location == 'lap_kehadiran') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('lap_kehadiran');?>">Laporan Rekap Kehadiran</a></li>
							<li <?php if($location == 'lap_lembur') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('lap_lembur');?>">Laporan Rekap Lembur</a></li>
						</ul>
					</li>
					
						</ul>
					</li>

					<li><a href="#"><span>Payroll Administration</span> <i class="icon-profile"></i></a>
						<ul>
						<li <?php if($location == 'upload_slip') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('upload_slip');?>">View Slip Gaji</a></li>
						</ul>
					</li>
					
					<li><a href="#"><span>Key Performance Indicator (KPI)</span> <i class="icon-clipboard"></i></a>
					<ul>
							<li <?php if($location == 'setting_target') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('setting_target');?>">Setting Target KPI</a></li>
							<li <?php if($location == 'input_realisasi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('input_realisasi');?>">Input Realisasi KPI</a></li>
							<li <?php if($location == 'monitoring_kpi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('monitoring_kpi');?>">Monitoring KPI</a></li>
							<li <?php if($location == 'coach_and_consel') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('coach_and_consel');?>">Coaching and Counselling</a></li>
							<li <?php if($location == 'nilai_kpi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('nilai_kpi');?>">Nilai KPI</a></li>
							<li <?php if($location == 'doc_kpi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('doc_kpi/doc_kpi_detail/'.$this->session->userdata('ses_personnel_id'));?>">Dokumen KPI</a></li>
							<li <?php if($location == 'rekap_nilai_kpi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('rekap_nilai_kpi');?>">Rekap Nilai KPI Karyawan</a></li>
					</ul>
					</li>
<li><a href="#"><span>Sertifikat Awak Kapal</span> <i class="icon-clipboard"></i></a>
					<ul>
							<li <?php if($location == 'dashboard_sertifikat') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('dashboard_sertifikat');?>">Dashboard Sertifikat</a></li>
							<li <?php if($location == 'sertifikat') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sertifikat');?>">Master Sertifikat</a></li>
							<li <?php if($location == 'kelengkapan') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sertifikat/kelengkapan');?>">Kelengkapan Sertifikat</a></li>
							<li <?php if($location == 'monitoring') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sertifikat/monitoring');?>">Monitoring Sertifikat & Resertifikasi</a></li>
							<li <?php if($location == 'report_sertifikat') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('report_sertifikat');?>">Report Sertifikat</a></li>
					</ul>
					</li>	

					<li><a href="#"><span>Pembelajaran Elektronik Pegawai</span> <i class="icon-clipboard"></i></a>
					<ul>
							<li <?php if($location == 'dashboard_pembelajaran') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('dashboard_pembelajaran');?>">Dashboard Pembelajaran</a></li>
							<li <?php if($location == 'daftar_pembelajaran') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('daftar_pembelajaran');?>">Daftar Belajar</a></li>
							<li <?php if($location == 'setuju_pembelajaran') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('setuju_pembelajaran');?>">Persetujuan Atasan</a></li>
							<li <?php if($location == 'kelas_pembelajaran') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('kelas_pembelajaran');?>">Kelas Pembelajaran</a></li>
							<li <?php if($location == 'materi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('materi');?>">Materi Pembelajaran Non Video/Audio</a></li>
							<li <?php if($location == 'dashboard_diklat') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('dashboard_diklat');?>">Materi Pembelajaran Video/Audio</a></li>
							<li <?php if($location == 'dashboard_diklat') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('dashboard_quiz');?>">Quiz Materi Pembelajaran</a></li>
							<li <?php if($location == 'monitoring_belajar') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('monitoring_belajar');?>">Monitoring Pembelajaran</a></li>
							<li <?php if($location == 'progres_belajar') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('progres_belajar');?>">Progress Pembelajaran</a></li>
							<li <?php if($location == 'evaluasi_belajar') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('evaluasi_belajar');?>">Evaluasi Pembelajaran</a></li>
							
					</ul>
					</li>	
			<!--li><a href="#"><span>SPPD</span> <i class="icon-clipboard"></i></a>
				<ul>
					<li <?php if($location == 'sppd') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sppd');?>">SPPD</a></li>
					<li <?php if($location == 'sprint') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sprint');?>">Sprint</a></li>
					<li><a href="#">Kotak Masuk <span class="pull-right icons-group">+</span></a>
						<ul>
							<li <?php if($location == 'sppd_setuju') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sppd_setuju');?>">SPPD Disetujui</a></li>
							<li <?php if($location == 'sprint_setuju') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sprint_setuju');?>">Sprint Disetujui</a></li>
						</ul>
					</li>
					<li><a href="#">Proses SPPD<span class="pull-right icons-group">+</span></a>
						<ul>
							<li <?php if($location == 'sppd_persetujuan') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sppd_setuju/sppd_persetujuan');?>">Perlu Persetujuan</a></li>
							<li <?php if($location == 'sppd_realisasi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sppd_setuju/sppd_realisasi');?>">Perlu Realisasi</a></li>
							<li <?php if($location == 'sppd_status') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sppd_setuju/sppd_status');?>">Status</a></li>
							<li <?php if($location == 'sppd_draft') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sppd_setuju/sppd_draft');?>">Draft</a></li>
						</ul>
					</li>
					<li><a href="#">Proses Sprint<span class="pull-right icons-group">+</span></a>
						<ul>
							<li <?php if($location == 'sprint_setuju/sprint_persetujuan') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sprint_setuju/sprint_persetujuan');?>">Perlu Persetujuan</a></li>
							<li <?php if($location == 'sprint_setuju/sprint_status') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sprint_setuju/sprint_status');?>">Status</a></li>
							<li <?php if($location == 'sprint_setujusprint_draft') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sprint_setuju/sprint_draft');?>">Draft</a></li>
						</ul>
					</li>
				</ul>
			</li-->

					<!--li><a href="#"><span>Kompetensi</span> <i class="icon-clipboard"></i></a>
					<ul>
							<li ><a href="<?php echo base_url('skj');?>">Standar Kompetensi Jabatan</a></li>
							<li ><a href="<?php echo base_url('ukurkomp_individu');?>">Pengukuran Kompetensi Individu</a></li>
							<li ><a href="<?php echo base_url('hasil_pengukuran');?>">Hasil Pengukuran</a></li>
							<li ><a href="<?php echo base_url('gap_kompetensi');?>">Gap Kompetensi</a></li>
							<li ><a href="<?php echo base_url('kebutuhan_diklat_komp');?>">Kebutuhan Diklat Kompetensi</a></li>
					</ul>
					</li-->
					<li><a href="#"><span>Report</span> <i class="icon-clipboard"></i></a>
					<ul>
							<li ><a href="<?php echo base_url('report_cv/report_cv_detail/'.$id);?>">Curriculum Vitae 1</a></li>
							<li ><a href="<?php echo base_url('report_cv/report_cv2_detail/'.$id);?>">Curriculum Vitae 2</a></li>
							<li ><a href="<?php echo base_url('report_kontrak/report_kontrak_detail/'.$id);?>">Kontrak Manajemen</a></li>
					</ul>
					</li>


						<li><a href="#"><span>Peraturan Perusahaan</span> <i class="icon-profile"></i></a>
						<ul>
							<li <?php if($location == 'peraturan_internal') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('peraturan_internal');?>">Peraturan Internal</a></li>
							<li <?php if($location == 'peraturan_external') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('peraturan_external');?>">Peraturan External</a></li>
						</ul>
					</li>


					<li><a href="<?php echo base_url('login/logout');?>"><span>Logout</span> <i class="icon-exit"></i></a></li>
				</ul>				
				 
				
			</div>
		</div>
