<?php
$db=new Database();
$key = $_GET['key'];
?>
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
     <form class="form-horizontal" id="formDataHeader" name="formaccount"  method="post" action="" enctype="multipart/form-data">
    <div class="box box-danger">
        <div class="box-header with-border"  style="margin-bottom:-10px">
           <div class="box-body">
        </div><!-- /.box-header -->
        <div class="box-body">
		<script type="text/javascript" language="javascript" >
			var dTable;
			$(document).ready(function() {
				dTable = $('#datagrid').DataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"sAjaxSource": "modules/rptpurchaseorder/detail/show.php?key=<?php echo $key ?>",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true },
					{ "orderable": true, "targets": 5, "searchable": true },
					{ "orderable": true, "targets": 6, "searchable": true },
					{ "orderable": true, "targets": 7, "searchable": true }   
					]
				} );
				$('#datagrid').removeClass( 'display' ).addClass('table table-striped table-bordered');
				$('#datagrid tfoot th').each( function () {
					if( $(this).text() != "Action" ){
						var title = $('#datagrid thead th').eq( $(this).index() ).text();
						$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
					}
				} );
				
			} );
		</script>
        <table id="datagrid"  class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode Part</th>
                    <th>Nama Part</th>
                    <th>Satuan</th>
                    <th>No Rak</th>
                    <th>Jumlah</th> 
                    <th>Harga</th> 
                    <th>Diskon</th> 
                    <th>Total</th> 
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->



