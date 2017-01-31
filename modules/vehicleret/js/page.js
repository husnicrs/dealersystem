//Declare string variable
var modulename = "vehicleret";
var moduledesc = "Surat Jalan";

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
		{ "orderable": true, "targets": 5, "searchable": true }
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
 
function RefreshData()
{
	dTable.ajax.reload();
}
function RefreshDataUnit()
{
	dTableunit.ajax.reload();
}
//Detail function
//Detail config function
function showdetail()
{
	$('#dg').edatagrid({
		url:'modules/' + modulename + '/post/detail/get.php?key=' + key,
		saveUrl: 'modules/' + modulename + '/post/detail/save.php?key=' + key,
		updateUrl: 'modules/' + modulename + '/post/detail/update.php',
		destroyUrl: 'modules/' + modulename + '/post/detail/destroy.php',
		
		onBeforeSave: function(index){
			
			var inventory = $(this).edatagrid('getEditor', {
				index: index,
				field: 'inventoryid'
			});
			var row = $(this).edatagrid('getRows')[index];
			row.inventoryname = $(inventory.target).combogrid('getText');

		}
	});

};

// Calculate two coloumn or more
$(function(){
	var lastIndex;
	$('#dg').datagrid({
		onBeginEdit:function(rowIndex){
			var editors = $('#dg').datagrid('getEditors', rowIndex);
			var n1 = $(editors[2].target);
			var n2 = $(editors[3].target);
			var n3 = $(editors[4].target);
			var n4 = $(editors[5].target);
			n1.add(n2).add(n3).add(n4).numberbox({
				onChange:function(){
var cost2 = n1.numberbox('getValue')*n2.numberbox('getValue')-n1.numberbox('getValue')*n2.numberbox('getValue')*n3.numberbox('getValue')/100;
					n4.numberbox('setValue',cost2);
				}
			})
		}
	});
});


function doSearch(){
	$('#dg').datagrid('load',{
		msearchdetail: $('#msearchdetail').val(),
	});
}

