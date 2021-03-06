  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
	<head>
		<title>Descripción recurso</title>
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
				    <style type="text/css">
		      div#general{width:100%;}
		      div#pagina{width:691px; background-image: url("img/interior/contenido-fondo.png"); background-size: 692px 70px;}
		      div#interior_pie{background-image:none;}
		    </style>
		    	</head>
	<body>
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
        <form class="widget_loginform" action="altaAlumno.php" method="post">
            <div id="login_form_widget" class="mod-buttons fieldset login_form login_form_widget">
            <b>ALTA</b>
            <br />
        <label id="login_widget" for="ilogin_widget" class="login login_widget">
    <span>DNI</span>
    <input name="DNI" id="ilogin_widget" type="text" />
        </label>
         <label id="login_widget" for="ilogin_widget" class="login login_widget">
    <span>Nombre</span>
    <input name="nombre" id="ilogin_widget" type="text" />
        </label>
        <label id="password_widget" for="ilogin_widget" class="login login_widget">
    <span>Email</span>
    <input name="email" id="ilogin_widget" type="text" />
        </label>
        <label id="password_widget" for="ilogin_widget" class="login login_widget">
    <span>IdRecurso</span>
    <input name="idRec" id="ilogin_widget" type="text" />
        </label>
        <label id="enviar_login_widget" for="submit_login_widget" class="enviar_login enviar_login_widget">
    <input src="img/transp.gif" alt="enviar datos de identificación" name="submit" id="submit_login_widget" class="image-enviar" type="image" />
        </label>      
        <span id="login_error_widget"> </span>
      </div>
  </form>
  
   <form class="widget_loginform" action="consultaAlumno.php" method="post">
            <div id="login_form_widget" class="mod-buttons fieldset login_form login_form_widget">
            <b>CONSULTA</b>
            <br />
        <label id="login_widget" for="ilogin_widget" class="login login_widget">
    <span>Código</span>
    <input name="codigo" id="ilogin_widget" type="text" />
        </label>
        <label id="password_widget" for="ipassword_widget" class="password password_widget">
    <span>DNI</span>
    <input name="dni" id="ilogin_widget" type="tex" />
        </label>
        <label id="password_widget" for="ipassword_widget" class="password password_widget">
    <span>IdRecurso</span>
    <input name="idRec" id="ilogin_widget" type="tex" />
        </label>
        <label id="enviar_login_widget" for="submit_login_widget" class="enviar_login enviar_login_widget">
    <input src="img/transp.gif" alt="enviar datos de consulta" name="submit" id="submit_login_widget" class="image-enviar" type="image" />
        </label>

      </div>
  </form>
        </div>
        <div id="pagina">
      <h1 id="titulo_pagina"><span class="texto_titulo">Descripción recurso</span></h1>
      <div id="contenido" class="sec_interior">
	<div class="content_doku">
		<?php 
			require_once('mostrarRecursos.php'); 
			$iden=new RecursosBD;
			$iden->mostrarDescripcionRecurso();	
		?>	
        
        <?php 
			require_once('mostrarRecursos.php'); 
			$iden=new RecursosBD;
			$iden->contarPuestos();
		?> 			
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