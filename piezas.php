<!DOCTYPE html>
<html lang="es">

<head>
	<title>Obrex Hardware</title>
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
	<script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript">
		deleteThisCookie("fuenteAlimP")
		deleteThisCookie("ventProcesadorP")
		deleteThisCookie("graficaP")
		deleteThisCookie("velocidadRamProcesador")
		deleteThisCookie("ramP")
		deleteThisCookie("procesadorP")
		deleteThisCookie("discoP")
		deleteThisCookie("m2Placa")
		deleteThisCookie("suministroProcesador")
		deleteThisCookie("tipoRamPlaca")
		deleteThisCookie("anchoTorre")
		deleteThisCookie("largoTorre")
		deleteThisCookie("formato")
		deleteThisCookie("socket")
		deleteThisCookie("torreP")
		deleteThisCookie("ventProcesadorP")
		deleteThisCookie("placaP")
		deleteThisCookie("suministroGrafica")


		function pidoPiezas(str) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					$resultado = jQuery.parseJSON(this.responseText);
				}
			};
			xmlhttp.open("GET", "php-manejoDatos/fabricar_pc.php?q=" + str);
			xmlhttp.send();
		}

		function actualizarTabla() {

			$claves = Object.keys($resultado)
			for ($i = 0; $i < $claves.length; $i++) {
				return "<td>" + $resultado[$i].modelo + "</td>"
			}

		}




		$(window).on("load", function() {

			$("#a_piezas").click(function(event) {
				if (event.target.innerHTML.includes("Torres")) {
					$(".p").remove()
					pidoPiezas("torres")
					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {
							$("#tablaPiezas").append("<tr class='p'><td class='p'><img class='p' src='" + $resultado[$i].ruta_imagen + "'></td><td class='p'>" + $resultado[$i].marca_torre + "</td><td class='p'>" + $resultado[$i].modelo_torre +
								"</td><td class='p'>" + $resultado[$i].precio_torre + "</td><td class='p'><a href='" + $resultado[$i].link_compra1 + "'><img class='tiendas' src='images/logo_pccomponentes.png'></a>" +
								"</td><td class='p'><a href='" + $resultado[$i].link_compra2 + "'><img class='tiendas' src='images/logo_coolmod.png'></a></td><td class='p'><a href='" + $resultado[$i].link_compra3 + "'><img class='tiendas' src='images/logo_amazon.png'></a></td></tr>")
						}
					}, 1000)
				} else if (event.target.innerHTML.includes("Placas base")) {
					$(".p").remove()
					pidoPiezas("placas")
					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {
							$("#tablaPiezas").append("<tr class='p'><td class='p'><img class='p' src='" + $resultado[$i].ruta_imagen + "'></td><td class='p'>" + $resultado[$i].marca_placa + "</td><td class='p'>" + $resultado[$i].modelo_placa +
								"</td><td class='p'>" + $resultado[$i].precio_placa + "</td><td class='p'><a href='" + $resultado[$i].link_compra1 + "'><img class='tiendas' src='images/logo_pccomponentes.png'></a>" +
								"</td><td class='p'><a href='" + $resultado[$i].link_compra2 + "'><img class='tiendas' src='images/logo_coolmod.png'></a></td><td class='p'><a href='" + $resultado[$i].link_compra3 + "'><img class='tiendas' src='images/logo_amazon.png'></a></td></tr>")
						}
					}, 1000)
				} else if (event.target.innerHTML.includes("Procesadores")) {
					$(".p").remove()
					pidoPiezas("procesadores")
					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {
							$("#tablaPiezas").append("<tr class='p'><td class='p'><img class='p' src='" + $resultado[$i].ruta_imagen + "'></td><td class='p'>" + $resultado[$i].marca_procesador + "</td><td class='p'>" + $resultado[$i].modelo_procesador +
								"</td><td class='p'>" + $resultado[$i].precio_procesador + "</td><td class='p'><a href='" + $resultado[$i].link_compra1 + "'><img class='tiendas' src='images/logo_pccomponentes.png'></a>" +
								"</td><td class='p'><a href='" + $resultado[$i].link_compra2 + "'><img class='tiendas' src='images/logo_coolmod.png'></a></td><td class='p'><a href='" + $resultado[$i].link_compra3 + "'><img class='tiendas' src='images/logo_amazon.png'></a></td></tr>")
						}
					}, 1000)
				} else if (event.target.innerHTML.includes("Ventiladores de procesador")) {
					$(".p").remove()
					pidoPiezas("coolers_procesador")
					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {
							$("#tablaPiezas").append("<tr class='p'><td class='p'><img class='p' src='" + $resultado[$i].ruta_imagen + "'></td><td class='p'>" + $resultado[$i].marca_cooler + "</td><td class='p'>" + $resultado[$i].modelo_cooler +
								"</td><td class='p'>" + $resultado[$i].precio_cooler + "</td><td class='p'><a href='" + $resultado[$i].link_compra1 + "'><img class='tiendas' src='images/logo_pccomponentes.png'></a>" +
								"</td><td class='p'><a href='" + $resultado[$i].link_compra2 + "'><img class='tiendas' src='images/logo_coolmod.png'></a></td><td class='p'><a href='" + $resultado[$i].link_compra3 + "'><img class='tiendas' src='images/logo_amazon.png'></a></td></tr>")
						}
					}, 1000)
				} else if (event.target.innerHTML.includes("RAM")) {
					$(".p").remove()
					pidoPiezas("ram")
					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {
							$("#tablaPiezas").append("<tr class='p'><td class='p'><img class='p' src='" + $resultado[$i].ruta_imagen + "'></td><td class='p'>" + $resultado[$i].marca_ram + "</td><td class='p'>" + $resultado[$i].modelo_ram +
								"</td><td class='p'>" + $resultado[$i].precio_ram + "</td><td class='p'><a href='" + $resultado[$i].link_compra1 + "'><img class='tiendas' src='images/logo_pccomponentes.png'></a>" +
								"</td><td class='p'><a href='" + $resultado[$i].link_compra2 + "'><img class='tiendas' src='images/logo_coolmod.png'></a></td><td class='p'><a href='" + $resultado[$i].link_compra3 + "'><img class='tiendas' src='images/logo_amazon.png'></a></td></tr>")
						}
					}, 1000)
				} else if (event.target.innerHTML.includes("Tarjetas gráficas")) {
					$(".p").remove()
					pidoPiezas("tarjetas_graficas")
					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {
							$("#tablaPiezas").append("<tr class='p'><td class='p'><img class='p' src='" + $resultado[$i].ruta_imagen + "'></td><td class='p'>" + $resultado[$i].marca_grafica + "</td><td class='p'>" + $resultado[$i].modelo_grafica +
								"</td><td class='p'>" + $resultado[$i].precio_grafica + "</td><td class='p'><a href='" + $resultado[$i].link_compra1 + "'><img class='tiendas' src='images/logo_pccomponentes.png'></a>" +
								"</td><td class='p'><a href='" + $resultado[$i].link_compra2 + "'><img class='tiendas' src='images/logo_coolmod.png'></a></td><td class='p'><a href='" + $resultado[$i].link_compra3 + "'><img class='tiendas' src='images/logo_amazon.png'></a></td></tr>")
						}
					}, 1000)
				} else if (event.target.innerHTML.includes("Fuentes de alimentación")) {
					$(".p").remove()
					pidoPiezas("fuentes_alimentacion")
					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {
							$("#tablaPiezas").append("<tr class='p'><td class='p'><img class='p' src='" + $resultado[$i].ruta_imagen + "'></td><td class='p'>" + $resultado[$i].marca_fuente + "</td><td class='p'>" + $resultado[$i].modelo_fuente +
								"</td><td class='p'>" + $resultado[$i].precio_fuente + "</td><td class='p'><a href='" + $resultado[$i].link_compra1 + "'><img class='tiendas' src='images/logo_pccomponentes.png'></a>" +
								"</td><td class='p'><a href='" + $resultado[$i].link_compra2 + "'><img class='tiendas' src='images/logo_coolmod.png'></a></td><td class='p'><a href='" + $resultado[$i].link_compra3 + "'><img class='tiendas' src='images/logo_amazon.png'></a></td></tr>")
						}
					}, 1000)
				} else if (event.target.innerHTML.includes("Unidades de almacenamiento")) {
					$(".p").remove()
					pidoPiezas("discos")
					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {
							$("#tablaPiezas").append("<tr class='p'><td class='p'><img class='p' src='" + $resultado[$i].ruta_imagen + "'></td><td class='p'>" + $resultado[$i].marca_disco + "</td><td class='p'>" + $resultado[$i].modelo_disco +
								"</td><td class='p'>" + $resultado[$i].precio_disco + "</td><td class='p'><a href='" + $resultado[$i].link_compra1 + "'><img class='tiendas' src='images/logo_pccomponentes.png'></a>" +
								"</td><td class='p'><a href='" + $resultado[$i].link_compra2 + "'><img class='tiendas' src='images/logo_coolmod.png'></a></td><td class='p'><a href='" + $resultado[$i].link_compra3 + "'><img class='tiendas' src='images/logo_amazon.png'></a></td></tr>")
						}
					}, 1000)
				}
			})


		});
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

	<!-- content -->
	<div class="body3">
		<div class="main" style="width: 90%;">
			<section id="content2">

				<div class="grid_piezas menu_ul">
					<article class="border_rigth menu_ul">
						<h3>Piezas</h3>
						<ul id="a_piezas">
							<li><a class="options">Torres</a></li>
							<li><a class="options">Placas base</a></li>
							<li><a class="options">Procesadores</a></li>
							<li><a class="options">Ventiladores de procesador</a></li>
							<li><a class="options">RAM</a></li>
							<li><a class="options">Tarjetas gráficas</a></li>
							<li><a class="options">Fuentes de alimentación</a></li>
							<li><a class="options">Unidades de almacenamiento</a></li>
						</ul>
					</article>
					<article class="marg_top2 marg_left1 ">
						<table id="tablaPiezas">
							<tr>
								<th></th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Precio</th>
								<th>Opción de compra 1</th>
								<th>Opción de compra 2</th>
								<th>Opción de compra 3</th>
							</tr>
						</table>
					</article>
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