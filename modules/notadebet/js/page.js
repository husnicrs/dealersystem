//Declare string variable
var modulename = "notadebet";
var moduledesc = "Nota Debet";

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
    n2= document.getElementById('subtotalsw');

    n2.onkeyup=n2.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='subtotal')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n2.onblur= function(){
        var 
        temp2=parseFloat(validDigits(n2.value));
        if(temp2)n2.value=addCommas(temp2.toFixed(0));
    }
	
	//Calculate 
    n3= document.getElementById('potongansw');

    n3.onkeyup=n3.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='potongan')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n3.onblur= function(){
        var 
        temp3=parseFloat(validDigits(n3.value));
        if(temp3)n3.value=addCommas(temp3.toFixed(0));
    }
	
	//Calculate 
    n4= document.getElementById('totalsw');

    n4.onkeyup=n4.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='total')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n4.onblur= function(){
        var 
        temp4=parseFloat(validDigits(n4.value));
        if(temp4)n4.value=addCommas(temp4.toFixed(0));
    }
	
	//Calculate 
    n5= document.getElementById('ppnsw');

    n5.onkeyup=n5.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='ppn')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n5.onblur= function(){
        var 
        temp5=parseFloat(validDigits(n5.value));
        if(temp5)n5.value=addCommas(temp5.toFixed(0));
    }
	
	//Calculate 
    n6= document.getElementById('grandtotalsw');

    n6.onkeyup=n6.onchange= function(e){
        e=e|| window.event; 
        var who=e.target || e.srcElement,temp;
        if(who.id==='grandtotal')  temp= validDigits(who.value,0); 
        else temp= validDigits(who.value);
        who.value= addCommas(temp);
    }   
   n6.onblur= function(){
        var 
        temp6=parseFloat(validDigits(n6.value));
        if(temp6)n6.value=addCommas(temp6.toFixed(0));
    }
	
}
 
 
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
		url: "modules/" + modulename + "/post/post.php",
		dataType: 'json',
		data: formData,
		success: function(data) {
			$("#type").val("generate");
			//refreshgrid();
			//generateMsg();
		}
	});
}

