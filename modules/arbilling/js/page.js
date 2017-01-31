//Declare string variable
var modulename = "arbilling";
var moduledesc = "Cetak Tagihan";


//Post function
function showModals( idkeyleasing )
{
	document.getElementById("submitnew").style.display = "block"; 
	if( idkeyleasing )
	{
		clearModals();
		$.ajax({
			type: "POST",
			url: "modules/" + modulename + "/post/postleasing.php",
			dataType: 'json',
			data: {idkeyleasing:idkeyleasing,typeleasing:"get"},
			success: function(res) {
				setModalData( res );
			}
		});
	}
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
    n2= document.getElementById('brutoamountsw');

    n2.onkeyup=n2.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='brutoamount')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n2.onblur= function(){
        var 
        temp2=parseFloat(validDigits(n2.value));
        if(temp2)n2.value=addCommas(temp2.toFixed(0));
    }
	
	//Calculate 
    n3= document.getElementById('creditnettdpsw');

    n3.onkeyup=n3.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='creditnettdp')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n3.onblur= function(){
        var 
        temp3=parseFloat(validDigits(n3.value));
        if(temp3)n3.value=addCommas(temp3.toFixed(0));
    }
	
	//Calculate 
    n4= document.getElementById('otrsw');

    n4.onkeyup=n4.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='otr')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n4.onblur= function(){
        var 
        temp4=parseFloat(validDigits(n4.value));
        if(temp4)n4.value=addCommas(temp4.toFixed(0));
    }
	
	//Calculate 
    n5= document.getElementById('schemesw');

    n5.onkeyup=n5.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='scheme')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n5.onblur= function(){
        var 
        temp5=parseFloat(validDigits(n5.value));
        if(temp5)n5.value=addCommas(temp5.toFixed(0));
    }
	
	//Calculate 
    n6= document.getElementById('subleasingsw');

    n6.onkeyup=n6.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='subleasing')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n6.onblur= function(){
        var 
        temp6=parseFloat(validDigits(n6.value));
        if(temp6)n6.value=addCommas(temp6.toFixed(0));
    }
	
	//Calculate 
    n7= document.getElementById('accessoriessw');

    n7.onkeyup=n7.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='accessories')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n7.onblur= function(){
        var 
        temp7=parseFloat(validDigits(n7.value));
        if(temp7)n7.value=addCommas(temp7.toFixed(0));
    }
	
}

function setModalData( data )
{
	$("#myModalLabel").html("Update " + moduledesc);
	$("#myModalLabel").html(data.real_name);
	$("#idkeyleasing").val(data.idkeyleasing);
	$("#typeleasing").val("edit");
	$("#leasingname").val(data.leasingname);
	$("#companyname").val(data.companyname);
	$("#addressls").val(data.addressls);
	$("#paymentls").val(data.paymentls);
	$("#dppols").val(data.dppols);
	$("#otrls").val(data.otrls);
	$("#subleasing").val(data.subleasing);
	$("#scheme").val(data.scheme);
	$("#accessories").val(data.accessories);
	
	var status = data.status;
	$('#status option[value="' + status +'"]').prop("selected", true);
	$("#myModals").modal("show");
	waitingDialog.hide();	
}

function submitData()
{
	var counter = document.getElementById("companyname").value; 
	if (counter == '') {
	  $('#formData').formValidation('validate');
	  } else {
			var formData = $("#formData").serialize();
			waitingDialog.show();
			$.ajax({
				type: "POST",
				url: "modules/" + modulename + "/post/postleasing.php",
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
function clearModals()
{
	
	$("#removeWarning").hide();
	$("#idkey").val("").removeAttr( "disabled" );
	$("#leasingname").val("").removeAttr( "disabled" );
	$("#companyname").val("").removeAttr( "disabled" );
	$("#address").val("").removeAttr( "disabled" );
	$("#payment").val("").removeAttr( "disabled" );
	$("#dppo").val("").removeAttr( "disabled" );
	$("#otr").val("").removeAttr( "disabled" );
	$("#scheme").val("").removeAttr( "disabled" );
	$("#accessories").val("").removeAttr( "disabled" );
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
            companyname: {
                validators: {
                    stringLength: {
                        enabled: true,
                        min: 1,
                        message: ''
                    },
                    notEmpty: {
                        message: 'Company name name is required'
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

function showslip()
{
	 var slipid = document.getElementById("slipid").value;
	 var spformat = document.getElementById("spformat").value;
	 var url = "report.php?mod=" + slipid + "_" + spformat;
	 PopupCenterDual(url,'Popup_Window','800','650');
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

function SavePrint()
{
	var formData = $("#formData").serialize();
	$.ajax({
		type: "POST",
		url: "modules/" + modulename + "/post/refresh.php",
		dataType: 'json',
		data: formData,
		success: function(data) {
			$("#typerefresh").val("generate");
			//refreshgrid();
			//generateMsg();
		}
	});
}

