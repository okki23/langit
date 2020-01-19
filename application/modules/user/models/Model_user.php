<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start('ob_gzhandler');
class Model_user extends CI_Model {


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

public function get_all_pegawai_json_cek(){
 
	$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as gender,date_format(start_date,'%d %M %Y') as tanggalmasuknya from human_pa_md_emp_personal order by personnel_id asc");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				    'personnel_id' => $row->personnel_id,
	                'name_full'   => $row->name_full,
	                'start_date'=> $row->tanggalmasuknya,
					//'opsi'=> '<a href="'.base_url('pegawai/pegawai_detail/').'/'.$row->personnel_id.'""> Pilih</a>'
					//'opsi'=>'<input type="hidden" value="'.$row->personnel_id.'-'.$row->name_full.'"><a id="btnsel1" class="btnselect">Pilih</a>'
					'opsi'=>'<input type="hidden"><a id="btnsel1" class="btnselect">Pilih</a>'
	           
				);
	        }
	     return $list_data;
	}
	
	public function get_all_user_json(){
 /*
	$query = $this->db->query("SELECT core_identity_user.instance,human_pa_md_emp_personal.name_full,core_identity_user.status_process, logon_success_last_date,user_id,lit_auth_password, lit_authority, lit_code_core_orm, 
case when lit_level_user = '3' then 'Super Admin' when 
lit_level_user = '2' then 'Admin' when 
lit_level_user = '1' then 'Pegawai' end as status 
FROM core_identity_user left join human_pa_md_emp_personal on core_identity_user.personnel_id=human_pa_md_emp_personal.personnel_id");
*/
$query = $this->db->query("SELECT human_pa_md_emp_personal.name_full, logon_success_last_date,user_id, case when lit_level_user = '3' then 'Super Admin' when lit_level_user = '2' then 'Admin' when lit_level_user = '1' then 'Pegawai' end as status FROM core_identity_user left join human_pa_md_emp_personal on core_identity_user.personnel_id=human_pa_md_emp_personal.personnel_id where human_pa_md_emp_personal.lit_employee_status in ('I','A')");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				    'user_id' => $row->user_id,
	                'logon_success_last_date'   => $row->logon_success_last_date,
	                'status'=> $row->status,
	                'karyawan'=> $row->name_full
	                //'opsi'=> '<a href="'.base_url('user/user_delete/').'/'.$row->user_id.'""> <img src="'.base_url('assets/images/delete.png').'" title="Delete"> </a>
	                //<a href="'.base_url('user/user_update/').'/'.$row->user_id.'""> <img src="'.base_url('assets/images/edit.png').'" title="Edit"></a>',
	                //<a href="'.base_url('pegawai/pegawai_detail/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/images/view.png').'" title="Profile"></a>'
	                
					//,
	                //'opsidelete'=> '<a href="'.base_url('user/user_delete/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/jqwidget/images/recycle.png').'"> </a>',
	                //'opsiupdate'=> '<a href="'.base_url('user/user_update/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/jqwidget/images/settings.png').'"></a>'

	            
				);
	        }
	     return $list_data;
	}