function refreshgrid()
{
	$('#dg').datagrid('reload'); 
}
function expandAllRow()
{
	var dg = $('#dg');
	var count = dg.datagrid('getRows').length;
	for(var i=0; i<count; i++){
	  dg.datagrid('expandRow',i);
	}
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
    n2= document.getElementById('otrsw');

    n2.onkeyup=n2.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='otr')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n2.onblur= function(){
        var 
        temp2=parseFloat(validDigits(n2.value));
        if(temp2)n2.value=addCommas(temp2.toFixed(0));
    }
	
	//Calculate 
    n3= document.getElementById('beanoticesw');

    n3.onkeyup=n3.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='beanotice')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n3.onblur= function(){
        var 
        temp3=parseFloat(validDigits(n3.value));
        if(temp3)n3.value=addCommas(temp3.toFixed(0));
    }
	
	//Calculate 
    n4= document.getElementById('beaadmsw');

    n4.onkeyup=n4.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='beaadm')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n4.onblur= function(){
        var 
        temp4=parseFloat(validDigits(n4.value));
        if(temp4)n4.value=addCommas(temp4.toFixed(0));
    }
	
	//Calculate 
    n5= document.getElementById('bbntotalsw');

    n5.onkeyup=n5.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='bbntotal')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n5.onblur= function(){
        var 
        temp5=parseFloat(validDigits(n5.value));
        if(temp5)n5.value=addCommas(temp5.toFixed(0));
    }
	
	//Calculate 
    n6= document.getElementById('tunaiscpmdsw');

    n6.onkeyup=n6.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='tunaiscpmd')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n6.onblur= function(){
        var 
        temp6=parseFloat(validDigits(n6.value));
        if(temp6)n6.value=addCommas(temp6.toFixed(0));
    }
	
	//Calculate 
    n7= document.getElementById('tunaiscpdaelersw');

    n7.onkeyup=n7.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='tunaiscpdaeler')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n7.onblur= function(){
        var 
        temp7=parseFloat(validDigits(n7.value));
        if(temp7)n7.value=addCommas(temp7.toFixed(0));
    }
	
	//Calculate 
    n8= document.getElementById('tunaidscmarketingsw');

    n8.onkeyup=n8.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='tunaidscmarketing')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n8.onblur= function(){
        var 
        temp8=parseFloat(validDigits(n8.value));
        if(temp8)n8.value=addCommas(temp8.toFixed(0));
    }
	
	//Calculate 
    n9= document.getElementById('tunaidsckonsumensw');

    n9.onkeyup=n9.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='tunaidsckonsumen')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n9.onblur= function(){
        var 
        temp9=parseFloat(validDigits(n9.value));
        if(temp9)n9.value=addCommas(temp9.toFixed(0));
    }
	
	//Calculate 
    n10= document.getElementById('creditscmdsw');

    n10.onkeyup=n10.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='creditscmd')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n10.onblur= function(){
        var 
        temp10=parseFloat(validDigits(n10.value));
        if(temp10)n10.value=addCommas(temp10.toFixed(0));
    }
	
	//Calculate 
    n11= document.getElementById('creditscpdealersw');

    n11.onkeyup=n11.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='creditscpdealer')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n11.onblur= function(){
        var 
        temp11=parseFloat(validDigits(n11.value));
        if(temp11)n11.value=addCommas(temp11.toFixed(0));
    }
	
	//Calculate 
    n12= document.getElementById('creditsubsidisw');

    n12.onkeyup=n12.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='creditsubsidi')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n12.onblur= function(){
        var 
        temp12=parseFloat(validDigits(n12.value));
        if(temp12)n12.value=addCommas(temp12.toFixed(0));
    }
	
	//Calculate 
    n13= document.getElementById('creditgrossdpsw');

    n13.onkeyup=n13.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='creditgrossdp')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n13.onblur= function(){
        var 
        temp13=parseFloat(validDigits(n13.value));
        if(temp13)n13.value=addCommas(temp13.toFixed(0));
    }
	
	//Calculate 
    n14= document.getElementById('creditdiscmarketingsw');

    n14.onkeyup=n14.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='creditdiscmarketing')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n14.onblur= function(){
        var 
        temp14=parseFloat(validDigits(n14.value));
        if(temp14)n14.value=addCommas(temp14.toFixed(0));
    }
	
	//Calculate 
    n15= document.getElementById('creditdisckonsumensw');

    n15.onkeyup=n15.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='creditdisckonsumen')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n15.onblur= function(){
        var 
        temp15=parseFloat(validDigits(n15.value));
        if(temp15)n15.value=addCommas(temp15.toFixed(0));
    }
	
	//Calculate 
    n16= document.getElementById('creditnettdpsw');

    n16.onkeyup=n16.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='creditnettdp')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n16.onblur= function(){
        var 
        temp16=parseFloat(validDigits(n16.value));
        if(temp16)n16.value=addCommas(temp16.toFixed(0));
    }
	
	//Calculate 
    n17= document.getElementById('credittenorsw');

    n17.onkeyup=n17.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='credittenor')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n17.onblur= function(){
        var 
        temp17=parseFloat(validDigits(n17.value));
        if(temp17)n17.value=addCommas(temp17.toFixed(0));
    }
	
	//Calculate 
    n18= document.getElementById('creditcicilansw');

    n18.onkeyup=n18.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='creditcicilan')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n18.onblur= function(){
        var 
        temp18=parseFloat(validDigits(n18.value));
        if(temp18)n18.value=addCommas(temp18.toFixed(0));
    }
	
	//Calculate 
    n19= document.getElementById('creditcostadmsw');

    n19.onkeyup=n19.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='creditcostadm')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n19.onblur= function(){
        var 
        temp19=parseFloat(validDigits(n19.value));
        if(temp19)n19.value=addCommas(temp19.toFixed(0));
    }
	
	//Calculate 
    n20= document.getElementById('subleasingsw');

    n20.onkeyup=n20.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='subleasing')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n19.onblur= function(){
        var 
        temp19=parseFloat(validDigits(n19.value));
        if(temp19)n19.value=addCommas(temp19.toFixed(0));
    }
	
	//Calculate 
    n21= document.getElementById('tunainettbayarsw');
	n21.onkeyup=n21.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='tunainettbayar')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
   }   
   n21.onblur= function(){
        var 
        temp21=parseFloat(validDigits(n21.value));
        if(temp21)n21.value=addCommas(temp21.toFixed(0));
    }
	
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

function SavePrint()
{
	var formData = $("#formData").serialize();
	$.ajax({
		type: "POST",
		url: "modules/" + modulename + "/post/saveprint.php",
		dataType: 'json',
		data: formData,
		success: function(data) {
			$("#type").val("generate");
			//refreshgrid();
			//generateMsg();
		}
	});
}

