<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progres_belajar extends Parent_Controller { 

	var $nama_tabel = 'lit_el_dat_kelas'; 
	var $daftar_field = array('id','id_kelas','personnel_id','isapproveatasan','ket_atasan','tanggal_daftar','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
		$this->load->model('m_progres_belajar');
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
		$data_employee = $this->m_progres_belajar->get_all_progres_belajar();
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
	 		
		$this->load->view('progres_belajar/progres_belajar_view',$data); 
		 
	} 

	public function fetch_progres_belajar(){
		$getdata = $this->m_progres_belajar->fetch_progres_belajar();
		echo json_encode($getdata);
	}

	public function iyes(){
		$d1 = $this->db->query("select a.*,b.nm_kelas,c.`status`,count(c.`status`) as allmodules
	    from lit_el_dat_kelas a
		left join lit_el_kelas b on b.id = a.id_kelas
		left join lit_el_dat_kelas_modul c on c.kelas_id = b.id  
		where a.personnel_id = '10011279' GROUP BY a.id_kelas
		")->result();
		foreach($d1 as $k=>$v){
			$d2 = $this->db->query("select count(z.status) as totalread from lit_el_dat_kelas_modul z
			left join lit_el_dat_kelas x on x.id_kelas = z.kelas_id
			where z.status = 1 and x.personnel_id = 10011279 and x.id_kelas = '".$v->id_kelas."' ")->result();
			foreach($d2 as $kk=>$vv){
				echo $v->nm_kelas. " - ".$vv->totalread. " - ".$v->allmodules. " progress = ".ceil((@($vv->totalread / $v->allmodules)*100))."<br>";
			}
			
		}
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
		$data_form = $this->m_progres_belajar->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL;   
		$data_form['isapproveatasan'] = 0;
		$data_form['ket_atasan'] = "-"; 
		
		//cek apabila data sudah tersedia atau belum
		$filter = array('id_kelas'=>$data_form['id_kelas'],'personnel_id'=>$data_form['personnel_id']);
		$cek = $this->db->where($filter)->get($this->nama_tabel)->num_rows(); 	

		if($cek > 0){
			$result = array("response" => array('code'=>200,'status'=>'NOK','message' => 'duplicate!'));
		}else{
			$simpan_data = $this->m_progres_belajar->simpan_data_dat($data_form, $this->nama_tabel, $this->primary_key, $id);
		 
			if ($simpan_data) {
				$result = array("response" => array('code'=>200,'status'=>'OK','message' => 'success'));
			} else {
				$result = array("response" => array('code'=>200,'status'=>'NOK','message' => 'failed')); 
			}

		} 
		echo json_encode($result, TRUE);
	} 
}
