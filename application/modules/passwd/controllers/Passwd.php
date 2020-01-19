<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passwd extends CI_Controller {

	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model user jika memang controller butuh transaksi data
		$this->load->model('model_passwd');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		/*
		 if ($this->session->userdata('dt13') =='1') {
											base_url('user'); 
										}elseif ($this->session->userdata('dt13') =='2') {
											base_url('user'); 
										}else {
											$link = base_url('dashboard');
										echo "<script language=javascript>
												alert('Maaf, Anda Tidak Berhak Mengakses Menu Ini');
										        window.location='$link';
										      </script>";
						         }
         */
	}

	public function get_all_user_json(){
		$data_employee = $this->model_user->get_all_user_json();
		$total = count($this->model_user->get_all_user_json());
		$data = json_encode($this->model_user->get_all_user_json());
		//echo json_encode($this->model_user->get_all_user_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	echo "{\"records\":" . $data . "}";
	}
	
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		$location = $this->uri->segment(1);
		$data_employee = $this->model_passwd->get_all_user();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');		
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah

		//$this->session->set_flashdata('pesan','');
		
		//$this->load->view('passwd/passwd_view',$data);
		//$this->load->view('passwd/passwd_edit',$data); 
		$this->user_update();
		 
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
		

	public function user_update(){
		$user_id = $this->session->userdata('username'); //$this->uri->segment(3);
        //$location = $this->uri->segment(1);
	 	//$this->model_pegawai->pegawai_update($id);
	 	$data_employee = $this->model_passwd->user_update($user_id);
	 	$error = '';
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                      'user_id'=>$user_id,
                      'location'=>'',
                      'opt_orm'=>'',
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('passwd/passwd_edit',$data);
	}

	public function pro_update_user(){
			
			$instance = $this->input->post('instance');
			$status_process = $this->input->post('status_process');
			$user_id = $this->input->post('user_id');
			$lit_auth_password = $this->encrypt($this->input->post('lit_auth_password'),'4sdp2019');
			

			$pass=$this->input->post('lit_auth_password');
$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number    = preg_match('@[0-9]@', $pass);

if(!$uppercase || !$lowercase || !$number || strlen($pass)<=6){
    $link = base_url('passwd');
		//jika berhasil maka pindah ke halaman view user
		//$this->session->set_flashdata('pesan','Data Berhasil Dimasukkan');
		 //redirect(base_url('user'));
		echo "<script language=javascript>
				alert('password harus lebih dari 6 karakter, mengandung huruf BESAR, huruf kecil dan angka');
		        window.location='$link';
		      </script>";
}else{
    $sqlupdate = $this->model_passwd->pro_update_user($instance,$user_id,$lit_auth_password);
	
		$link = base_url('dashboard');

		//jika berhasil maka pindah ke halaman view pegawai
		//echo $this->session->set_flashdata('pesan','Data Berhasil Dirubah');
		//echo 2;
		//redirect(base_url('pegawai'));
		//
		echo "<script language=javascript>
				alert('Perbaikan Berhasil');
				window.location='$link';
		      </script>";

	}
}


		
	

	 
}
