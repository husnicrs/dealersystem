<?php
$subnavmenu = new Subnavmenu();
$modulename=$_GET['mod'];
$datasubnavmenu = $subnavmenu->showsubnavmenu($modulename);
extract($datasubnavmenu);
$key=$_GET['key'];
$modulename=$_GET['modulename'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="margin-top:-15px !important; margin-bottom:-20px !important">
  <h4>
    <?php echo $subnavmenuname; ?>
  </h4>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"><?php echo $navmenuname; ?></a></li>
    <li class="active"><?php echo $subnavmenuname; ?></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-danger">
      <div class="box-header" style="margin-top:-20px">
        </div><!-- /.box-header -->
         <div class="login-box">
          <div class="login-logo">
            <a href="" style="color:#006600">Submit success!</a>
          </div><!-- /.login-logo -->
          <div class="login-box-body">
            <div class="social-auth-links text-center">
               <a href="#" type="button" onclick="closeSelf()" class="btn btn-default btn-sm"> <i class="fa fa-close"></i> Close</a>
               <a href="winopen.php?mod=<?php echo $modulename; ?>_odetail&key=<?php echo $key; ?>" type="button" class="btn btn-default btn-sm"> <i class="fa fa-plus"></i> Add New</a>
            </div><!-- /.social-auth-links -->
          </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row --> 
</section><!-- /.content -->
</div>

<script type="text/javascript">
	function closeSelf(){
	   window.close();
	}
</script>



