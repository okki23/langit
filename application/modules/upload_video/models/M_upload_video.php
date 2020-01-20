<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_upload_video extends Parent_Model {

	var $nama_tabel = 'lit_el_tab_video'; 
	var $daftar_field = array('id','nm_video','author','pathfile','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct();
		 
	} 

	public function fetch_upload_video()
	{
	   $getdata = $this->db->get($this->nama_tabel)->result();
	   $data = array();
	   $no = 1;
	   foreach ($getdata as $row) {
		  $sub_array = array(); 
		  $sub_array[] = $no;
		  $sub_array[] = $row->nm_video; 
		  $sub_array[] = '<video controls width="250"> 
    						<source src="'.base_url('upload/'.$row->pathfile).'" type="video/webm">  
							Sorry, your browser doesnt support embedded videos
						</video>';
		//   $sub_array[]  = '<video height="70%" width="70%" controls="true">
		// 					<source src="'.base_url('upload/'.$row->pathfile).'">
		// 					</video>';
		  //$sub_array[] = '<iframe  width="100%" height="100%" src="'.base_url('upload/'.$row->pathfile).'" frameborder="0" controls allowfullscreen></iframe>'; 
		  $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning" id="edit" onclick="Ubah_Data(' . $row->id . ');" > Ubah </a>  &nbsp;
						  <a href="javascript:void(0)" id="delete" class="btn btn-danger" onclick="Hapus_Data(' . $row->id . ');" >  Hapus </a>';
		  $data[] = $sub_array;
		  $no++;
	   }
 
	   return $output = array("data" => $data);
	}

	public function get_all_upload_video(){
	global $db;
	$query = $this->db->query("select * FROM lit_el_tab_video order by id asc");  
 	return $query;
	}
 
	
}
