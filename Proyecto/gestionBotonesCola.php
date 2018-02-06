<?php
@session_start();

$recurso=$_GET['rec'];

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

$boton=$_POST['btn'];

$status='Llamando';

switch($boton){
	case 'Siguiente':
		
			$fila=mysqli_query($iden, "SELECT nomRecurso, despacho, codAlumno FROM cola WHERE estado='$status' AND nomRecurso='$recurso'");
			$row=mysqli_fetch_assoc($fila);
			$rec_up=$row['nomRecurso'];
			$desp_up=$row['despacho'];
			$cod_up=$row['codAlumno'];
			mysqli_query($iden, "INSERT INTO llamados (nomRecurso, despacho, codAlumno) VALUES ('$rec_up', '$desp_up', '$cod_up')");
			mysqli_query($iden, "DELETE FROM cola WHERE estado='$status' AND nomRecurso='$recurso'");
				$my_error = mysqli_error($iden);

				if(!empty($my_error)) 
				echo "Ha habido un error al insertar los valores. $my_error";

			echo '<script>alert("Alumno atendido.\nPasa el siguiente.")</script>';
			echo "<script>location.href='gestionarTurRecCola.php?rec=$recurso'</script>";

		
		break;

	case 'Finalizado':

			$fila=mysqli_query($iden, "SELECT nomRecurso, despacho, codAlumno FROM cola WHERE estado='$status' AND nomRecurso='$recurso'");
			$row=mysqli_fetch_assoc($fila);
			$rec_up=$row['nomRecurso'];
			$desp_up=$row['despacho'];
			$cod_up=$row['codAlumno'];
			mysqli_query($iden, "INSERT INTO llamados (nomRecurso, despacho, codAlumno) VALUES ('$rec_up', '$desp_up', '$cod_up')");
			mysqli_query($iden, "DELETE FROM cola WHERE estado='$status' AND nomRecurso='$recurso'");
				$my_error = mysqli_error($iden);

				if(!empty($my_error)) 
				echo "Ha habido un error al insertar los valores. $my_error";

			echo '<script>alert("El alumno ha sido atendido.\nLa gestión ha finalizado.")</script>';
			echo "<script>location.href='Profesor.php'</script>";
		break;

	case 'Enviar':
		if(isset($_POST['descrip']) && !empty($_POST['descrip'])) {

		$mens=$_POST['descrip'];

		mysqli_query($iden, "INSERT INTO alerta (nomRecurso, mensaje) VALUES ('$recurso', '$mens')");

		// Ahora comprobaremos que todo ha ido correctamente
		$my_error = mysqli_error($iden);

		if(!empty($my_error)) {
		echo '<script>alert("Ha habido un error al enviar el mensaje.' .$my_error.'")</script>';
		echo "<script>location.href='index.php'</script>";

		} else {
		echo '<script>alert("Mensaje enviado.")</script>';
		echo "<script>location.href='gestionarTurRecCola.php?rec=$recurso'</script>";
		}
	} else {
		echo '<script>alert("Introduzca mensaje de alerta.")</script>';
		echo "<script>location.href='gestionarTurRecCola.php?rec=$recurso'</script>";
	}
		break;
		
}

?>