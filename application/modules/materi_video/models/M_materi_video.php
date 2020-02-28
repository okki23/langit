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
	public function getread($id){
		$sql = $this->db->query("select count(status) as baca from lit_el_dat_kelas_modul
		where id_dat_kelas = '".$id."' and status = 1")->row();
		return $sql;
	}
	public function fetch_kelas_pembelajaran_employee()
	{ 
	  
		$getdata = $this->db->query("
		select a.*,count(b.`status`) as total,c.nm_kelas,d.nm_gugus,e.nm_sub_gugus from lit_el_dat_kelas a
		left join lit_el_dat_kelas_modul b on b.id_dat_kelas = a.id
		left join lit_el_kelas c on c.id = a.id_kelas
		left join lit_el_tab_gugus d on d.id = c.id_gugus
		left join lit_el_tab_gugus_sub e on e.id = c.id_sub_gugus 
		WHERE a.personnel_id = '".$this->session->userdata('ses_personnel_id')."' GROUP BY a.id_kelas")->result();
		$data = array();
		$no = 1;
	   
	    
	   foreach ($getdata as $row) {
		  $sub_array = array(); 
		  $sub_array[] = $no;
		  $sub_array[] = $row->nm_kelas;  
		  $stat = @ceil((($this->getread($row->id)->baca / $row->total)*100));
		  if($stat == 100){
			$sub_array[] = '<div style="text-align:center;">  
			<a href="javascript:void(0);" class="btn btn-success"">  Sudah Selesai Belajar </a>
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
 
	
}
