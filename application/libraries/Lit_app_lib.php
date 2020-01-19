<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lit_app_lib {
	  
    public function penulis(){
		echo "Veri Arinal";
		echo "Senior Software Engineer"; 
		echo "PT. Langit Infotama!";
		echo "Date Created 10 Juli 2016";
	}
	
	public function CheckAuthoritation($pa)
	{
		$CI =& get_instance();
        $usernya = $CI->session->userdata('username');
        $sql = $CI->db->query("SELECT * FROM core_identity_user WHERE user_id = '$usernya'");
		foreach ($sql->result() as $row){
			    $uv = substr($row->lit_authority, $pa, 1);                
        }
		return $uv;		
	}
	
        function validasi()
        {
		$this->load->library('lit_app_lib');
		$valid=$this->lit_app_lib->CheckAuthoritation(14);
		if($valid == 0){ // not allowed
				echo "<script language=javascript>
	                    alert('Anda tidak berhak mengakses halaman ini.');
	                    history.go(-1);
	                 </script>";
			}
		elseif($valid == 1){ // allowed
		     $flagEdit='true';	
		}
		elseif($valid == 2){ // read only
		     $flagEdit='false';	
		}
	}

	function getUserIP()
		{
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];

			if(filter_var($client, FILTER_VALIDATE_IP))
				{
					$ip = $client;
				}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
				{
					$ip = $forward;
				}
			else
				{
					$ip = $remote;
				}
			return $ip;
		}
		
		function getNama($id)
		{
			$CI =& get_instance();
			$sql = $CI->db->query("SELECT name_full FROM human_pa_md_emp_personal WHERE personnel_id = '$id'");
			foreach ($sql->result() as $row){
			    $uv = $row->name_full;                
			}
			return $uv;
		}
		
		function getPosisi($id)
		{
			$CI =& get_instance();
			$sql = $CI->db->query("SELECT * FROM lit_tab_posisi WHERE personnel_id = '$id'");
			foreach ($sql->result() as $row){
			    $uv = $row->name_position;                
			}
			return $uv;
		}
		
        function getUker($id)
		{
			$CI =& get_instance();
			$sql = $CI->db->query("SELECT * FROM lit_tab_posisi WHERE personnel_id = '$id'");
			foreach ($sql->result() as $row){
			    $uv = $row->nama_unitkerja;                
			}
			return $uv;
		}
			function tanggal($tgl){
				if(!empty($tgl)){
				$extgstart_date = substr($tgl,0,2);
                $exblstart_date = substr($tgl,3,2);
                $exthstart_date = substr($tgl,6,4);
                $tanggal = $exthstart_date.$exblstart_date.$extgstart_date;
				return $tanggal;
				}
			}
		
}
