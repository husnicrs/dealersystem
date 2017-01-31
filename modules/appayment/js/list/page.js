//Declare string variable
var modulename = "appayment";
var moduledesc = "AP Payment";

//Show function
var dTable;
$(document).ready(function() {
	dTable = $('#datagridlist').DataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"bJQueryUI": false,
		"responsive": true,
		"pageLength": 50,
		"scrollY": "360px",
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"sAjaxSource": "modules/" + modulename + "/post/list/show.php",
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
	$('#datagridlist').removeClass( 'display' ).addClass('table table-striped table-bordered');
	$('#datagridlist tfoot th').each( function () {
		if( $(this).text() != "Action" ){
			var title = $('#datagridlist thead th').eq( $(this).index() ).text();
			$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
		}
	} );
	
} );
 
function RefreshData()
{
	dTable.ajax.reload();
}

//Detail function
//Detail config function
function showdetail()
{
	$('#dg').edatagrid({
		url:'modules/' + modulename + '/post/list/detail/get.php?key=' + key,
		updateUrl: 'modules/' + modulename + '/post/list/detail/update.php',
		destroyUrl: 'modules/' + modulename + '/post/list/detail/destroy.php'
	});

};

function doSearch(){
	$('#dg').datagrid('load',{
		msearchdetail: $('#msearchdetail').val(),
	});
}

function refreshgrid()
{
	$('#dg').datagrid('reload'); 
}
function showslip()
{
	 var slipid = document.getElementById("slipid").value;
	 var url = "report.php?mod=" + slipid + "&key="+ key;
	 PopupCenterDual(url,'Popup_Window','1000','650');
}

function keyCode(event) {
var x = event.keyCode;
if (x == 13) {
	doSearch();
}
return false;
}
$('#formData').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
	e.preventDefault();
	return false;
  }
});

//Center position window open
function PopupCenterDual(url, title, w, h) {
	// Fixes dual-screen position Most browsers Firefox
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

