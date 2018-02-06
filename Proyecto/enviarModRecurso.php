<?php
session_start();
$id = $_SESSION['id'];
// Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
if(isset($_POST['idRecurso']) && !empty($_POST['idRecurso']) &&
isset($_POST['nRecurso']) && !empty($_POST['nRecurso']) &&
isset($_POST['nProfesor']) && !empty($_POST['nProfesor']) &&
isset($_POST['fInicio']) && !empty($_POST['fInicio'])&&
isset($_POST['fFin']) && !empty($_POST['fFin'])&&
isset($_POST['desp']) && !empty($_POST['desp'])&& 
isset($_POST['descrip']) && !empty($_POST['descrip'])){
	// Si entramos es que todo se ha realizado correctamente
	$ID=$_POST['idRecurso'];
	$nomRecurso=$_POST['nRecurso'];
	$nomProfesor=$_POST['nProfesor'];
	$fechaInicio=$_POST['fInicio'];
	$fechaFin=$_POST['fFin'];
	$despacho=$_POST['desp'];
	$descripcion=$_POST['descrip'];

	$link = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
	mysqli_select_db($link, "48864593n");

	// Con esta sentencia SQL insertaremos los datos en la base de datos
	mysqli_query($link, "UPDATE recursos SET idRecurso='$ID', nomRecurso='$nomRecurso', 
		nomProfesor='$nomProfesor', fechaInicio='$fechaInicio', fechaFin='$fechaFin', 
		despacho='$despacho', descripcion='$descripcion' WHERE idRecurso='$id'");

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
echo "<script>location.href='modRecurso.php'</script>";

}

?>
