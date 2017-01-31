<?php
error_reporting(0);

define ('MODULE_PATH','modules/');
if(!empty($_GET['mod'])){
	$mod=$_GET['mod'];
}else{
	$mod='';
}
	if ($mod==""){
		$mod=MODULE_PATH.'home/home' ;
	}else{
	if(preg_match("/_/i",$mod)){
		$modname=explode('_',$mod);
		$mod=MODULE_PATH.$modname[0].'/'.$mod;
		$modulesname=MODULE_PATH.$modname[0];
		$pagepost=''.$modulesname.'/post/';
	}else{
	$modname=explode('_',$mod);
	$mod=MODULE_PATH.$mod.'/'.$mod;
	$modulesname=MODULE_PATH.$modname[0];
	$pagepost=''.$modulesname.'/post/';
	}
}
?>