  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
	<head>
		<title>Admin-Alta usuario</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
		<meta name="description" content="Universidad de Granada - Departamento de Ciencias de la Computación e Inteligencia Artificial CCIA-UGR" />
		<meta name="keywords" content="universidad,granada, Departamento Ciencias de la Computación e Inteligencia Artifical (Docencia Tutorías Asignaturas Profesores)" />
		<meta http-equiv="content-language" name="language" content="es" />
		<meta http-equiv="X-Frame-Options" content="deny" />
		<meta name="verify-v1" content="wzNyCz8sYCNt7F8Bg9GWfznkU43lC9PNaZZAxRzkjJA=" />
		<meta name="author" content="Pablo Orantes Pozo / Plantilla Neutra Oficina Web UGR http://ofiweb.ugr.es" />
		<link rel="shortcut icon" href="decsai.ico" type="image/vnd.microsoft.icon" />
		<link rel="icon" href="decsai.ico" type="image/vnd.microsoft.icon" />
		<link rel="stylesheet" id="css-style" type="text/css" href="css/style-ugr.css" media="all" />
        <link rel="stylesheet" id="css-style" type="text/css" href="css/estilos.css" media="all" />
				    <style type="text/css">
		      div#general{width:100%;}
		      div#pagina{width:691px; background-image: url("img/interior/contenido-fondo.png"); background-size: 692px 70px;}
		      div#interior_pie{background-image:none;}
		    </style>
		    	</head>
	<body>
    <?php
    @session_start();
	if (!isset($_SESSION['sesion']))  
	include ("comprobarSesion.php");
	
 
    $inactivo = 1440;
 
    if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo)
        {
            session_destroy();
            header("Location: comprobarSesion.php"); 
        }
    }
 
    $_SESSION['tiempo'] = time();
	?>
		<div id="contenedor_margenes" class="">
			<div id="contenedor" class="">
				<div id="cabecera" class="">
					<h1 id="cab_inf">Ciencias de la Computación e Inteligencia Artificial</h1>
					<div id="formularios">	
					  <div id="buscador">
					    <h2>Buscar</h2>
					    <form action="http://www.google.es/search?hl=es&amp;as_qdr=all" method="get" onsubmit="javascript:document.getElementById('sq').value+=' site:decsai.ugr.es'">
						<div id="formulario_buscar">
						  <div id="buscador-input">
						    <label id="buscar" for="sq">
							<input type="hidden" name="search" value="1" />
							<input class="with_default_value" type="text" name="query" id="sq" value="búsqueda..." onclick="this.value=''" />
						    </label>
						    <label id="enviar_buscar" for="submit_buscar">
						      <input type="image" src="img/transp.gif" alt="iniciar búsqueda" name="submit" id="submit_buscar" class="image-buscar"/>
						    </label>
						  </div>
						</div>
					     </form>
					  </div>			
						<a href="http://www.ugr.es" id="enlace_ugr">Universidad de Granada</a>
						<span class="separador_enlaces"> | </span>
						<div class="depto titulo"><span class="titulo_stack">Departamento</span><a href="index.php" id="enlace_stack">Departamento de Ciencias de la Computación e I.A.</a></div>
						<span class="separador_enlaces"> | </span>
					</div>
				</div>
    	<div id="rastro-idiomas">
		<div class="language">
                		</div>
		<div id="rastro">
			<ul id="rastro_breadcrumb">
				<li class='first'><a class='first' href='index.php'>Inicio</a></li>		</ul>
		</div>

	</div>
          <div id="general">
        <div id="menus">
        <form class="widget_loginform" action="https://decsai.ugr.es/" method="post">       
        <div id="enlaces_secciones" class="mod-menu_secciones">
    <ul>
        <li class="tipo2 item-first_level"><a href="formAltaUsuarioAdmin.php">Dar de alta usuario</a></li>
        <li class="tipo2 item-first_level"><a href="modUsuarioAdmin.php">Modificar usuario</a></li>
        <li class="tipo2 item-first_level"><a href="bajaUsuarioAdmin.php">Dar de baja usuario</a></li>
        <li class="tipo2 item-first_level"><a href="formAltaRecursoAdmin.php">Añadir recurso</a></li>
        <li class="tipo2 item-first_level"><a href="modRecursoAdmin.php">Modificar recurso</a></li>
        <li class="tipo2 item-first_level"><a href="bajaRecursoAdmin.php">Eliminar Recurso</a></li>
        <li class="tipo2 item-first_level"><a href="cerrarSesion.php">Cerrar sesión</a></li>
    </ul>
</div>     
        </form>
        </div>
        <div id="pagina">
      <h1 id="titulo_pagina"><span class="texto_titulo">Alta usuario</span></h1>
      <div id="contenido" class="sec_interior">
	<div class="content_doku">
	  <form class='contacto' action="enviarAltaUsuarioAdmin.php" method="post">
            <div><label>Email:</label><input name='email' type='text' value=''></div>
            <div><label>Contraseña:</label><input name='contraseña' type='password' value=''></div>
            
            <div><label>Rol: <br /><select name="rol">
            <option value="">Seleccione rol</option>
            <option value="administrador">Administrador</option>
            <option value="profesor">Profesor</option>
            </select></label></div>
            <div><label>Telefono:</label><input name='telefono' type='text' value=''></div>
            <div><label>DNI:</label><input name='dni' type='text' value=''></div>
            <div><label>Despacho:</label><input name='despacho' type='text' value=''></div>
            <div><input type='submit' value='Enviar'></div>
        </form>
   	      </div> 
	  </div>						
	</div>
      </div>
    


	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
	<script type="text/javascript">_uacct = "UA-2290740-1";urchinTracker();</script>

				    <div id="interior_pie">
					    <div id="pie">
						    <a class="cmswebmap" href="index.php?p=mapa">Ver Mapa Web</a>
						    <span class="separador_enlaces"> | </span>
						    <a class="contactar" href="index.php?p=contacto">Contacto y Localización</a>
						    <span class="separador_enlaces"> | </span>
						    <a class="validador" href="index.php?p=accesibilidad">Accesibilidad</a>
						    <span class="separador_enlaces"> | </span>
						    <a class="privacidad" href="index.php?p=privacidad">Política de Privacidad</a>
						    <p>						    
						    <a href="http://validator.w3.org/check?uri=decsai.ugr.es%2Findex.php%3Fp%3Dprofesores%26id%3D1698" onclick="this.target='_blank';"><img alt="valid XHTML10" title="Comprobar validez XHTML10" src="img/valid-xhtml10-blue.png" /></a> <span class="separador_enlaces"> | </span>
						    <a href="http://jigsaw.w3.org/css-validator/validator?uri=decsai.ugr.es%2Findex.php%3Fp%3Dprofesores%26id%3D1698" onclick="this.target='_blank';"><img alt="valid CSS" title="Comprobar validez CSS" src="img/valid-css-blue.png" /></a> <span class="separador_enlaces"> | </span>
						    <a href="http://www.tawdis.net/tawdis/online?nivel=2&amp;url=decsai.ugr.es%2Findex.php%3Fp%3Dprofesores%26id%3D1698" onclick="this.target='_blank';"><img alt="valid AA" title="Test de accesibilidad Web AA" src="img/accesibilidad.gif" /></a> <span class="separador_enlaces"> | </span>
						    <a href="http://www.ugr.es/pages/creditos">&copy; 2016</a> <span class="separador_enlaces"> | </span> <a href="http://www.ugr.es">Universidad de Granada</a></p>
					    </div>
				    </div>
			    </div>
		    </div>
	    </body>
    </html>