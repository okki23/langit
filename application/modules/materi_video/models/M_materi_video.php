<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_materi_video extends Parent_Model {

	var $nama_tabel = 'lit_el_kelas_modul'; 
	var $nama_tabelkelas = 'lit_el_kelas'; 
	var $daftar_field = array('id','nm_modul','materi','kelas_id','pathfile','status','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
	} 

	public function fetch_materi_video($idkelas)
	{
	   $getdata = $this->db->query("select a.*,b.nm_kelas,case a.status when 1 then 'Aktif' else 'Tidak Aktif' end as status from lit_el_kelas_modul a
	   left join lit_el_kelas b on b.id = a.kelas_id where kelas_id = '".$idkelas."' ")->result();
	   $data = array();
	  
	   $no = 1;
	   $dataparse = array();  
	   foreach ($getdata as $key => $value) {  
			$sub_array['no'] = $no;
			$sub_array['nm_modul'] = $value->nm_modul;  
			$sub_array['status'] = $value->status;
			 
		   array_push($dataparse,$sub_array); 
		   $no++;
		}  
   
	echo json_encode($dataparse);

	}

	public function get_all_materi_video(){
	global $db;
	$query = $this->db->query("select * FROM lit_el_tab_video order by id asc");  
 	return $query;
	}
	
	public function fetch_kelas_pembelajaran()
	{ 
	  
		$getdata = $this->db->get($this->nama_tabelkelas)->result();
		$data = array();
		$no = 1;
	   
	    
	   foreach ($getdata as $row) {
		  $sub_array = array(); 
		  $sub_array[] = $no;
		  $sub_array[] = $row->nm_kelas;
		  $sub_array[] = $row->tgl_dibuka; 
		  if($row->isactive == 1){
			$sub_array[] = 'aktif';
		  }else{
			$sub_array[] = 'tidak aktif';
		  }
		  if($this->session->userdata('username') == 'admin'){
			$sub_array[] = '<div style="text-align:center;">
								<a href="'.base_url('materi_video/showmateri/'.$row->id).'" class="btn btn-warning" id="edit" onclick="PilihMateri(' . $row->id . ');" > Pilih Materi </a>  &nbsp;				
							</div>';
		  }else{ 
			$sub_array[] = '<div style="text-align:center;">  
								<a href="'.base_url('kelas_pembelajaran/tampil_kelas').'/'.$row->id.'" class="btn btn-success"">      Mulai Belajar </a>
		  					</div>';
		  } 
		  $data[] = $sub_array;
		  $no++;
	   }
 
	   return $output = array("data" => $data);
	}

	public function fetch_kelas_pembelajaran_employee()
	{ 
	  
		$getdata = $this->db->query("select a.*,b.nm_kelas from lit_el_dat_kelas a 
		left join lit_el_kelas b on b.id = a.id_kelas where a.personnel_id = '".$this->session->userdata('ses_personnel_id')."' ")->result();
		$data = array();
		$no = 1;
	   
	    
	   foreach ($getdata as $row) {
		  $sub_array = array(); 
		  $sub_array[] = $no;
		  $sub_array[] = $row->nm_kelas; 
		   
			$sub_array[] = '<div style="text-align:center;">  
								<a href="'.base_url('kelas_pembelajaran/tampil_kelas').'/'.$row->id.'" class="btn btn-success"">      Mulai Belajar </a>
		  					</div>';
		  
		  $data[] = $sub_array;
		  $no++;
	   }
 
	   return $output = array("data" => $data);
	}
 
	
}
