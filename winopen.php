<?php
function __autoload($class) {
include_once("lib/" . $class . ".php");
} 

include "header.php"; 
include "menu.php";
	if(!file_exists($mod.'.php')){
	   include "404.php";
	   }else {
		  include $mod.'.php';
	}
include "footer.php";
?>

     