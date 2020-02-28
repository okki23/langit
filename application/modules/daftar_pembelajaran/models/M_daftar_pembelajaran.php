<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_daftar_pembelajaran extends Parent_Model {

	var $nama_tabel = 'lit_el_dat_kelas'; 
	var $daftar_field = array('id','id_kelas','personnel_id','isapproveatasan','ket_atasan','tanggal_daftar','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
	} 

	public function get_useractive($id){
		return $this->db->where('personnel_id',$id)->get('human_pa_md_emp_personal')->row();
	}
	public function fetch_daftar_pembelajaran()
	{ 
	   if($this->session->userdata('username') == 'admin'){
			$getdata = $this->db->query('select a.*,b.name_full,b.lit_nik,c.name_position,d.nm_kelas,case a.isapproveatasan when 2 then "No" when 0 then "New" else "Yes" end as status from lit_el_dat_kelas a
			   left join human_pa_md_emp_personal b on b.personnel_id = a.personnel_id
			   left join lit_tab_posisi c on c.personnel_id = b.personnel_id
			   left join lit_el_kelas d on d.id = a.id_kelas')->result();
			   $data = array();
			   $no = 1;
	   }else{
		    $getdata = $this->db->query('select a.*,b.name_full,b.lit_nik,c.name_position,d.nm_kelas,case a.isapproveatasan when 2 then "No" when 0 then "New" else "Yes" end as status from lit_el_dat_kelas a
			   left join human_pa_md_emp_personal b on b.personnel_id = a.personnel_id
			   left join lit_tab_posisi c on c.personnel_id = b.personnel_id
			   left join lit_el_kelas d on d.id = a.id_kelas where a.personnel_id = "'.$this->session->userdata('ses_personnel_id').'" ')->result();
			   $data = array();
			   $no = 1;
	   }
	    
	   foreach ($getdata as $row) {
		  $sub_array = array(); 
		  $sub_array[] = $no;
		  $sub_array[] = $row->personnel_id;
		  $sub_array[] = $row->lit_nik;
		  $sub_array[] = $row->name_full;
		  $sub_array[] = $row->name_position;
		  $sub_array[] = $row->nm_kelas;
		  $sub_array[] = $row->tanggal_daftar;
		  $sub_array[] = $row->status; 
		  $sub_array[] = '<div style="text-align:center;">
		  					<a href="javascript:void(0)" class="btn btn-warning" id="edit" onclick="Ubah_Data(' . $row->id . ');" > Ubah </a>  &nbsp;
							  <a href="javascript:void(0)" id="delete" class="btn btn-danger" onclick="Hapus_Data(' . $row->id . ');" >  Hapus </a>
						</div>';
		  $data[] = $sub_array;
		  $no++;
	   }
 
	   return $output = array("data" => $data);
	}

	public function get_all_daftar_pembelajaran(){
		global $db;
		$query = $this->db->query("select * FROM lit_el_tab_video order by id asc");  
		return $query;
	}

	public function pro_add_modul($insert_id,$kelas_id){
	$query = $this->db->query("insert into lit_el_dat_kelas_modul (id_dat_kelas,id_kelas_modul)
SELECT '$insert_id', id FROM lit_el_kelas_modul where kelas_id='$kelas_id'");
		
		return $query;

	}
 
	
}
