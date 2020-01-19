<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_passwd extends CI_Model {


	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data user
	public function get_all_user(){
	global $db;
	$query = $this->db->query("SELECT instance,status_process, logon_success_last_date,user_id,lit_auth_password, lit_authority, lit_code_core_orm, 
case when lit_level_user = '3' then 'Super Admin' when 
lit_level_user = '2' then 'Admin' when 
lit_level_user = '1' then 'pegawai' end as status 
FROM core_identity_user");

 	return $query;
	}

	public function get_all_user_json(){
 
	$query = $this->db->query("SELECT instance,status_process, logon_success_last_date,user_id,lit_auth_password, lit_authority, lit_code_core_orm, 
case when lit_level_user = '3' then 'Super Admin' when 
lit_level_user = '2' then 'Admin' when 
lit_level_user = '1' then 'Pegawai' end as status 
FROM core_identity_user");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				    'user_id' => $row->user_id,
	                'logon_success_last_date'   => $row->logon_success_last_date,
	                'status'=> $row->status,
	                'opsi'=> '<a href="'.base_url('user/user_delete/').'/'.$row->user_id.'""> <img src="'.base_url('assets/images/delete.png').'" title="Delete"> </a>
	                <a href="'.base_url('user/user_update/').'/'.$row->user_id.'""> <img src="'.base_url('assets/images/edit.png').'" title="Edit"></a>',
	                //<a href="'.base_url('pegawai/pegawai_detail/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/images/view.png').'" title="Profile"></a>'
	                
					//,
	                //'opsidelete'=> '<a href="'.base_url('user/user_delete/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/jqwidget/images/recycle.png').'"> </a>',
	                //'opsiupdate'=> '<a href="'.base_url('user/user_update/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/jqwidget/images/settings.png').'"></a>'

	            
				);
	        }
	     return $list_data;
	}





	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_personnel_id(){
	$query = $this->db->query("SELECT SUBSTR(MAX(user_id),-8) AS id  FROM core_identity_user");

	return $query;
	}

	//ini method untuk menyimpan data user baru
	public function pro_add_user($instance,$user_id,$lit_auth_password,$lit_code_core_orm,$lit_level_user,$auth,$status_process){
	$query = $this->db->query("insert into core_identity_user (instance, user_id,lit_auth_password,lit_code_core_orm,lit_level_user,lit_authority,status_process) 
			values ('$instance', '$user_id','$lit_auth_password','$lit_code_core_orm','$lit_level_user','$auth','$status_process')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	public function user_update($user_id){
		$query = $this->db->query("select *,substr(lit_authority,1,1) as dt11,
									substr(lit_authority,2,1) as dt12,
									substr(lit_authority,3,1) as dt13,
									substr(lit_authority,4,1) as dt21,
									substr(lit_authority,5,1) as dt31,
									substr(lit_authority,6,1) as dt32,
									substr(lit_authority,7,1) as ad41,
									substr(lit_authority,8,1) as ad42,
									substr(lit_authority,9,1) as ad43,
									substr(lit_authority,10,1) as ad44,
									substr(lit_authority,11,1) as ad45,
									substr(lit_authority,12,1) as ad46,
									substr(lit_authority,13,1) as ad47,
									substr(lit_authority,14,1) as ad48,
									substr(lit_authority,15,1) as ad49,
									substr(lit_authority,16,1) as ad410,
									substr(lit_authority,17,1) as ad411,
									substr(lit_authority,18,1) as ad412,
									substr(lit_authority,19,1) as ad413,
									substr(lit_authority,20,1) as ad414,
									substr(lit_authority,21,1) as ad415,
									substr(lit_authority,22,1) as ad416,
									substr(lit_authority,23,1) as ad417,
									substr(lit_authority,24,1) as ad418,
									substr(lit_authority,25,1) as ad51,
									substr(lit_authority,26,1) as ad52,
									substr(lit_authority,27,1) as ad53,
									substr(lit_authority,28,1) as ad54,
									substr(lit_authority,29,1) as ad55   
									from core_identity_user where user_id = '$user_id' ");
		return $query;
	}

	public function user_delete($user_id){
		$query = $this->db->query("delete from core_identity_user where user_id = '$user_id' ");
		return $query;
	}

	
	public function pro_update_user($instance,$user_id,$lit_auth_password){
		$query = $this->db->query("update core_identity_user set instance = '$instance', lit_auth_password = '$lit_auth_password' where user_id = '$user_id'");
		return $query;
	}

	public function opt_orm(){
	$sql = $this->db->query("SELECT * FROM core_orm WHERE SUBSTR(code,6,8) ORDER BY name asc");
	return $sql;
	}

	public function dt11(){
	$sql = $this->db->query("SELECT * FROM core_identity_user WHERE SUBSTR(lit_authority,1)");
	return $sql;
	}
}
