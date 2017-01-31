//Declare string variable
var modulename = "currency";
var moduledesc = "Currency";

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
		{ "orderable": true, "targets": 3, "searchable": true }
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
	$("#currencyname").val(data.currencyname);
	$("#description").val(data.description);
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
			$("#currencyname").val(data.currencyname);
			$("#description").val(data.description);
			$("#type").val("delete");
			$("#currencyname").val(data.currencyname).attr("disabled","false");
			$("#description").val(data.description).attr("disabled","false");
			
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
	var counter = document.getElementById("currencyname").value; 
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
	}
}
function submitDataAdd()
{
	var counter = document.getElementById("currencyname").value; 
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
	}
}
function clearModals()
{
	$("#removeWarning").hide();
	$("#idkey").val("").removeAttr( "disabled" );
	$("#currencyname").val("").removeAttr( "disabled" );
	$("#description").val("").removeAttr( "disabled" );
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
            currencyname: {
                validators: {
                    stringLength: {
                        enabled: true,
                        min: 1,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Currency name is required'
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
