<?php
class RecursosBD{
	function mostrarRecursos(){
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
	      // Sentencia SQL 
		  $sentencia = "SELECT nomRecurso FROM recursos"; 
		  // Ejecuta la sentencia SQL 
		  $resultado = mysqli_query($iden, $sentencia); 
		  if(!$resultado) 
		    die("Error: no se pudo realizar la consulta");
			
		  echo '<table>';  
		  while($fila = mysqli_fetch_assoc($resultado)) 
		  { 
		    echo '<tr>';
		    echo "<td><a href='descripcionRecurso.php?rec=$fila[nomRecurso]'>$fila[nomRecurso]</a></td>";
		    //echo "<td><a href='descripcion{$fila["nomRecurso"]}.php'>$fila[nomRecurso]</a></td>";
		    echo '<tr>';
		  } 
		  echo '</table>';
		  
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);
	}

	function mostrarRecursosProfesor(){
		@session_start();

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

		$sesionProf=$_SESSION['sesion'];
		$sentencia = "SELECT despacho FROM login WHERE email='$sesionProf'";
		// Ejecuta la sentencia SQL 
		$resultado = mysqli_query($iden, $sentencia); 
		if(!$resultado) 
		   die("Error: no se pudo realizar la primera consulta");

		$row = mysqli_fetch_assoc($resultado);
		$desp=$row['despacho'];

		$sentencia2 = "SELECT nomRecurso FROM recursos WHERE despacho='$desp'";
		$resultado2 = mysqli_query($iden, $sentencia2);
		if(!$resultado2) 
		   die("Error: no se pudo realizar la segunda consulta");
			
		  echo '<table>';  
		  echo '<td><b>'."Selecione el recurso a gestionar".'</b></td>';
		  while($fila = mysqli_fetch_assoc($resultado2)) 
		  { 
		    echo '<tr>';
		    echo "<td><a href='gestionarTurRecCola.php?rec=$fila[nomRecurso]'>$fila[nomRecurso]</a></td>";
		    echo '<tr>';
		  } 
		  echo '</table>';
		  
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);
	}

	function mostrarTablaRecursos(){
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
	      // Sentencia SQL 
		  $sentencia = "SELECT * FROM recursos"; 
		  // Ejecuta la sentencia SQL 
		  $resultado = mysqli_query($iden, $sentencia); 
		  if(!$resultado) 
		    die("Error: no se pudo realizar la consulta");
			
		  echo '<table>';

		  echo '<td><b>' . "ID" . '</b></td>';
		  echo '<td><b>' . "N. Recurso" . '</b></td>';
		  echo '<td><b>' . "N. Profesor" . '</b></td>';
		  echo '<td><b>' . "F. Inicio" . '</b></td>';
		  echo '<td><b>' . "F. Fin" . '</b></td>';
		  echo '<td><b>' . "Despacho.." . '</b></td>';

		  while($fila = mysqli_fetch_assoc($resultado)) 
		  { 
		    echo '<tr>'; 
		    //echo "<td><a href='formModRecurso.php'>$fila[nomRecurso]</a></td>";
		    echo '<td>' . $fila["idRecurso"] . '</td>';
		    echo '<td>' . $fila["nomRecurso"] . '</td>';
		    echo '<td>' . $fila["nomProfesor"] . '</td>';
		    echo '<td>' . $fila["fechaInicio"] . '</td>';
		    echo '<td>' . $fila["fechaFin"] . '</td>';
		    echo '<td>' . $fila["despacho"] . '</td>';
		    echo '<tr>';
		  } 
		  echo '</table>';
		  
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);
	}

	function mostrarRecursosID(){
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
	      // Sentencia SQL 
		  $sentencia = "SELECT * FROM recursos"; 
		  // Ejecuta la sentencia SQL 
		  $resultado = mysqli_query($iden, $sentencia); 
		  if(!$resultado) 
		    die("Error: no se pudo realizar la consulta");
			
		  echo '<table>';

		  echo '<td><b>' . "ID" . '</b></td>';
		  echo '<td><b>' . "N. Recurso" . '</b></td>';
		  echo '<td><b>' . "N. Profesor" . '</b></td>';

		  while($fila = mysqli_fetch_assoc($resultado)) 
		  { 
		    echo '<tr>'; 
		    echo '<td>' . $fila["idRecurso"] . '</td>';
		    echo '<td>' . $fila["nomRecurso"] . '</td>';
		    echo '<td>' . $fila["nomProfesor"] . '</td>';
		    echo '<tr>';
		  } 
		  echo '</table>';
		  
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);
	}
	
	function mostrarTablaLogin(){
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
	      // Sentencia SQL 
		  $sentencia = "SELECT * FROM login"; 
		  // Ejecuta la sentencia SQL 
		  $resultado = mysqli_query($iden, $sentencia); 
		  if(!$resultado) 
		    die("Error: no se pudo realizar la consulta");
			
		  echo '<table>';

		  echo '<td><b>' . "Email" . '</b></td>';
		  echo '<td><b>' . "Contraseña" . '</b></td>';
		  echo '<td><b>' . "Rol" . '</b></td>';
		  echo '<td><b>' . "Teléfono" . '</b></td>';
		  echo '<td><b>' . "DNI" . '</b></td>';
		  echo '<td><b>' . "Despacho" . '</b></td>';

		  while($fila = mysqli_fetch_assoc($resultado)) 
		  { 
		    echo '<tr>'; 
		    
		    echo '<td>' . $fila["email"] . '</td>';
		    echo '<td>' . $fila["contraseña"] . '</td>';
		    echo '<td>' . $fila["rol"] . '</td>';
		    echo '<td>' . $fila["telefono"] . '</td>';
		    echo '<td>' . $fila["dni"] . '</td>';
		    echo '<td>' . $fila["despacho"] . '</td>';
		    echo '<tr>';
		  } 
		  echo '</table>';
		  
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);
	}	
	
	function mostrarLoginID(){
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
	      // Sentencia SQL 
		  $sentencia = "SELECT * FROM login"; 
		  // Ejecuta la sentencia SQL 
		  $resultado = mysqli_query($iden, $sentencia); 
		  if(!$resultado) 
		    die("Error: no se pudo realizar la consulta");
			
		  echo '<table>';

		  echo '<td><b>' . "Email" . '</b></td>';
		  echo '<td><b>' . "Contraseña" . '</b></td>';
		  echo '<td><b>' . "Rol" . '</b></td>';

		  while($fila = mysqli_fetch_assoc($resultado)) 
		  { 
		    echo '<tr>'; 
		    echo '<td>' . $fila["email"] . '</td>';
		    echo '<td>' . $fila["contraseña"] . '</td>';
		    echo '<td>' . $fila["rol"] . '</td>';
		    echo '<tr>';
		  } 
		  echo '</table>';
		  
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);
	}

	function mostrarDescripcionRecurso(){
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

	      $recurso=$_GET['rec'];
	      // Sentencia SQL
		  $sentencia = "SELECT descripcion, idRecurso FROM recursos WHERE nomRecurso='$recurso'";
		  // Ejecuta la sentencia SQL 
		  $resultado = mysqli_query($iden, $sentencia); 
		  if(!$resultado) 
		    die("Error: no se pudo realizar la consulta");
			
		  echo '<table>';

		  echo '<td><b>' . "ID" . '</b></td>';
		  echo '<td><b>' . "Descripción" . '</b></td>';
		  

		  while($fila = mysqli_fetch_assoc($resultado)) 
		  { 
		    echo '<tr>'; 
		    echo '<td>' . $fila["idRecurso"] . '</td>';
		    echo '<td>' . $fila["descripcion"] . '</td>';
		    echo '<tr>';
		  } 
		  echo '</table>';
		  
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);
	}	

	function contarPuestos(){
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

	    $recurso=$_GET['rec'];
	    $sentencia = "SELECT * FROM cola WHERE nomRecurso='$recurso'";
		// Ejecuta la sentencia SQL 
		$resultado = mysqli_query($iden, $sentencia);
		$cont=mysqli_num_rows($resultado); 
		if(!$resultado) 
		  die("Error: no se pudo realizar la consulta");

		if($cont < 5){
			echo '<script>alert("El número de alumnos en este recurso es menor de 5.")</script>';
		}else{
			if($cont <= 10){
				echo '<script>alert("El número de alumnos en este recurso es mayor de 5.")</script>';
			}
			if($cont > 10){
			 	echo '<script>alert("El número de alumnos en este recurso es mayor de 10.")</script>';	
			}
		}
		 


		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);
	}

	function mostrarColaProfesor(){
		@session_start();

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


		$recurso=$_GET['rec'];
	      // Sentencia SQL
		$sentencia = "SELECT * FROM cola WHERE nomRecurso='$recurso' ORDER BY orden ASC";
		$resultado = mysqli_query($iden, $sentencia);
		if(!$resultado) 
		   die("Error: no se pudo realizar la segunda consulta");
			
		echo '<table>';
		echo '<td><b>' . "Recurso" . '</b></td>';
		echo '<td><b>' . "Alumno" . '</b></td>';
		echo '<td><b>' . "C. Alumno" . '</b></td>';		
		echo '<td><b>' . "Estado" . '</b></td>';
		  
		while($fila = mysqli_fetch_assoc($resultado)) 
		{ 
		    echo '<tr>';
		    echo '<td>' . $fila["nomRecurso"] . '</td>'; 
		    echo '<td>' . $fila["nomAlumno"] . '</td>';
		    echo '<td>' . $fila["codAlumno"] . '</td>';
		    echo '<td>' . $fila["estado"] . '</td>';
		    echo '<tr>';
		} 
		echo '</table>';

		// Libera la memoria del resultado
		mysqli_free_result($resultado);
		  
		// Cierra la conexión con la base de datos 
		mysqli_close($iden);
	}

