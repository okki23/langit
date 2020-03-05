<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_work_assignment extends Parent_Model {

	var $nama_tabel = 'lit_el_dat_kelas'; 
	var $daftar_field = array('id','id_kelas','personnel_id','personnel_id_atasan','isapproveatasan','ket_atasan','tanggal_daftar','file_assignment','file_realisasi','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct();
		 
	} 

	public function fetch_work_assignment()
	{
	   if($this->session->userdata('username') == 'admin'){
		$getdata = $this->db->query("select a.id,a.personnel_id,b.nm_kelas,b.file_assignment,c.nm_gugus,d.nm_sub_gugus,a.file_realisasi from lit_el_dat_kelas a
		left join lit_el_kelas b on b.id = a.id_kelas
		left join lit_el_tab_gugus c on c.id = b.id_gugus
		left join lit_el_tab_gugus_sub d on d.id = b.id_sub_gugus")->result();
	   }else{
		$getdata = $this->db->query("select a.id,a.personnel_id,b.nm_kelas,b.file_assignment,c.nm_gugus,d.nm_sub_gugus,a.file_realisasi from lit_el_dat_kelas a
		left join lit_el_kelas b on b.id = a.id_kelas
		left join lit_el_tab_gugus c on c.id = b.id_gugus
		left join lit_el_tab_gugus_sub d on d.id = b.id_sub_gugus where a.personnel_id =  '".$this->session->userdata('ses_personnel_id')."' ")->result();
	   }
	  
	   $data = array();
	   $no = 1;
	   foreach ($getdata as $row) {
		  $sub_array = array(); 
		  $sub_array[] = $no;
		  $sub_array[] = $row->nm_gugus; 
		  $sub_array[] = $row->nm_sub_gugus; 
		  $sub_array[] = $row->nm_kelas; 

		  //work assign
		  if($this->session->userdata('username') == 'admin'){
			if(empty($row->file_assignment)){
				$sub_array[] = '<a class="btn btn-primary"> File Assignment Tidak Ada </a>';
			}else{
				$sub_array[] = '<a class="btn btn-primary" target="_blank" href="file_manager_dir/'.$row->file_assignment.'"> Download File Assignment </a>';
			}
			 
		  }else{	 
			if(empty($row->file_assignment)){
				$sub_array[] = '<a class="btn btn-primary"> File Assignment Tidak Ada </a>';
			}else{
				$sub_array[] = '<a class="btn btn-primary" target="_blank" href="file_manager_dir/'.$row->file_assignment.'"> Download File Assignment </a>';
			} 
				
		  } 

		  //realisasi
		  if($this->session->userdata('username') == 'admin'){ 
				$sub_array[] = '<a class="btn btn-primary" disabled="disabled"> Lihat File  Realisasi </a>'; 
		  }else{ 
			// cek ada penugasan atau tidak, kalau tidak ada penugasan maka tidak akan ada upload realisasi
			if(empty($row->file_assignment)){
				$sub_array[] = '<a class="btn btn-primary" disabled="disabled"> Tidak Ada File Assignment </a>';
			}else if(empty($row->file_realisasi)){
				$sub_array[] = '<button type="button"  onclick="UploadAssign(' . $row->id . ');" id="realbtn" data-id="work_assignment/saveuploadrealisasi" class="btn btn-primary btn-lg"  >
				Upload File Realisasi 
				</button> &nbsp;';
			}else{
				$sub_array[] = '<button type="button" onclick="UploadAssign(' . $row->id . ');" id="realbtn" data-id="work_assignment/saveuploadrealisasi"   class="btn btn-primary btn-lg"  >
				Upload File Realisasi 
				</button>  &nbsp; <a class="btn btn-primary" target="_blank" href="file_manager_dir/'.$row->file_realisasi.'"> Download File Realisasi </a>';
			}
			
		  } 
	 
		  $data[] = $sub_array;
		  $no++;
	   }
 
	   return $output = array("data" => $data);
	}

	public function get_all_work_assignment(){
	global $db;
	$query = $this->db->query("select * FROM lit_el_tab_video order by id asc");  
 	return $query;
	}
 
	
}
