//Declare string variable
var modulename = "vehiclemanual";
var moduledesc = "Input Manual Kendaraan";

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
		{ "orderable": true, "targets": 0, "searchable": true },
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
		{ "orderable": true, "targets": 12, "searchable": true }
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
		$("#myModalLabel").html("Tambah " + moduledesc );
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
	$("#dono").val(data.dono);
	$("#dodate").val(data.dodate);
	$("#mechineno").val(data.mechineno);
	$("#rangkano").val(data.rangkano);
	$("#year").val(data.year);
	
	var vehiclecolor = data.vehiclecolor;
	$('#vehiclecolor option[value="' + vehiclecolor +'"]').prop("selected", true);
	
	var vehicletype = data.vehicletype;
	$('#vehicletype option[value="' + vehicletype +'"]').prop("selected", true);
	
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
			$("#myModalLabel").html("Hapus " + moduledesc);
			$("#idkey").val(data.idkey);
			$("#dono").val(data.dono);
			$("#dodate").val(data.dodate);
			$("#mechineno").val(data.mechineno);
			$("#rangkano").val(data.rangkano);
			$("#year").val(data.year);
			
			var vehiclecolor = data.vehiclecolor;
			$('#vehiclecolor option[value="' + vehiclecolor +'"]').prop("selected", true);
			
			var vehicletype = data.vehicletype;
			$('#vehicletype option[value="' + vehicletype +'"]').prop("selected", true);
			
			$("#type").val("delete");
			$("#dono").val(data.dono).attr("disabled","false");
			$("#dodate").val(data.dodate).attr("disabled","false");
			$("#mechineno").val(data.mechineno).attr("disabled","false");
			$("#rangkano").val(data.rangkano).attr("disabled","false");
			$("#year").val(data.year).attr("disabled","false");
			$("#vehiclecolor").val(data.vehiclecolor).attr("disabled","false");
			$("#vehicletype").val(data.vehicletype).attr("disabled","false");
			
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
	var counter = document.getElementById("vehicletype").value; 
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
	var counter = document.getElementById("vehiclestockname").value; 
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
	$("#dono").val("").removeAttr( "disabled" );
	$("#dodate").val("").removeAttr( "disabled" );
	$("#vehiclecolor").val("").removeAttr( "disabled" );
	$("#vehicletype").val("").removeAttr( "disabled" );
	$("#mechineno").val("").removeAttr( "disabled" );
	$("#rangkano").val("").removeAttr( "disabled" );
	$("#year").val("").removeAttr( "disabled" );
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
            vehicletype: {
                validators: {
                    stringLength: {
                        enabled: true,
                        min: 1,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Type kendaraan tidak boleh kosong'
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
