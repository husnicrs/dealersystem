<!DOCTYPE html>
<?php
error_reporting(0);
session_start();

?>

<?php
error_reporting(0);
	function __autoload($class){
		include_once("lib/".$class.".php");
	}			
	$user = new Users();
	$us = $_POST['username'];
	$pw = $_POST['password'];
	
	$user->checkLogin($_SESSION['uname'], $_SESSION['pwd']);
 
	session_start();
	if($user>0){
		if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$data = $user->showDetail($id);
		extract($data);
		
		}
	
		$user->UserLogin($us, $pw);
		$_SESSION['uname'] = $us ;
		$_SESSION['pwd'] = $pw ;
		
		
		ini_set('date.timezone', 'Asia/Jakarta');
		$logindate = date('Y/m/d H:i:s');
		$logoutdate = date('Y-m-d H:i');
		$user->insertlog($us, $logindate, $logoutdate);
		echo '<meta http-equiv="refresh" content="3;url=index.php" />';
	}else{
		echo '<div class="notification information png_bg"><div>Sorry, username or password is invalid'.$_SESSION['uname'].'</div></div>';
		echo '<meta http-equiv="refresh" content="3;url=index.php" />';
	}
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
