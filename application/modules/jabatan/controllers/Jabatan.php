<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model jabatan jika memang controller butuh transaksi data
		$this->load->model('model_jabatan');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		//if($this->session->userdata('username') == ''){
		//	redirect(base_url('login'));
		//}
		 
	}


	public function get_all_jabatan_json(){
		
		$data = json_encode($this->model_jabatan->get_all_jabatan_json());
		
	echo "{\"records\":" . $data . "}";
	}
	public function get_chart_jabatan_json(){
		
		echo json_encode($this->model_jabatan->get_chart_jabatan_json());
		
	}
	
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//check authority user
		$valid = $this->lit_app_lib->CheckAuthoritation(0);		
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
		$data_employee = $this->model_jabatan->get_all_jabatan();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                      'location'=>$location,
					  'data_employee'=>$data_employee,
					  'flagAdd'=>$flagAdd,
					  'flagEdit'=>$flagEdit,
					  'flagDel'=>$flagDel,
					  'footer'=>'© 2016. Langit Infotama');		
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah

		//$this->session->set_flashdata('pesan','');
		
		$this->load->view('jabatan/jabatan_view',$data);
		 

		 
	}

	public function add_jabatan(){
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		//$last_personnel_id = $this->model_jabatan->get_last_personnel_id();
        $location = $this->uri->segment(1);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                      'location'=>$location,
					  'footer'=>'© 2016. Langit Infotama');	
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah
		$this->load->view('jabatan/jabatan_add',$data);
	}

		public function pro_add_jabatan(){
		//ini adalah tipe parsingan data si CI
		$id =   $this->model_jabatan->get_last_id();
		//$kode_jabatan =   $this->input->post('kode_jabatan');
		//echo ;echo exit;
		$nm_jabatan =   $this->input->post('nm_jabatan');
		

		$sqlinsert = $this->model_jabatan->pro_add_jabatan($id,$nm_jabatan);
		$link = base_url('jabatan');
		
                
		echo "<script language=javascript>
				alert('Simpan Berhasil');
		        window.location='$link';
		      </script>";
                
		
	}

	public function jabatan_update(){
		$id = $this->uri->segment(3);
        $location = $this->uri->segment(1);
	 	//$this->model_jabatan->jabatan_update($id);
	 	$data_employee = $this->model_jabatan->jabatan_update($id);
	 	$error = '';
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
	                  'id'=>$id,
	                  'location'=>$location,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('jabatan/jabatan_edit',$data);
	}

	public function pro_update_jabatan(){
		$id =   $this->input->post('id');
		//$kode_jabatan =   $this->input->post('kode_jabatan');
		$nm_jabatan =   $this->input->post('nm_jabatan');
		
		$sqlupdate = $this->model_jabatan->pro_update_jabatan($id,$nm_jabatan);
		$link = base_url('jabatan');
		
		echo "<script language=javascript>
				alert('Perbaikan Berhasil');
				window.location='$link';
		      </script>";

	}
        public function jabatan_detail(){
            $id = $this->uri->segment(3);
            $location = $this->uri->segment(2);
            //$infojabatan = $this->model_jabatan->jabatan_update($id);
			$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$id' order by start_date desc limit 1")->row_array();
			$namajabatan = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
										'namajabatan'=>$namajabatan,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
                                          'personnel_id'=>$id,
                                          'location'=>$location,
					 
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('jabatan/jabatan_detail',$data);
        }
	public function jabatan_delete(){
		$id = $this->uri->segment(3);
		$this->model_jabatan->jabatan_delete($id);
                $link = base_url('jabatan');
                 echo "<script language=javascript>
				alert('Hapus Berhasil');
		        window.location='$link';
		      </script>";
                
                /*
		echo json_encode($this->model_jabatan->jabatan_delete($id));
		//$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		// redirect(base_url('jabatan'));
                
                 */

	}
	
	

	 
}
