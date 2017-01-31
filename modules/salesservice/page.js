//Declare string variable
var modulename = "salesservice";
var moduledesc = "Salesservice Order";

//Show function
var dTable;
$(document).ready(function() {
	dTable = $('#datagrid').DataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"bJQueryUI": false,
		"responsive": true,
		"pageLength": 100,
		"scrollY": "360px",
		"lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
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
		{ "orderable": true, "targets": 7, "searchable": true }
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
			row.inventoryname = $(inventory.target).combobox('getText');
		}
	});

};



// Calculate two coloumn or more
$(function(){
	var lastIndex;
	$('#dg').datagrid({
		onBeginEdit:function(rowIndex){
			var editors = $('#dg').datagrid('getEditors', rowIndex);
			var q1 = $(editors[2].target);
			var q2 = $(editors[3].target);
			var q3 = $(editors[4].target);
			
			var n2 = $(editors[5].target);
			var n3 = $(editors[6].target);
			var n4 = $(editors[7].target);
			
			q1.add(q2).add(q3).add(n2).add(n3).add(n4).numberbox({
				onChange:function(){
				var cost2 = q3.numberbox('getValue')*n2.numberbox('getValue')-q3.numberbox('getValue')*n2.numberbox('getValue')*n3.numberbox('getValue')/100;
					n4.numberbox('setValue',cost2);
					
				var avlqty = q1.numberbox('getValue')-q3.numberbox('getValue');
					q2.numberbox('setValue',avlqty);
					
				var avlqtychck = q2.numberbox('getValue')
				if (avlqtychck < 0){
					alert ("Stock not available!");
					q3.numberbox('setValue',0);
					}
				}
			})
			
		} 
	});
});


function doSearch(){
	$('#dg').datagrid('load',{
		msearchdetail: $('#msearchdetail').val(),
		success: function(data) {
			getTotalamount();
		}
	});
}
var myVar = setInterval(function(){ getTotalamount() }, 1000);
function getTotalamount(){
	var data = $('#dg').datagrid('getData');
	  var rows = data.rows;
	  var sum = 0;
	  for (i=0; i < rows.length; i++) {
		//sum+=rows[i].amount;
		var str = rows[i].amount;
		var res = str.replace(/,/g, "");
		//alert(res);
		sum+=parseFloat(res);
	  }
	  // just to show if the sum is OK
 	 //$('#totalamount').textbox('setText', sum);
	 $("#totalamount").val(sum);
}

function refreshgrid()
{
	$('#dg').datagrid('reload'); 
	getTotalamount();
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
		generateData();
		$('#barcode').focus();
	}
	return false;
}

function handle(event) {
	var x = event.keyCode;
	if (x == 13) {
		$('#quantitysw').focus();
	}
	return false;
}

function generateData()
{
	var formData = $("#formData").serialize();
	$.ajax({
		type: "POST",
		url: 'modules/' + modulename + '/post/generate.php',
		dataType: 'json',
		data: formData,
		success: function(data) {
			//$("#programid").val(data.programid);
			//$("#type").val("generate");
			doSearch();
			getTotalamount();
		}
		
	});
	doSearch();
	doSearch();
	doSearch();
	doSearch();

}

$('#formData').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
	e.preventDefault();
	return false;
  }
});

// insert commas as thousands separators 
function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}
function calculate() {
	var quantitysw = document.getElementById('quantitysw').value;
	var result = document.getElementById('quantity');
		var rsquantity = (quantitysw);
		result.value = rsquantity.replace(/,/g, "");
		
	var payamountsw = document.getElementById('payamountsw').value;
	var result1 = document.getElementById('payamount');
		var rspayamount = (payamountsw);
		result1.value = rspayamount.replace(/,/g, "");
}

var myVarnett = setInterval(function(){ calculatenett() }, 2000);
function calculatenett() {
	var totalamountsw = document.getElementById('totalamount').value;
	var result = document.getElementById('totalamountsw');
		var rstotalamount = (totalamountsw);
		result.value = rstotalamount.replace(/,/g, "");
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
    n2= document.getElementById('quantitysw');
    n2.value='';

    n2.onkeyup=n2.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='quantity')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n2.onblur= function(){
        var 
        temp2=parseFloat(validDigits(n2.value));
        if(temp2)n2.value=addCommas(temp2.toFixed(0));
    }
	
	//Calculate pay amount
	n3= document.getElementById('payamountsw');
    n3.value='';
    n3.onkeyup=n3.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp1;
        if(who.id==='payamount')  temp1= validDigits(who.value,0); 
        else temp1= validDigits(who.value);
        who.value= addCommas(temp1);
    }   
   n3.onblur= function(){
        var 
        temp3=parseFloat(validDigits(n3.value));
        if(temp3)n3.value=addCommas(temp3.toFixed(0));
    }
}

function Comma(Num) { //function to add commas to textboxes
	Num += '';
	Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
	Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
	x = Num.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1))
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	return x1 + x2;
}

function calculatechange() {
	var totalamount = document.getElementById('totalamount').value;	
	var payamount = document.getElementById('payamount').value;
	var result = document.getElementById('changeamount');
		var hasiltotal = payamount - totalamount
		if (!isNaN(payamount) && !isNaN(totalamount)) {
		result.value = hasiltotal;
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

