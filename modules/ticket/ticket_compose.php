<?php
$db=new Database();
$ticket = new Ticket();
$datainboxcount = $ticket->inboxcount($user);
extract($datainboxcount);
$modname="ticket";

if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
		$atch = $_FILES['atch']['name'];
		if (strlen($atch)>0) {
		if (is_uploaded_file($_FILES['atch']['tmp_name'])) {
			move_uploaded_file ($_FILES['atch']['tmp_name'], "assets/mailbox/".$atch);
			}
			$ticket->insert($receiver, $subject, $status, $message, $user, $atch);
			}else{
			 $ticket->insertnoatch($receiver, $subject, $status, $message, $user);
		}
 }
 
 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   Compose
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Utilities</a></li>
    <li class="active">Compose</li>
  </ol>
</section>
 <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="?mod=ticket" class="btn btn-primary btn-block margin-bottom">Back to inbox</a>
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Folders</h3>
          <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="?mod=ticket"><i class="fa fa-inbox"></i> Pesan Masuk <span class="label label-primary pull-right">				
				<?php
                    $i=1;
                    if($datainboxcount !=0){
                    foreach ($datainboxcount as $value) {
                    extract($value);
                ?>    
                <?php echo $msgcount; ?>
                <?php
                    $i++;
                        }
                        } 
                ?>   
			</span></a></li>
            <li><a href="?mod=ticket_sent"><i class="fa fa-envelope-o"></i> Pesan Terkirim</a></li>
          </ul>
        </div><!-- /.box-body -->
      </div><!-- /. box -->
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Klasifikasi</h3>
          <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="?mod=ticket_low"><i class="fa fa-circle-o text-red"></i> Rendah</a></li>
            <li><a href="?mod=ticket_intermediate"><i class="fa fa-circle-o text-yellow"></i> Sedang</a></li>
            <li><a href="?mod=ticket_priority"><i class="fa fa-circle-o text-light-blue"></i> Prioritas</a></li>
            <li><a href="?mod=ticket_close"><i class="fa fa-circle-o text-light-blue"></i> Ditutup</a></li>
          </ul>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tulis Pesan Baru</h3>
        </div><!-- /.box-header -->
        <form id="formmail" name="formmail"  class="editprofileform" method="post" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="box-body">
          <div class="form-group">
            <select class="form-control select2"  style="width: 100%;" name="receiver" id="receiver"  placeholder="To:">
              <option value="">Pilih Penerima</option>
               <?php
                    $rl = new Combobox();
                    $datarl = $rl->showUsers();
                    foreach ($datarl as $value) {
                        extract($value);
                        echo "<option value='".$username."'>".$username."</option>";
                    }
                ?>
              </select>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Subject:" name="subject" id="subject">
          </div>
          <div class="form-group">
            <select class="form-control select2"  style="width: 100%;" name="status" id="status"  placeholder="Klasifikasi:">
              <option value="">Pilih Klasifikasi Tiket</option>
               <?php
                    $rl = new Combobox();
                    $datarl = $rl->showTicketStatus();
                    foreach ($datarl as $value) {
                        extract($value);
                        echo "<option value='".$idticketstatus."'>".$ticketstatusname."</option>";
                    }
                ?>
              </select>
          </div>
          <div class="form-group">
            <div class="btn btn-default btn-file">
              <i class="fa fa-paperclip"></i> Attachment
              <input type="file" name="atch">
            </div>
            <p class="help-block">Max. 2MB</p>
          </div>
          <div class="form-group">
            <textarea id="composetextarea" class="form-control" style="height: 300px" name="message">
            </textarea>
          </div>
        </div><!-- /.box-body -->
        
        <div class="box-footer">
          <div class="pull-right">
            <button class="btn btn-primary" type="submit" name="submit" value="1"><i class="fa fa-envelope-o"></i> Kirim Pesan</button>
          </div>
          <a href="?mod=ticket" style="button" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
        </div><!-- /.box-footer -->
        </form>
      </div><!-- /. box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">
$(document).ready(function() {
    $('#formmail').formValidation({
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            receiver: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: 'Visi harus lebih dari 20 karakter'
                    },
                    notEmpty: {
                        message: 'Penerima tidak boleh kosong'
                    }
                }
            },
			subject: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: 'Misi harus lebih dari 20 karakter'
                    },
                    notEmpty: {
                        message: 'Subjek pesan tidak boleh kosong'
                    }
                }
            },
			status: {
                validators: {
                    stringLength: {
                        enabled: false,
                        min: 20,
                        message: 'Misi harus lebih dari 20 karakter'
                    },
                    notEmpty: {
                        message: 'Klasifikasi pesan tidak boleh kosong'
                    }
                }
            }

        }
    })
});
</script>







                     

