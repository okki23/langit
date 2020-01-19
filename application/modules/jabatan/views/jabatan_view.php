<?php $this->load->view('header-template');?>
<body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Data <?php echo $location;?></h3>
				</div>
			</div>
		<!-- /sidebar -->
<!--<a href="jabatan/add_jabatan" class="btn btn-xs btn-primary">Add</a><p>-->
<div id="grid" style="width: 100%; height: 400px;"></div>
<div id="containers" style="width: 500px; height: 300px; margin: 0 auto"></div>
</body>
<script type="text/javascript">	
$(function () {    
    $('#grid').w2grid({ 
        name: 'grid', 
		recid: 'id',
        show: { 
            toolbar: true,
            footer: true,
           toolbarAdd: <?php echo $flagAdd;?>,
            toolbarEdit: <?php echo $flagEdit;?>,
            toolbarDelete: <?php echo $flagDel;?>,
			selectColumn: true
        },
		
        searches: [                
           // { field: 'kode_jabatan', caption: 'Kode jabatan', type: 'text' },
            { field: 'nama_jabatan', caption: 'Nama jabatan', type: 'text' }
           // { field: 'wilayah', caption: 'Wilayah', type: 'text' }
            
        ],
        columns: [          
           // { field: 'kode_jabatan', caption: 'Kode jabatan', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'id', caption: 'Id', size: '2%', sortable: true },
            { field: 'nama_jabatan', caption: 'Nama jabatan', size: '30%', sortable: true },
            //{ field: 'wilayah', caption: 'Wilayah', size: '20%', sortable: true },
            //{ field: 'opsi', caption: 'Option', size: '5%', sortable: true, attr: 'align=center'},
            //{ field: 'opsiupdate', caption: 'Opsi Update', size: '5%', sortable: true },
            //{ field: 'opsidetail', caption: 'Opsi Detail', size: '5%', sortable: true }
        ],
        onAdd: function (event) {
           window.location='<?php echo base_url('jabatan/add_jabatan');?>'
        },
        onEdit: function (event) {
            //w2alert('edit');
            var record = this.get(event.recid);
	        window.location='<?php echo base_url();?>jabatan/jabatan_update/'.concat(record.id);
        },
        onDelete: function (event) {
			
			var recid = w2ui['grid'].getSelection();
			if(event.force)
			{			    
			    window.location='<?php echo base_url();?>jabatan/jabatan_delete/' + recid;
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
	 w2ui['grid'].load('jabatan/get_all_jabatan_json');
	 //w2ui['grid'].select(10000004);
	 
});
</script>
 
</div>
</div>
</html>	
