//Declare string variable
var modulename = "goodreceive";
var moduledesc = "Good Receive";

//Show function
var dTable;
$(document).ready(function() {
	dTable = $('#datagridopen').DataTable( {
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
		{ "orderable": true, "targets": 7, "searchable": true }
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
 
function RefreshData()
{
	dTable.ajax.reload();
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

//Checkbox pick
$(document).ready(function(){
    $('#selectall').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
				$(this).parents("tr:eq(0)").find(".form-control").prop("disabled",false); 
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
				$(this).parents("tr:eq(0)").find(".form-control").prop("disabled",true);
            });
        }
    });
});

// Tick all checkbox
$('#selectall').click (function () {
    var checkedStatus = this.checked;
    $('table tbody').find('input[type="checkbox"]').each(function () {
        $(this).prop('checked', checkedStatus);        
    });
    updateSum();
});

// SUM UP TEXTBOXES IF CHECKBOX CHECKED
$('tbody input[type="checkbox"]').change(updateSum);

function updateSum() {
    var sum = 0.00;
    $("tbody input:checked").each(function(){
        var test = $(this).closest('tr').find('input[type="text"]').val();
        var testNum = parseFloat(test.replace( ",", "."));
        if (!isNaN(testNum)) {
            sum += testNum;
        }        
    });    
    $("#sum").text(sum.toFixed(2).replace(".",","));
}

$('.checkbox').change( function() {
    var isChecked = this.checked;
    if(isChecked) {
        $(this).parents("tr:eq(0)").find(".form-control").prop("disabled",false); 
    } else {
        $(this).parents("tr:eq(0)").find(".form-control").prop("disabled",true);
    }
    
});

function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
}
function updateSum() {
    var sum = 0.00;
    $("tbody input:checked").each(function(){
        var test = $(this).closest('tr').find('input[type="text"]').val();
        var testNum = parseFloat(test.replace( ",", "."));
        if (!isNaN(testNum)) {
            sum += testNum;
        }        
    });    
    $("#sum").text(sum.toFixed(2).replace(".",","));
}
