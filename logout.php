<?php
session_start();
?>
 <?php
	//session_unregister('suser');
	//session_unregister('spass');
	//session_unregister('srole');
	//session_unregister('alias');
	
	error_reporting(0);
	session_destroy();
	echo '<div class="notification information png_bg"><div></div></div>';
	echo '<meta http-equiv="refresh" content="2;url=index.php?mod=pengajuan_login" />';
?>
<title>Dealer System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	

        <!-- Main content -->
        <section class="content">
          <div class="error-page">
             <div class="col-md-12">
				  <div class="box  box-solid">
					<!-- Loading (remove the following to stop the loading)-->
					<div class="overlay">
					  <i class="fa fa-refresh fa-spin"></i>
					</div>
					<!-- end loading -->
				  </div><!-- /.box -->
			</div><!-- /.col -->	
          </div><!-- /.error-page -->
        </section><!-- /.content -->
     
	<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
