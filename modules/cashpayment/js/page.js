//Declare string variable
var modulename = "cashpayment";
var moduledesc = "Cash Payment";

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
		{ "orderable": true, "targets": 6, "searchable": true },
		{ "orderable": true, "targets": 7, "searchable": true },
		{ "orderable": true, "targets": 8, "searchable": true }
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
	$("#notrans").val(data.notrans);
	$("#datetrans").val(data.datetrans);
	$("#amount").val(data.amount);
	$("#amountsw").val(data.amount);
	$("#remark").val(data.remark);
	
	var supplierid = data.supplierid;
	$('#supplierid option[value="' + supplierid +'"]').prop("selected", true);
	
	var bankid = data.bankid;
	$('#bankid option[value="' + bankid +'"]').prop("selected", true);
	
	var paytypeid = data.paytypeid;
	$('#paytypeid option[value="' + paytypeid +'"]').prop("selected", true);
	
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
			$("#notrans").val(data.notrans);
			$("#datetrans").val(data.datetrans);
			$("#amount").val(data.amount);
			$("#remark").val(data.remark);
			$("#type").val("delete");
			$("#notrans").val(data.notrans).attr("disabled","false");
			$("#datetrans").val(data.datetrans).attr("disabled","false");
			$("#amount").val(data.amount).attr("disabled","false");
			$("#amountsw").val(data.amount).attr("disabled","false");
			$("#remark").val(data.remark).attr("disabled","false");
			$("#supplierid").val(data.supplierid).attr("disabled","false");
			$("#bankid").val(data.bankid).attr("disabled","false");
			$("#paytypeid").val(data.paytypeid).attr("disabled","false");
			
			var supplierid = data.supplierid;
			$('#supplierid option[value="' + supplierid +'"]').prop("selected", true);
			
			var bankid = data.bankid;
			$('#bankid option[value="' + bankid +'"]').prop("selected", true);
			
			var paytypeid = data.paytypeid;
			$('#paytypeid option[value="' + paytypeid +'"]').prop("selected", true);

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
	var counter = document.getElementById("paytypeid").value; 
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
			waitingDialog.hide();	
			$('#myModals').modal('hide');
	}
	dTable.ajax.reload();
}
function submitDataAdd()
{
	var counter = document.getElementById("paytypeid").value; 
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
			waitingDialog.hide();	
			showModals();
			dTable.ajax.reload();
	}
}
function clearModals()
{
	$("#removeWarning").hide();
	$("#idkey").val("").removeAttr( "disabled" );
	$("#datetrans").val("").removeAttr( "disabled" );
	$("#amount").val("").removeAttr( "disabled" );
	$("#amountsw").val("").removeAttr( "disabled" );
	$("#remark").val("").removeAttr( "disabled" );
	$("#supplierid").val("").removeAttr( "disabled" );
	$("#bankid").val("").removeAttr( "disabled" );
	$("#paytypeid").val("").removeAttr( "disabled" );
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
            paytypeid: {
                validators: {
                    stringLength: {
                        enabled: true,
                        min: 1,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Payment Type name is required'
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



function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}
function calculate() {
	var amountsw = document.getElementById('amountsw').value;
	var result = document.getElementById('amount');
		var rsamount = (amountsw);
		result.value = rsamount.replace(/,/g, "");
}

// insert commas as thousands separators 
function addCommas(n){
    var rx=  /(\d+)(\d{3})/;
    return String(n).replace(/^\d+/, function(w){
        while(rx.test(w)){
            w= w.replace(rx, '$1,$2');
        }
        return w;
    });
}
// return integers and decimal numbers from input
// optionally truncates decimals- does not 'round' input
function validDigits(n, dec){
    n= n.replace(/[^\d\.]+/g, '');
    var ax1= n.indexOf('.'), ax2= -1;
    if(ax1!= -1){
        ++ax1;
        ax2= n.indexOf('.', ax1);
        if(ax2> ax1) n= n.substring(0, ax2);
        if(typeof dec=== 'number') n= n.substring(0, ax1+dec);
    }
    return n;
}
window.onload= function(){
	//Calculate quantity
    n2= document.getElementById('amountsw');
    n2.value='';

    n2.onkeyup=n2.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='amount')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n2.onblur= function(){
        var 
        temp2=parseFloat(validDigits(n2.value));
        if(temp2)n2.value=addCommas(temp2.toFixed(0));
    }
	
}

