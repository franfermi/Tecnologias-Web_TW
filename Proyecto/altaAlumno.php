
<?php
// Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
if(isset($_POST['DNI']) && !empty($_POST['DNI']) &&
isset($_POST['nombre']) && !empty($_POST['nombre']) &&
isset($_POST['email']) && !empty($_POST['email']) &&
isset($_POST['idRec']) && !empty($_POST['idRec'])) {

	$dni=$_POST['DNI'];
	$nomAlumno=$_POST['nombre'];
	$email=$_POST['email'];
	$idr=$_POST['idRec'];
	// Si entramos es que todo se ha realizado correctamente

	$link = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
	mysqli_select_db($link, "48864593n");

	//Generar codigo aleatorio
	$codigo1=substr("$nomAlumno", 0, 2);
	$key = '';
	$codigo2 = '';
	$pattern = '0123456789';
	$max = strlen($pattern)-1;
	for($i=0;$i < 2;$i++) $codigo2 .= $pattern{mt_rand(0,$max)};
	//$codigo2 = $pattern{mt_rand(0,$max)};
	$key=$codigo1 . $codigo2;

/*
	$result=mysqli_query($link, "SELECT * FROM recursos WHERE idRecurso='$idr'");
	if(!$result){ 
		    echo '<script>alert("No existe el ID")</script>';		
			echo "<script>location.href='descripcionRecurso.php'</script>";
	}else{
		if($row=mysqli_fetch_assoc($result)){
			$row = mysqli_fetch_assoc($result);
			$nProf=$row['nomProfesor'];
			$nRec=$row['nomRecurso'];
			$desp=$row['despacho'];
		}else{
			echo '<script>alert("No existe el ID en la base de datos")</script>';
			echo "<script>location.href='descripcionRecurso.php'</script>";
		}
	}
*/
	
	$result=mysqli_query($link, "SELECT * FROM recursos WHERE idRecurso='$idr'");
	if(!$result) 
		    die("Error: no se pudo realizar la consulta");
	if (mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		$nProf=$row['nomProfesor'];
		$nRec=$row['nomRecurso'];
		$desp=$row['despacho'];
		
		// Con esta sentencia SQL insertaremos los datos en la base de datos
		mysqli_query($link, "INSERT INTO cola(nomProfesor, despacho, nomRecurso, dni, nomAlumno, email, codRecurso, codAlumno) VALUES ('$nProf','$desp','$nRec','$dni','$nomAlumno', 
			'$email', '$idr', '$key')");
	}else{
		echo '<script>alert("No existe el ID en la base de datos")</script>';
		echo "<script>location.href='index.php'</script>";
	}
	// Ahora comprobaremos que todo ha ido correctamente
	$my_error = mysqli_error($link);

	if(!empty($my_error)) {
	echo '<script>alert("Ha habido un error al insertar los valores.' .$my_error.'")</script>';
	echo "<script>location.href='index.php'</script>";

	} else {
	echo '<script>alert("Se ha dado de alta correctamente.\nSu código es: '.$key.'")</script>';
	echo "<script>location.href='index.php?'</script>";
	}
} else {
echo '<script>alert("Error, no ha introducido todos los datos.")</script>';
echo "<script>location.href='index.php'</script>";
}

?>
