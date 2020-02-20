<div class="sidebar">
			<div class="sidebar-content">
			<!-- User dropdown -->
			<?php	
		    $id_kelas='1';
			$id=$this->session->userdata('ses_personnel_id');
			$sql        =   $this->db->query("SELECT a.*,b.bagian,b.lit_code_position,b.name_position,b.status_jabatan,b.id_jabatan, concat(replace(round(DATEDIFF(now(),STR_TO_DATE(birth_date,'%Y%m%d'))/365,1),'.',' Thn '),' Bulan') as usia FROM human_pa_md_emp_personal a left join lit_tab_posisi b on a.personnel_id=b.personnel_id where a.personnel_id = '$id'  order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
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
                                   
													

					<li><a href="#"><span>Pembelajaran Elektronik Pegawai</span> <i class="icon-clipboard"></i></a>
					<ul>
						<?php
					$sqlmenu  =   $this->db->query("SELECT a.*,concat('modulmateri','/tampil/',a.id) as menu_url, c.nm_modul as menu_name, case when a.status=1 then '√' else ' ' end as sts_read FROM lit_el_dat_kelas_modul a INNER JOIN lit_el_dat_kelas b on a.id_dat_kelas=b.id 
						INNER JOIN lit_el_kelas_modul c on a.id_kelas_modul=c.id 
						where b.id_kelas = '$id_kelas' and b.personnel_id='$id' ")->result_array();
						
						foreach ($sqlmenu as $r_menu_thumbnail) {
						?>
						<li <?php if($location == $r_menu_thumbnail['menu_name']) { echo 'class="active"'; }  ?>><a href="<?php echo base_url(''.$r_menu_thumbnail['menu_url'].'');?>"><?php echo $r_menu_thumbnail['menu_name']." ".$r_menu_thumbnail['sts_read'];?></a></li>
						<?php
						}
						?>
							
							
					</ul>
					</li>	
			


					<li><a href="<?php echo base_url('login/logout');?>"><span>Logout</span> <i class="icon-exit"></i></a></li>
				</ul>				
				 
				
			</div>
		</div>
