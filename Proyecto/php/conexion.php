<?php
class ConectarBD{
	function consultaRecursos(){
	    // Se conecta al SGBD 
	    $iden = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
	    if(!$iden){
	        die("Error: No se pudo conectar \n");
	        echo "<br>";
	        }
	        //echo 'Conectado correctamente';  
	        //echo "<br>"; 
	    // Selecciona la base de datos 
	    if(!mysqli_select_db($iden, "48864593n")){
	        die("Error: No existe la base de datos \n");
	        echo "<br>";
	        }
	        //echo 'Base de datos cargada';
	        //echo "<br>";
	      // Sentencia SQL: muestra todo el contenido de la tabla "---" 
		  $sentencia = "SELECT * FROM recursos"; 
		  // Ejecuta la sentencia SQL 
		  $resultado = mysqli_query($iden, $sentencia); 
		  if(!$resultado) 
		    die("Error: no se pudo realizar la consulta");
			
		  echo '<table>'; 
		  	echo '<tr>'; 
		    echo '<td>' . 'IDCURSO' . '</td><td>' . 'ASUNTO' . '</td>
		    <td>' . 'PROFESOR' . '</td><td>' . 'D_INICIO' . '</td>
		    <td>' . 'D_FINAL' . '</td><td>' . 'DESPACHO' . '</td>';	
		    echo '</tr>'; 
		  while($fila = mysqli_fetch_assoc($resultado)) 
		  { 
		    echo '<tr>'; 
		    echo '<td>' . $fila['idRecurso'] . '</td><td>' . $fila['nomRecurso'] . '</td>
		    <td>' . $fila['nomProfesor'] . '</td><td>' . $fila['fechaInicio'] . '</td>
		    <td>' . $fila['fechaFin'] . '</td><td>' . $fila['despacho'] . '</td>';
		    echo '</tr>';  
		  } 
		  echo '</table>';
		  
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);
    }

    function descripcionTutorias(){
	    // Se conecta al SGBD 
	    $iden = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
	    if(!$iden){
	        die("Error: No se pudo conectar \n");
	        echo "<br>";
	        }
	        //echo 'Conectado correctamente';  
	        //echo "<br>"; 
	    // Selecciona la base de datos 
	    if(!mysqli_select_db($iden, "48864593n")){
	        die("Error: No existe la base de datos \n");
	        echo "<br>";
	        }
	        //echo 'Base de datos cargada';
	        //echo "<br>";
	      // Sentencia SQL: muestra todo el contenido de la tabla "---" 
		  $sentencia = "SELECT descripcion FROM recursos WHERE nomRecurso='Tutoria'"; 
		  // Ejecuta la sentencia SQL 
		  $resultado = mysqli_query($iden, $sentencia); 
		  if(!$resultado) 
		    die("Error: no se pudo realizar la consulta");
			
		  echo '<table>'; 
		  	echo '<tr>'; 
		    echo '<td>' . 'DESCRIPCION' . '</td>'; 
		    echo '</tr>'; 
		  while($fila = mysqli_fetch_assoc($resultado)) 
		  { 
		    echo '<tr>'; 
		    echo '<td>' . $fila['descripcion'] . '</td>';
		    echo '</tr>';  
		  } 
		  echo '</table>';
		  
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);    	
    }

    function descripcionRevisiones(){
	    // Se conecta al SGBD 
	    $iden = mysqli_connect("solaris.ugr.es", "ejercicio_pw", "pass_ejercicio_pw");
	    if(!$iden){
	        die("Error: No se pudo conectar \n");
	        echo "<br>";
	        }
	        //echo 'Conectado correctamente';  
	        //echo "<br>"; 
	    // Selecciona la base de datos 
	    if(!mysqli_select_db($iden, "48864593n")){
	        die("Error: No existe la base de datos \n");
	        echo "<br>";
	        }
	        //echo 'Base de datos cargada';
	        //echo "<br>";
	      // Sentencia SQL: muestra todo el contenido de la tabla "---" 
		  $sentencia = "SELECT descripcion FROM recursos WHERE nomRecurso='Revision'"; 
		  // Ejecuta la sentencia SQL 
		  $resultado = mysqli_query($iden, $sentencia); 
		  if(!$resultado) 
		    die("Error: no se pudo realizar la consulta");
			
		  echo '<table>'; 
		  	echo '<tr>'; 
		    echo '<td>' . 'DESCRIPCION' . '</td>'; 
		    echo '</tr>'; 
		  while($fila = mysqli_fetch_assoc($resultado)) 
		  { 
		    echo '<tr>'; 
		    echo '<td>' . $fila['descripcion'] . '</td>';
		    echo '</tr>';  
		  } 
		  echo '</table>';
		  
		  // Libera la memoria del resultado
		  mysqli_free_result($resultado);
		  
		  // Cierra la conexión con la base de datos 
		  mysqli_close($iden);    	
    }
}
?>