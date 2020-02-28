<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_pembelajaran extends Parent_Controller { 

	var $nama_tabel = 'lit_el_dat_kelas'; 
	var $nama_tabel_detail = 'lit_el_dat_kelas_modul';
	var $daftar_field = array('id','id_kelas','personnel_id','isapproveatasan','ket_atasan','tanggal_daftar','created_at','updated_at');
	var $daftar_field_detail = array('id','id_dat_kelas','id_kelas_modul','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
		$this->load->model('m_daftar_pembelajaran');
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
		$data_employee = $this->m_daftar_pembelajaran->get_all_daftar_pembelajaran();
		$select_karyawan = $this->db->get("human_pa_md_emp_personal")->result();
		$useractive = $this->m_daftar_pembelajaran->get_useractive($this->session->userdata('ses_personnel_id'))->name_full;
		$select_kelas = $this->db->get("lit_el_kelas")->result();
		//get user active when session is not admin 
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'usernamelist'=>$this->session->userdata('username'),
					  'personnelidlist'=>$this->session->userdata('ses_personnel_id'),
					  'location'=>$location,
					  'useractive'=>$useractive,
					  'data_employee'=>$data_employee,
					  'flagAdd'=>$flagAdd,
					  'flagEdit'=>$flagEdit,
					  'flagDel'=>$flagDel,
					  'select_karyawan'=>$select_karyawan,
					  'select_kelas'=>$select_kelas,
					  'footer'=>'© 2016. Langit Infotama');		
	 		
		$this->load->view('daftar_pembelajaran/daftar_pembelajaran_view',$data); 
		 
	} 

	public function getidatasan($personnel_id)
	{	
			$posisi_bawahan = $this->session->userdata('ses_code_position');
			
            $query = $this->db->query("SELECT a.*,b.personnel_id,b.name_position,c.name_full FROM `vw_atasan` a INNER JOIN lit_tab_posisi b on a.atasan=b.lit_code_position left join human_pa_md_emp_personal c on b.personnel_id = c.personnel_id where bawahan = '$posisi_bawahan'")->row_array(); 
            return $query['personnel_id'];
	}

	public function fetch_daftar_pembelajaran(){
		$getdata = $this->m_daftar_pembelajaran->fetch_daftar_pembelajaran();
		echo json_encode($getdata);
	}

	public function get_data_edit()
	{
		$id = $this->uri->segment(3);
		$sql = $this->db->query('select a.*,b.name_full,b.lit_nik,c.name_position,d.nm_kelas,case a.isapproveatasan when 2 then "No" else "Yes" end as status from lit_el_dat_kelas a
		left join human_pa_md_emp_personal b on b.personnel_id = a.personnel_id
		left join lit_tab_posisi c on c.personnel_id = b.personnel_id
		left join lit_el_kelas d on d.id = a.id_kelas where a.id = "'.$id.'" ')->row();
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
		$data_form = $this->m_daftar_pembelajaran->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL;   
		$data_form['isapproveatasan'] = 0;
		$data_form['ket_atasan'] = "-"; 
		
		//cek apabila data sudah tersedia atau belum
		$filter = array('id_kelas'=>$data_form['id_kelas'],'personnel_id'=>$data_form['personnel_id']);
		$cek = $this->db->where($filter)->get($this->nama_tabel)->num_rows(); 	

		if($cek > 0){
			$result = array("response" => array('code'=>200,'status'=>'NOK','message' => 'duplicate!'));
		}else{
			$simpan_data = $this->m_daftar_pembelajaran->simpan_data_dat($data_form, $this->nama_tabel, $this->primary_key, $id);	

		    $insert_id=$this->db->insert_id();
		    // $data_form_detail=$this->m_daftar_pembelajaran->array_from_post($this->daftar_field_detail);
		    // $id_detail = isset($data_form_detail['id']) ? $data_form_detail['id'] : NULL; 
		    // $data_form_detail['id_dat_kelas'] = $insert_id;	
		    // $data_form_detail['id_kelas_modul'] = $data_form['id_kelas'];
		    // $simpan_data_detail = $this->m_daftar_pembelajaran->simpan_data_dat($data_form_detail, $this->nama_tabel_detail, $this->primary_key, $id_detail);
		    $sqlinsert = $this->m_daftar_pembelajaran->pro_add_modul($insert_id,$data_form['id_kelas']);
		    
			if ($simpan_data) {
				$result = array("response" => array('code'=>200,'status'=>'OK','message' => 'success'));
			} else {
				$result = array("response" => array('code'=>200,'status'=>'NOK','message' => 'failed')); 
			}

		} 
		echo json_encode($result, TRUE);
	} 
}
