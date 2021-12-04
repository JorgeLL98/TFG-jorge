<!DOCTYPE html>
<html lang="es">

<head>
	<title>Obrex Contacto</title>
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
	<script type="text/javascript" src="js/funciones.js"></script>
</head>

<body id="page6">
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
	<!-- content -->
	<div class="body3">
		<div class="main">
			<section id="content2">
				<div class="line2 wrapper">
					<article class="col2 pad_right1">
						<h3>Formulario de contacto</h3>
						<form id="ContactForm" action="mailto:obrexsoporte@gmail.com">
							<div>
								<div class="wrapper">
									<span>Tu nombre:</span>
									<input type="text" class="input">
								</div>
								<div class="wrapper">
									<span>Tu email:</span>
									<input type="email" class="input">
								</div>
								<div class="textarea_box">
									<span>Tu mensaje:</span>
									<textarea name="textarea" cols="1" rows="1"></textarea>
								</div>
								<a href="#" class="button1" onClick="document.getElementById('ContactForm').submit()">Enviar</a>
								<a href="#" class="button1" onClick="document.getElementById('ContactForm').reset()">Borrar</a>
							</div>
						</form>
					</article>
					<article class="col1">
						<h3 class="pad_top1"> Estamos atentos</h3>
						<p class="miscellaneous">No dudes en contactar conmigo si tienes alguna duda o sugerencia. Contestaré en un plazo de 1 o 2 dias hábiles.</p>
					</article>
				</div>
			</section>
			<!-- / content  -->
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
</body>

</html>