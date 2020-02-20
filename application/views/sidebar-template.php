<div class="sidebar">
			<div class="sidebar-content">
								<!-- User dropdown -->
				<div class="user-menu dropdown">
					<a href="<?php echo base_url('dashboard');?>" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('assets/images/sdm.jpg')?>">
						<div class="user-info">
							Pengelola Website <span>Administrator</span>
						</div>
					</a>
					
				</div>
				 
				<ul class="navigation">	
                                   
								
					<li><a href="#"><span>Pembelajaran Elektronik Pegawai</span> <i class="icon-clipboard"></i></a>
					<ul>
							<li <?php if($location == 'dashboard_pembelajaran') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('dashboard_pembelajaran');?>">Dashboard Pembelajaran</a></li>
							<li <?php if($location == 'gugus') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('gugus');?>">Gugus</a></li>
							<li <?php if($location == 'sub_gugus') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('sub_gugus');?>">Sub Gugus</a></li>
							<li <?php if($location == 'upload_video') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('upload_video');?>">Upload Video Pembelajaran</a></li>
							<li <?php if($location == 'daftar_pembelajaran') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('daftar_pembelajaran');?>">Daftar Belajar</a></li>
							<li <?php if($location == 'setuju_pembelajaran') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('setuju_pembelajaran');?>">Persetujuan Atasan</a></li>
							<li <?php if($location == 'kelas_pembelajaran') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('kelas_pembelajaran');?>">Kelas Pembelajaran</a></li>
							<li <?php if($location == 'materi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('materi');?>">Materi Pembelajaran Non Video/Audio</a></li>
							<li <?php if($location == 'materi_video') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('materi_video');?>">Materi Pembelajaran Video/Audio</a></li>
							<li <?php if($location == 'dashboard_diklat') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('dashboard_quiz');?>">Quiz Materi Pembelajaran</a></li>
							<li <?php if($location == 'monitoring_belajar') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('monitoring_belajar');?>">Monitoring Pembelajaran</a></li>
							<li <?php if($location == 'progres_belajar') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('progres_belajar');?>">Progress Pembelajaran</a></li>
							<li <?php if($location == 'evaluasi_belajar') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('evaluasi_belajar');?>">Evaluasi Pembelajaran</a></li>
							
					</ul>
					</li>	

					<li><a href="#"><span>Prestasi Kerja Pegawai</span> <i class="icon-clipboard"></i></a>
					<ul>
							
							<li <?php if($location == 'hasil_prilaku') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('hasil_prilaku');?>">Hasil Penilaian Prilaku</a></li>
							
					</ul>
					</li>	


					<li><a href="<?php echo base_url('login/logout');?>"><span>Logout</span> <i class="icon-exit"></i></a></li>
				</ul>			
				 
				
			</div>
		</div>