public function listing()
	{
			$sql = $this->db->query("SELECT personnel_id, lit_nik, name_full FROM human_pa_md_emp_personal");
		return $sql;		
	}


	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_personnel_id(){
	$query = $this->db->query("SELECT SUBSTR(MAX(user_id),-8) AS id  FROM core_identity_user");

	return $query;
	}

	//ini method untuk menyimpan data user baru
	public function pro_add_user($instance,$user_id,$lit_auth_password,$lit_code_core_orm,$lit_level_user,$auth,$status_process,$personnel_id){
	//$personnel_idnya=substr($personnel_id,0,strpos($personnel_id,"-"));
	//echo $personnel_idnya;echo exit;

	$query = $this->db->query("insert into core_identity_user (instance, user_id,lit_auth_password,lit_code_core_orm,lit_level_user,lit_authority,status_process,personnel_id) 
			values ('$instance', '$user_id','$lit_auth_password','$lit_code_core_orm','$lit_level_user','$auth','$status_process','$personnel_id')");
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

	public function user_update($user_id){
		$query = $this->db->query("select *,substr(lit_authority,1,1) as dt11,
									substr(lit_authority,2,1) as dt12,
									substr(lit_authority,3,1) as dt13,
									substr(lit_authority,4,1) as dt14,
									substr(lit_authority,5,1) as dt15,	
									substr(lit_authority,6,1) as dt16,									
									substr(lit_authority,7,1) as dt21,									
									substr(lit_authority,8,1) as dt22,									
									substr(lit_authority,9,1) as dt23,									
									substr(lit_authority,10,1) as dt31,									
									substr(lit_authority,11,1) as dt41,									
									substr(lit_authority,12,1) as dt42,									
									substr(lit_authority,13,1) as dt43,									 
									substr(lit_authority,14,1) as ad51,
									substr(lit_authority,15,1) as ad52,
									substr(lit_authority,16,1) as ad53,
									substr(lit_authority,17,1) as ad54,
									substr(lit_authority,18,1) as ad55,
									substr(lit_authority,19,1) as ad56,
									substr(lit_authority,20,1) as ad57,
									substr(lit_authority,21,1) as ad58,
									substr(lit_authority,22,1) as ad59,
									substr(lit_authority,23,1) as ad510,
									substr(lit_authority,24,1) as ad511,
									substr(lit_authority,25,1) as ad512,
									substr(lit_authority,26,1) as ad513,
									substr(lit_authority,27,1) as ad514,
									substr(lit_authority,28,1) as ad515,
									substr(lit_authority,29,1) as ad516,
									substr(lit_authority,30,1) as ad517,
									substr(lit_authority,31,1) as ad518,
									substr(lit_authority,32,1) as ad61,
									substr(lit_authority,33,1) as ad62,
									substr(lit_authority,34,1) as ad63,
									substr(lit_authority,35,1) as ad64,
									substr(lit_authority,36,1) as ad65,
									substr(lit_authority,37,1) as ad66,
									substr(lit_authority,38,1) as ad71,

									substr(lit_authority,39,1) as ad81,
									substr(lit_authority,40,1) as ad82,
									substr(lit_authority,41,1) as ad83,
									substr(lit_authority,42,1) as ad84,	
									substr(lit_authority,43,1) as ad85,
									substr(lit_authority,44,1) as ad86									  
									from core_identity_user where user_id = '$user_id' ");
		return $query;
	}

	public function user_delete($user_id){
		$query = $this->db->query("delete from core_identity_user where user_id = '$user_id' ");
		$location = $this->uri->segment(1);
		$sqldatas = $this->db->last_query();
		$sqldata = $this->db->escape_str($sqldatas);
		$user_ip = $this->lit_app_lib->getUserIP();
		$sqllog = $this->db->query("insert into lit_logging (id,name,ip_address,wtd,sqldata,waktu,isread) 
		values (null,'$_SESSION[username] - $_SESSION[ses_personnel_id]','$user_ip','$location::del','$sqldata',now(),'0')");   
		return $query;
	}

	
	public function pro_update_user($instance,$user_id,$lit_auth_password,$lit_code_core_orm,$lit_level_user,$auth,$status_process,$personnel_id,$pass){
        //echo $lit_auth_password;echo exit;
        if($lit_auth_password=='zilXyx+BwhqYa1g6u85A4w==') //kosong (tidak isi password)
        {
			$query = $this->db->query("update core_identity_user set instance = '$instance', lit_code_core_orm = '$lit_code_core_orm', lit_level_user = '$lit_level_user', lit_authority='$auth', status_process = '$status_process', personnel_id = '$personnel_id' where user_id = '$user_id'");
			}
		else
		{	

		
$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number    = preg_match('@[0-9]@', $pass);

if(!$uppercase || !$lowercase || !$number || strlen($pass)<=6){
    $link = base_url('user/user_update/'.$user_id);
		//jika berhasil maka pindah ke halaman view user
		//$this->session->set_flashdata('pesan','Data Berhasil Dimasukkan');
		 //redirect(base_url('user'));
		echo "<script language=javascript>
				alert('password harus lebih dari 6 karakter, mengandung huruf BESAR, huruf kecil dan angka');
		        window.location='$link';
		      </script>";
}else{
   $query = $this->db->query("update core_identity_user set instance = '$instance', lit_auth_password = '$lit_auth_password', lit_code_core_orm = '$lit_code_core_orm', lit_level_user = '$lit_level_user', lit_authority='$auth', status_process = '$status_process', personnel_id = '$personnel_id' where user_id = '$user_id'");
}

		
		}
		$location = $this->uri->segment(1);
		$sqldatas = $this->db->last_query();
		$sqldata = $this->db->escape_str($sqldatas);
		$user_ip = $this->lit_app_lib->getUserIP();
		$sqllog = $this->db->query("insert into lit_logging (id,name,ip_address,wtd,sqldata,waktu,isread) 
		values (null,'$_SESSION[username] - $_SESSION[ses_personnel_id]','$user_ip','$location::edit','$sqldata',now(),'0')");   
		return $query;
	}

	public function opt_orm(){
	$sql = $this->db->query("select * from view_pusat union all select * from view_cabang");
	return $sql;
	}

	public function dt11(){
	$sql = $this->db->query("SELECT * FROM core_identity_user WHERE SUBSTR(lit_authority,1)");
	return $sql;
	}

	public function aktif($user_id){
		$query = $this->db->query("update core_identity_user set status_locked=0 where user_id = '$user_id'");
		$sql = $this->db->query("delete from lit_logging where name = '$user_id' and wtd = 'login::login'");
		return $query;
		return $sql;
	}
}
