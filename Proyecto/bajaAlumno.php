<?php
	$link = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
	mysqli_select_db($link, "48864593n");

	$idAlumno=$_GET['codAlum'];

	// Con esta sentencia SQL insertaremos los datos en la base de datos
	mysqli_query($link, "DELETE FROM cola WHERE codAlumno='$idAlumno'");

	// Ahora comprobaremos que todo ha ido correctamente
	$my_error = mysqli_error($link);

	if(!empty($my_error)) {

	echo "Ha habido un error al borrar los valores. $my_error";

	} else {

	//echo '<script>alert("El recurso ha sido eliminado correctamente")</script>';
	echo "<script>location.href='index.php'</script>";

	}
?>
