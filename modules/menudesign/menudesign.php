<?php
$db=new Database();
$navmenu = new Navmenu();
	if (isset($_GET['key'])) {
	    $modulename = $_GET['key'];
	    $data = $navmenu->showedit($modulename);
	    extract($data);
		$datasubmenu = $navmenu->showsubnavedit($modulename);
	    extract($datasubmenu);
	}
    if(isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $navmenu->update($navmenuname, $sequencenumber, $span, $spanclass, $iclass, $liclass, $modulname);
		$navmenu->updatedropdown($modulname, $spanclass);
	}   
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Konfigurasi Menu
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Konfigurasi Menu</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-body">
      <div class="row">
      <form id="form" class="editprofileform" method="post" action="" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="col-md-4">
          <div class="form-group">
            <label>Menu Name</label>
            <input type="text" class="form-control" placeholder="Nama Menu" value="<?php echo $navmenuname; ?>" name="navmenuname">
			<input type="hidden" name="modulname" value="<?php echo $modulename; ?>">
          </div><!-- /.form-group -->
          <div class="form-group">
            <label>Seq No</label>
            <input type="text" class="form-control" placeholder="Sequence Number" value="<?php echo $sequencenumber; ?>" name="sequencenumber">
          </div><!-- /.form-group -->
          <div class="form-group">
            <label>List Class</label>
            <select class="form-control select2" style="width: 100%;" name="liclass">
              <option selected="selected" value="<?php echo $liclass; ?>"><?php echo $liclassname; ?></option>
			   <?php
                    $rl = new Navmenu();
                    $datalistclass = $rl->showlistclass();
                    foreach ($datalistclass as $value) {
                        extract($value);
                        echo "<option value='".$id."'>".$listclass."</option>";
                    }
                ?>
            </select>
          </div><!-- /.form-group -->
          <div class="form-group">
            <label>Span Text</label>
			<input type="text" class="form-control" name="span" placeholder="Span" value="<?php echo $span; ?>">
          </div><!-- /.form-group -->
          <div class="form-group">
            <label>Span Class</label>
            <select class="form-control select2" style="width: 100%;" name="spanclass">
              <option selected="selected" value="<?php echo $spanclass; ?>"><?php echo $spanclass; ?></option>
			   <?php
                    $rl = new Navmenu();
                    $dataspanclass = $rl->showspanclass();
                    foreach ($dataspanclass as $value) {
                        extract($value);
                        echo "<option value='".$spanclass."'>".$spanclass."</option>";
                    }
                ?>
            </select>
          </div><!-- /.form-group -->
          <div class="form-group">
            <label>Icon</label>
            <select class="form-control select2" style="width: 100%;" name="iclass">
              <option selected="selected" value="<?php echo $iclass; ?>"><?php echo $iclass; ?></option>
			   <?php
                    $rl = new Navmenu();
                    $dataicon = $rl->showicon();
                    foreach ($dataicon as $value) {
                        extract($value);
                        echo "<option value='".$iconname."'>".$iconname."</option>";
                    }
                ?>
            </select>
          </div><!-- /.form-group -->
          <div class="box-footer">
            <button class="btn btn-success  btn-flat">Simpan</button>
            <input type="hidden" value="1" name="submit" />
            <button class="btn btn-warning btn-flat">Bersihkan</button>
          </div>
        </div><!-- /.col -->
        </form>
        <div class="col-md-8">
          <table class="table table-bordered">
            <tr>
              <th>#</th>
              <th>Submenu</th>
              <th>Module</th>
              <th>Seq No</th>
            </tr>
			<?php
                $i=1;
                if($datasubmenu !=0){
                foreach ($datasubmenu as $value) {
                    extract($value);
            ?>    
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $subnavmenuname; ?></td>
              <td><?php echo $submodule; ?> </td>
              <td><span class="badge bg-red"><?php echo $sequencenumber; ?></span></td>
            </tr>
			<?php
				$i++;
					}
					} else{
						$core->pesan_warning("Content is emty, please input a data or check your database");
					}
			?>    
          </table>
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
        </div>
    </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->