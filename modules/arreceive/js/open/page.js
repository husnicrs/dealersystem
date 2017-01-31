//Declare string variable
var modulename = "arreceive";
var moduledesc = "Pencairan Piutang";

//Show function
var dTableOpen;
$(document).ready(function() {
	dTableOpen = $('#datagridopen').DataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"bJQueryUI": false,
		"responsive": true,
		"pageLength": 50,
		"scrollY": "350px",
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"sAjaxSource": "modules/" + modulename + "/post/open/show.php",
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
	$('#datagridopen').removeClass( 'display' ).addClass('table table-striped table-bordered');
	$('#datagridopen tfoot th').each( function () {
		if( $(this).text() != "Action" ){
			var title = $('#datagridopen thead th').eq( $(this).index() ).text();
			$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
		}
	} );
	
} );
 
function RefreshDataOpen()
{
	dTableOpen.ajax.reload();
}

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

$(function () {
	$('#example1').DataTable({
	  "paging": true,
	  "lengthChange": true,
	  "searching": true,
	  "ordering": true,
	  "info": true,
	  "autoWidth": true,
	  "scrollY": "300px",
	  "pageLength": 100,
	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
	});
});
