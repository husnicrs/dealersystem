<?php
$ticket = new Ticket();
$core=new Core();
$data = $ticket->showinboxclose($user);
$datainboxcount = $ticket->inboxcount($user);
extract($datainboxcount);
$modname="ticket";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pesan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Utilities</a></li>
    <li class="active">Pesan</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="?mod=ticket_compose" class="btn btn-primary btn-block margin-bottom">Tulis Pesan</a>
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
        </div>
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
          <h3 class="box-title">Pesan Masuk [Close]</h3>
          <div class="box-tools pull-right">
            <div class="has-feedback">
              <input type="text" class="form-control input-sm" placeholder="Cari Pesan">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
          <div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
              <tbody>
				<?php
                    $i=1;
                    if($data !=0){
                    foreach ($data as $value) {
                    extract($value);
                ?>    
                <tr>
                  <td><input type="checkbox"></td>
                  <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                  <td class="mailbox-name"><a href="?mod=ticket_read&key=<?php echo $idticket; ?>"><?php echo $sender; ?></a></td>
                  <td class="mailbox-subject"><?php echo $subject; ?> </td>
                  <td class="mailbox-attachment"><i class="<?php echo $attachmenticon; ?>"></i></td>
                  <td class="mailbox-date"><?php echo $ticketdate; ?></td>
                </tr>
				<?php
                    $i++;
                        }
                        } else{
                            $core->pesan_warning("Content is emty, please input a data or check your database");
                        }
                ?>   
              </tbody>
            </table><!-- /.table -->
          </div><!-- /.mail-box-messages -->
        </div><!-- /.box-body -->
        <div class="box-footer no-padding">
        </div>
      </div><!-- /. box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div>
