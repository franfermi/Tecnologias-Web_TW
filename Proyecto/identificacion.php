<?php
session_start();


$iden = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
if(!$iden){
    die("Error: No se pudo conectar \n");
    echo "<br>";
}
// Selecciona la base de datos 
if(!mysqli_select_db($iden, "48864593n")){
    die("Error: No existe la base de datos \n");
    echo "<br>";
}
	
$nombre=$_POST['email'];
$contraseña=$_POST['passwd'];

$sentencia = "SELECT * FROM login WHERE email='$nombre'"; 
// Ejecuta la sentencia SQL 
$resultado = mysqli_query($iden, $sentencia);
if($res=mysqli_fetch_array($resultado)){
	if(md5($contraseña)==$res['contraseña']){
		if($res['rol']=='administrador'){
		$_SESSION['sesion']=$_POST['email'];
		echo '<script>alert("Bienvenido Administrador")</script>';
		echo "<script>location.href='Administrador.php'</script>"; //Añadir el php del administrador
		}else if($res['rol']=='profesor'){
			$_SESSION['sesion']=$_POST['email'];
			echo '<script>alert("Bienvenido Profesor")</script>';
			echo "<script>location.href='Profesor.php'</script>";
		}
	}else{
		echo '<script>alert("Usuario y contraseña incorrecto")</script>';
		echo "<script>location.href='index.php'</script>";	
	}	
}else{
			echo '<script>alert("Este usuario no existe")</script>';
			echo "<script>location.href='index.php'</script>";
		}
?>