function mostrarColaMonitor(){
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
	      // Sentencia SQL
		$sentencia = "SELECT * FROM llamados ORDER BY hora DESC LIMIT 8";
		$sentencia2 = "SELECT * FROM cola WHERE estado='Llamando'";
		$resultado = mysqli_query($iden, $sentencia);
		$resultado2 = mysqli_query($iden, $sentencia2);
		
		if(!$resultado) 
		   die("Error: no se pudo realizar la primera consulta");
		if(!$resultado2) 
		   die("Error: no se pudo realizar la segunda consulta");
		
		echo '<b>' . "Llamando" . '</b>';
		echo '<table>';
		echo '<td><b>' . "Recurso" . '</b></td>';
		echo '<td><b>' . "Despacho" . '</b></td>';
		echo '<td><b>' . "C. Alumno" . '</b></td>';
		
		while($fila = mysqli_fetch_assoc($resultado2)) 
		{ 
		    echo '<tr>';
		    echo '<td>' . $fila["nomRecurso"] . '</td>';
		    echo '<td>' . $fila["despacho"] . '</td>'; 
		    echo '<td>' . $fila["codAlumno"] . '</td>';
		    echo '<tr>';
		}
		
		echo '</table>';
		
		echo '<b>' . "Llamados" . '</b>';		
		echo '<table>';
		echo '<td><b>' . "Recurso" . '</b></td>';
		echo '<td><b>' . "Despacho" . '</b></td>';
		echo '<td><b>' . "C. Alumno" . '</b></td>';	
		echo '<td><b>' . "Hora" . '</b></td>';		
		  
		while($fila = mysqli_fetch_assoc($resultado)) 
		{ 
		    echo '<tr>';
		    echo '<td>' . $fila["nomRecurso"] . '</td>';
		    echo '<td>' . $fila["despacho"] . '</td>'; 
		    echo '<td>' . $fila["codAlumno"] . '</td>';
			echo '<td>' . $fila["hora"] . '</td>';
		    echo '<tr>';
		} 
		echo '</table>';
		// Libera la memoria del resultado
		mysqli_free_result($resultado);
		mysqli_free_result($resultado2);
		  
		// Cierra la conexión con la base de datos 
		mysqli_close($iden);
	}

	function generarCodigoRecurso(){
		 $key = '';
		 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		 $max = strlen($pattern)-1;
		 for($i=0;$i < 4;$i++) $key .= $pattern{mt_rand(0,$max)};
		 return $key;
	}

	function mostrarMensajeAlerta(){
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
	      // Sentencia SQL 
		  $sentencia = "SELECT * FROM alerta ORDER BY orden DESC"; 
		  // Ejecuta la sentencia SQL 
		  $resultado = mysqli_query($iden, $sentencia); 
		  if(!$resultado) 
		    die("Error: no se pudo realizar la consulta");
			
		  echo '<table>';

		  
		  

		  while($fila = mysqli_fetch_assoc($resultado)) 
		  { 
		    echo '<tr>'; 
		    echo '<td><b>' . "Nombre Recurso" . '</b></td>';
		    echo '<tr>';
		    echo '<tr>';
		    echo '<td>' . $fila["nomRecurso"] . '</td>';
		    echo '<tr>';
		    echo '<tr>';
		    echo '<td><b>' . "Mensaje" . '</b></td>';
		    echo '<tr>';
		    echo '<tr>';
		    echo '<td>' . $fila["mensaje"] . '</td>';
		    echo '<tr>';
		    echo '<tr>';
		    echo '<td>' . '--------------------------------------------' . '</td>';
		    echo '<tr>';
		  } 
		  echo '</table>';
		 	 
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);		
	}
}

?>