<div class="page-content">
	<div class="page-header">

			</div>
<br>

<div class="panel panel-default">
				                <div class="panel-heading"><h6 class="panel-title"><i class="icon-droplet2"></i> Panel Informasi</h6></div>
				                <div class="panel-body">
								<div class="tabbable">
									<ul class="nav nav-pills nav-justified">
										<li <?php if($location == 'pegawai_detail' or $location == 'data_pribadi' or $location == 'alamat' or $location == 'keluarga' or $location == 'fasilitas' or $location == 'komunikasi' or $location == 'identitas_pribadi' or $location == 'kemampuan_bahasa') { echo 'class="active"'; }?>> <a href="#panel-pill1" data-toggle="tab"><i class="icon-accessibility"></i> Personal Data</a></li>
										<li <?php if($location == 'riwayat_pekerjaan' or $location == 'riwayat_jabatan' or $location == 'penugasan') { echo 'class="active"'; }?>><a href="#panel-pill2" data-toggle="tab"><i class="icon-briefcase"></i> Riwayat Jabatan</a></li>
										<li <?php if($location == 'endorsement' or $location == 'mcu' or $location == 'buku_pelaut' or $location == 'cop') { echo 'class="active"'; }?>><a href="#panel-pill3" data-toggle="tab"><i class="icon-user4"></i> Sertifikasi</a></li>
										<li <?php if($location == 'pendidikan' or $location == 'pelatihan') { echo 'class="active"'; }?>><a href="#panel-pill4" data-toggle="tab"><i class="icon-file2"></i> Diklat</a></li>
										<li <?php if($location == 'penghargaan' or $location == 'hukuman') { echo 'class="active"'; }?>><a href="#panel-pill5" data-toggle="tab"><i class="icon-file2"></i> Penghargaan dan Sanksi</a></li>
										<li <?php if($location == 'doc_pribadi') { echo 'class="active"'; }?>><a href="#panel-pill6" data-toggle="tab"><i class="icon-briefcase"></i> Dokumen</a></li>
										<li <?php if($location == 'kpi') { echo 'class="active"'; }?>><a href="#panel-pill7" data-toggle="tab"><i class="icon-briefcase"></i> KPI</a></li>
										<li <?php if($location == 'gol_eks' or $location == 'dana_pensiun' or $location == 'tht') { echo 'class="active"'; }?>> <a href="#panel-pill8" data-toggle="tab"><i class="icon-accessibility"></i> Dasar Golongan</a></li>

										<!--<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sun2"></i> Dropdown <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="#panel-pill3" tabindex="-1" data-toggle="tab">@fat</a></li>
												<li><a href="#panel-pill4" tabindex="-1" data-toggle="tab">@mdo</a></li>
											</ul>
										</li>-->
									</ul>

									<div class="tab-content pill-content">
										<div <?php if($location == 'pegawai_detail' or $location == 'data_pribadi' or $location == 'alamat' or $location == 'keluarga' or $location == 'fasilitas' or $location == 'komunikasi' or $location == 'identitas_pribadi' or $location == 'kemampuan_bahasa') { echo 'class="tab-pane fade in active"'; }else{ echo 'class="tab-pane fade"';} ?> id="panel-pill1">
											<!-- Striped and bordered table -->
											<ul class="info-blocks">
				
    
				<li <?php if($location == 'data_pribadi') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';} ?>>
					<div class="top-info">
						<a href="<?php echo base_url('data_pribadi/data_pribadi_detail/'.$personnel_id);?>">Data Pribadi</a>
					</div>
					<a href="<?php echo base_url('data_pribadi/data_pribadi_detail/'.$personnel_id);?>"><i class="icon-user4"></i></a>
					
				</li>



				<li <?php if($location == 'alamat') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('alamat/alamat_detail/'.$personnel_id);?>">Alamat</a>
					</div>
					<a href="<?php echo base_url('alamat/alamat_detail/'.$personnel_id);?>"><i class="icon-home3"></i></a>
				</li>

				<li <?php if($location == 'keluarga') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('keluarga/keluarga_detail/'.$personnel_id);?>">Keluarga</a>
					</div>
					<a href="<?php echo base_url('keluarga/keluarga_detail/'.$personnel_id);?>"><i class="icon-users"></i></a>
				</li>
				
				<li <?php if($location == 'fasilitas') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('fasilitas/fasilitas_detail/'.$personnel_id);?>">Fasilitas Dinas</a>
					</div>
					<a href="<?php echo base_url('fasilitas/fasilitas_detail/'.$personnel_id);?>"><i class="icon-office"></i></a>
				</li>

				<li <?php if($location == 'komunikasi') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('komunikasi/komunikasi_detail/'.$personnel_id);?>">Komunikasi</a>
					</div>
					<a href="<?php echo base_url('komunikasi/komunikasi_detail/'.$personnel_id);?>"><i class="icon-bubbles6"></i></a>
				</li>

				<li <?php if($location == 'identitas_pribadi') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('identitas_pribadi/identitas_pribadi_detail/'.$personnel_id);?>">Identitas Pribadi</a>
					</div>
					<a href="<?php echo base_url('identitas_pribadi/identitas_pribadi_detail/'.$personnel_id);?>"><i class="icon-profile"></i></a>
				</li>

				<li <?php if($location == 'kemampuan_bahasa') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('kemampuan_bahasa/kemampuan_bahasa_detail/'.$personnel_id);?>">Penguasaan Bahasa</a>
					</div>
					<a href="<?php echo base_url('kemampuan_bahasa/kemampuan_bahasa_detail/'.$personnel_id);?>"><i class="icon-profile"></i></a>
				</li>
			</ul>
			            <!-- /striped and bordered table -->
										</div>




										<div <?php if($location == 'riwayat_pekerjaan' or $location == 'riwayat_jabatan' or $location == 'penugasan') { echo 'class="tab-pane fade in active"'; }else{ echo 'class="tab-pane fade"';} ?> id="panel-pill2">
											
			 			<!-- Striped and bordered table -->
			 			<ul class="info-blocks">
			 					<li <?php if($location == 'riwayat_pekerjaan') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('riwayat_pekerjaan/riwayat_pekerjaan_detail/'.$personnel_id);?>">Pekerjaan</a>
					</div>
					<a href="<?php echo base_url('riwayat_pekerjaan/riwayat_pekerjaan_detail/'.$personnel_id);?>"><i class="icon-history"></i></a>
				</li>

				<li <?php if($location == 'riwayat_jabatan') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('riwayat_jabatan/riwayat_jabatan_detail/'.$personnel_id);?>">Jabatan</a>
					</div>
					<a href="<?php echo base_url('riwayat_jabatan/riwayat_jabatan_detail/'.$personnel_id);?>"><i class="icon-bookmarks"></i></a>
				</li>

				<li <?php if($location == 'penugasan') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('penugasan/penugasan_detail/'.$personnel_id);?>">Penugasan</a>
					</div>
					<a href="<?php echo base_url('penugasan/penugasan_detail/'.$personnel_id);?>"><i class="icon-archive"></i></a>
				</li>
				
				
				</ul>
			            <!-- /striped and bordered table -->
										</div>





			<div <?php if($location == 'endorsement' or $location == 'mcu' or $location == 'buku_pelaut' or $location == 'cop') { echo 'class="tab-pane fade in active"'; }else{ echo 'class="tab-pane fade"';} ?> id="panel-pill3">
				<!-- Striped and bordered table -->
				<ul class="info-blocks">
				
				
				<li <?php if($location == 'endorsement') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('endorsement/endorsement_detail/'.$personnel_id);?>">Endorsement</a>
					</div>
					<a href="<?php echo base_url('endorsement/endorsement_detail/'.$personnel_id);?>"><i class="icon-thumbs-up3"></i></a>
				</li>
				
				<li <?php if($location == 'mcu') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('mcu/mcu_detail/'.$personnel_id);?>">Medical Check-up</a>
					</div>
					<a href="<?php echo base_url('mcu/mcu_detail/'.$personnel_id);?>"><i class="icon-book2"></i></a>
				</li>

				<li <?php if($location == 'buku_pelaut') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('buku_pelaut/buku_pelaut_detail/'.$personnel_id);?>">Buku Pelaut</a>
					</div>
					<a href="<?php echo base_url('buku_pelaut/buku_pelaut_detail/'.$personnel_id);?>"><i class="icon-notebook"></i></a>
				</li>
				<!--<li <?php //if($location == 'cop') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php //echo base_url('cop/cop_detail/'.$personnel_id);?>">COP</a>
					</div>
					<a href="<?php //echo base_url('cop/cop_detail/'.$personnel_id);?>"><i class="icon-notebook"></i></a>
				</li>-->
											</ul>
											
			            <!-- /striped and bordered table -->
										</div>



			<div <?php if($location == 'pendidikan' or $location == 'pelatihan') { echo 'class="tab-pane fade in active"'; }else{ echo 'class="tab-pane fade"';} ?> id="panel-pill4">
				<!-- Striped and bordered table -->
					<ul class="info-blocks">
					
				
				<li <?php if($location == 'pendidikan') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('pendidikan/pendidikan_detail/'.$personnel_id);?>">Pendidikan</a>
					</div>
					<a href="<?php echo base_url('pendidikan/pendidikan_detail/'.$personnel_id);?>"><i class="icon-library"></i></a>
				</li>
				
				<li <?php if($location == 'pelatihan') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('pelatihan/pelatihan_detail/'.$personnel_id);?>">Pelatihan</a>
					</div>
					<a href="<?php echo base_url('pelatihan/pelatihan_detail/'.$personnel_id);?>"><i class="icon-certificate"></i></a>
				</li>
			</ul>

											
											
			            <!-- /striped and bordered table -->
										</div>
			
			<div <?php if($location == 'penghargaan' or $location == 'hukuman') { echo 'class="tab-pane fade in active"'; }else{ echo 'class="tab-pane fade"';} ?> id="panel-pill5">
				<!-- Striped and bordered table -->
					<ul class="info-blocks">							
					<li <?php if($location == 'penghargaan') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('penghargaan/penghargaan_detail/'.$personnel_id);?>">Penghargaan</a>
					</div>
					<a href="<?php echo base_url('penghargaan/penghargaan_detail/'.$personnel_id);?>"><i class="icon-crown"></i></a>
				</li>
				<li <?php if($location == 'hukuman') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('hukuman/hukuman_detail/'.$personnel_id);?>">Hukuman</a>
					</div>
					<a href="<?php echo base_url('hukuman/hukuman_detail/'.$personnel_id);?>"><i class="icon-notification"></i></a>
				</li>
				
					</ul>
			</div>
				<div <?php if($location == 'doc_pribadi') { echo 'class="tab-pane fade in active"'; }else{ echo 'class="tab-pane fade"';} ?> id="panel-pill6">
				<!-- Striped and bordered table -->
					<ul class="info-blocks">			
					<li <?php if($location == 'doc_pribadi') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('doc_pribadi/doc_pribadi_detail/'.$personnel_id);?>">Dokumen Pribadi</a>
					</div>
					<a href="<?php echo base_url('doc_pribadi/doc_pribadi_detail/'.$personnel_id);?>"><i class="icon-file5"></i></a>
				</li>
					</ul>					
				</div>
				<div <?php if($location == 'kpi' or $location == 'kpi') { echo 'class="tab-pane fade in active"'; }else{ echo 'class="tab-pane fade"';} ?> id="panel-pill7">
				<!-- Striped and bordered table -->
					<ul class="info-blocks">							
					<li <?php if($location == 'setting_target') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('setting_target/');?>">Setting Target</a>
					</div>
					<a href="<?php echo base_url('setting_target/');?>"><i class="icon-crown"></i></a>
				</li>
				<li <?php if($location == 'input_realisasi') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('input_realisasi');?>">Input Realisasi</a>
					</div>
					<a href="<?php echo base_url('input_realisasi');?>"><i class="icon-notification"></i></a>
				</li>
				<li <?php if($location == 'monitoring_kpi') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('monitoring_kpi/');?>">Monitoring KPI</a>
					</div>
					<a href="<?php echo base_url('monitoring_kpi/');?>"><i class="icon-crown"></i></a>
				</li>
				<li <?php if($location == 'coach_and_consel') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('coach_and_consel');?>">Coaching and Counselling</a>
					</div>
					<a href="<?php echo base_url('coach_and_consel');?>"><i class="icon-notification"></i></a>
				</li>
				<li <?php if($location == 'nilai_kpi') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('nilai_kpi');?>">Nilai KPI</a>
					</div>
					<a href="<?php echo base_url('nilai_kpi');?>"><i class="icon-notification"></i></a>
				</li>
					</ul>
					<ul class="info-blocks">			
					<li <?php if($location == 'doc_kpi') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('doc_pendukung_kpi/doc_pendukung_detail/'.$personnel_id);?>">Dokumen KPI</a>
					</div>
					<a href="<?php echo base_url('doc_kpi/doc_kpi_detail/'.$personnel_id);?>"><i class="icon-file5"></i></a>
				</li>
					</ul>
			</div>	

			<div <?php if($location == 'gol_eks' or $location == 'dana_pensiun' or $location == 'tht') { echo 'class="tab-pane fade in active"'; }else{ echo 'class="tab-pane fade"';} ?> id="panel-pill8">
				<!-- Striped and bordered table -->
					<ul class="info-blocks">							
					<li <?php if($location == 'gol_eks') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('gol_eks/gol_eks_detail/'.$personnel_id);?>">Eksisting</a>
					</div>
					<a href="<?php echo base_url('gol_eks/gol_eks_detail/'.$personnel_id);?>"><i class="icon-accessibility"></i></a>
				</li>
				<li <?php if($location == 'dana_pensiun') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('dana_pensiun/dana_pensiun_detail/'.$personnel_id);?>">Dana Pensiun</a>
					</div>
					<a href="<?php echo base_url('dana_pensiun/dana_pensiun_detail/'.$personnel_id);?>"><i class="icon-user3"></i></a>
				</li>
				<li <?php if($location == 'tht') { echo 'class="bg-info"'; }else{ echo 'class="bg-primary"';}  ?>>
					<div class="top-info">
						<a href="<?php echo base_url('tht/tht_detail/'.$personnel_id);?>">THT</a>
					</div>
					<a href="<?php echo base_url('tht/tht_detail/'.$personnel_id);?>"><i class="icon-accessibility2"></i></a>
				</li>
					</ul>
			</div>
	        <!-- /tasks table -->
	        
	        
										
