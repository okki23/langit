<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class About extends Parent_Controller {
 
  var $nama_tabel = 'm_about';
  var $daftar_field =  array('id','deskripsi','user_insert','date_insert','user_update','date_update');
  var $primary_key = 'id';
 
  //method construct dijalankan pertama kali dan terus berjalan selama class digunakan
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_about'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  //method untuk memanggil halaman about pertama kali
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'about/about_view';
		$this->load->view('template_view',$data);		
   
	}

  //method untuk memanggil data dari database untuk di buatkan data JSON dan di parse ke view yang akan di sajikan dalam datatable
  public function fetch_about(){  
       $getdata = $this->m_about->fetch_about();
       echo json_encode($getdata);   
  }  
	
  //method yang digunakan untuk menarik id dari data yang dituju untuk diambil datanya dengan query kemudian di parse kedalam form edit data
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row();
		echo json_encode($get,TRUE);
	}
	
  //method atau fungsi yang digunakan untuk menghapus data 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    //cek apakah foto/gambar tersedia
		$cek_foto = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row(); 
   
		if($cek_foto->foto != '' || $cek_foto->foto != NULL){
          //apabila foto ada maka dihapus,apabila sebaliknya maka tidak dihapus
          unlink("upload/".str_replace(" ","_",$cek_foto->foto));
		}   

    $sqlhapus = $this->m_about->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	
  //method atau fungsi yang digunakan untuk menyimpan data dari form,baik saat melakukan simpan maupun ubah data
	public function simpan_data(){
     

    $id =  $this->input->post('id');
	$deskripsi =  $this->input->post('deskripsi'); 

 
	$simpan_data = $this->db->set('deskripsi', $deskripsi)->where('id', $id)->update($this->nama_tabel);

	 
 
	
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
	
  //method atau fungsi yang digunakan untuk menyimpan foto/gambar dari form dan me return nama file yang baru di upload untuk digunakan saat penyimpanan atau perubahan data foto/gambar
  function upload_foto(){  
    if(isset($_FILES["user_image"])){  
        $extension = explode('.', $_FILES['user_image']['name']);   
        $destination = './upload/' . $_FILES['user_image']['name'];  
        return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
         
    }  
  }  
       


}
