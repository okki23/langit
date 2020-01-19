<?php $this->load->view('header-template');?>
<body>

<!-- Page container -->
    <div class="page-container">    
    <?php 
	if($this->session->userdata('ses_lit_level_user')=='1')
		{
	  	   $this->load->view('sidebar-template_karyawan',$location);	
		}
		else if($this->session->userdata('ses_lit_level_user')=='2')
		{
	  	   $this->load->view('sidebar-template-unit',$location);	
		}
		else 
		{$this->load->view('sidebar-template',$location);}
	//$this->load->view('sidebar-template',$location);
	
	?>
    <div class="page-content">
            <div class="page-header">
                <div class="page-title">
                    
                </div>
            </div>
        <!-- /sidebar -->



    <form class="form-horizontal" role="form" method="post" action="#">
    <br>
      <table width="100%">
        <tr>
          <th width="80%"><font color="#004991"> <b style="font-size: 20px;">PT. ASDP INDONESIA FERRY (PERSERO)</b><br>
                    PERUSAHAAN BUMN DI BIDANG JASA PELABUHAN & PENYEBERANGAN </font></th>
          <th width="20%"><img src="<?php echo base_url('assets/images/logo.png')?>"></th>
        </tr>
      </table>
<br>
      <table width="100%">
      <tr>
        <td width="30%" rowspan="8" ><img src="<?php echo base_url('assets/images/visi_pic1.jpg')?>" width="300px" height="100px"><br>
          <br>
          <br>
          <img src="<?php echo base_url('assets/images/visi_pic2.jpg')?>" width="300px" height="100px"><br>
          <br>
          <br>
          <img src="<?php echo base_url('assets/images/visi_pic3.jpg')?>" width="300px" height="100px"></td>
          
        <td colspan="3"><p style="font-size: 20px; text-align: center;" align="center"><font color="#004991"><b>VISI</b></font>
        						</td>
        <tr>
      <td colspan="3"><p align="center" style="font-size: 14px; text-align: justify;margin-left:10px;"><font color="#004991">"Menjadi Perusahaan Jasa Pelabuhan & Penyeberangan yang Terbaik & Terbesar di Tingkat Regional, Serta Mampu Memberikan Nilai Tambah Bagi <em>Stakeholder’s </em>"</font></td>
      </tr>
      <tr>
      <td colspan="3"><p style="font-size: 20px; text-align: center;" align="center"><font color="#004991"><b>MISI</b></font>
        						</td>
      </tr>
      <tr >
      <td width="2%" valign="top"><p style="font-size: 14px; text-align: justify;margin-left:10px;"><font color="#004991">1.</font></p></td>
      <td width="68%" valign="top"><p style="font-size: 14px; text-align: justify;margin-left:10px;"><font color="#004991">Menyediakan prasarana pelabuhan & sarana kapal penyeberangan yang tangguh sebagai pendukung dalam Sistem Logistik Nasional</font></p></td>
      </tr>
      <tr>
      <td valign="top"><p style="font-size: 14px; text-align: justify;margin-left:10px;"><font color="#004991">2.</font></p></td>
      <td valign="top"><p style="font-size: 14px; text-align: justify;margin-left:10px;"><font color="#004991">Memiliki standar pelayanan Internasional yang didukung oleh tenaga profesional & manajemen bisnis modern serta tata kelola perusahaan yang baik </font></p></td>
      </tr>
      <tr>
      <td valign="top"><p style="font-size: 14px; text-align: justify;margin-left:10px;"><font color="#004991">3.</font></p></td>
      <td valign="top"><p style="font-size: 14px; text-align: justify;margin-left:10px;"><font color="#004991">Menguasai pangsa pasar Nasional & memperluas jaringan operasional sampai ke tingkat regional untuk memaksimalkan pertumbuhan & keuntungan</font></p></td>
      </tr>
      <tr>
      <td valign="top"><p style="font-size: 14px; text-align: justify;margin-left:10px;"><font color="#004991">4.</font></p></td>
      <td valign="top"><p style="font-size: 14px; text-align: justify;margin-left:10px;"><font color="#004991">Memaksimalkan peran sebagai korporasi & infrastruktur Negara serta agen Pembangunan</font></p></td>
      </tr>
      </table>
            
    </form>
  </div>
 
</div>
</div>
</body>
</html> 

