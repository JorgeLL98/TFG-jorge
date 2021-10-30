<!DOCTYPE html>
<html lang="es">

<head>
	<title>Obrex Perfil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="icon" href="images/logo.ico" type="image/x-icon" media="all">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- <script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/cufon-replace.js"></script> -->
	<script type="text/javascript" src="js/Shanti_400.font.js"></script>
	<script type="text/javascript" src="js/Didact_Gothic_400.font.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript">
		window.addEventListener("load", function() {
			var bienvenida = document.getElementById("mens_bienvenida");
			bienvenida.innerHTML = "¡Bienvenido " + getCookie("nombre") + ", este es tu perfil!";

			document.getElementById("a_perfil").addEventListener("click", function(event) {
				console.log(event.target.innerHTML)
				var mi_cuenta = document.getElementById("mi_cuenta")
				var mis_ordenadores = document.getElementById("mis_ordenadores")
				if (event.target.innerHTML.includes("Mi cuenta")) {
					mis_ordenadores.style.display = "none"
					mi_cuenta.style.display = "block"


				} else if (event.target.innerHTML.includes("Mis ordenadores")) {
					mi_cuenta.style.display = "none"
					mis_ordenadores.style.display = "block"


				} else if (event.target.innerHTML.includes("Cerrar sesión")) {
					deleteAllCookies()
					window.location = "index.php"
				}
			})
		})
	</script>
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


	<div class="main">
		<!-- content-->



		<section id="content">
			<div class="wrapper">
				<article class="col3">
					<h3 id="mens_bienvenida"></h3>
					<p class="pad_bot1">Este es tu perfil, aquí podrás ver los presupuestos que hayas guardado y más opciones de la cuenta</p>
				</article>
			</div>
		</section>
	</div>
	<div class="body3">
		<div class="main">
			<section id="content">
				<div class="grid_perfil ">
					<article class="border_rigth">
						<h3>Tu perfil</h3>
						<ul id="a_perfil">
							<li><a class="options">Mi cuenta</a></li>
							<li><a class="options">Mis ordenadores</a></li>
							<li><a class="options">Cerrar sesión</a></li>
						</ul>
					</article>
					<article class="marg_top2 marg_left1 pad_all2">
						<div id="mi_cuenta" style="<?php
													if (isset($_GET["c"]) || (isset($_GET["e"]))) {
														echo 'display:block;';
													} else {
														echo 'display:none;';
													}  ?>">
							<h3>Cambiar mi cuenta</h3>
							<form id="ContactForm" method="POST" action="php-manejoDatos/datos-user.php">
								<div>
									<!--REVISAR -->
									<div class="wrapper">
										<span class="perfil_c">Nuevo nombre:</span>
										<input type="text" class="input" name="name_nuevo">
									</div>
									<div class="wrapper pad_top1">
										<span class="perfil_c">Nuevos apellidos:</span>
										<input type="mail" class="input" name="lastName_nuevo">
									</div>
									<div class="wrapper pad_top1">
										<span class="perfil_c">Nuevo email:</span>
										<input type="email" class="input" name="email_nuevo">
									</div>
									<div class="wrapper pad_top1">
										<span class="perfil_c">Contraseña anterior:</span>
										<input type="password" class="input" name="passwd" required>
									</div>
									<div class="wrapper pad_top1">
										<span class="perfil_c">Contraseña nueva:</span>
										<input type="password" class="input" name="passwd_nuevo">
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
																				}  ?>">No se pudo completar la operación, inténtelo mas tarde</div>
									<div name="e1" id="e1" style="color: red; <?php
																				if (isset($_GET["e"])) {
																					if ($_GET["e"] == 2) {
																						echo 'display:block;';
																					} else {
																						echo 'display:none;';
																					}
																				} else {
																					echo 'display:none;';
																				}  ?>">Contraseña anterior incorrecta</div>
									<input type="submit" class="button1" name="perfil" id="submit">
									<a href="#" class="button1" onClick="document.getElementById('ContactForm').reset()">Borrar</a>
								</div>
							</form>
						</div>
						<div id="mis_ordenadores" style="display: none;">
							<!-- HAY QUE HACERLO CUANDO PUEDA HACER PRESUPUESTOS -->
							<p>EJEMPLO</p>
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