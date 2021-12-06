<!DOCTYPE html>
<html lang="es">

<head>
	<title>Obrex Login</title>
	<meta charset="utf-8" name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="icon" href="images/logo.ico" type="image/x-icon" media="all">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
</head>

<body id="page5">
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
				<div class="marg_left1">
					<article class="col2 pad_right1">
						<h3>Iniciar sesión</h3>
						<form id="ContactForm" method="POST" action="php-manejoDatos/datos-user.php">
							<div>
								<div class="wrapper">
									<span>Email:</span>
									<input type="email" class="input" name="email" <?php if (isset($_COOKIE["email"])) {
																						echo 'value="' . $_COOKIE["email"] . '"';
																					} ?> required>
								</div>
								<div class="wrapper">
									<span>Contraseña:</span>
									<input type="password" class="input" name="passwd" required>
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
																			}  ?>">Este usuario no existe</div>
								<div name="e2" id="e2" style="color: red; <?php
																			if (isset($_GET["e"])) {
																				if ($_GET["e"] == 2) {
																					echo 'display:block;';
																				} else {
																					echo 'display:none;';
																				}
																			} else {
																				echo 'display:none;';
																			}  ?>">Email o contraseña incorrectos</div>
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
								<input type="submit" class="button1" name="login" id="submit" value="Entrar">

								<a href="#" class="button1" onClick="document.getElementById('ContactForm').reset()">Borrar</a>
							</div>
						</form>
						<div class="marg_top1">
							<p class="pad_bot1">¿No tienes una cuenta aún? Te puedes registrar<br>
								<a href="registro.php" class="font_size_m1">aquí</a>.
							</p>
						</div>
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