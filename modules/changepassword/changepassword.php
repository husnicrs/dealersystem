<?php
$db=new Database();
$users = new Users();
    if(isset($_REQUEST['savedate'])){
	extract($_REQUEST);
		$users->changepassword($password);
	}
?>
<script src="plugins/zxcvbn/zxcvbn.js"></script>

<style>
.password-progress {
    margin-top: 10px;
    margin-bottom: 0;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
  <div class="register-box">
    <div class="col-xs-12">
      <div class="box box-danger">
      <div class="register-box-body">
      <div class="register-logo">
        <a href="index.php"><b>Ganti</b> Password</a>
      </div>
      <div class="register-box-body">
        <form id="passwordForm" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="ID Pengguna" value="<?php echo $_SESSION['uname'] ?>" disabled="disabled">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
             <input type="password" class="form-control" id="password" name="password" placeholder="Ketik password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <div class="progress password-progress">
                <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0;"></div>
            </div>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Ketik ulang password" name="confirmPassword" id="confirmPassword">
          </div>
          <div class="row">
            <div class="col-xs-5">
              <button type="submit" class="btn btn-primary btn-block btn-flat" value="1" name="savedate" >Ganti</button>
            </div><!-- /.col -->
           </div>
        </form>
       </div>
           </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->
<script>
$(document).ready(function() {
    $('#passwordForm').formValidation({
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password tidak boleh kosong'
                    },
                    callback: {
                        callback: function(value, validator, $field) {
                            var password = $field.val();
                            if (password == '') {
                                return true;
                            }

                            var result  = zxcvbn(password),
                                score   = result.score,
                                message = result.feedback.warning || 'Password telalu lemah';

                            // Update the progress bar width and add alert class
                            var $bar = $('#strengthBar');
                            switch (score) {
                                case 0:
                                    $bar.attr('class', 'progress-bar progress-bar-danger')
                                        .css('width', '1%');
                                    break;
                                case 1:
                                    $bar.attr('class', 'progress-bar progress-bar-danger')
                                        .css('width', '25%');
                                    break;
                                case 2:
                                    $bar.attr('class', 'progress-bar progress-bar-danger')
                                        .css('width', '50%');
                                    break;
                                case 3:
                                    $bar.attr('class', 'progress-bar progress-bar-warning')
                                        .css('width', '75%');
                                    break;
                                case 4:
                                    $bar.attr('class', 'progress-bar progress-bar-success')
                                        .css('width', '100%');
                                    break;
                            }

                            // We will treat the password as an invalid one if the score is less than 3
                            if (score < 3) {
                                return {
                                    valid: false,
                                    message: message
                                }
                            }

                            return true;
                        }
                    }
                }
            },
			confirmPassword: {
			validators: {
				notEmpty: {
					message: 'Ketik ulang password tidak boleh kosong'
				},
				identical: {
					field: 'password',
					message: 'Password tidak sama'
				}
			}
		}
	 }
    });
});
</script>