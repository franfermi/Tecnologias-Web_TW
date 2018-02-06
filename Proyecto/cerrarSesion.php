<?php
session_start();
$_SESSION['sesion']='';

$parametros_cookies = session_get_cookie_params(); 
setcookie(session_name(),0,1,$parametros_cookies["path"]);
session_destroy();

header("Cache-Control: private");
header("Location: index.php");
?>