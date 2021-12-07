<!DOCTYPE html>
<html lang="es">

<head>
	<title>Obrex Registro</title>
	<meta charset="utf-8" name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="icon" href="images/logo.ico" type="image/x-icon" media="all">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
</head>

<body id="page4">
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
	<div class="main">
		<!-- content -->
		<div class="body3">
			<div class="main">
				<section id="content2">
					<div class="line2 wrapper">
						<article class="col2 pad_right1">
							<h3>Registro</h3>
							<form id="ContactForm" method="POST" action="php-manejoDatos/datos-user.php">
								<div>
									<div class="wrapper">
										<span>Nombre:</span>
										<input type="text" class="input" name="name" required>
									</div>
									<div class="wrapper">
										<span>Apellidos:</span>
										<input type="mail" class="input" name="lastName" required>
									</div>
									<div class="wrapper">
										<span>Email:</span>
										<input type="email" class="input" name="email" required>
									</div>
									<div class="wrapper">
										<span>Contraseña:</span>
										<input type="password" class="input" name="passwd" required>
									</div>
									<div class="wrapper">
										<input type="checkbox" name="tyc" required>
										<span>Términos y condiciones</span>

									</div>

									<div name="e1" id="e1" style="color: red; <?php
																				if (isset($_GET["e"])) {
																					if ($_GET["e"] == 1) {
																						echo 'display:block;';
																					} else {
																						echo 'display:none;';
																					}
																				} else {
																					echo 'display:none;';
																				}  ?>">El registro no se ha podido completar. Inténtelo mas tarde</div>
									<div name="e2" id="e2" style="color: red; <?php
																				if (isset($_GET["e"])) {
																					if ($_GET["e"] == 2) {
																						echo 'display:block;';
																					} else {
																						echo 'display:none;';
																					}
																				} else {
																					echo 'display:none;';
																				}  ?>">Ya existe una cuenta con este correo</div>
									<div name="e3" id="e3" style="color: red; <?php
																				if (isset($_GET["e"])) {
																					if ($_GET["e"] == 3) {
																						echo 'display:block;';
																					} else {
																						echo 'display:none;';
																					}
																				} else {
																					echo 'display:none;';
																				}  ?>">Error desconocido. Inténtelo mas tarde</div>
									<input type="submit" class="button1" name="register" id="suit" value="Registrarme">
									<a href="#" class="button1" onClick="document.getElementById('ContactForm').reset()">Borrar</a>
								</div>
							</form>
							<p id="info" class="miscellaneous"></p>
						</article>
						<article class="col1">
							<h3 class="pad_top1">Utilidades</h3>
							<p class="miscellaneous">¡Registra tu correo para guardar presupuestos en tu cuenta y poder acceder
								a ellos mas tarde!
							</p>
						</article>
					</div>
				</section>

			</div>
		</div>


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