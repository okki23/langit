<?php $this->load->view('header-template');?>

<body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template');?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Data User</h3>
				</div>
			</div>
		<!-- /sidebar -->
          <?php
   
   //                   echo "<a href='user/add_user' class='btn btn-xs btn-primary'>Add</a>";
                                        ?>
     
<p>
<div id="grid" style="width: 100%; height: 400px;"></div>
<div id="containers" style="width: 500px; height: 300px; margin: 0 auto"></div>
</body>



<script type="text/javascript">	
$(function () {    
    $('#grid').w2grid({ 
        name: 'grid', 
		recid: 'user_id',
    toolbar:{
            items: [    
            { type: 'button', id: 'print-btn', caption: 'Aktifkan', img: 'icon-key' }
            ],
            onClick : function(target, event) {
            var recid = w2ui['grid'].getSelection();
            if(target!=='w2ui-add')
            {if(recid=='')
            {alert ('Pilih dulu record dibawah');}
            else
            {
            //alert ('ada');
            if(target === 'print-btn'){
               
               window.location = '<?= base_url("") ?>user/aktif/'+recid;
            // console.log(recid);
            }
            if(target === 'print-persetujuan'){
                window.location = '<?= base_url("") ?>user/aktif/'+recid;
            }   
                }}
            
            
            
            
        },

        },
        show: { 
            toolbar: true,
            footer: true,
			toolbarAdd: <?php echo $flagAdd;?>,
            toolbarEdit: <?php echo $flagEdit;?>,
            toolbarDelete: <?php echo $flagDel;?>,
      //selectColumn: true
        },
		
        searches: [                
            { field: 'user_id', caption: 'ID', type: 'text' },
            { field: 'logon_success_last_date', caption: 'Last Login', type: 'text' },
            { field: 'karyawan', caption: 'Karyawan', type: 'text' }
            
        ],
        columns: [                
            { field: 'user_id', caption: 'ID', size: '200px', sortable: true, attr: 'align=left' },
            { field: 'logon_success_last_date', caption: 'Last Login', size: '10%', sortable: true },
            { field: 'status', caption: 'Level', size: '200px', sortable: true, attr: 'align=left' },
            { field: 'karyawan', caption: 'Karyawan', size: '5%', sortable: true, attr: 'align=left'}
            
            //{ field: 'opsiupdate', caption: 'Opsi Update', size: '5%', sortable: true },
            //{ field: 'opsidetail', caption: 'Opsi Detail', size: '5%', sortable: true }
        ],


        onAdd: function (event) {
           window.location='<?php echo base_url('user/add_user');?>'
        },
         onEdit: function (event) {
            //w2alert('edit');
            var record = this.get(event.recid);
          window.location='<?php echo base_url();?>user/user_update/'.concat(record.user_id);
        },
        onDelete: function (event) {
      
      var recid = w2ui['grid'].getSelection();
      if(event.force)
      {         
          window.location='<?php echo base_url();?>user/user_delete/' + recid;
        }
        else
        {
        console.log('delete is not allowed');
        }
            
        },
        onSubmit: function (event) {
            w2alert('save');
        }
    });    
	 w2ui['grid'].load('user/get_all_user_json');
	 //w2ui['grid'].select(10000004);
});
</script>
</div>
</div>
</html>	
