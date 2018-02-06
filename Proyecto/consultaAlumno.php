<?php
// Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
if(isset($_POST['codigo']) && !empty($_POST['codigo']) &&
isset($_POST['dni']) && !empty($_POST['dni']) &&
isset($_POST['idRec']) && !empty($_POST['idRec'])) {

	$cod=$_POST['codigo'];
	$DNI=$_POST['dni'];
	$idRecurso=$_POST['idRec'];

	$contador = 0;

	$link = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
	mysqli_select_db($link, "48864593n");

	$result=mysqli_query($link, "SELECT * FROM cola WHERE codRecurso='$idRecurso'");
	$total=mysqli_num_rows($result);
	if(!$result) 
		    die("Error: no se pudo realizar la consulta");

	while(($fila = mysqli_fetch_assoc($result)) && ($fila["codAlumno"] != $cod)) 
	{ 
	   	$contador = $contador + 1;
	} 

	// Ahora comprobaremos que todo ha ido correctamente
	$my_error = mysqli_error($link);

	if(!empty($my_error)) {
	echo '<script>alert("Ha habido un error al insertar los valores.' .$my_error.'")</script>';
	} else if ($total == $contador){
				echo '<script>alert("Es tu turno!")</script>';
				}else{
					if($contador < 5){					
					echo "<script>
					if(confirm('Le quedan para entrar menos de 5, ¿Desea continuar con la espera?')){
						document.location.href='index.php';
					}else{
						alert('Se ha eliminado de la cola.');
						document.location.href='bajaAlumno.php?codAlum=$cod';
					}

					</script>";
					}
					else{ 
						if($contador <= 10){
							echo "<script>
					if(confirm('Le quedan para entrar más de 5, ¿Desea continuar con la espera?')){
						document.location.href='index.php';
					}else{
						alert('Se ha eliminado de la cola.');
						document.location.href='bajaAlumno.php?codAlum=$cod';
					}

					</script>";
						}else if($contador > 10){
							echo "<script>
					if(confirm('Le quedan para entrar más de 10, ¿Desea continuar con la espera?')){
						document.location.href='index.php';
					}else{
						alert('Se ha eliminado de la cola.');
						document.location.href='bajaAlumno.php?codAlum=$cod';
					}

					</script>";
						}
					}
				}
}else {
	echo '<script>alert("Error, no ha introducido todos los datos.")</script>';
	echo "<script>location.href='index.php'</script>";
}
	
?>

