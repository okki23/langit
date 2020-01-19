<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->model('model_login');
		if($this->session->userdata('username') != ''){
			$this->session->sess_destroy();
			redirect(base_url('login/logout'));
		}
	}


	public function index()	{
		$error = '';
		$data = array('judul'=>'Human Capital Information System',
					  'error'=>$error,
					  'footer'=>'© 2017. Langit Infotama');
		$this->load->view('login_view',$data);
 
		 
	}

	function encrypt($string, $keynya){
		$string=$encrypted_string=openssl_encrypt($string,"AES-128-ECB",$keynya);		
		return $string;
		}
		
	function decrypt($string, $keynya){
			// Decrypt
			$string=$decrypted_string=openssl_decrypt($string,"AES-128-ECB",$keynya);
			return $string;
		}



	public function auth(){
		// echo $this->encrypt($this->input->post('password',TRUE),'LIT2019');exit;
		$username = addslashes($this->input->post('username',TRUE));
		$password = $this->encrypt($this->input->post('password',TRUE),'LIT2019');
        $sql_login = $this->model_login->cek_auth($username,$password);
        $date = date('Y-m-d');




if (preg_match('/[\'^\£$%&*()}{@#~?><>,|=_+¬-]/', $this->input->post('username',TRUE)))
{
     $this->session->set_flashdata('pesan','Tidak boleh menggunakan Spesial karakter');
		            $error = 'Tidak boleh menggunakan Spesial karakter';
		            redirect(base_url('login'));
}else{

		if($sql_login < 1){
		 	$user_ip = $this->lit_app_lib->getUserIP();
            $sqlpersonelid =  $this->db->query("select id from lit_logging where name = '$username' and ip_address = '$user_ip' and wtd = 'login::login' and DATE_FORMAT(waktu, '%Y-%m-%d') = '$date' ");
            $availpersonelid = $sqlpersonelid->num_rows();
            $getpersonelid = $sqlpersonelid->row();
            if($availpersonelid > 3){
                $sql_login = $this->model_login->block($username);
                $this->session->set_flashdata('pesan','Akun anda kami Non Aktifkan, silahkan hubungi bagian SDM');
		            $error = 'Akun anda kami Non Aktifkan, silahkan hubungi bagian SDM';
		            redirect(base_url('login'));
            }else{
                $this->session->set_flashdata('pesan','Username atau Password Salah,Ulangi!');
		            $error = 'username atau password salah';
		            redirect(base_url('login'));
            }    
          
		}else{
			$error = '';
			$this->session->set_flashdata('pesan','Login Sukses!');
			// echo 'ad';exit;
			$sql_accinfo = $this->model_login->get_account_info($username,$password);
			$data = array('username'=>$sql_accinfo->user_id,
			'ses_lit_level_user'=>$sql_accinfo->lit_level_user,
			'ses_personnel_id'=>$sql_accinfo->personnel_id,
			'ses_code_position'=>$sql_accinfo->lit_code_position,
			'ses_lit_code_core_orm'=>$sql_accinfo->lit_code_core_orm,
			//'ses_lit_level_user'=>$sql_accinfo->lit_level_user,
			'ses_lit_code_atasan'=>$this->get_kodeposisiatasan($sql_accinfo->personnel_id),
			'ses_lit_code_bawahan'=>$this->get_kodeposisibawahan($sql_accinfo->personnel_id));
			$this->model_login->update_user_logon($username);
			$this->session->set_userdata($data);
			redirect(base_url('dashboard'));
 
		    
		}
	}
	}
	
	function get_kodeposisiatasan($kode){
	$sql = $this->db->query("SELECT lit_code_position FROM `lit_tab_posisi` WHERE personnel_id='$kode'")->row_array();
	$formulanya = $sql['lit_code_position'];
	$posisi=strpos($formulanya,"00");
	
	return substr($formulanya,0,$posisi-2);
	}
	
	function get_kodeposisibawahan($kode){
	$sql = $this->db->query("SELECT lit_code_position FROM `lit_tab_posisi` WHERE personnel_id='$kode'")->row_array();
	$formulanya = $sql['lit_code_position'];
	$posisi=strpos($formulanya,"00");
	
	return substr($formulanya,0,$posisi);
	}
	
	public function logout(){
		$this->session->sess_destroy($data);
	$this->session->set_flashdata('pesan','Anda Telah Keluar!');
		redirect(base_url('login'));
	}


	public function change_pass_view(){

	}

	public function change_pass_action(){
		
	}
}
