<?php
$navmenu = new Navmenu();
$userprofile = new Users();
$core=new Core();
$datashowmaxgroupconcat= $navmenu->showmaxgroupconcat();
$data = $navmenu->show($user);
$dataconfigicon = $userprofile->showConfigIcon();
$datanotifcount = $navmenu->notifcount($user);
$datanotif = $navmenu->shownotif($user);
$datauserprofile = $userprofile->showProfile();
$modulename=$_GET['mod'];
$datanavmenu = $navmenu->shownavedit($modulename);
extract($datanavmenu);
$user=$_SESSION['uname'];


?>

<body class="hold-transition skin-blue fixed layout-top-nav" data-spy="scroll" data-target="#scrollspy">
<div class="wrapper">
  <header class="main-header">
	<nav class="navbar navbar-static-top">
	  <div class="container-fluid">
		<div class="navbar-header">
        <div class="pull-left image">
         <a href="index.php"><img src="assets/images/logoindex.png" class="user-image" alt="User Image"></a></div>
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
			<i class="fa fa-bars"></i>
		  </button>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
		  <ul class="nav navbar-nav">
          <?php
				$i=1;
				if($data !=0){
				foreach ($data as $value) {
				extract($value);
				$subnavmenuname = split(",",$value["subnavmenuname"]);
			?>  
            <li class="<?php echo $liclass; ?>"><a href="?mod=<?php echo $modulname; ?>" data-toggle="<?php echo $datatoggle; ?>"><i class="fa <?php echo $iclass; ?>"> <?php echo $navmenuname; ?></i><span class="<?php echo $spanclass; ?>"><?php echo $span; ?></span></a>
            <ul class="<?php echo $ulclass; ?>" role="<?php echo $role; ?>">
			<?php 
				$c=count($subnavmenuname);
				for($rs=0;$rs<=$c;$rs++) {
				$rssubnavmenuname = $subnavmenuname[$rs];
				echo $rssubnavmenuname; 
				}
			?>  
              </ul>
            </li>
			<?php
				$i++;
				}
				}
			?>  
		  </ul>
        	
        </div><!-- /.navbar-collapse -->
		<!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <i class="fa fa-globe" onClick="submitNotifStatus()"></i>
				<?php
                    $i=1;
                    if($datanotifcount !=0){
                    foreach ($datanotifcount as $valuenotif) {
                    extract($valuenotif);
                 ?>   
                  <span class="label label-danger"><?php echo $notificationcount; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $notificationcount; ?> notification</li>
				<?php
					$i++;
						}
						}
				 ?>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
					<?php
						$i=1;
						if($datanotif !=0){
						foreach ($datanotif as $valuenotif) {
						extract($valuenotif);
					 ?>   
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="assets/images/imageprofile/<?php echo $imageprofile; ?>" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            <?php echo $username; ?>
                            <small><i class="fa fa-clock-o"></i> <?php echo $recoreded; ?></small>
                          </h4>
                          <p><?php echo $description; ?></p>
                        </a>
                      </li><!-- end message -->
						<?php
                            $i++;
                                }
                                }
                         ?>
                    </ul>
                  </li>
                  
                  <li class="footer"><a href="?mod=readnotification">See all notification</a></li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
			 <?php
				$i=1;
				if($dataconfigicon !=0){
				foreach ($dataconfigicon as $valueconfigicon) {
				extract($valueconfigicon);
			?>    
			  <li>
                <a href="<?php echo $addmenu ?>"><i class="fa fa-sticky-note-o" <?php echo $colormenu ?>></i></a>
              </li>
				<?php
					$i++;
						}
						}
				?>   

			   <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?php
					$i=1;
					if($datauserprofile !=0){
					foreach ($datauserprofile as $valueuserprofile) {
					extract($valueuserprofile);
				?>    
                  <img src="assets/images/imageprofile/<?php echo $imageprofile; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"> <i class="fa fa-circle text-success"></i> <?php echo strtoupper($_SESSION['uname'])?> </span>
                 
                </a>
               
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="assets/images/imageprofile/<?php echo $imageprofile; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $name; ?>
                      <small>Registered from <?php echo $recorded; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="?mod=adduser_update&key=<?php echo $_SESSION['uname']?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Log Out</a>
                    </div>
                  </li>
                </ul>
				<?php
					$i++;
						}
						}
				?>   
              </li>
            </ul>
          </div>
		</nav>
    </header>
</div>

<script>
    function submitNotifStatus()
    {
		var formDataNotifStatus = $("#formDataNotifStatus").serialize();
		$.ajax({
			type: "POST",
			url: "lib/Notificationstatus.php",
			dataType: 'json',
			data: formDataNotifStatus,

		});
    }
    
</script>
<form class="form-horizontal" id="formDataNotifStatus" action="">
    <input type="hidden" class="form-control" id="notiftype" name="notiftype" value="notifstatus">
    <input type="hidden" class="form-control" id="notifusername" name="notifusername" value="<?php echo $_SESSION['uname']?>" >
</form>