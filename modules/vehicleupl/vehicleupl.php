<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
    <div class="register-box">
      <div class="register-logo">
        <p style="font-size:20px !important">Upload Kendaraan</p>
      </div>
      <div class="register-box-body">
        <form id="defaultForm" method="post" action="vehicleupl.php" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <label for="real_name">Pilih File</label>
                <input name="fileexcel" type="file"> 
            </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat" value="1" name="upload" >Import</button>
              <a href="index.php?mod=vehicleuplsin" class="btn btn-success btn-block btn-flat">Lihat Data Hasil Upload</a>
            </div><!-- /.col -->
           </div>
        </form>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
    </section>
</div>


