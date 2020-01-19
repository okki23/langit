<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start('ob_gzhandler');
class Visi_misi extends CI_Controller {

	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model nominatif jika memang controller butuh transaksi data
		$this->load->model('model_visi_misi');
		
		//echo $this->session->userdata('ses_personnel_id');echo exit;
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		//if($this->session->userdata('username') == ''){
		//	redirect(base_url('login'));
		//}
		 
	}


	public function get_all_nominatif_json(){
		//$data_employee = $this->model_visi_misi->get_all_nominatif_json();
		//$total = count($this->model_visi_misi->get_all_nominatif_json());
		$data = json_encode($this->model_visi_misi->get_all_nominatif_json($this->session->userdata('ses_lit_level_user'),$this->session->userdata('ses_personnel_id')));
		//echo json_encode($this->model_nominatif->get_all_nominatif_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	echo "{\"records\":" . $data . "}";
	}
	public function get_all_nominatif_json_cek(){
		$data = json_encode($this->model_visi_misi->get_all_nominatif_json_cek());		
		echo "{\"records\":" . $data . "}";
	}
	public function get_chart_nominatif_json(){
		//$data_employee = $this->model_nominatif->get_all_nominatif_json();
		//$total = count($this->model_nominatif->get_all_nominatif_json());
		echo json_encode($this->model_visi_misi->get_chart_nominatif_json());
		//echo json_encode($this->model_nominatif->get_all_nominatif_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	//echo "{\"records\":" . $data . "}";
	}
	
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
                $location = $this->uri->segment(1);
		//$data_employee = $this->model_nominatif->get_all_nominatif();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                      'location'=>$location,
                       'opt_orm'=>$this->model_visi_misi->opt_orm(),
					  'data_employee'=>'', //$data_employee,
					  'footer'=>'© 2016. Langit Infotama');		
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah

		//$this->session->set_flashdata('pesan','');
		
		$this->load->view('visi_misi/visi_misi',$data);
		 

		 
	}

	

	public function awak_print(){
		$kode_kapal = $this->uri->segment(3);
        $location = $this->uri->segment(1);
	 	//$this->model_nominatif->nominatif_update($id);
	 	$kode_kapal =   $this->input->post('kode_kapal');
		$link = base_url();
				echo "<script language=javascript>
				window.location='$link/report_kapal/report_kapal_detail/$kode_kapal';
		      </script>";

	}
//'report_nominatif/report_nominatif_detail/$kode_unit'
	
	
	

	 
}
