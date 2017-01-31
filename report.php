<?php
error_reporting(0);
ob_start();
session_start();
define ('MODULE_PATH','modules/');
function __autoload($class) {
    include_once("lib/" . $class . ".php");
}

$user = new Users();

$user->checkLogin($_SESSION['uname'], $_SESSION['pwd']);
if (isset($_REQUEST['quit'])) {
    if ($_REQUEST['quit'] == 'Y') {
        $user->logOut();
    }
}
if (isset($_GET['mod'])) {
    $mod = $_GET['mod'];
} else {
    $mod = "";
}
$op = "";
if ($mod == "") {
    if ($op == "") {
        $mod = MODULE_PATH . 'home/home';
    } else {
        $mod = $op;
    }
} else {
    if (eregi('_', $mod)) {
        $modname = explode('_', $mod);
        $mod = MODULE_PATH . $modname[0] . '/' . $mod;
    } else {

        $mod = MODULE_PATH . $mod . '/' . $mod;
    }
}

if (!file_exists($mod . '.php')) {
    include "404.php";
} else {
    include $mod . '.php';
}
?>


