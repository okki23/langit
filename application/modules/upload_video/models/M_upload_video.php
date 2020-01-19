<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_upload_video extends CI_Model {

	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data upload_video
	public function get_all_upload_video(){
	global $db;
	$query = $this->db->query("select * FROM lit_el_tab_video order by id asc");

 	return $query;
	}

	public function get_all_upload_video_json(){
 
	$query = $this->db->query("select * FROM lit_el_tab_video order by id asc");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				    'id' => $row->id,
	                'nama_upload_video'=> $row->nama_upload_video,
	              	            
				);
	        }
	     return $list_data;
	}


	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_id(){
	$sql = $this->db->query("SELECT MAX(id)+1 AS id  FROM lit_tab_upload_video")->row_array();
	$idnya = $sql['id'];
	return $idnya;
	}

	//ini method untuk menyimpan data upload_video baru
	public function pro_add_upload_video($id,$nm_upload_video){
	$query = $this->db->query("insert into lit_tab_upload_video (id,nama_upload_video) VALUES ('$id','$nm_upload_video')");
				$location = $this->uri->segment(1);
				$sqldatas = $this->db->last_query();
				$sqldata = $this->db->escape_str($sqldatas);
				$user_ip = $this->lit_app_lib->getUserIP();
				$sqllog = $this->db->query("insert into lit_logging (id,name,ip_address,wtd,sqldata,waktu,isread) 
				values (null,'$_SESSION[username] - $_SESSION[ses_personnel_id]','$user_ip','$location::add','$sqldata',now(),'0')");         
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	public function upload_video_update($id){
		$query = $this->db->query("select * from lit_tab_upload_video where id = '$id' ");
		return $query;
	}

	public function upload_video_delete($id){
		$query = $this->db->query("delete from lit_tab_upload_video where id = '$id' ");
		$location = $this->uri->segment(1);
		$sqldatas = $this->db->last_query();
		$sqldata = $this->db->escape_str($sqldatas);
		$user_ip = $this->lit_app_lib->getUserIP();
		$sqllog = $this->db->query("insert into lit_logging (id,name,ip_address,wtd,sqldata,waktu,isread) 
		values (null,'$_SESSION[username] - $_SESSION[ses_personnel_id]','$user_ip','$location::del','$sqldata',now(),'0')");   
		return $query;
	}

	public function pro_update_upload_video($id,$nm_upload_video){
		$query = $this->db->query("update lit_tab_upload_video set nama_upload_video = '$nm_upload_video' where id = '$id'");
		$location = $this->uri->segment(1);
		$sqldatas = $this->db->last_query();
		$sqldata = $this->db->escape_str($sqldatas);
		$user_ip = $this->lit_app_lib->getUserIP();
		$sqllog = $this->db->query("insert into lit_logging (id,name,ip_address,wtd,sqldata,waktu,isread) 
		values (null,'$_SESSION[username] - $_SESSION[ses_personnel_id]','$user_ip','$location::edit','$sqldata',now(),'0')");         
		return $query;
	}
	
}
