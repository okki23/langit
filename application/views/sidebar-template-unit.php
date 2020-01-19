<div class="sidebar">
			<div class="sidebar-content">
								<!-- User dropdown -->
				<div class="user-menu dropdown">
					<a href="<?php echo base_url('dashboard');?>" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('assets/images/admin.png')?>">
						<div class="user-info">
							Pengelola Website <span>Administrator</span>
						</div>
					</a>
					
				</div>
				 
				<ul class="navigation">	
                                    
					<li <?php if($location == 'dashboard') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('dashboard');?>"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>
					<li <?php if($location == 'visi_misi') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('visi_misi');?>"><span>Visi Misi</span> <i class="icon-screen2"></i></a></li>
					<!--li><a href="#"><span>Master Employee</span> <i class="icon-profile"></i></a>
					<ul>
							<li <?php if($location == 'education') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('education');?>">Pendidikan</a></li>
							<li <?php if($location == 'jabatan') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('jabatan');?>">Jabatan</a></li>
							<li <?php if($location == 'posisi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('posisi');?>">Posisi</a></li>
							<li <?php if($location == 'lintasan') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('lintasan');?>">Lintasan</a></li>
							<li <?php if($location == 'pelabuhan') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('pelabuhan');?>">Pelabuhan</a></li>
							<li <?php if($location == 'user') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('user');?>">Manajemen User</a></li>
							<li <?php if($location == 'setting') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('setting');?>">Setting Aplikasi</a></li>
					</ul>
					</li>
					<li><a href="#"><span>Master KPI</span> <i class="icon-profile"></i></a>
					<ul>							
							<li <?php if($location == 'area') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('area');?>">Area</a></li>
							<li <?php if($location == 'objective') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('objective');?>">Perspektif</a></li>
							<li <?php if($location == 'kpi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('kpi');?>">KPI</a></li>
							
					</ul>
					</li-->
					<li <?php if($location == 'orm') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('orm');?>"><span>Manajemen Organisasi</span> <i class="icon-tree2"></i></a>
					<!--li <?php if($location == 'kapal' or $location == 'pindahkapal') { echo 'class="active"'; }  ?>><a href="#"><span>Manajemen Kapal</span> <i class="icon-clipboard"></i></a>
					<ul>
						<li <?php if($location == 'kapal') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('kapal');?>"><span>Data Kapal</span></i></a></li>
						<li <?php if($location == 'operasikapal') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('operasikapal');?>"><span>Operasi Kapal</span></i></a></li>
						<li <?php if($location == 'pindahkapal') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('pindahkapal');?>"><span>Pindah Operasi Kapal</span></i></a></li>
						<li <?php if($location == 'standar_sertifikasi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('standar_sertifikasi');?>"><span>Standar Sertifikasi Awak Kapal</span></i></a></li>
					</ul>
					</li-->
					<li <?php if($location == 'pegawai') { echo 'class="active"'; }  ?>><a href="#"><span>Employee Administration</span> <i class="icon-clipboard"></i></a>
					<ul>
						<li <?php if($location == 'pegawai') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('pegawai');?>"><span>Manajemen Karyawan</span></i></a></li>
						
					</ul>
					</li>


					<li><a href="#"><span>Leave Administration</span> <i class="icon-profile"></i></a>
						<ul>
							<li <?php if($location == 'jadwal_cuti') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('jadwal_cuti');?>">Jadwal Cuti Awak Kapal</a></li>

							<?php 

							$posisi = $this->session->userdata('ses_code_position'); 
							$kode = SUBSTR($posisi,4,2);

							$sqlpersonelid =  $this->db->query("select count(a.status) as total from lit_dat_cuti a left join lit_tab_cuti b on a.id_cuti = b.id 
	left join lit_tab_posisi c on a.personnel_id=c.personnel_id 
	left join human_pa_md_emp_personal d on a.personnel_id = d.personnel_id 
	where SUBSTR(c.lit_code_position,5,2) = '$kode' and status = '1' and status_admin = '0' order by a.id asc");
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
							<li <?php if($location == 'monitoring_cuti') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('monitoring_cuti');?>">Monitoring Tanggal Jatuh Tempo Cuti</a></li>
							<li <?php if($location == 'realisasi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('lap_realisasi_cuti/realisasi');?>">Laporan Realisasi Cuti</a></li>
							<li <?php if($location == 'rekapitulasi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('lap_realisasi_cuti/rekapitulasi');?>">Laporan Rekapitulasi Cuti</a></li>
						</ul>
					</li>

					<li><a href="#"><span>Payroll Administration</span> <i class="icon-profile"></i></a>
						<ul>
						<li <?php if($location == 'upload_slip') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('upload_slip');?>">Upload Slip Gaji</a></li>
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
							<li <?php if($location == 'nominatif') { echo 'class="active"'; } ?>><a href="<?php echo base_url('nominatif');?>">Nominatif</a></li>
							<li <?php if($location == 'komposisi') { echo 'class="active"'; } ?>><a href="<?php echo base_url('komposisi');?>">Komposisi SDM</a></li>
							<li <?php if($location == 'pensiun') { echo 'class="active"'; } ?>><a href="<?php echo base_url('pegawai/pensiun');?>">Karyawan akan Pensiun</a></li>
							<li <?php if($location == 'crew_list') { echo 'class="active"'; } ?>><a href="<?php echo base_url('crew_list');?>">Crew List Awak Kapal</a></li>
							<li <?php if($location == 'sertifikasi_awak') { echo 'class="active"'; } ?>><a href="<?php echo base_url('sertifikasi_awak');?>">Sertifikasi Awak Kapal</a></li>
							<li <?php if($location == 'sertifikat_expired') { echo 'class="active"'; } ?>><a href="<?php echo base_url('sertifikat_expired');?>">Sertifikat Expired</a></li>
							<li <?php if($location == 'report_pelabuhan') { echo 'class="active"'; } ?>><a href="<?php echo base_url('report_pelabuhan');?>">Pelabuhan</a></li>
							<li <?php if($location == 'report_cv') { echo 'class="active"'; } ?>><a href="<?php echo base_url('report_cv');?>">CV Karyawan</a></li>
							<li <?php if($location == 'report_standar_awak') { echo 'class="active"'; } ?>><a href="<?php echo base_url('report_standar_awak/report_standar_detail');?>" target="_blank">Standar Kebutuhan Awak Kapal</a></li>
							<li <?php if($location == 'report_lintasan') { echo 'class="active"'; } ?>><a href="<?php echo base_url('report_lintasan/report_lintasan_detail');?>">Jarak Lintasan</a></li>
							<li <?php if($location == 'next_of_kind') { echo 'class="active"'; } ?>><a href="<?php echo base_url('next_of_kind');?>">Next Of Kind</a></li>
							
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
