<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_materi_video extends Parent_Model {

	var $nama_tabel = 'lit_el_kelas_modul'; 
	var $daftar_field = array('id','nm_modul','materi','kelas_id','pathfile','status','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
	} 

	public function fetch_materi_video()
	{
	   $getdata = $this->db->query("select a.*,b.nm_kelas,case a.status when 1 then 'Aktif' else 'Tidak Aktif' end as status from lit_el_kelas_modul a
	   left join lit_el_kelas b on b.id = a.kelas_id")->result();
	   $data = array();
	   $no = 1;
	   foreach ($getdata as $row) {
		  $sub_array = array(); 
		  $sub_array[] = $no;
		  $sub_array[] = $row->nm_kelas; 
		  $sub_array[] = $row->nm_modul; 
		  $sub_array[] = $row->status;  
		  if(empty($row->pathfile)){
			$sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning" > File Not Available </a>
			<a href="javascript:void(0)" class="btn btn-warning" id="detail" onclick="Detail(' . $row->id . ');" > Detail </a>  &nbsp;
			<a href="javascript:void(0)" class="btn btn-warning" id="edit" onclick="Ubah_Data(' . $row->id . ');" > Ubah </a>  &nbsp;
		  <a href="javascript:void(0)" id="delete" class="btn btn-danger" onclick="Hapus_Data(' . $row->id . ');" >  Hapus </a>';
		  }else{
			$sub_array[] = '<a href="file_manager_dir/'.$row->pathfile.'"  class="btn btn-warning" > '.$row->pathfile.' </a>
			<a href="javascript:void(0)" class="btn btn-warning" id="detail" onclick="Detail(' . $row->id . ');" > Detail </a>  &nbsp;
			<a href="javascript:void(0)" class="btn btn-warning" id="edit" onclick="Ubah_Data(' . $row->id . ');" > Ubah </a>  &nbsp;
		  <a href="javascript:void(0)" id="delete" class="btn btn-danger" onclick="Hapus_Data(' . $row->id . ');" >  Hapus </a>';
		  }
		  
		  $data[] = $sub_array;
		  $no++;
	   }
 
	   return $output = array("data" => $data);
	}

	public function get_all_materi_video(){
	global $db;
	$query = $this->db->query("select * FROM lit_el_tab_video order by id asc");  
 	return $query;
	}
 
	
}
