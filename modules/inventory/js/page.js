//Declare string variable
var modulename = "inventory";
var moduledesc = "Inventory";

//Show function
var dTable;
$(document).ready(function() {
	dTable = $('#datagrid').DataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"bJQueryUI": false,
		"responsive": true,
		"pageLength": 50,
		"scrollY": "360px",
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"sAjaxSource": "modules/" + modulename + "/post/show.php",
		"sServerMethod": "POST",
		"columnDefs": [
		{ "orderable": false, "targets": 0, "searchable": false },
		{ "orderable": true, "targets": 1, "searchable": true },
		{ "orderable": true, "targets": 2, "searchable": true },
		{ "orderable": true, "targets": 3, "searchable": true },
		{ "orderable": true, "targets": 4, "searchable": true },
		{ "orderable": true, "targets": 5, "searchable": true },
		{ "orderable": true, "targets": 6, "searchable": true }
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

//Post function
function showModals( idkey )
{
	clearModals();
	document.getElementById("submitnew").style.display = "block"; 
	document.getElementById("submitaddnew").style.display = "block"; 
	document.getElementById("submitdelete").style.display = "none";
	if( idkey )
	{
		clearModals();
		$.ajax({
			type: "POST",
			url: "modules/" + modulename + "/post/post.php",
			dataType: 'json',
			data: {idkey:idkey,type:"get"},
			success: function(res) {
				waitingDialog.hide();
				setModalData( res );
			}
		});
	}
	else
	{
		$("#myModalLabel").html("Add " + moduledesc );
		$("#type").val("new"); 
		waitingDialog.hide();
		$("#myModals").modal("show");
	}
}

function setModalData( data )
{
	clearModals();
	$("#myModalLabel").html("Update " + moduledesc);
	$("#myModalLabel").html(data.real_name);
	$("#idkey").val(data.idkey);
	$("#type").val("edit");

	$("#inventorycode").val(data.inventorycode);
	$("#inventoryname").val(data.inventoryname);
	$("#barcode").val(data.barcode);
	$("#unitprice").val(data.unitprice);
	
	var stockunit = data.stockunit;
	$('#unitname option[value="' + stockunit +'"]').prop("selected", true);
	
	var inventorytypeid = data.inventorytypeid;
	$('#inventorytypeid option[value="' + inventorytypeid +'"]').prop("selected", true);
	
	var inventorysizeid = data.inventorysizeid;
	$('#inventorysizeid option[value="' + inventorysizeid +'"]').prop("selected", true);
	
	var inventorybrandid = data.inventorybrandid;
	$('#inventorybrandid option[value="' + inventorybrandid +'"]').prop("selected", true);
					
	var status = data.status;
	$('#status option[value="' + status +'"]').prop("selected", true);
	$("#myModals").modal("show");
	waitingDialog.hide();	
}

function deleteData( idkey )
{
	clearModals();
	$.ajax({
		type: "POST",
		url: "modules/" + modulename + "/post/post.php",
		dataType: 'json',
		data: {idkey:idkey,type:"get"},
		success: function(data) {
			$("#myModalLabel").html("Delete " + moduledesc);
			$("#idkey").val(data.idkey);
			$("#inventorycode").val(data.inventorycode);
			$("#inventoryname").val(data.inventoryname);
			$("#barcode").val(data.barcode);
			$("#unitprice").val(data.unitprice);
			$("#type").val("delete");
			$("#inventorycode").val(data.inventorycode).attr("disabled","false");
			$("#inventoryname").val(data.inventoryname).attr("disabled","false");
			$("#barcode").val(data.barcode).attr("disabled","false");
			$("#inventorytypeid").val(data.inventorytypeid).attr("disabled","false");
			$("#inventorysizeid").val(data.inventorysizeid).attr("disabled","false");
			$("#inventorybrandid").val(data.inventorybrandid).attr("disabled","false");
			$("#stockunit").val(data.stockunit).attr("disabled","false");
			$("#unitprice").val(data.unitprice).attr("disabled","false");
			
			var stockunit = data.stockunit;
			$('#unitname option[value="' + stockunit +'"]').prop("selected", true);
			
			var inventorytypeid = data.inventorytypeid;
			$('#inventorytypeid option[value="' + inventorytypeid +'"]').prop("selected", true);
			
			var inventorysizeid = data.inventorysizeid;
			$('#inventorysizeid option[value="' + inventorysizeid +'"]').prop("selected", true);
			
			var inventorybrandid = data.inventorybrandid;
			$('#inventorybrandid option[value="' + inventorybrandid +'"]').prop("selected", true);
			
			var status = data.status;
			$('#status option[value="' + status +'"]').prop("selected", true);
	
			$("#myModals").modal("show");
			document.getElementById("submitnew").style.display = "none"; 
			document.getElementById("submitaddnew").style.display = "none"; 
			document.getElementById("submitdelete").style.display = "block";

			waitingDialog.hide();			
		}
	});
}

function submitData()
{
	var counter = document.getElementById("inventoryname").value; 
	if (counter == '') {
	  $('#formData').formValidation('validate');
	  } else {
			var formData = $("#formData").serialize();
			waitingDialog.show();
			$.ajax({
				type: "POST",
				url: "modules/" + modulename + "/post/post.php",
				dataType: 'json',
				data: formData,
				success: function(data) {
					dTable.ajax.reload();
					waitingDialog.hide();	
					$('#myModals').modal('hide');
				}
			});
			dTable.ajax.reload();
			waitingDialog.hide();	
			$('#myModals').modal('hide');
	}
}
function submitDataAdd()
{
	var counter = document.getElementById("inventoryname").value; 
	if (counter == '') {
	  $('#formData').formValidation('validate');
	  } else {
			var formData = $("#formData").serialize();
			waitingDialog.show();
			$.ajax({
				type: "POST",
				url: "modules/" + modulename + "/post/post.php",
				dataType: 'json',
				data: formData,
				success: function(data) {
					dTable.ajax.reload();
					waitingDialog.hide();	
					showModals();
				}
			});
			dTable.ajax.reload();
			waitingDialog.hide();	
			showModals();
	}
}
function clearModals()
{
	$("#removeWarning").hide();
	$("#idkey").val("").removeAttr( "disabled" );
	$("#inventorycode").val("").removeAttr( "disabled" );
	$("#inventoryname").val("").removeAttr( "disabled" );
	$("#inventorytypeid").val("").removeAttr( "disabled" );
	$("#inventorysizeid").val("").removeAttr( "disabled" );
	$("#inventorysizeid").val("").removeAttr( "disabled" );
	$("#barcode").val("").removeAttr( "disabled" );
	$("#unitprice").val("").removeAttr( "disabled" );
	$("#type").val("");
}

function RefreshData()
{
	dTable.ajax.reload();
}

//Validation function
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
            inventoryname: {
                validators: {
                    stringLength: {
                        enabled: true,
                        min: 1,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Inventory name is required'
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
