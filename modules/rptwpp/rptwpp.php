<?php
$db=new Database();
$subnavmenu = new Subnavmenu();

$user=$_SESSION['uname'];
$modulename=$_GET['mod'];

$data = $subnavmenu->showfilter();
extract($data);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="#">CETAK WPP</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">CETAK WPP (Workshop Performance Parameter) </p>
          <form id="stdfrm" name="stdfrm"  action="report.php?mod=<?php echo $modulename; ?>_print" method="post" enctype="multipart/form-data" target="TheWindow">
          	  <input type="hidden" class="form-control" id="type" name="type" value="generate">
              <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $user; ?>">
              <input type="text" id="rptdatefrom" name="rptdatefrom" value="<?php echo $rptdatefrom; ?>" onChange="RefreshData()" style="height:32px !important;"/>
               - <input type="text" id="rptdateto" name="rptdateto" value="<?php echo $rptdateto; ?>" onChange="RefreshData()" style="height:32px !important"/>
              <br/><br/><button type="submit" type="button" class="btn btn-primary btn-flat"> <i class="fa fa-print"></i> Cetak</button>
          </form>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
 <script type="text/javascript">
	function PopupCenter(url, title, w, h) {  
		// Fixes dual-screen position                         Most browsers      Firefox  
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
	var myForm = document.getElementById('stdfrm');
	myForm.onsubmit = function() {
		var w = PopupCenter('about:blank','Popup_Window','1000','670');
		this.target = 'Popup_Window';
	};
	function RefreshData()
	{
		var formData = $("#stdfrm").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo $pagepost; ?>refresh.php",
			dataType: 'json',
			data: formData,
			success: function(data) {
				$("#type").val("generate");
			}
		});
		dTable.ajax.reload();
	}
</script>


