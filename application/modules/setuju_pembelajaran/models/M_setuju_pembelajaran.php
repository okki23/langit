<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_setuju_pembelajaran extends Parent_Model {

	var $nama_tabel = 'lit_el_dat_kelas'; 
	var $daftar_field = array('id','id_kelas','personnel_id','isapproveatasan','ket_atasan','tanggal_daftar','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
	} 

	public function fetch_setuju_pembelajaran()
	{ 
	   if($this->session->userdata('username') == 'admin'){
			$getdata = $this->db->query('select a.*,b.name_full,b.lit_nik,c.name_position,d.nm_kelas,case a.isapproveatasan when 2 then "No" else "Yes" end as status from lit_el_dat_kelas a
			left join human_pa_md_emp_personal b on b.personnel_id = a.personnel_id
			left join lit_tab_posisi c on c.personnel_id = b.personnel_id
			left join lit_el_kelas d on d.id = a.id_kelas')->result();
	   }else{
			$getdata = $this->db->query('select a.*,b.name_full,b.lit_nik,c.name_position,d.nm_kelas,case a.isapproveatasan when 2 then "No" else "Yes" end as status from lit_el_dat_kelas a
			left join human_pa_md_emp_personal b on b.personnel_id = a.personnel_id
			left join lit_tab_posisi c on c.personnel_id = b.personnel_id
			left join lit_el_kelas d on d.id = a.id_kelas where a.personnel_id = "'.$this->session->userdata('ses_personnel_id').'" ')->result();
	   } 
	   $data = array();
	   $no = 1;
	   foreach ($getdata as $row) {
		  $sub_array = array(); 
		  $sub_array[] = $no; 
		  $sub_array[] = $row->name_full;
		  $sub_array[] = $row->name_position;
		  $sub_array[] = $row->nm_kelas;  
		  if($row->isapproveatasan == 0){
			$sub_array[] = '<div style="text-align:center;">  
								<a href="javascript:void(0)" id="delete" class="btn btn-warning" onclick="Approval(' . $row->id . ');" >  <i class="icon-clipboard"></i>  Persetujuan </a>
	  						</div>';
		  }else if($row->isapproveatasan == 1){
			$sub_array[] = '<div style="text-align:center;">  
								<a href="javascript:void(0)" id="delete" class="btn btn-danger" onclick="Approval(' . $row->id . ');" >   <i class="icon-close"></i>  Tolak </a>
		  					</div>';
		  }else{
			$sub_array[] = '<div style="text-align:center;">  
								<a href="javascript:void(0)" id="delete" class="btn btn-success" onclick="Approval(' . $row->id . ');" >  <i class="icon-checkmark"></i> Setujui </a>
							</div>';
		  }
		
		  $data[] = $sub_array;
		  $no++;
	   }
 
	   return $output = array("data" => $data);
	}

	public function get_all_setuju_pembelajaran(){
		global $db;
		$query = $this->db->query("select * FROM lit_el_tab_video order by id asc");  
		return $query;
	}
 
	
}
