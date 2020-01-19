<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function __construct(){
		parent ::__construct();
		 
	}
	public function cek_auth($username,$password)	{
		 $query = $this->db->query("select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = '$username' AND lit_auth_password = '$password' and status_locked = 0 ");
 		 $queryku = $query->num_rows(); 
 		   $location = 'login';
		$sqldatas = $this->db->last_query();
		$sqldata = $this->db->escape_str($sqldatas);
		$user_ip = $this->lit_app_lib->getUserIP();
		$sqllog = $this->db->query("insert into lit_logging (id,name,ip_address,wtd,sqldata,waktu,isread) 
		values (null,'$username','$user_ip','$location::login','$sqldata',now(),'0')");
 		 return $queryku;
	 	 
	}


	public function get_account_info($username,$password){
		$queryacc = $this->db->query("select a.user_id,a.lit_auth_password,a.lit_level_user,a.personnel_id,b.lit_code_position,a.lit_code_core_orm from core_identity_user a
										inner join lit_tab_posisi b ON a.personnel_id = b.personnel_id
										where a.user_id = '$username' AND a.lit_auth_password = '$password' and a.status_locked = 0 ");

		if($queryacc->num_rows()==0)
		{
			
		  $queryacc = $this->db->query("select a.user_id,a.lit_auth_password,a.lit_level_user,a.personnel_id,a.lit_code_core_orm ,'NA' as lit_code_position from core_identity_user a
										where a.user_id = '$username' AND a.lit_auth_password = '$password' and a.status_locked = 0 ");			
		  $getqueryacc = $queryacc->row();
			}
		else
		{
		  $getqueryacc = $queryacc->row();
			}	
		
		return $getqueryacc;
	}
	
	public function update_user_logon($username){
		$date = date('Y-m-d');
		$query = $this->db->query("update core_identity_user set logon_success_last_date=now() where user_id = '$username'");		
		$sql = $this->db->query("delete from lit_logging where name = '$user_id' and wtd = 'login::login' and DATE_FORMAT(waktu, '%Y-%m-%d') = '$date'");
		return $query;
	}

	public function block($username){
		$query = $this->db->query("update core_identity_user set status_locked=1 where user_id = '$username'");
		return $query;
	}
}
