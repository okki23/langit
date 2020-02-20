<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gugus extends Parent_Controller { 

	var $nama_tabel = 'lit_el_tab_gugus';  
	var $daftar_field = array('id','nm_gugus','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
		$this->load->model('m_gugus');
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
		$kelas = $this->db->get('lit_el_kelas')->result();
		$data_employee = $this->m_gugus->get_all_gugus();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'listkelas'=>$kelas,
					  'data_employee'=>$data_employee,
					  'flagAdd'=>$flagAdd,
					  'flagEdit'=>$flagEdit,
					  'flagDel'=>$flagDel,
					  'footer'=>'© 2016. Langit Infotama');		
	 		
		$this->load->view('gugus/gugus_view',$data); 
		 
	} 
	public function fetch_gugus(){
		$getdata = $this->m_gugus->fetch_gugus();
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
		$data_form = $this->m_gugus->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL;   
		$simpan_data = $this->m_gugus->simpan_data_dat($data_form, $this->nama_tabel, $this->primary_key, $id);
		if ($simpan_data) {
			$result = array("response" => array('message' => 'success'));
		} else {
			$result = array("response" => array('message' => 'failed'));
		} 
		echo json_encode($result, TRUE);
	} 
 
}
