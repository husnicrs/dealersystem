<?php
$subnavmenu = new Subnavmenu();
$modulename=$_GET['mod'];
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);
$data = $subnavmenu->showfilter();
extract($data);
$user=$_SESSION['uname'];

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
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-danger">
      <div class="box-header with-border" style="height:50px !important; margin-top:-2px !important">
          <form id="stdfrm" name="stdfrm"  action="report.php?mod=<?php echo $modulename; ?>_print" method="post" enctype="multipart/form-data" target="TheWindow">
          	  <input type="hidden" class="form-control" id="type" name="type" value="generate">
              <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $user; ?>">
              <input type="text" id="rptdatefrom" name="rptdatefrom" value="<?php echo $fbegindate; ?>" onchange="RefreshData()" style="height:32px !important;"/>
               - <input type="text" id="rptdateto" name="rptdateto" value="<?php echo $fenddate; ?>" onchange="RefreshData()" style="height:32px !important"/>
               
               <div class="form-group pull-left">
                    <div class="col-sm-12 pull-right">
                     <label for="real_name" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control"  style="width: 100%;" name="statusstnk" id="statusstnk" onchange="RefreshData();">
                               
                               <option value="<?php echo $statusstnk; ?>"><?php echo $statusstnk; ?></option>
                               <option value="BELUM DIBUAT">BELUM DIBUAT</option>
                               <option value="BELUM DIAMBIL">BELUM DIAMBIL</option>
                               <option value="SUDAH DIAMBIL">SUDAH DIAMBIL</option>
                             </select>
                        </div>
                    </div>
                </div>
               
              <button type="submit" type="button" class="btn btn-primary btn-flat"> <i class="fa fa-print"></i> Cetak</button>
               <button onClick="RefreshData()" type="button" class="btn btn-success btn-flat"> <i class="fa fa-refresh"></i> Refresh</button>
              <div class="box-tools pull-right">
              <div class="tableTools-container">
                  <button class="btn btn-white btn-primary  btn-bold" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
              </div><!-- /.box-tools -->
          </form>
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
					"scrollY": "350px",
					"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
					"sAjaxSource": "<?php echo $pagepost;?>show.php?user=<?php echo $user ?>",
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
					{ "orderable": true, "targets": 9, "searchable": true },
					{ "orderable": true, "targets": 10, "searchable": true },
					{ "orderable": true, "targets": 11, "searchable": true },
					{ "orderable": true, "targets": 12, "searchable": true },
					{ "orderable": true, "targets": 13, "searchable": true },
					{ "orderable": true, "targets": 14, "searchable": true }
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
                    <th>TANGGAL</th>
                    <th>CUSTOMER</th>
                    <th>TYPE</th>
                    <th>WARNA</th>
                    <th>NO MESIN</th>
                    <th>NO POLISI</th>
                    <th>NO STNK</th>
                    <th>TGL STNK</th>
                    <th>TGL BPKB</th>
                    <th>TGL AMBIL</th>
                    <th>PENERIMA</th>
                    <th>NAMA BPKB</th>
                    <th>NO BPKB</th>
                    <th>NO BUKU</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>		<!-- Modal Popup -->        
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->
</div>

<script type="text/javascript">
	function PopupCenter(url, title, w, h) {  
		// Fixes dual-screen position                         Most browsers      Firefox  
		var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;  
		var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;  
				  
		width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;  
		height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;  
				  
		var left = ((width / 2) - (w / 2)) + dualScreenLeft;  
		var top = ((height / 2) - (h / 2)) + dualScreenTop;  
		var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);  
	  
		// Puts focus on the newWindow  
		if (window.focus) {  
			newWindow.focus();  
		}  
	}
	var myForm = document.getElementById('stdfrm');
	myForm.onsubmit = function() {
		var w = PopupCenter('about:blank','Popup_Window','900','670');
		this.target = 'Popup_Window';
	};
	
		function RefreshData()
	{
		var formData = $("#stdfrm").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo $pagepost; ?>refresh.php",
			dataType: 'json',
			data: formData,
			success: function(data) {
				$("#type").val("generate");
			}
		});
		dTable.ajax.reload();
	}

</script>

