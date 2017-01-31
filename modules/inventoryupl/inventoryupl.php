<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
    <div class="register-box">
      <div class="register-logo">
        <p style="font-size:20px !important">Upload Sparepart</p>
      </div>
      <div class="register-box-body">
        <form id="defaultForm" method="post" action="modules/inventoryupl/jalan.php" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <label for="real_name">Pilih File</label>
                <input name="fileexcel" type="file"> 
            </div>

          <div class="row">
            <div class="col-xs-5">
              <button type="submit" class="btn btn-primary btn-block btn-flat" value="1" name="upload" >Import</button>
            </div><!-- /.col -->
           </div>
        </form>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
    </section>
</div>


