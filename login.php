<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dealer System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->   
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	<link rel="stylesheet" href="dist/css/formValidation.css"/>
	</head>
  <body id="page" class="hold-transition login-page">
  	
  <header>
  <div class="container">
           
    <div class="login-box">
	
      <div class="login-logo">
	  <a href="#"><img src="assets/images/logo.png" alt="" /> </a> <br />

      </div><!-- /.login-logo -->
      <div class="login-box-body">
		<p> Selamat datang di aplikadi DealerSystem. Untuk selanjutnya, silahkan login dengan nama pengguna dan password anda.</p><br>
        <h4 class="login-box-msg"><b>Klik login untuk masuk</b></h4>
        <form action="actvallog.html" id="loginForm" method="post">
          <div class="form-group has-feedback">
            <input name="username" id="username" class="form-control" placeholder="Nama Pengguna">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">  
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
			<div class="col-xs-4">
			  <button type="reset" class="btn btn-primary btn-block btn-flat">Ulangi</button>
            </div><!-- /.col -->
          </div>
        </form>
		<br>
		<a class="btn btn-warning btn-flat btn-xs">1.0</a> <a href="#">Built in  14/09/2016 02:37 pm</a><br>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	</div><!-- /.login-box-body -->
   
	<!-- jQuery 2.1.4 -->
	<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="dist/js/formValidation.js"></script>
	<script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>
	<!-- iCheck -->
	<script src="plugins/iCheck/icheck.min.js"></script>
	<script>
	  $(function () {
		$('input').iCheck({
		  checkboxClass: 'icheckbox_square-blue',
		  radioClass: 'iradio_square-blue',
		  increaseArea: '70%' // optional
		});
	  });
	</script>
	<script>
	$(document).ready(function() {
		$('#loginForm').formValidation({
			framework: 'bootstrap',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				username: {
					validators: {
						notEmpty: {
							message: 'Nama pengguna tidak boleh kosong'
						},
						stringLength: {
							min: 3,
							max: 30,
							message: 'Nama pengguna terlalu pendek'
						},
						regexp: {
							regexp: /^[a-zA-Z0-9_\.]+$/,
							message: 'Nama pengguna hanya huruf dan angka'
						}
					}
				},
				password: {
					validators: {
						notEmpty: {
							message: 'Password tidak boleh kosong'
						}
					}
				}
			}
		});
	});
	</script>

	</header>
  </body>
</html>

