<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_pembelajaran extends Parent_Controller { 

	var $nama_tabel = 'lit_el_kelas'; 
	var $daftar_field = array('id','nm_kelas','tgl_dibuka','isactive','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
		$this->load->model('m_kelas_pembelajaran');
	} 

	public function index()	{ 
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
		$data_employee = $this->m_kelas_pembelajaran->get_all_kelas_pembelajaran();
		$select_karyawan = $this->db->get("human_pa_md_emp_personal")->result();
		$select_kelas = $this->db->get("lit_el_kelas")->result();
		//get user active when session is not admin 
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'usernamelist'=>$this->session->userdata('username'),
					  'personnelidlist'=>$this->session->userdata('ses_personnel_id'),
                      'location'=>$location,
					  'data_employee'=>$data_employee,
					  'flagAdd'=>$flagAdd,
					  'flagEdit'=>$flagEdit,
					  'flagDel'=>$flagDel,
					  'select_karyawan'=>$select_karyawan,
					  'select_kelas'=>$select_kelas,
					  'footer'=>'© 2016. Langit Infotama');		
	 		
		$this->load->view('kelas_pembelajaran/kelas_pembelajaran_view',$data); 
		 
	} 

	public function tampil_kelas()	{
		$error = '';
		$location = $this->uri->segment(1);
		$id_kelas = $this->uri->segment(3);
		// echo $id_kelas;exit;
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'id_kelas'=>$id_kelas,					  
					  'footer'=>'© 2019. Langit Infotama');
		$this->load->view('kelas_karyawan_menu',$data);
	}

	public function fetch_kelas_pembelajaran(){
		$getdata = $this->m_kelas_pembelajaran->fetch_kelas_pembelajaran();
		echo json_encode($getdata);
	}

	public function get_data_edit()
	{
		$id = $this->uri->segment(3);
		$sql = $this->db->where('id',$id)->get($this->nama_tabel)->row();
		echo json_encode($sql, TRUE); 
	} 

	public function hapus_data()
	{
		$id = $this->uri->segment(3);  
		$sqlhapus = $this->db->where('id',$id)->delete($this->nama_tabel); 
		if ($sqlhapus) {
			$result = array("response" => array('message' => 'success'));
		} else {
			$result = array("response" => array('message' => 'failed'));
		} 
		echo json_encode($result, TRUE);
	}

	public function simpan_data()
	{ 
		$data_form = $this->m_kelas_pembelajaran->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL;    
		 
			$simpan_data = $this->m_kelas_pembelajaran->simpan_data_dat($data_form, $this->nama_tabel, $this->primary_key, $id);
		 
			if ($simpan_data) {
				$result = array("response" => array('code'=>200,'status'=>'OK','message' => 'success'));
			} else {
				$result = array("response" => array('code'=>200,'status'=>'NOK','message' => 'failed')); 
			} 
		echo json_encode($result, TRUE);
	} 
}
