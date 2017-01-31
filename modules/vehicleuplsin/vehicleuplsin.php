<?php
$subnavmenu = new Subnavmenu();
$modulename=$_GET['mod'];
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header" style="margin-top:-15px !important; margin-bottom:-20px !important">
  <h4>
    <?php echo $subnavmenuname; ?>
  </h4>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"><?php echo $navmenuname; ?></a></li>
    <li class="active"><?php echo $subnavmenuname; ?></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
 <form class="form-horizontal" id="formData" name="formData"  method="post" action="" enctype="multipart/form-data">
 <input type="hidden" class="form-control" id="type" name="type" value="generate">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-danger">
      <div class="box-header with-border" style="height:50px !important; margin-top:-2px !important">
          <a onClick="Sinkronisasi()" class="btn btn-warning" style="float:left; margin-right:5px"> <i class="fa fa-play"></i> Sinkron</a>
          <button onClick="RefreshData()" type="button" class="btn btn-success btn-flat"> <i class="fa fa-refresh"></i> Refresh</button>
          <?php
			$rl = new Vehicleuplsin();
			$datarl = $rl->showvehicleuplsin();
			foreach ($datarl as $value) {
				extract($value);
		  ?>
          <input type="hidden" id="countnull" name="countnull" value="<?php echo $countnull; ?>" >
          <?php
           }
          ?>
          <div class="box-tools pull-right">
          <div class="tableTools-container">
              <button class="btn btn-white btn-primary  btn-bold" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
          </div><!-- /.box-tools -->
      </div>
      <div class="box-header" style="margin-top:-20px">
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
					"pageLength": 100,
					"scrollY": "375px",
					"lengthMenu": [[10, 25, 100, -1], [10, 25, 100, "All"]],
					"sAjaxSource": "<?php echo $pagepost; echo $modulename;?>_show.php",
					"sServerMethod": "POST",
					"columnDefs": [
					{ "orderable": false, "targets": 0, "searchable": false },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true },
					{ "orderable": true, "targets": 5, "searchable": true },
					{ "orderable": true, "targets": 6, "searchable": true },
					{ "orderable": true, "targets": 7, "searchable": true },
					{ "orderable": true, "targets": 8, "searchable": true },
					{ "orderable": true, "targets": 9, "searchable": true }
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
        <table id="datagrid"  class="table table-bordered table-hover">
            <thead>
                <tr>
                   	<th>No DO</th>
                   	<th>Tgl DO</th>
                    <th>Model</th>
                    <th>Jenis</th>
                    <th>Tipe</th>
                    <th>Warna</th>
                    <th>No Rangka</th>
                    <th>Tahun</th>
                    <th>CC</th>
                    <th>OTR</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>		
        <!-- Modal Popup -->
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row --> 
 </form>
</section><!-- /.content -->
</div>

<script type="text/javascript">
function Sinkronisasi()
{
	var counter = document.getElementById("countnull").value; 
	if (counter > 0) {
		createMsgErr();
		} else {
			var formData = $("#formData").serialize();
			createMsg();
			$.ajax({
				type: "POST",
				url: "<?php echo $pagepost; ?>sinkron.php",
				dataType: 'json',
				data: formData,
				success: function(data) {
					$("#type").val("generate");
					dTable.createMsg.reload();
					createMsg();
				}
			});
			dTable.ajax.reload();
	}
}

function createMsgErr()
{
	 $.messager.alert('Salah','Data tidak lengkap, cek type kendaraan!','error');
}

function createMsg()
{
	 $.messager.alert('Info','Data telah disinkronisasi!','info');
}


$(document).ready(function() {
    $('#formData').formValidation({
		framework: 'bootstrap',
        excluded: ':disabled',
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            unitname: {
                validators: {
                    stringLength: {
                        enabled: true,
                        min: 1,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Travelling type is required'
                    }
                }
            }
        }
    })
	 .on('success.form.fv', function(e) {
		var $form     = $(e.target),
			validator = $form.data('formValidation');
		$form
			.formValidation('resetForm', true);    
	});
});
$('#myModals').on('hidden.bs.modal', function() {
    $('#formData').formValidation('resetForm', true);
});
function RefreshData()
{
	dTable.ajax.reload();
}
</script>







