<?php
$navmenu = new Navmenu();
$core=new Core();
$datanotif = $navmenu->showmorenotif();
$modulename=$_GET['mod'];
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pemberitahuan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pemberitahuan</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
<!-- row -->
<div class="row">
<div class="col-md-12">
  <!-- The time line -->
  <ul class="timeline">
    <!-- timeline time label -->
    <li class="time-label">
      <span class="bg-red">
        Pemberitahuan Selengkapnya
      </span>
    </li>
    <!-- /.timeline-label -->
    <!-- timeline item -->
	<?php
        $i=1;
        if($datanotif !=0){
        foreach ($datanotif as $valuenotif) {
        extract($valuenotif);
     ?>   
    <li>
      <i class="fa fa-envelope bg-blue"></i>
      <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> <?php echo $recoreded; ?></span>
        <h3 class="timeline-header"><a href="#"><?php echo $username; ?></a> </h3>
        <div class="timeline-body">
          <?php echo $description; ?>
        </div>
      </div>
    </li>
    <!-- END timeline item -->
		<?php
            $i++;
                }
                }
         ?>

        <li>
          <i class="fa fa-clock-o bg-gray"></i>
        </li>
      </ul>
    </div><!-- /.row -->
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->

