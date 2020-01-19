<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model user jika memang controller butuh transaksi data
		$this->load->model('model_user');
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


	public function transaksi_id($param='') {
		$data = $this->model_user->get_last_personnel_id();
		$lastid = $data->row();
		$idnya = $lastid->id;
	 

            if($idnya=='') { // bila data kosong
                $ID = $param."00000001";
				//00000001
            }else {
                $MaksID = $idnya;
                $MaksID++;
                if($MaksID < 10) $ID = $param."0000000".$MaksID;  
                else if($MaksID < 100) $ID = $param."000000".$MaksID; 
                else if($MaksID < 1000) $ID = $param."00000".$MaksID;  
                else if($MaksID < 10000) $ID = $param."0000".$MaksID;  
				else if($MaksID < 100000) $ID = $param."000".$MaksID;
				else if($MaksID < 1000000) $ID = $param."00".$MaksID;
				else if($MaksID < 10000000) $ID = $param."0".$MaksID;
                else $ID = $MaksID;  
            }

            return $ID;
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

	public function get_all_user_json(){
//		$data_employee = $this->model_user->get_all_user_json();
	//	$total = count($this->model_user->get_all_user_json());
		$data = json_encode($this->model_user->get_all_user_json());
		//echo json_encode($this->model_user->get_all_user_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	echo "{\"records\":" . $data . "}";
	}
	
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//check authority user
		$valid = $this->lit_app_lib->CheckAuthoritation(4);
		switch ($valid)
		{
		  case "0":
			echo "<script language=javascript>
								alert('Anda tidak berhak mengakses halaman ini.');
								history.go(-1);
							 </script>";
			break;
		   case "1":
		    $flagAdd='true';
			$flagEdit='true';
			$flagDel='true';
			break;

		  case "2":
		    $flagAdd='false';
			$flagEdit='false';
			$flagDel='false';
			break;
		}
		$error = '';
		$location = $this->uri->segment(1);
		//$data_employee = $this->model_user->get_all_user();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'data_employee'=>'',
					  'flagAdd'=>$flagAdd,
					  'flagEdit'=>$flagEdit,
					  'flagDel'=>$flagDel,
					  'footer'=>'© 2016. Langit Infotama');		
		
		$this->load->view('user/user_view',$data);
		 

		 
	}

	public function add_user(){
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		//$last_personnel_id = $this->model_user->get_last_personnel_id();
		$location = $this->uri->segment(1);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'opt_orm'=>$this->model_user->opt_orm(),
					  'listing'=>$this->model_user->listing(),
					  'last_id'=>$this->transaksi_id(),
					  'footer'=>'© 2016. Langit Infotama');	

		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah
		$this->load->view('user/user_add',$data);
	}
	
	public function get_all_pegawai_json_cek(){
		$data = json_encode($this->model_user->get_all_pegawai_json_cek());		
		echo "{\"records\":" . $data . "}";
	}
	
		public function pro_add_user(){
		//ini adalah tipe parsingan data si CI
		$nik = $this->input->post('nik');
		$tanggal_masuk = $this->input->post('tanggal_masuk');
		//$stor_tanggal_masuk = date('Y-m-d',strtotime($tanggal_masuk));
		$dt11 = $this->input->post('dt11'); // 0 jabatan
		$dt12 = $this->input->post('dt12'); // 1 Posisi
		$dt13 = $this->input->post('dt13'); // 2 Lintasan
		$dt14 = $this->input->post('dt14'); // 3 Pelabuhan
		$dt15 = $this->input->post('dt15'); // 4 Manajemen User
		$dt16 = $this->input->post('dt16'); // 5 Setting Aplikasi
		
		$dt21 = $this->input->post('dt21'); // 6 Area
		$dt22 = $this->input->post('dt22'); // 7 Perspektif
		$dt23 = $this->input->post('dt23'); // 8 KPI

		$dt31 = $this->input->post('dt31'); // 9 Manajemen Organisasi

		$dt41 = $this->input->post('dt41'); // 10 Data Kapal
		$dt42 = $this->input->post('dt42'); // 11 Operasi Kapal
		$dt43 = $this->input->post('dt43'); // 12 Pindah Operasi Kapal

		$ad51 = $this->input->post('ad51');
		$ad52 = $this->input->post('ad52');
		$ad53 = $this->input->post('ad53');
		$ad54 = $this->input->post('ad54');
		$ad55 = $this->input->post('ad55');
		$ad56 = $this->input->post('ad56');
		$ad57 = $this->input->post('ad57');
		$ad58 = $this->input->post('ad58');
		$ad59 = $this->input->post('ad59');
		$ad510 = $this->input->post('ad510');
		$ad511 = $this->input->post('ad511');
		$ad512 = $this->input->post('ad512');
		$ad513 = $this->input->post('ad513');
		$ad514 = $this->input->post('ad514');
		$ad515 = $this->input->post('ad515');
		$ad516 = $this->input->post('ad516');
		$ad517 = $this->input->post('ad517');
		$ad518 = $this->input->post('ad518');

		$ad61 = $this->input->post('ad61');
		$ad62 = $this->input->post('ad62');
		$ad63 = $this->input->post('ad63');
		$ad64 = $this->input->post('ad64');
		$ad65 = $this->input->post('ad65');
		$ad66 = $this->input->post('ad66');
		$ad71 = $this->input->post('ad71');

		$ad81 = $this->input->post('ad81'); // digit 38 dari 0 
		$ad82 = $this->input->post('ad82'); // digit 39 dari 0
		$ad83 = $this->input->post('ad83'); // digit 40 dari 0
		$ad84 = $this->input->post('ad84'); // digit 41 dari 0
		$ad85 = $this->input->post('ad85'); // digit 42 dari 0
		$ad86 = $this->input->post('ad86'); // digit 43 dari 0

		
			//susunan menu harus sama dengan fungsi user_update() di model
			$auth = $dt11.$dt12.$dt13.$dt14.$dt15.$dt16.
					$dt21.$dt22.$dt23.
					$dt31.
					$dt41.$dt42.$dt43.
					$ad51.$ad52.$ad53.
					$ad54.$ad55.$ad56.
					$ad57.$ad58.$ad59.
					$ad510.$ad511.$ad512.
					$ad513.$ad514.$ad515.
					$ad516.$ad517.$ad518.
					$ad61.$ad62.$ad63.$ad64.$ad65.$ad66.
					$ad71.
					$ad81.$ad82.$ad83.$ad84.$ad85.$ad86;

			$instance = $this->input->post('instance');
			$status_process = $this->input->post('status_process');
			$user_id = $this->input->post('user_id');
			$lit_auth_password = $this->encrypt($this->input->post('lit_auth_password'),'4sdp2019');
			$lit_level_user = $this->input->post('lit_level_user');
			$lit_code_core_orm = $this->input->post('lit_code_core_orm');
			$personnel_id = $this->input->post('personnel_id');
			
 		//karena model terpisah jadi kita panggil method si model saja ,karena core model sudah dipanggil sama si construct diatas
		//jangan lupa parameter parsingan dimasukin

$pass=$this->input->post('lit_auth_password');
$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number    = preg_match('@[0-9]@', $pass);

if(!$uppercase || !$lowercase || !$number || strlen($pass)<=6){
    $link = base_url('user/add_user');
		//jika berhasil maka pindah ke halaman view user
		//$this->session->set_flashdata('pesan','Data Berhasil Dimasukkan');
		 //redirect(base_url('user'));
		echo "<script language=javascript>
				alert('password harus lebih dari 6 karakter, mengandung huruf BESAR, huruf kecil dan angka');
		        window.location='$link';
		      </script>";
}else{
    $sqlinsert = $this->model_user->pro_add_user($instance,$user_id,$lit_auth_password,$lit_code_core_orm,$lit_level_user,$auth,$status_process,$personnel_id);
		$link = base_url('user');
		//jika berhasil maka pindah ke halaman view user
		//$this->session->set_flashdata('pesan','Data Berhasil Dimasukkan');
		 //redirect(base_url('user'));
		echo "<script language=javascript>
				alert('Simpan Berhasil');
		        window.location='$link';
		      </script>";
}

		
				
	}

	public function user_update(){
		$user_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
	 	//$this->model_pegawai->pegawai_update($id);
	 	$data_employee = $this->model_user->user_update($user_id);
	 	$error = '';
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                      'user_id'=>$user_id,
                      'location'=>$location,
                      'opt_orm'=>$this->model_user->opt_orm(),
                       'listing'=>$this->model_user->listing(),
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('user/user_edit',$data);
	}

	public function pro_update_user(){
			
		$dt11 = $this->input->post('dt11');
		$dt12 = $this->input->post('dt12');
		$dt13 = $this->input->post('dt13');
		$dt14 = $this->input->post('dt14');
		$dt15 = $this->input->post('dt15');
		$dt16 = $this->input->post('dt16');

		$dt21 = $this->input->post('dt21');
		$dt22 = $this->input->post('dt22');
		$dt23 = $this->input->post('dt23');

		$dt31 = $this->input->post('dt31');

		$dt41 = $this->input->post('dt41');
		$dt42 = $this->input->post('dt42');
		$dt43 = $this->input->post('dt43');

		$ad51 = $this->input->post('ad51');
		$ad52 = $this->input->post('ad52');
		$ad53 = $this->input->post('ad53');
		$ad54 = $this->input->post('ad54');
		$ad55 = $this->input->post('ad55');
		$ad56 = $this->input->post('ad56');
		$ad57 = $this->input->post('ad57');
		$ad58 = $this->input->post('ad58');
		$ad59 = $this->input->post('ad59');
		$ad510 = $this->input->post('ad510');
		$ad511 = $this->input->post('ad511');
		$ad512 = $this->input->post('ad512');
		$ad513 = $this->input->post('ad513');
		$ad514 = $this->input->post('ad514');
		$ad515 = $this->input->post('ad515');
		$ad516 = $this->input->post('ad516');
		$ad517 = $this->input->post('ad517');
		$ad518 = $this->input->post('ad518');

		$ad61 = $this->input->post('ad61');
		$ad62 = $this->input->post('ad62');
		$ad63 = $this->input->post('ad63');
		$ad64 = $this->input->post('ad64');
		$ad65 = $this->input->post('ad65');
		$ad66 = $this->input->post('ad66');
		$ad71 = $this->input->post('ad71');


		$ad81 = $this->input->post('ad81'); // digit 38 dari 0 
		$ad82 = $this->input->post('ad82'); // digit 39 dari 0
		$ad83 = $this->input->post('ad83'); // digit 40 dari 0
		$ad84 = $this->input->post('ad84'); // digit 41 dari 0
		$ad85 = $this->input->post('ad85'); // digit 42 dari 0
		$ad86 = $this->input->post('ad86'); // digit 43 dari 0
					
			
			$auth = $dt11.$dt12.$dt13.$dt14.$dt15.$dt16.
					$dt21.$dt22.$dt23.
					$dt31.
					$dt41.$dt42.$dt43.
					$ad51.$ad52.$ad53.
					$ad54.$ad55.$ad56.
					$ad57.$ad58.$ad59.
					$ad510.$ad511.$ad512.
					$ad513.$ad514.$ad515.
					$ad516.$ad517.$ad518.
					$ad61.$ad62.$ad63.$ad64.$ad65.$ad66.
					$ad71.
					$ad81.$ad82.$ad83.$ad84.$ad85.$ad86;

			$instance = $this->input->post('instance');
			$status_process = $this->input->post('status_process');
			$user_id = $this->input->post('user_id');
			$lit_auth_password = $this->encrypt($this->input->post('lit_auth_password'),'4sdp2019');
			$pass = $this->input->post('lit_auth_password');
			$lit_level_user = $this->input->post('lit_level_user');
			$lit_code_core_orm = $this->input->post('lit_code_core_orm');
			$personnel_id = $this->input->post('personnel_id');
		$sqlupdate = $this->model_user->pro_update_user($instance,$user_id,$lit_auth_password,$lit_code_core_orm,$lit_level_user,$auth,$status_process,$personnel_id,$pass);
	
		$link = base_url('user');

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

	public function user_delete(){
		$user_id = $this->uri->segment(3);
		$this->model_user->user_delete($user_id);
		//echo json_encode($this->model_user->user_delete($user_id));
		//$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		// redirect(base_url('user'));
                $link = base_url('user');
                 echo "<script language=javascript>
				alert('Hapus Berhasil');
		        window.location='$link';
		      </script>";

	}


		public function aktif(){
		$user_id = $this->uri->segment(3);
		$this->model_user->aktif($user_id);
		//echo json_encode($this->model_user->user_delete($user_id));
		//$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		// redirect(base_url('user'));
                $link = base_url('user');
                 echo "<script language=javascript>
				alert('Berhasil Diaktifkan');
		        window.location='$link';
		      </script>";

	}
	
	public function user_importphoto(){
	
	$sql        =   $this->db->query("SELECT * FROM human_pa_md_emp_photo order by start_date desc limit 1")->row_array();
    $file   =   'images/'.$sql['personnel_id'].".jpg";
	$handle = fopen($file, 'a+');
	fwrite($handle, $sql['binary_data']); 
	//$result = $this->db->query("SELECT * FROM human_pa_md_emp_photo limit 1")->row_array();
	//echo json_encode($result);
				/*
		$query = "SELECT * FROM human_pa_md_emp_photo limit 1";
				$result = $db->Execute($query);
	            
				while ($row = $rs->FetchRow()){

					$file = 'images/'.$row['personnel_id'].".jpg";
					$handle = fopen($file, 'a+');

					
					fwrite($handle, $row['binary_data']); 
				      	
	            }
		echo json_encode($result);
		*/
	}

	 
}
