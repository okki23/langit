<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_visi_misi extends CI_Model {

	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data unit
	public function get_all_nominatif(){
	global $db;
	$query = $this->db->query("select * FROM lit_tab_unit order by id asc");

 	return $query;
	}

	public function get_all_nominatif_json(){
 
	$query = $this->db->query("select * FROM view_cabang order by id asc");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
	                'kode'   => $row->kode,
	                'kode_unit'   => $row->kode_unit,
	                'nama_unit'=> $row->nama_unit,
	                'tipe'=> $row->tipe,
					'opsi'=> '<a href="'.base_url('report_nominatif/report_nominatif_detail/').'/'.$row->kode_unit.'"" > <img src="'.base_url('assets/images/pdf.png').'" title="Report Nominatif"></a>'
					//<a href="'.base_url('unit/unit_detail/').'/'.$row->id.'""> <img src="'.base_url('assets/images/view.png').'" title="Profile"></a>',
	                //'opsidelete'=> '<a href="'.base_url('unit/unit_delete/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/images/delete.png').'"> </a>',
	                //'opsiupdate'=> '<a href="'.base_url('unit/unit_update/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/images/edit.png').'"></a>',
                    //    'opsidetail'=> '<a href="'.base_url('unit/unit_detail/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/images/detail.png').'"></a>'

	            
				);
	        }
	     return $list_data;
	}



	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_personnel_id(){
	$query = $this->db->query("SELECT SUBSTR(MAX(personnel_id),-8) AS id  FROM human_pa_md_emp_personal");

	return $query;
	}

	//ini method untuk menyimpan data unit baru
	public function pro_add_unit($id,$kode_unit,$nm_unit,$kode_orm){
	$query = $this->db->query("insert into lit_tab_unit (id,kode_unit,nm_unit,kode_orm) VALUES ('null','$kode_unit','$nm_unit','$kode_orm')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	public function nominatif_print($kode_kapal){
		$query = $this->db->query("select * from lit_master_kapal where kode_kapal = '$kode_kapal' ");
		return $query;
	}

	public function opt_orm(){
	$sql = $this->db->query("SELECT kode_kapal,nama_unit,cabang FROM lit_master_kapal");
	return $sql;
	}
}
