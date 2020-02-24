<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas_pembelajaran extends Parent_Model {

	var $nama_tabel = 'lit_el_kelas'; 
	var $daftar_field = array('id','nm_kelas','tgl_dibuka','isactive','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
	} 

	public function fetch_kelas_pembelajaran()
	{ 
	    if($this->session->userdata('username') == 'admin'){
			$getdata = $this->db->query("select a.*,b.nm_gugus,c.nm_sub_gugus from lit_el_kelas a
			left join lit_el_tab_gugus b on b.id = a.id_gugus
			left join lit_el_tab_gugus_sub c on c.id = a.id_sub_gugus")->result();
			$data = array();
			$no = 1; 
			foreach ($getdata as $row) {
				$sub_array = array(); 
				$sub_array[] = $no;
				$sub_array[] = $row->nm_gugus; 
				$sub_array[] = $row->nm_sub_gugus; 
				$sub_array[] = $row->nm_kelas; 
				$sub_array[] = $row->tgl_dibuka; 
				if($row->isactive == 1){
					$sub_array[] = 'Aktif';
				}else{
					$sub_array[] = 'Tidak Aktif';
				} 
				$sub_array[] = '<div style="text-align:center;">
										<a href="javascript:void(0)" class="btn btn-warning" id="edit" onclick="Ubah_Data(' . $row->id . ');" > Ubah </a>  &nbsp;
										<a href="javascript:void(0)" id="delete" class="btn btn-danger" onclick="Hapus_Data(' . $row->id . ');" >  Hapus </a>
									</div>';
			
				$data[] = $sub_array;
				$no++;
			}
		}else{
			$getdata = $this->db->query("
			select a.*,count(b.`status`) as total,c.nm_kelas,d.nm_gugus,e.nm_sub_gugus from lit_el_dat_kelas a
			left join lit_el_dat_kelas_modul b on b.id_dat_kelas = a.id
			left join lit_el_kelas c on c.id = a.id_kelas
			left join lit_el_tab_gugus d on d.id = c.id_gugus
			left join lit_el_tab_gugus_sub e on e.id = c.id_sub_gugus 
			WHERE a.personnel_id = '".$this->session->userdata('ses_personnel_id')."' GROUP BY a.id_kelas")->result();
			$data = array();
			$no = 1; 
			foreach ($getdata as $row) {
				$sub_array = array(); 
				$sub_array[] = $no;
				$sub_array[] = $row->nm_gugus; 
				$sub_array[] = $row->nm_sub_gugus; 
				$sub_array[] = $row->nm_kelas;  
				$sub_array[] = '<div style="text-align:center;">
										<a href="javascript:void(0);" onclick="ViewMateri('.$row->id.');" class="btn btn-warning" id="edit"> View Materi </a>  &nbsp;
									</div>'; 
				$data[] = $sub_array;
				$no++;
			}
		} 
	   return $output = array("data" => $data);
	}


	public function maraimumet(){
		$sql = $this->db->query("select a.*,count(b.`status`) as total,c.nm_kelas from lit_el_dat_kelas a
		left join lit_el_dat_kelas_modul b on b.id_dat_kelas = a.id
		left join lit_el_kelas c on c.id = a.id_kelas
		WHERE a.personnel_id = '".$this->session->userdata('ses_personnel_id')."' GROUP BY a.id_kelas")->result();

		foreach($sql as $data=>$keys){
			echo $keys->nm_kelas." Total materi " .$keys->total." dibaca : ".$this->getread($keys->id)->baca." belum dibaca : ".$this->getnotread($keys->id)->notread. " Presentase :".ceil((($this->getread($keys->id)->baca / $keys->total)*100))." % <br>";
		}
	}

	public function getread($id){
		$sql = $this->db->query("select count(status) as baca from lit_el_dat_kelas_modul
		where id_dat_kelas = '".$id."' and status = 1")->row();
		return $sql;
	}

	public function getnotread($id){
		$sql = $this->db->query("select count(status) as notread from lit_el_dat_kelas_modul
		where id_dat_kelas = '".$id."' and status = 0")->row();
		return $sql;
	}

	public function get_all_kelas_pembelajaran(){
		global $db;
		$query = $this->db->query("select * FROM lit_el_tab_video order by id asc");  
		return $query;
	}
 
	
}
