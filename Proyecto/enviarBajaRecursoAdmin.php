<?php

// Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
if(isset($_POST['IDRecurso']) && !empty($_POST['IDRecurso'])){
	// Si entramos es que todo se ha realizado correctamente
	$idRec=$_POST['IDRecurso'];

	$link = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
	mysqli_select_db($link, "48864593n");

	$obtRec=mysqli_query($link, "SELECT idRecurso FROM recursos WHERE idRecurso='$idRec'");
	if(!$obtRec){
		echo '<script>alert("No existe el ID introducido.")</script>';		
		echo "<script>location.href='bajaUsuarioAdmin.php'</script>";
	}else{
		if((mysqli_num_rows($obtRec)>0)){
			mysqli_query($link, "DELETE FROM recursos WHERE idRecurso='$idRec'");
			mysqli_query($link, "DELETE FROM cola WHERE codRecurso='$idRec'");
		}else{
			echo '<script>alert("No existe el ID en la base de datos")</script>';
			echo "<script>location.href='bajaRecursoAdmin.php'</script>";
		}
	}

	// Ahora comprobaremos que todo ha ido correctamente
	$my_error = mysqli_error($link);

	if(!empty($my_error)) {

	echo "Ha habido un error al borrar los valores. $my_error";

	} else {

	echo '<script>alert("El recurso ha sido eliminado correctamente")</script>';
	echo "<script>location.href='bajaRecursoAdmin.php'</script>";

	}
} else {

echo '<script>alert("Error, no ha introducido el ID")</script>';
echo "<script>location.href='bajaRecursoAdmin.php'</script>";

}

?>
