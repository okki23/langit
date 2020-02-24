<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_modulmateri extends CI_Model {


	public function __construct(){
		parent ::__construct();
		 
	}
	public function get_count_posisi_json(){
		$kode_unit=$this->session->userdata('ses_lit_code_core_orm');
		if($this->session->userdata('ses_lit_level_user')=='1')
	{	
		$query = $this->db->query("select count(a.lit_code_position) as jml
									from lit_tab_posisi a left join 
									(select kode,kdposisiorm,nama_unit from view_orm where level='6' or (level='8' and SUBSTR(kode, 4, 1)=2)) b on substring(a.lit_code_position,1,7)=b.kdposisiorm 
									where b.kode = '$kode_unit'");
		}
	else if($this->session->userdata('ses_lit_level_user')=='2')
	{	
		$query = $this->db->query("select count(a.lit_code_position) as jml
									from lit_tab_posisi a left join 
									(select kode,kdposisiorm,nama_unit from view_orm where level='6' or (level='8' and SUBSTR(kode, 4, 1)=2)) b on substring(a.lit_code_position,1,7)=b.kdposisiorm 
									where b.kode = '$kode_unit'");
		}
	else if($this->session->userdata('ses_lit_level_user')=='3')
	{	
	$query = $this->db->query("select count(lit_code_position) as jml from lit_tab_posisi where DATEDIFF(date_format(end_date,'%Y-%m-%d'),CURDATE()) >= 0 and isaktif != '0'");
	}
	$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data = $row->jml;		
	        }
	     return $list_data;
	
}

	
    
    
	public function get_count_posisi_lowong_json(){
		$kode_unit=$this->session->userdata('ses_lit_code_core_orm');
		if($this->session->userdata('ses_lit_level_user')=='1')
	{	
		$query = $this->db->query("select count(a.lit_code_position) as jml
									from lit_tab_posisi a left join 
									(select kode,kdposisiorm,nama_unit from view_orm where level='6' or (level='8' and SUBSTR(kode, 4, 1)=2)) b on substring(a.lit_code_position,1,7)=b.kdposisiorm 
									where b.kode = '$kode_unit' and a.personnel_id='' and a.isaktif != '0' and DATEDIFF(date_format(a.end_date,'%Y-%m-%d'),CURDATE()) >= 0");
		}
	else if($this->session->userdata('ses_lit_level_user')=='2')
	{	
		$query = $this->db->query("select count(a.lit_code_position) as jml
									from lit_tab_posisi a left join 
									(select kode,kdposisiorm,nama_unit from view_orm where level='6' or (level='8' and SUBSTR(kode, 4, 1)=2)) b on substring(a.lit_code_position,1,7)=b.kdposisiorm 
									where b.kode = '$kode_unit' and a.personnel_id='' and a.isaktif != '0' and DATEDIFF(date_format(a.end_date,'%Y-%m-%d'),CURDATE()) >= 0");
		}
	else if($this->session->userdata('ses_lit_level_user')=='3')
	{	
	$query = $this->db->query("select count(lit_code_position) as jml from lit_tab_posisi where personnel_id='' and isaktif != '0' and DATEDIFF(date_format(end_date,'%Y-%m-%d'),CURDATE()) >= 0");
}
	$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data = $row->jml;		
	        }
	     return $list_data;
	     
			
	}
	public function get_count_jmlcab_json(){
	$query = $this->db->query("select count(*) as jml from view_cabang");
	$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data = $row->jml;		
	        }
	     return $list_data;
	     
			
	}
	
	public function get_count_all_json(){
	$kode_unit=$this->session->userdata('ses_lit_code_core_orm');
	if($this->session->userdata('ses_lit_level_user')=='1')
	{	
		$query = $this->db->query("select count(a.lit_code_position) as jml
									from human_pa_md_emp_personal c
									left join lit_tab_posisi a on c.personnel_id = a.personnel_id
									left join (select kode,kdposisiorm,nama_unit from view_orm where level='6' or (level='8' and SUBSTR(kode, 4, 1)=2)) b on substring(a.lit_code_position,1,7)=b.kdposisiorm 
									where b.kode = '$kode_unit' and c.lit_employee_status in ('I','A') and a.isaktif != '0'");
		}
	else if($this->session->userdata('ses_lit_level_user')=='2')
	{	
		$query = $this->db->query("select count(a.lit_code_position) as jml
									from human_pa_md_emp_personal c
									left join lit_tab_posisi a on c.personnel_id = a.personnel_id
									left join (select kode,kdposisiorm,nama_unit from view_orm where level='6' or (level='8' and SUBSTR(kode, 4, 1)=2)) b on substring(a.lit_code_position,1,7)=b.kdposisiorm 
									where b.kode = '$kode_unit' and c.lit_employee_status in ('I','A') and a.isaktif != '0'");
		}
	else if($this->session->userdata('ses_lit_level_user')=='3')
	{
	//$query = $this->db->query("select count(personnel_id) as jml from human_pa_md_emp_personal where lit_employee_status in ('I','A')");
	$query = $this->db->query("select count(a.personnel_id) as jml from human_pa_md_emp_personal a
left join lit_tab_posisi b on b.personnel_id=a.personnel_id
where lit_employee_status in ('I','A') and b.isaktif != '0' ");
	}
	//and b.isaktif != '0'
	$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data = $row->jml;		
	        }
	     return $list_data;
	     
			
	}
	

	
	
	public function get_count_pst_json(){
$query = $this->db->query("SELECT count(b.personnel_id) as jml_pegawai
FROM lit_tab_posisi a left join human_pa_md_emp_personal b on a.personnel_id=b.personnel_id
where left(lit_code_position,1) !='3' and b.personnel_id is not null and a.isaktif != '0' and b.lit_employee_status in ('I','A') order by a.lit_code_position"); 
			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data = $row->jml_pegawai;		
	        }
	     return $list_data;
	}
	
	public function get_count_cab_json(){
$query = $this->db->query("SELECT count(b.personnel_id) as jml_pegawai
FROM lit_tab_posisi a left join human_pa_md_emp_personal b on a.personnel_id=b.personnel_id
where left(lit_code_position,1) ='3' and b.personnel_id is not null and a.isaktif != '0' and b.lit_employee_status in ('I','A') order by a.lit_code_position"); 
			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data = $row->jml_pegawai;				    
	        }
			//return json_encode( $list_data, JSON_UNESCAPED_UNICODE );
	     return $list_data;
	}
	
	
	
	
	
	public function get_count_kapal_json(){
		$kode_unit=$this->session->userdata('ses_lit_code_core_orm');
	if($this->session->userdata('ses_lit_level_user')=='1')
	{	
		$query = $this->db->query("SELECT count(*) as jml_kapal FROM view_kapal a
									left join view_orm b on b.kode = a.parentid
									where b.kode = '$kode_unit'");
		}
	else if($this->session->userdata('ses_lit_level_user')=='2')
	{	
		$query = $this->db->query("SELECT count(*) as jml_kapal FROM view_kapal a
									left join view_orm b on b.kode = a.parentid
									where b.kode = '$kode_unit'");
		}
	else if($this->session->userdata('ses_lit_level_user')=='3')
	{
	$query = $this->db->query("SELECT count(*) as jml_kapal FROM view_kapal ");
    }
			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data = $row->jml_kapal;
			}
	     return $list_data;
	}
	
	
public function update_cuti(){
	date_default_timezone_set('Asia/Jakarta');
    $tgl1 = date('Y-m-d');
    $tgl2 = date('Y-m-d', strtotime('-7 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
	 $query = $this->db->query("update lit_tm_dat_kehadiran set 
							    status_progress = '3',
							    status = '2'
								where tanggal_koreksi = '$tgl2' and iskoreksi != '0' ");

	 $queryx = $this->db->query("update lit_dat_cuti set 
							    status_progress = '1',
							    status = '1'
								where tgl_dokumen = '$tgl2' ");

		
	   	$location = $this->uri->segment(1);
		$sqldatas = $this->db->last_query();
		$sqldata = $this->db->escape_str($sqldatas);
		$user_ip = $this->lit_app_lib->getUserIP();
		$sqllog = $this->db->query("insert into lit_logging (id,name,ip_address,wtd,sqldata,waktu,isread) 
		values (null,'$_SESSION[username] - $_SESSION[ses_personnel_id]','$user_ip','$location::update_cuti','$sqldata',now(),'0')");  
		return $query;
		return $queryx;
	}

	public function get_data_modul($id){ 
	$query = $this->db->query("SELECT a.*,c.nm_kelas, d.pathfile, d.nm_modul as modulnya,d.materi as materinya FROM lit_el_dat_kelas_modul a INNER JOIN lit_el_dat_kelas b on a.id_dat_kelas=b.id INNER JOIN lit_el_kelas c on b.id_kelas=c.id INNER JOIN lit_el_kelas_modul d on a.id_kelas_modul=d.id where a.id='$id'");
 	return $query;  
	} 
	
	public function pro_update_modul($id){
	date_default_timezone_set('Asia/Jakarta');			
	$query = $this->db->query("update lit_el_dat_kelas_modul set 
							    status = '1' where id = '$id' ");
	return $query;
	}
}
