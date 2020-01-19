
<style>

.foo {
    background-color: #EB8B1B;
	font-size:10px;
	padding-bottom:10px;
	color:black;
}

</style>
<?php
$query = $this->db->query("select 'sipegawai' as ultah,'programmer' as name_position,'IT Dept' as nama_unitkerja,'Adm' as tipe ");
		  
	?>
<div class="foo navbar-fixed-bottom">
&nbsp; <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">KARYAWAN ULTAH HARI INI : <b><?php  
$no = 1;
foreach ($query->result() as $row) {
				//echo $no.'.'.$row->ultah.', ';
				echo $no.'.'.$row->ultah.'('.$row->name_position.' - '.$row->nama_unitkerja.' - '.$row->tipe.') ,';
				$no++;
	        }
?></b></marquee>
</div>
<!--<div class="pass">  TEST</div>-->
    <!-- Footer -->
    <div class="footer clearfix">
        <div class="pull-left">  <a href="#">PT. Langit Infotama &copy; 2016 </a>: Best View Resolution 1366 x 768</div>
    	
    </div>
    <!-- /footer -->
