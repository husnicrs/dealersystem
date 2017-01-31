<?php
$db=new Database();
$users = new Users();
    if(isset($_REQUEST['savedate'])){
        extract($_REQUEST);
			$imageprofile = $_FILES['imageprofile']['name'];
			if (strlen($imageprofile)>0) {
			if (is_uploaded_file($_FILES['imageprofile']['tmp_name'])) {
				move_uploaded_file ($_FILES['imageprofile']['tmp_name'], "assets/images/imageprofile/".$imageprofile);
				}
					$users->insertuser($username, $password, $usertypeid, $email, $name, $imageprofile);
			}else {
				$users->insertuser1($username, $password, $usertypeid, $email, $name);
			}
			
		}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add User
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Utility</a></li>
    <li class="active">Tambah Pengguna</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
<form class="form-horizontal" id="defaultForm" method="post" action="" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <h3 class="profile-username text-center">Upload Foto</h3>
          <input id="file-3" type="file" multiple=true style="width: 100%;" name="imageprofile">
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#settings" data-toggle="tab">Informasi Pengguna</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="settings">
            
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Nama Pengguna</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" id="username">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Ketik ulang password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
                </div>
              </div>
              <div class="form-group">
                <label for="inputExperience" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" id="email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Tipe Pengguna</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="usertypeid">
                       <?php
                            $rl = new Users();
                            $datarl = $rl->showusertype();
                            foreach ($datarl as $value) {
                                extract($value);
                                echo "<option value='".$idusertype."'>".$usertypename."</option>";
                            }
                        ?>
                      </select>
                 </div>
              </div>
              <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label" id="captchaOperation"></label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="captcha" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="agree" value="agree" /> 
Informasi sudah benar <a href="#">dan terverifikasi</a>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" value="1" name="savedate" >Daftarkan</button>
                    <button type="reset" class="btn btn-warning">Bersihkan</button>
                </div>
              </div>
            
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</form>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
	$("#file-3").fileinput({
		showUpload: false,
		showCaption: false,
		browseClass: "btn btn-primary btn-block",
		fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-picture'></i>"
	});
</script>

<script type="text/javascript">
$(document).ready(function() {
	function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
    $('#defaultForm').formValidation({
       err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The username must be more than 5 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
            agree: {
                validators: {
                    notEmpty: {
                        message: 'You must agree with the terms and conditions'
                    }
                }
            }
        }
    });
});
</script>