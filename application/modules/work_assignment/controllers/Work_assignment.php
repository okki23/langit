<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_assignment extends Parent_Controller { 

	var $nama_tabel = 'lit_el_dat_kelas'; 
	var $daftar_field = array('id','id_kelas','personnel_id','personnel_id_atasan','isapproveatasan','ket_atasan','tanggal_daftar','file_assignment','file_realisasi','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
		$this->load->model('m_work_assignment');
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
		$data_employee = $this->m_work_assignment->get_all_work_assignment();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                      'location'=>$location,
					  'data_employee'=>$data_employee,
					  'flagAdd'=>$flagAdd,
					  'flagEdit'=>$flagEdit,
					  'flagDel'=>$flagDel,
					  'footer'=>'© 2016. Langit Infotama');		
	 		
		$this->load->view('work_assignment/work_assignment_view',$data); 
		 
	}
 
	public function fetch_work_assignment(){
		$getdata = $this->m_work_assignment->fetch_work_assignment();
		echo json_encode($getdata);
	}

	public function get_data_edit()
	{
		$id = $this->uri->segment(3);
		$sql = $this->db->where('id',$id)->get($this->nama_tabel)->row();
		echo json_encode($sql, TRUE); 
	}

	function saveuploadassign(){ 
		if($_FILES["file"]["name"] != ''){ 
			$location = './file_manager_dir/' . str_replace(" ","_",$_FILES["file"]["name"]);  
			$upload = move_uploaded_file(str_replace(" ","_",$_FILES["file"]["tmp_name"]), $location);  
			$this->db->set("file_assignment",$_FILES["file"]["name"])->where('id',$this->input->post('id'))->update('lit_el_dat_kelas');
				 if($upload){
					$data = array("status"=>"OK","code"=>200,"id"=>$this->input->post('id'),"message"=>"Successfully");
				 }else{
					$data = array("status"=>"NOT OK","code"=>200,"id"=>$this->input->post('id'),"message"=>"Failed");
				 }
				 echo json_encode($data,true);
			}
	}

	function saveuploadrealisasi(){ 
		if($_FILES["file"]["name"] != ''){ 
			$location = './file_manager_dir/' . str_replace(" ","_",$_FILES["file"]["name"]);  
			$upload = move_uploaded_file(str_replace(" ","_",$_FILES["file"]["tmp_name"]), $location);  
			$this->db->set("file_realisasi",$_FILES["file"]["name"])->where('id',$this->input->post('id'))->update('lit_el_dat_kelas');
				 if($upload){
					$data = array("status"=>"OK","code"=>200,"id"=>$this->input->post('id'),"message"=>"Successfully");
				 }else{
					$data = array("status"=>"NOT OK","code"=>200,"id"=>$this->input->post('id'),"message"=>"Failed");
				 }
				 echo json_encode($data,true);
			}
	}

	public function hapus_data()
	{
		$id = $this->uri->segment(3);

		$cekfile = $this->db->where('id',$id)->get($this->nama_tabel)->row();  
		if($cekfile->pathfile != '' || $cekfile->pathfile != NULL){
          //apabila file ada maka dihapus,apabila sebaliknya maka tidak dihapus
          unlink("upload/".str_replace(" ","_",$cekfile->pathfile));
		}   

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
		$data_form = $this->m_work_assignment->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL;  
		$data_form['author'] = $this->session->userdata('username');
		$simpan_data = $this->m_work_assignment->simpan_data($data_form, $this->nama_tabel, $this->primary_key, $id);
 
		if ($simpan_data) {
			$result = array("response" => array('message' => 'success'));
		} else {
			$result = array("response" => array('message' => 'failed'));
		} 
		echo json_encode($result, TRUE);
	} 
}
