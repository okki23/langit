<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload_video extends CI_Controller {

	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model upload_video jika memang controller butuh transaksi data
		$this->load->model('m_upload_video');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		//if($this->session->userdata('username') == ''){
		//	redirect(base_url('login'));
		//}
		 
	}


	public function get_all_upload_video_json(){
		
		$data = json_encode($this->m_upload_video->get_all_upload_video_json());
		
	echo "{\"records\":" . $data . "}";
	}
	public function get_chart_upload_video_json(){
		
		echo json_encode($this->m_upload_video->get_chart_upload_video_json());
		
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
		$data_employee = $this->m_upload_video->get_all_upload_video();
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
		
		$this->load->view('upload_video/upload_video_view',$data);
		 

		 
	}

	public function add_upload_video(){
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		//$last_personnel_id = $this->m_upload_video->get_last_personnel_id();
        $location = $this->uri->segment(1);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                      'location'=>$location,
					  'footer'=>'© 2016. Langit Infotama');	
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah
		$this->load->view('upload_video/upload_video_add',$data);
	}

		public function pro_add_upload_video(){
		//ini adalah tipe parsingan data si CI
		$id =   $this->m_upload_video->get_last_id();
		//$kode_upload_video =   $this->input->post('kode_upload_video');
		//echo ;echo exit;
		$nm_upload_video =   $this->input->post('nm_upload_video');
		

		$sqlinsert = $this->m_upload_video->pro_add_upload_video($id,$nm_upload_video);
		$link = base_url('upload_video');
		
                
		echo "<script language=javascript>
				alert('Simpan Berhasil');
		        window.location='$link';
		      </script>";
                
		
	}

	public function upload_video_update(){
		$id = $this->uri->segment(3);
        $location = $this->uri->segment(1);
	 	//$this->m_upload_video->upload_video_update($id);
	 	$data_employee = $this->m_upload_video->upload_video_update($id);
	 	$error = '';
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
	                  'id'=>$id,
	                  'location'=>$location,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('upload_video/upload_video_edit',$data);
	}

	public function pro_update_upload_video(){
		$id =   $this->input->post('id');
		//$kode_upload_video =   $this->input->post('kode_upload_video');
		$nm_upload_video =   $this->input->post('nm_upload_video');
		
		$sqlupdate = $this->m_upload_video->pro_update_upload_video($id,$nm_upload_video);
		$link = base_url('upload_video');
		
		echo "<script language=javascript>
				alert('Perbaikan Berhasil');
				window.location='$link';
		      </script>";

	}
        public function upload_video_detail(){
            $id = $this->uri->segment(3);
            $location = $this->uri->segment(2);
            //$infoupload_video = $this->m_upload_video->upload_video_update($id);
			$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$id' order by start_date desc limit 1")->row_array();
			$namaupload_video = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
										'namaupload_video'=>$namaupload_video,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
                                          'personnel_id'=>$id,
                                          'location'=>$location,
					 
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('upload_video/upload_video_detail',$data);
        }
	public function upload_video_delete(){
		$id = $this->uri->segment(3);
		$this->m_upload_video->upload_video_delete($id);
                $link = base_url('upload_video');
                 echo "<script language=javascript>
				alert('Hapus Berhasil');
		        window.location='$link';
		      </script>";
                
                /*
		echo json_encode($this->m_upload_video->upload_video_delete($id));
		//$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		// redirect(base_url('upload_video'));
                
                 */

	}
	
	

	 
}
