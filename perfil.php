<!DOCTYPE html>
<html lang="es">

<head>
	<title>Obrex Perfil</title>
	<meta charset="utf-8" name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<!-- <link rel="stylesheet" href="css/layout.css" type="text/css" media="all"> -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="icon" href="images/logo.ico" type="image/x-icon" media="all">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript">
		var precioTotal = 0







		function borrarPresupuesto(id) {
			pidoPresupuesto("borrarPresupuesto_" + id + "")
			setTimeout(function() {
				$('#mis_ordenadores').append($resultado)
			}, 700)

			pidoPresupuesto("pedirPresupuesto")
			setTimeout(function() {
				window.location.reload()

			}, 1000)
		}

		function pidoPresupuesto(str) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					$resultado = jQuery.parseJSON(this.responseText);
				}
			};
			xmlhttp.open("GET", "php-manejoDatos/fabricar_pc.php?q=" + str + "");
			xmlhttp.send();
		}

		pidoPresupuesto("pedirPresupuesto")
		window.addEventListener("load", function() {
			var bienvenida = document.getElementById("mens_bienvenida");
			bienvenida.innerHTML = "¡Bienvenido " + getCookie("nombre") + ", este es tu perfil!";

			document.getElementById("a_perfil").addEventListener("click", function(event) {

				var mi_cuenta = document.getElementById("mi_cuenta")
				var mis_ordenadores = document.getElementById("mis_ordenadores")
				if (event.target.innerHTML.includes("Cambiar mi cuenta")) {
					mis_ordenadores.style.display = "none"
					mi_cuenta.style.display = "block"
				} else if (event.target.innerHTML.includes("Mis ordenadores")) {
					$("#presupuestoTabla").empty()
					mi_cuenta.style.display = "none"
					mis_ordenadores.style.display = "block"
					if ($resultado[0].estado == 3) {
						document.getElementById("e3").style.display = "block"
					} else {

						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {
							precioTotal = parseInt($resultado[$i].torre_p.split("|")[2]) + parseInt($resultado[$i].placa_p.split("|")[2]) +
								parseInt($resultado[$i].procesador_p.split("|")[2]) + parseInt($resultado[$i].ventprocesador_p.split("|")[2]) +
								parseInt($resultado[$i].ram_p.split("|")[2]) + parseInt($resultado[$i].grafica_p.split("|")[2]) +
								parseInt($resultado[$i].fuentealim_p.split("|")[2]) + parseInt($resultado[$i].disco_p.split("|")[2]) + "€"

							$("#presupuestoTabla").append("<table><tr><th>Torre</th><th>Placa Base</th><th>Procesador</th> " +
								"<th>Cooler</th><th>RAM</th><th>Tarjeta gráfica</th><th>Fuente de alimentación</th><th>Disco</th><th>Precio total</th>" +
								"</tr><tr><td><a target='_blank' class='link2' href='" + $resultado[$i].torre_p.split("|")[3] + "'>" + $resultado[$i].torre_p.split("|")[0] + " " + $resultado[$i].torre_p.split("|")[1] +
								"</a></td><td><a target='_blank' class='link2' href='" + $resultado[$i].placa_p.split("|")[3] + "'>" + $resultado[$i].placa_p.split("|")[0] + " " + $resultado[$i].placa_p.split("|")[1] +
								"</a></td><td><a target='_blank' class='link2' href='" + $resultado[$i].procesador_p.split("|")[3] + "'>" + $resultado[$i].procesador_p.split("|")[0] + " " + $resultado[$i].procesador_p.split("|")[1] +
								"</a></td><td><a target='_blank' class='link2' href='" + $resultado[$i].ventprocesador_p.split("|")[3] + "'>" + $resultado[$i].ventprocesador_p.split("|")[0] + " " + $resultado[$i].ventprocesador_p.split("|")[1] +
								"</a></td><td><a target='_blank' class='link2' href='" + $resultado[$i].ram_p.split("|")[3] + "'>" + $resultado[$i].ram_p.split("|")[0] + " " + $resultado[$i].ram_p.split("|")[1] +
								"</a></td><td><a target='_blank' class='link2' href='" + $resultado[$i].grafica_p.split("|")[3] + "'>" + $resultado[$i].grafica_p.split("|")[0] + " " + $resultado[$i].grafica_p.split("|")[1] +
								"</a></td><td><a target='_blank' class='link2' href='" + $resultado[$i].fuentealim_p.split("|")[3] + "'>" + $resultado[$i].fuentealim_p.split("|")[0] + " " + $resultado[$i].fuentealim_p.split("|")[1] +
								"</a></td><td><a target='_blank' class='link2' href='" + $resultado[$i].disco_p.split("|")[3] + "'>" + $resultado[$i].disco_p.split("|")[0] + " " + $resultado[$i].disco_p.split("|")[1] +
								"</a></td><td>" + precioTotal + "<button onclick='borrarPresupuesto(" + $resultado[$i].id_presupuesto + ")'><img style='cursor: pointer;' class='botonBorrar' src='images/img_boton_borrar.png'></button></td></tr></table><br>")
						}
					}

				} else if (event.target.innerHTML.includes("Cerrar sesión")) {
					deleteAllCookies()
					window.location = "index.php"
				}
			})
		})
	</script>
</head>

<body id="page2">
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
		<div class="main" id="perfil_main">
			<section id="content">
				<div class="grid_perfil">
					<article class="border_rigth menu_ul">
						<h3>Mi cuenta</h3>
						<ul id="a_perfil">
							<li><a class="options desplazar">Cambiar mi cuenta</a></li>
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
									<div name="e2" id="e2" style="color: red; <?php
																				if (isset($_GET["e"])) {
																					if ($_GET["e"] == 2) {
																						echo 'display:block;';
																					} else {
																						echo 'display:none;';
																					}
																				} else {
																					echo 'display:none;';
																				}  ?>">Contraseña anterior incorrecta</div>
									<input type="submit" class="button1" name="perfil" id="submit" style="float: left;">
									<a href=" #" class="button1" onClick="document.getElementById('ContactForm').reset()" style="float: left;">Borrar</a>
								</div>
							</form>
						</div>
						<div id="mis_ordenadores" style="display: none;">
							<div id="presupuestoTabla"></div>
							<div name="e3" id="e3" style="color: red; display:none;">No existen presupuestos</div>
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

</body>

</html>