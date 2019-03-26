<?php
				$nombre=$_POST['nombre'];
				$apellido=$_POST['apellido'];
				$email	=$_POST['email'];
 		    $telefono=$_POST['telefono'];

		if (isset($_POST['submit'])) {
			if (empty($nombre) || (is_numeric($nombre))) 
			{
				$error1="<p class='error' style='color:#facb43'>*VERIFICA TU NOMBRE </p>";
			}
			if (empty($apellido) || (is_numeric($apellido))) 
			{
				$error2="<p class='error' style='color:#facb43'>*VERIFICA TU APELLIDO </p>";				
			}
			if (empty($email)) {	
				$error3="<p class='error' style='color:#facb43'>*VERIFICA TU CORREO </p>";
			}			
			else
				{  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
					{
					$error31="<p class='error' style='color:#facb43'>*El correo es incorrecto </p>";
					}
				}
			if (empty($telefono)|| !is_numeric($telefono)) {
				$error4="<p class='error'style='color:#facb43'>*VERIFICA TU NUMERO  </p>";				
			}
			else{
					$conexion=mysql_connect("localhost","root","11230830") or die("Problema en la conexion");

					mysql_select_db("bd_ica_express", $conexion) or die ("Problema con la base de datos");

					mysql_query("insert into afiliados(nombres, apellidos, correo, telefono) values ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[email]','$_REQUEST[telefono]' )",$conexion) or die ("problema en el select" .mysql_error());
					mysql_close($conexion);
					$exito= "<p class='error' style='font-weight:bold; font-size:18px'>Usted se encuentra afiliado </p>";
				}				
		}		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ica Express</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/misestilos.css">
	  <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <script src="https://use.fontawesome.com/025d1f53df.js"></script>	    
</head>
<body>
	<header>
			<nav class="navbar navbar-default navbar-fixed-top"><!--para que quede fijo en la parte superior mientras se avanza la página-->
				<div class="container-fluid">
					<div class="navbar-header">
						<!--boton menú en dispositivos móviles-->
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
							<span class="sr-only">Menu</span><!--para que en dispositivos de lectura se vea un botón que diga menu-->
							<span class="icon-bar"></span><!--para las rayitas del button-->
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<p class="logo">ICA EXPRESS </p>
					</div>
					<div class="collapse navbar-collapse" id="navbar-1"><!--Agrupa los enlaces de navegación del menú. En dispositivos móviles el menú se desplegará, verticalmente-->
						<ul class="nav navbar-nav navbar-right">
							<li><a href="index.html">Inicio</a></li>
							<li><a href="nosotros.html">Nosotros</a></li>
							<li><a href="servicios.html">Servicios</a></li>
							<li class="active"><a href="afiliate2.php">Afíliate</a></li>
							<li><a href="contacto.html">Contacto</a></li>
							<li class="list-inline-item"><a href="https://web.facebook.com/Taxis-Ica-Express-321708001207676/?ref=br_rs">
		                    <span class="fa-stack fa-sm">
		                    <i class="fa fa-circle fa-stack-2x"></i>
		                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i> </span></a>
             				</li>
						</ul>
					</div>
				</div>				
			</nav> 
	</header>
	<!--formulario de afiliación-->

	<br><br>
	<h3 class="text-center">¡QUIERO AFILIARME!</h3><br>
	<p class="text-center">Completa este formulario y nos comunicamos contigo</p><br>
	<div class="container">
			<form class="form-horizontal" method="post" action=" " >
			  <div class="form-group">    
			    <div class="col-lg-offset-4 col-lg-4">
			    <label>Nombres</label>
			      <input type="text" class="form-control" name="nombre" placeholder="Nombres"  value="">
			      <?php echo $error1 ?>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-lg-offset-4 col-lg-4">
			    	<label>Apellidos</label>
			      <input type="text" class="form-control" name="apellido" placeholder="Apellidos"  value="">
			      <?php echo $error2 ?>
			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-lg-offset-4 col-lg-4">
			    	<label>Correo Electrónico</label>
			      <input type="text" class="form-control" name="email" placeholder="Correo Electronico"  value="">			      
			      <?php echo $error3 ?>
			        <?php echo $error31 ?>			      
			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-lg-offset-4 col-lg-4">
			    	<label>Telefono</label>
			     	 <input type="text" class="form-control" name="telefono" placeholder="Telefono"  value="">			 
			      <?php echo $error4 ?>			    
			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-lg-offset-4 col-lg-4">
			      <input type="submit" class=" btn btn-warning" value="Registro" name="submit" style="margin-left: 140px ; width: 120px">	
			    	    </div>
			  </div><br>

			  <div class="form-group">
			  	<div class="col-lg-offset-4 col-lg-4" style="margin-left: 470px;">			  		
					<?php echo $exito ?>					
			  	</div>
			  </div>
			</form>
			<!--programacion-->
</div>
	<!--footer-->
	<footer>
		<div class="footer">
			<div class="container">	
				<div class="row">
					<div class="col-xs-6">
						<ul class="lista-left">
							<li><a href="index.html" style="text-decoration:none">INICIO</a></li>
							<li><a href="nosotros.html" style="text-decoration:none">NOSOTROS</a></li>
							<li><a href="servicios.html" style="text-decoration:none">SERVICIOS</a></li>
							<li><a href="afiliate2.php" style="text-decoration:none">AFÍLIATE</a></li>
							<li><a href="contactp.html" style="text-decoration:none">CONTACTO</a></li>
						</ul>
					</div>
					<div class="col-xs-6">					
						<ul class="lista-right">
							<li>©2018</li>
							<li>Todos los derechos reservados</li>
							<li>Aviso legal</li>
							<li>Políticas de privacidad</li>							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>