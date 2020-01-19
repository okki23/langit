<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start('ob_gzhandler');
class Dashboard extends CI_Controller {

	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model dashboard jika memang controller butuh transaksi data
 		$this->load->model('model_dashboard');

 		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		 
	}

	
	public function index()	{
		$error = '';
		$location = $this->uri->segment(1);

		$countemp = '0';
		$countjmlcab = '0';
		$countpostersedia = '0';
		$countposlowong = '0';	
		$countpst = '0';
		$countcab = '0';
		$countkapal = '0';
		// $update_cuti = $this->model_dashboard->update_cuti();

		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'countemp'=>$countemp,
					  'countjmlcab'=>$countjmlcab,
					  'countpst'=>$countpst,
					  'countcab'=>$countcab,
					  // 'update_cuti'=>$update_cuti,
					  'countkapal'=>$countkapal,
					  'countpostersedia'=>$countpostersedia,
					  'countposlowong'=>$countposlowong,
					  'footer'=>'© 2016. Langit Infotama');
		//echo $this->session->userdata('ses_lit_level_user');exit;
		
		if($this->session->userdata('ses_lit_level_user')=='1')
		{$this->load->view('dashboard_karyawan',$data);}
		else if($this->session->userdata('ses_lit_level_user')=='2')
		{$this->load->view('dashboard_admin_unit',$data);}
		else if($this->session->userdata('ses_lit_level_user')=='3')
		{$this->load->view('dashboard',$data);}
	}
 
	 
	}
	

