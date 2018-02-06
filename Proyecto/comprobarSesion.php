<?php
@session_start();
if (!isset($_SESSION['sesion']))
    echo '<script>alert("La sesión ha caducado.\nIdentifiquese de nuevo.")</script>';
	echo "<script>location.href='index.php'</script>";
?>