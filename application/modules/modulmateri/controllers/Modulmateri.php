<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start('ob_gzhandler');
class Modulmateri extends CI_Controller {

	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model dashboard jika memang controller butuh transaksi data
 		$this->load->model('model_modulmateri');

 		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		 
	}

	
	public function index()	{
		$error = '';
		$location = $this->uri->segment(1);
		$idnya = $this->uri->segment(2);
		echo $idnya;

		$countemp = $this->model_modulmateri->get_count_all_json();
		$countjmlcab = $this->model_modulmateri->get_count_jmlcab_json();
		$countpostersedia = $this->model_modulmateri->get_count_posisi_json();
		$countposlowong = $this->model_modulmateri->get_count_posisi_lowong_json();		
		$countpst = $this->model_modulmateri->get_count_pst_json();
		$countcab = $this->model_modulmateri->get_count_cab_json();
		$countkapal = $this->model_modulmateri->get_count_kapal_json();
		$update_cuti = $this->model_modulmateri->update_cuti();

		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'countemp'=>$countemp,
					  'countjmlcab'=>$countjmlcab,
					  'countpst'=>$countpst,
					  'countcab'=>$countcab,
					  'update_cuti'=>$update_cuti,
					  'countkapal'=>$countkapal,
					  'countpostersedia'=>$countpostersedia,
					  'countposlowong'=>$countposlowong,
					  'footer'=>'© 2016. Langit Infotama');

		
		if($this->session->userdata('ses_lit_level_user')=='1')
		{$this->load->view('dashboard_karyawan',$data);}
	
		else if($this->session->userdata('ses_lit_level_user')=='3')
		{$this->load->view('dashboard',$data);}
	}

	public function tampil(){
		$error = '';
		$location = $this->uri->segment(1);
		$id = $this->uri->segment(3);
		$idsb = $id-1;
		$datkelas = $this->uri->segment(4);
		 
		$getstat = $this->db->query("select * from lit_el_dat_kelas_modul where id = '".$id."' and id_dat_kelas = '".$datkelas."' ")->row();
		
		
		$offsets = array();
		$listingdata = $this->db->query("select * from lit_el_dat_kelas_modul where id_dat_kelas = '".$datkelas."' ")->result_array();
		foreach ($listingdata as $key=>$country_offset) {
			$offset = $country_offset['id'];
			array_push($offsets, $offset);
		}

		asort($offsets);
		$init = reset($offsets);
		$max = max($offsets);
		foreach($offsets as $offset) { 
				$query = $this->db->query("select a.*,b.nm_modul as modulnya,b.materi from lit_el_dat_kelas_modul a 
				left join lit_el_kelas_modul b on b.id = a.id_kelas_modul
				where a.id = '".$offset."' ")->row(); 
		}
		$data_xyz = $this->model_modulmateri->get_data_modul($id);
		$sqlcek = @$this->db->query("select * from lit_el_dat_kelas_modul where id = '".$idsb."' and id_dat_kelas = '".$datkelas."' ")->row();
		// echo $idsb;
		// echo "<br>";
		// echo $sqlcek->status;
		// die(); 
	//  echo "id start : ".$init."<br>";
	//  echo "id sekarang :". $id."<br>";
	//  die();
			 if($id == $init){
				$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
				'error'=>$error,
				'id'=>$id,
				'datkelas'=>$datkelas,
				'idnow'=>$id,
			 	'idstart'=>$init,
			 	'idlast'=>$max,
			 	'idprev'=>$getstat->id-1,
				'idnext'=>$getstat->id+1,
				'location'=>$location,
				'data_xyz'=>$data_xyz,
				'footer'=>'© 2020. Langit Infotama');	
   				$this->load->view('dashboard_karyawan',$data); 
			}else if($sqlcek->status == 0){ 
				echo "<script type='text/javascript'>
				alert('Maaf, anda tidak dapat melongkap ke modul yang anda pilih karena belum menyelesaikan modul sebelum ini!');   
				window.location='".base_url('kelas_pembelajaran/tampil_kelas/'.$datkelas)."';
				</script>";
			}else{
				$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
				'error'=>$error,
				'id'=>$id,
				'datkelas'=>$datkelas,
				'idnow'=>$id,
			 	'idstart'=>$init,
			 	'idlast'=>$max,
			 	'idprev'=>$getstat->id-1,
				'idnext'=>$getstat->id+1,
				'location'=>$location,
				'data_xyz'=>$data_xyz,
				'footer'=>'© 2020. Langit Infotama');	
   				$this->load->view('dashboard_karyawan',$data); 
			}
	 	
	}
 
 	public function tampil_next($id,$datkelas)	{
		$error = '';
		$location = $this->uri->segment(1); 
		$data_xyz = $this->model_modulmateri->get_data_modul($id);
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
	                  'id'=>$id,
	                  'location'=>$location,
					  'data_xyz'=>$data_xyz,
					  'footer'=>'© 2020. Langit Infotama');	
	 	$this->load->view('dashboard_karyawan',$data);
		//echo $id;exit;
	}
 	public function save()	{
 		
		$id = $this->input->post('id');
		$datkelas = $this->input->post('datkelas');        
		$sqlupdate = $this->model_modulmateri->pro_update_modul($id);
		$next = $id+1;
		redirect(base_url('modulmateri/tampil/'.$next.'/'.$datkelas));
		//$this->tampil_next($id+1); 
	}
	public function finish()	{
 		
		$id = $this->input->post('id');
		$datkelas = $this->input->post('datkelas');        
		$sqlupdate = $this->model_modulmateri->pro_update_modul($id);
		 
	}

	public function cekfile(){
		$id = $this->uri->segment(3); 
		$query = $this->db->query("select a.*,c.nm_kelas,d.pathfile,d.materi as namamateri,d.nm_modul as namamodul from lit_el_dat_kelas_modul a 
		left join lit_el_dat_kelas b on b.id = a.id_dat_kelas
		left join lit_el_kelas c on c.id = b.id_kelas
		left join lit_el_kelas_modul d on d.kelas_id = b.id_kelas
		where a.id = ".$id." ")->row();
		echo json_encode($query,TRUE);
	}
	 
	
	 
}
	

