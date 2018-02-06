<?php
session_start();
// Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
if(isset($_POST['email']) && !empty($_POST['email']) &&
isset($_POST['contraseña']) && !empty($_POST['contraseña']) &&
isset($_POST['telefono']) && !empty($_POST['telefono']) &&
isset($_POST['dni']) && !empty($_POST['dni'])&&
isset($_POST['despacho']) && !empty($_POST['despacho'])){
	// Si entramos es que todo se ha realizado correctamente
	$Email=$_POST['email'];
	$Contraseña=$_POST['contraseña'];
	$Telefono=$_POST['telefono'];
	$DNI=$_POST['dni'];
	$Despacho=$_POST['despacho'];

	$link = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
	mysqli_select_db($link, "48864593n");
	$ID_SESION=$_SESSION['sesion'];
	// Con esta sentencia SQL insertaremos los datos en la base de datos
	mysqli_query($link, "UPDATE login SET email='$Email', 
		contraseña='$Contraseña', telefono='$Telefono', dni='$DNI', 
		despacho='$Despacho' WHERE email='$ID_SESION'");

	// Ahora comprobaremos que todo ha ido correctamente
	$my_error = mysqli_error($link);

	if(!empty($my_error)) {

	echo "Ha habido un error al insertar los valores. $my_error";

	} else {

	echo '<script>alert("Los datos han sido introducidos satisfactoriamente")</script>';
	echo "<script>location.href='Profesor.php'</script>";

	}
} else {

echo '<script>alert("Error, no ha introducido todos los datos")</script>';
echo "<script>location.href='editarPerfil.php'</script>";

}

?>
