<!DOCTYPE html>
<html lang="es">

<head>
	<title>Obrex Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="icon" href="images/logo.ico" type="image/x-icon" media="all">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- <script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/cufon-replace.js"></script> 
	<script type="text/javascript" src="js/Shanti_400.font.js"></script>
	<script type="text/javascript" src="js/Didact_Gothic_400.font.js"></script>-->
	<!-- <script type="text/javascript" src="js/jquery.jqtransform.js"></script> -->
	<script type="text/javascript" src="js/funciones.js"></script>
</head>

<body id="page1">
	<div class="body1">
		<div class="body2">
			<div class="main">
				<!-- header -->
				<header>
					<?php
					include "masters/header.html";
					?>
				</header>
				<!-- / header -->
			</div>
		</div>
	</div>
	<div class="body3">
		<div class="main">
			<!-- content -->
			<section id="content">
				<h3>Como empezar a fabricar mi ordenador</h3>
				<p class="pad_bot1">Lo primero de todo es seleccionar una configuración base (socket) para poder elegir todas las demás piezas.
					Luego el asistente solo mostrará las piezas que se pueden usar con esa configuración, pudiendo arrastrarlas hasta la imagen para hacer nuestro ordenador.
				</p>
				<p class="font_size_m1 color2 marg_top2 text_align">A continuación tienes 2 opciones a escoger según tus intereses</p>
				<div class="line1 marg_left1">

					<div class="line1 wrapper">
						<article class="col1 text_align">
							<h3><a href="fabricar.php"><strong class="color1">Hacer mi propio presupuesto</strong></a></h3>

						</article>
						<article class="col1 text_align">
							<h3><a href="piezas.php"><strong class="color1">Ver piezas dispobibles</strong></a></h3>

						</article>
					</div>
				</div>
			</section>
		</div>

	</div>
	<div class="main">
		<!-- / footer -->
		<footer>
			<?php
			include 'masters/footer.html';
			?>
		</footer>
		<!-- / footer -->
	</div>
	<script type="text/javascript">
		Cufon.now();
	</script>
	<!-- <script>
		jQuery(document).ready(function($) {
			$('#form_1').jqTransform({
				imgPath: 'jqtransformplugin/img/'
			});
		});
	</script> -->
</body>

</html>