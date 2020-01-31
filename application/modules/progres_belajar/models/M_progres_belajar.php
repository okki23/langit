<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_progres_belajar extends Parent_Model {

	var $nama_tabel = 'lit_el_dat_kelas'; 
	var $daftar_field = array('id','id_kelas','personnel_id','isapproveatasan','ket_atasan','tanggal_daftar','created_at','updated_at');
	var $primary_key = 'id';

	public function __construct(){
		parent ::__construct(); 
	} 

	public function fetch_progres_belajar()
	{ 
		$no=1;
		$d1 = $this->db->query("select a.*,b.nm_kelas,c.`status`,count(c.`status`) as allmodules
	    from lit_el_dat_kelas a
		left join lit_el_kelas b on b.id = a.id_kelas
		left join lit_el_dat_kelas_modul c on c.kelas_id = b.id  
		where a.personnel_id = '".$this->session->userdata('ses_personnel_id')."' GROUP BY a.id_kelas
		");

		if($d1->num_rows() > 0){
		foreach($d1->result() as $k=>$v){
			$d2 = $this->db->query("select count(z.status) as totalread from lit_el_dat_kelas_modul z
			left join lit_el_dat_kelas x on x.id_kelas = z.kelas_id
			where z.status = 1 and x.personnel_id = 10011279 and x.id_kelas = '".$v->id_kelas."' ");
		 
			foreach ($d2->result() as $row) {
				$sub_array = array(); 
				$sub_array[] = $no;
				$sub_array[] = $v->nm_kelas;
				$sub_array[] = '<div class="progress">
									<div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:'.ceil((@($row->totalread / $v->allmodules)*100)).'%">'.ceil((@($row->totalread / $v->allmodules)*100)).'%</div>
								</div>'; 
				$sub_array[] = '<div style="text-align:center;">
									<a href="javascript:void(0)" class="btn btn-success" id="edit" onclick="MulaiBelajar(' . $v->id . ');" > Mulai Belajar </a>  &nbsp;
									 
							  </div>';
				$data[] = $sub_array;
				$no++;
			
		}
	  
	   }
	   }else{
				$sub_array = array(); 
				$sub_array[] = 'No Data';
				$sub_array[] = 'No Data';
				$sub_array[] = 'No Data';
				$sub_array[] = 'No Data';
				$data[] = $sub_array;
				$no++;
	   }
 
	   return $output = array("data" => $data);
	}

	public function get_all_progres_belajar(){
		global $db;
		$query = $this->db->query("select * FROM lit_el_tab_video order by id asc");  
		return $query;
	}
 
	
}
