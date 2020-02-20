<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gugus extends Parent_Model {

	var $nama_tabel = 'lit_el_tab_gugus';  
	var $daftar_field = array('id','nm_gugus','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
	} 

	public function fetch_gugus()
	{
		$getdata = $this->db->get($this->nama_tabel)->result();
		$data = array();  
		$no = 1;
		foreach($getdata as $row)  
		{  
			 $sub_array = array();  
			 $sub_array[] = $no;
			 $sub_array[] = $row->nm_gugus;  
			 $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > Ubah </a> &nbsp;
			 <a href="javascript:void(0)" class="btn btn-danger btn-xs waves-effect" id="delete" onclick="Hapus_Data('.$row->id.');" >   Delete </a>';  
			
			 $data[] = $sub_array;  
			  $no++;
		}  
	   
		return $output = array("data"=>$data);
	}

	public function get_all_gugus(){
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
								<a href="'.base_url('gugus/showmateri/'.$row->id).'" class="btn btn-warning" id="edit" onclick="PilihMateri(' . $row->id . ');" > Pilih Materi </a>  &nbsp;				
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
