<?php
session_start();
// Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
if(isset($_POST['email']) && !empty($_POST['email'])){
	// Si entramos es que todo se ha realizado correctamente
	$EMAIL=$_POST['email'];

	$link = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
	mysqli_select_db($link, "48864593n");

	if($EMAIL != 'admin' && $EMAIL != $_SESSION['sesion']){
	
	$obtDesp=mysqli_query($link, "SELECT despacho FROM login WHERE email='$EMAIL'");
	if(!$obtDesp){
		echo '<script>alert("No existe el Email")</script>';		
		echo "<script>location.href='bajaUsuarioAdmin.php'</script>";
	}else{
		if((mysqli_num_rows($obtDesp)>0)){
			$row = mysqli_fetch_assoc($obtDesp);
			$DESP=$row['despacho'];
			mysqli_query($link, "DELETE FROM recursos WHERE despacho='$DESP'");
			mysqli_query($link, "DELETE FROM cola WHERE despacho='$DESP'");
			mysqli_query($link, "DELETE FROM login WHERE email='$EMAIL'");
		}else{
			echo '<script>alert("No existe el Email en la base de datos")</script>';
			echo "<script>location.href='bajaUsuarioAdmin.php'</script>";
		}
	}
	/*
	if(!$obtDesp)
		die("Error");
		
	$row = mysqli_fetch_assoc($obtDesp);
	$DESP=$row['despacho'];
	
	
	mysqli_query($link, "DELETE FROM recursos WHERE despacho='$DESP'");

	mysqli_query($link, "DELETE FROM cola WHERE despacho='$DESP'");
	mysqli_query($link, "DELETE FROM login WHERE email='$EMAIL'");
	$my_error = mysqli_error($link);
	*/
	$my_error = mysqli_error($link);
	if(!empty($my_error)) {

	echo "Ha habido un error al borrar los valores. $my_error";

	} else {

	echo '<script>alert("El usuario ha sido eliminado correctamente")</script>';
	echo "<script>location.href='bajaUsuarioAdmin.php'</script>";

	}
	}else{
		echo '<script>alert("Error al eliminar usuario")</script>';
	echo "<script>location.href='bajaUsuarioAdmin.php'</script>";
	}
} else {

echo '<script>alert("Error, no ha introducido el email")</script>';
echo "<script>location.href='bajaUsuarioAdmin.php'</script>";

}

?>
