<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_video extends Parent_Controller { 

	var $nama_tabel = 'lit_el_kelas_modul'; 
	var $daftar_field = array('id','nm_modul','materi','kelas_id','pathfile','status','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
		$this->load->model('m_materi_video');
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
		$data_employee = $this->m_materi_video->get_all_materi_video();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'listkelas'=>$kelas,
					  'data_employee'=>$data_employee,
					  'flagAdd'=>$flagAdd,
					  'flagEdit'=>$flagEdit,
					  'flagDel'=>$flagDel,
					  'footer'=>'© 2016. Langit Infotama');		
	 		
		$this->load->view('materi_video/materi_video_view',$data); 
		 
	}

	public function showmateri(){
		$id = $this->uri->segment(3);
		$title = $this->db->where('id',$id)->get('lit_el_kelas')->row();
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
		$data_employee = $this->m_materi_video->get_all_materi_video();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'title'=>$title,
					  'idheader'=>$id,
					  'location'=>$location,
					  'listkelas'=>$kelas,
					  'data_employee'=>$data_employee,
					  'flagAdd'=>$flagAdd,
					  'flagEdit'=>$flagEdit,
					  'flagDel'=>$flagDel,
					  'footer'=>'© 2016. Langit Infotama');		
	 		
		$this->load->view('materi_video/showmateri_view',$data); 
 
	}
 
	public function fetch_materi_video(){
		$idkelas = $this->input->post('no_order'); 
		$userId = $this->input->get('userId'); 

		$getdata = $this->db->query("select a.*,b.nm_kelas,case a.status when 1 then 'Aktif' else 'Tidak Aktif' end as status from lit_el_kelas_modul a
		left join lit_el_kelas b on b.id = a.kelas_id where kelas_id = '".$userId."' ")->result();
		$data = array();
	   
		$no = 1;
		$dataparse = array();  
		foreach ($getdata as $key => $value) {  
			if(empty($value->pathfile)){
				$sub_array['no'] = $no;
				$sub_array['nm_modul'] = $value->nm_modul;  
				$sub_array['status'] = $value->status; 
				
				$sub_array['action'] = $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning" > File Not Available </a>
				<a href="javascript:void(0)" class="btn btn-warning" id="detail" onclick="Detail(' . $value->id . ');" > Detail </a>  &nbsp;
				<a href="javascript:void(0)" class="btn btn-warning" id="edit" onclick="Ubah_Data(' . $value->id . ');" > Ubah </a>  &nbsp;
				<a href="javascript:void(0)" id="delete" class="btn btn-danger" onclick="Hapus_Data(' . $value->id . ');" >  Hapus </a>';
			}else{
				$sub_array['no'] = $no;
				$sub_array['nm_modul'] = $value->nm_modul;  
				$sub_array['status'] = $value->status; 
				
			   $sub_array['action'] = $sub_array[] = '<a href="'.base_url().'file_manager_dir/'.$value->pathfile.'" target="_blank" class="btn btn-warning" > '.$value->pathfile.' </a>
			   <a href="javascript:void(0)" class="btn btn-warning" id="detail" onclick="Detail(' . $value->id . ');" > Detail </a>  &nbsp;
			   <a href="javascript:void(0)" class="btn btn-warning" id="edit" onclick="Ubah_Data(' . $value->id . ');" > Ubah </a>  &nbsp;
			   <a href="javascript:void(0)" id="delete" class="btn btn-danger" onclick="Hapus_Data(' . $value->id . ');" >  Hapus </a>';
			}
		
			array_push($dataparse,$sub_array); 
			$no++;
		 	   
		}
	 echo json_encode(array("data"=>$dataparse));
	}

	public function fetch_kelas_pembelajaran(){
		$getdata = $this->m_materi_video->fetch_kelas_pembelajaran();
		echo json_encode($getdata);
	}

	public function fetch_kelas_pembelajaran_employee(){
		$getdata = $this->m_materi_video->fetch_kelas_pembelajaran_employee();
		echo json_encode($getdata);
	}
 
	public function get_data_edit()
	{
		$id = $this->uri->segment(3);
		$sql = $this->db->where('id',$id)->get($this->nama_tabel)->row();
		echo json_encode($sql, TRUE); 
	}

	function saveupload(){
		if($_FILES["file"]["name"] != ''){ 
			$location = './upload/' . str_replace(" ","_",$_FILES["file"]["name"]); 
			$upload = move_uploaded_file(str_replace(" ","_",$_FILES["file"]["tmp_name"]), $location);  
				 if($upload){
					$data = array("status"=>"OK","code"=>200,"message"=>"Successfully");
				 }else{
					$data = array("status"=>"NOT OK","code"=>200,"message"=>"Failed");
				 }
				 echo json_encode($data,true);
			}
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
		$data_form = $this->m_materi_video->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL;   
		$simpan_data = $this->m_materi_video->simpan_data_dat($data_form, $this->nama_tabel, $this->primary_key, $id);
		if ($simpan_data) {
			$result = array("response" => array('message' => 'success'));
		} else {
			$result = array("response" => array('message' => 'failed'));
		} 
		echo json_encode($result, TRUE);
	} 

	function savefilemateri(){
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
