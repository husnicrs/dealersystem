<?php
session_start();
ob_start();
include 'menu.php';
$user = new Users();
$user->checkLogin($_SESSION['uname'], $_SESSION['pwd']);
if (isset($_REQUEST['quit'])) {
    if ($_REQUEST['quit'] == 'Y') {
        $user->logOut();
    }
}
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dealer System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="http:plugins/font-awesome-4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="plugins/datatables/fixedColumns.dataTables.min.css">  
	<!-- Select2 -->
	 <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="plugins/select2/select2.min.css">	
	<!-- Datepicker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- Easy UI -->
	<link rel="stylesheet" href="plugins/easyui/icon.css">
	<link rel="stylesheet" href="plugins/easyui/easyui.css">
	
	<!--
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
	 -->
	<style type="text/css" class="init">	
		td.details-control {
			background: url('assets/images/details_open.png') no-repeat center center;
			cursor: pointer;
		}
		tr.shown td.details-control {
			background: url('assets/images/details_close.png') no-repeat center center;
		}
		.content-wrapper {
			min-height: 738px;
		}
	</style>	
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="dist/css/formValidation.css"/>
    <!-- jQuery 2.1.4 -->
	<script src="plugins/jQuery/easyui/jquery.min.js" type="text/javascript"></script>  
	<link rel="stylesheet" href="plugins/easyui/datagrid-filter.js">
     <!-- <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
	<!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="dist/js/formValidation.js"></script>
	<script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>	
	<!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="plugins/datatables/jquery.dataTables.bootstrap.min.js"></script>
	<script src="plugins/datatables/dataTables.tableTools.min.js"></script>
	<script src="plugins/datatables/dataTables.colVis.min.js"></script>
	<script type="text/javascript" language="javascript" src="plugins/media/js/common.js"></script>	  
	<link href="plugins/fileinput/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="plugins/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="plugins/fileinput/js/fileinput_locale_fr.js" type="text/javascript"></script>
    <script src="plugins/fileinput/js/fileinput_locale_es.js" type="text/javascript"></script>    
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->