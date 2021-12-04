<!DOCTYPE html>
<html lang="es">

<head>
	<title>Obrex Home</title>
	<meta charset="utf-8" name="viewport" content="width=device-width">
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
	<script type="text/javascript">
	</script>
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
			<section id="content" class="font_size_m1 text_align">
				<h3>Como empezar a fabricar mi ordenador</h3>
				<p class="pad_bot1 ">Lo primero de todo es seleccionar una configuración base, determinada por torre y placa base, para después poder elegir todas las demás piezas.
					El asistente solo mostrará las piezas que se pueden usar con esa configuración, por lo que no necesitas preocuparte por nada
				</p>
				<p id="p_destacado">Ya puedes empezar a competir</p>
				<div class="wrapperLink">
					<article class="text_align link1">
						
						<button><span>Fabricar presupuesto</span></button>
					</article>

					<article class="text_align link1">
						
						<button><span>Piezas disponibles</span></button>
					</article>
				</div>


				<p>Te invitamos a hacer una cuenta en <a href="registro.php" class="link2">esta web</a>, para así poder guardar tu presupuesto para mas tarde</p>

			</section>
		</div>
	</div>



	<div class="main">
		<section id="content" class="font_size_m1">
			<div class="flex_index">
				<img src="images/fondo_fabricar.png" class="img_index">
				<p>¿Por que fabricar tu propio ordenador? Pues en realidad hay varios motivos, como el precio, ya que siempre (excepto ofertas puntuales) saldrá mas barato.
					Otro motivo a tener en cuenta es la oportunidad de fabricar el ordenador según el uso que le vayamos a dar, ya puede ser diseño, trabajo, multimedia o gaming.
					Los precios varían según el uso, pero eso siempre dependerá de tu prespuesto.
				</p>
			</div>


		</section>
	</div>

	<div class="body3">
		<div class="main">
			<section id="content" class="font_size_m1">
				<div class="flex_index">
					<p>Y la siguiente pregunta sería ¿Por que usar Obrex PC Builder?<br><br>
						La base de datos de esta web está en constante actualización para ofrecer unos presupuestos mas adecuados a la realidad,
						a la par que las últimas piezas y sus características.<br>
						Esta web está pensada para todos los públicos, ya que no es necesario tener ningún conocimiento previo; puedes montar tu
						presupuesto sin documentación. Solo necesitas saber que dinero vas a invertir.
					</p>
					<img src="images/fondo_habitacion.png" class="img_index">
				</div>
			</section>
		</div>

	</div>




	<!-- content -->

	<div class="main">
		<!-- / footer -->
		<footer>
			<?php
			include 'masters/footer.html';
			?>
		</footer>
		<!-- / footer -->
	</div>
	<!-- 	<script type="text/javascript">
		Cufon.now();
	</script> -->

</body>


</html>