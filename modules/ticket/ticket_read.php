<?php
$ticket = new Ticket();
$datainboxcount = $ticket->inboxcount($user);
extract($datainboxcount);
$modname="ticket";
$core=new Core();
	if (isset($_GET['key'])) {
	    $key = $_GET['key'];
	    $data = $ticket->showDetail($key);
	    extract($data);
	}
	if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $ticket->delete($key);
	}   
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Baca Pesan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Utilities</a></li>
    <li class="active">Baca Pesan</li>
  </ol>
</section>
 <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="?mod=ticket" class="btn btn-primary btn-block margin-bottom">Kembali ke Pesan Masuk</a>
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Folders</h3>
          <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="?mod=ticket"><i class="fa fa-inbox"></i> Pesan Masuk 
            <span class="label label-primary pull-right">
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
          <h3 class="box-title">Baca Tiket</h3>
          <div class="box-tools pull-right">
            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
          <div class="mailbox-read-info">
            <h3>Subjek Tiket: <?php echo $subject; ?></h3>
            <h5>Dari: <?php echo $sender; ?> <span class="mailbox-read-time pull-right"><?php echo $ticketdate; ?></span></h5>
          </div><!-- /.mailbox-read-info -->
          <div class="mailbox-read-message">
            <?php echo $message; ?>
          </div><!-- /.mailbox-read-message -->
        </div><!-- /.box-body -->
        <div class="box-footer">
          <ul class="mailbox-attachments clearfix">
            <li>
              <span class="mailbox-attachment-icon"><i class="<?php echo $attachmenticon; ?>"></i></span>
              <div class="mailbox-attachment-info">
                <a href="<?php echo $atch; ?>" class="mailbox-attachment-name"><i class="fa fa-download"></i> <?php echo number_format(filesize("assets/mailbox/".$size."")); ?> <?php echo $atch; ?></a>
              </div>
            </li>
          </ul>
        </div><!-- /.box-footer -->
    </div><!-- /.col -->
    <form id="form"  class="editprofileform" method="post" action="" enctype="multipart/form-data">
        <button class="btn btn-danger">Hapus Pesan</button>
        <input type="hidden" value="1" name="submit" />
    </form>
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->

                     

