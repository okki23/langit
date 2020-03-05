<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_pembelajaran extends Parent_Controller { 

	var $nama_tabel = 'lit_el_kelas'; 
	var $daftar_field = array('id','id_gugus','id_sub_gugus','nm_kelas','file_assignment','tgl_dibuka','isactive','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
		$this->load->model('m_kelas_pembelajaran');
	}   

	public function get_materi(){ 
		$id_kelas = $this->input->get('id_kelas');  
		$getdata = $this->db->query("select a.*,b.`status`,b.id as iddatmodul,b.id_kelas_modul,c.nm_modul,c.pathfile from lit_el_dat_kelas a
	left join lit_el_dat_kelas_modul b on b.id_dat_kelas = a.id
	left join lit_el_kelas_modul c on c.id = b.id_kelas_modul
	 where a.id = '".$id_kelas."'")->result();
		$data = array();
	   
		$no = 1;
		$dataparse = array();  
		foreach ($getdata as $key => $value) {   
				$sub_array['no'] = $no;
				$sub_array['nm_modul'] = $value->nm_modul;   
			array_push($dataparse,$sub_array); 
			$no++; 
		}
	 echo json_encode(array("data"=>$dataparse));
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
		$select_gugus = $this->db->get("lit_el_tab_gugus")->result();
		$select_subgugus = $this->db->get("lit_el_tab_gugus_sub")->result();
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
					  'select_gugus'=>$select_gugus,
					  'select_subgugus'=>$select_subgugus,
					  'footer'=>'© 2016. Langit Infotama');		
	 		
		$this->load->view('kelas_pembelajaran/kelas_pembelajaran_view',$data); 
		 
	} 

	public function finish_belajar(){
		$datkelas = $this->input->post('datkelas');
		$this->db->query("update lit_el_dat_kelas_modul set status = 1 where id = '".$datkelas."' ");
	}

	public function listing_modul_kelas(){ 
		$id_dat = $this->input->get('id_dat');  
		$getdata = $this->db->query("select a.*,b.`status`,b.id as iddatmodul,b.id_kelas_modul,c.nm_modul,c.pathfile from lit_el_dat_kelas a
		left join lit_el_dat_kelas_modul b on b.id_dat_kelas = a.id
		left join lit_el_kelas_modul c on c.id = b.id_kelas_modul
		  where a.id = '".$id_dat."' ")->result();
		$data = array();
	   
		$no = 1;
		$dataparse = array();  
		foreach ($getdata as $key => $value) {   
				$sub_array['no'] = $no;
				$sub_array['nm_modul'] = $value->nm_modul;  
				$sub_array['status'] = $value->status; 
				if($value->status != 1){
					$sub_array['action'] = $sub_array[] = '<div style="text-align:center;">
														   <a href="'.base_url('file_manager_dir/'.$value->pathfile).'" target="_blank" id="modul" class="btn btn-danger"  >  Download Modul </a>
														   <a href="javascript:void(0)" id="btnbelajar" class="btn btn-danger" onclick="Pelajari(' . $value->iddatmodul . ');" >  Pelajari </a>
													</div>';
				}else{
					$sub_array['action'] = $sub_array[] = '<div style="text-align:center;">
														   <a href="'.base_url('file_manager_dir/'.$value->pathfile).'" target="_blank" id="modul" class="btn btn-danger"  >  Download Modul </a>
														   <a href="javascript:void(0)" id="btnbelajar" class="btn btn-success" onclick="Pelajari(' . $value->iddatmodul . ');" >  Sudah Dipelajari </a>
													</div>';
				} 
			array_push($dataparse,$sub_array); 
			$no++; 
		}
	 echo json_encode(array("data"=>$dataparse));
	}

	public function viewmateri(){
		$id = $this->uri->segment(3);
		$sql = $this->db->query("select a.*,b.`status`,b.id as iddatmodul,b.id_kelas_modul,c.nm_modul,c.materi,c.pathfile from lit_el_dat_kelas a
		left join lit_el_dat_kelas_modul b on b.id_dat_kelas = a.id
		left join lit_el_kelas_modul c on c.id = b.id_kelas_modul
		where b.id = '".$id."'")->row(); 
		echo json_encode($sql, TRUE); 
	}

	public function tampil_kelas()	{
		$error = '';
		$location = $this->uri->segment(1);
		$id_dat_kelas = $this->uri->segment(3);

		$ex = $this->db->query("select a.*,b.`status`,b.id as iddatmodul,b.id_kelas_modul,c.nm_modul,c.materi,pathfile from lit_el_dat_kelas a
		left join lit_el_dat_kelas_modul b on b.id_dat_kelas = a.id
		left join lit_el_kelas_modul c on c.id = b.id_kelas_modul
		where b.id = '".$id_dat_kelas."' ")->row(); 
		$sqlkelas = $this->db->query("select a.*,count(b.`status`) as total,c.nm_kelas,b.id_dat_kelas,b.id_kelas_modul from lit_el_dat_kelas a
		left join lit_el_dat_kelas_modul b on b.id_dat_kelas = a.id
		left join lit_el_kelas c on c.id = a.id_kelas
		WHERE a.id='".$id_dat_kelas."' GROUP BY a.id_kelas ")->row();
		$sqlmodul = $this->db->where('kelas_id',$sqlkelas->id_kelas_modul)->get('lit_el_kelas_modul')->result(); 
		
		$listingdata = $this->db->query("select * from lit_el_dat_kelas_modul where id_dat_kelas = '".$this->uri->segment(3)."' ")->result_array();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'kelas'=>$sqlkelas->nm_kelas,
					  'location'=>$location,
					  'listmodul'=>$sqlmodul,
					  'listingdata'=>$listingdata,
					  'ex'=>$ex,
					  'id_kelas'=>$id_dat_kelas,					  
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

	
	function saveupload(){
		if($_FILES["file"]["name"] != ''){ 
			$location = './file_manager_dir/' . str_replace(" ","_",$_FILES["file"]["name"]); 
			$upload = move_uploaded_file(str_replace(" ","_",$_FILES["file"]["tmp_name"]), $location);  
				 if($upload){
					$data = array("status"=>"OK","code"=>200,"message"=>"Successfully");
				 }else{
					$data = array("status"=>"NOT OK","code"=>200,"message"=>"Failed");
				 }
				 echo json_encode($data,true);
			}
	}
}
