<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Obrex Fabricar</title>
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
		var elementDrag
		var cont_torre = 0
		var cont_placaBase = 0
		var cont_procesador = 0
		var cont_ram = 0
		var cont_grafica = 0
		var cont_alimentacion = 0
		var cont_ventilador = 0

		function autoEscalarAContenedor(id) {
			var elemento = getComputedStyle(document.querySelector("#" + id))
			document.getElementById(elementDrag).style.width = elemento.width
			document.getElementById(elementDrag).style.height = elemento.height
		}

		function allowDrop(ev) {
			ev.preventDefault()
		}

		function drag(ev) {
			ev.dataTransfer.setData("img", ev.target.id)
			elementDrag = ev.target.id
		}



		function drop(ev) {
			let elementDragParent = document.getElementById(elementDrag).parentElement
			ev.preventDefault();
			var data = ev.dataTransfer.getData("img")
			autoEscalarAContenedor(ev.target.id)
			ev.target.appendChild(document.getElementById(data))
			var copyimg = document.createElement("img");
			var original = document.getElementById(data);
			var elemento = getComputedStyle(document.querySelector("#" + data));

			copyimg.src = original.src
			copyimg.id = "copy-" + original.id
			copyimg.className = "imagen_borrar"
			copyimg.draggable = true
			copyimg.addEventListener("dragstart", drag)
			elementDragParent.appendChild(copyimg)
			var compr_id = original.parentElement.id.split("_")[1]

			if (compr_id == "torre" && cont_torre < 1) {

				cont_torre++

				pidoDatos("placas")

				setTimeout(function() {
					$claves = Object.keys($resultado)
					for ($i = 0; $i < $claves.length; $i++) {
						//AQUIIIIIIIIIIIIIIIIIIIIIIII
						$("#placa_base").append("<li id='placa" + $resultado[$i].id_placa + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_placa +
							"<br>Modelo: " + $resultado[$i].modelo_placa + "<br>Precio: " + $resultado[$i].precio_placa + "€" +
							"</p><img class='imagen_borrar' id='img_placa_" + $resultado[$i].id_placa + "' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
					}
				}, 1000)

			} else if (compr_id == "placa") {
				cont_placaBase++

			} else if (compr_id == "procesador") {
				cont_procesador++

			} else if (compr_id == "ram") {

			} else if (compr_id == "ventProcesador") {

			} else if (compr_id == "grafica") {

			} else if (compr_id == "fuenteAlim") {

			}

		}

		//AJAX
		function pidoDatos(str) {
			if (str == "") {
				document.getElementById("contenedor_torre").style.color = "red";
				document.getElementById("contenedor_torre").innerHTML = "Algo ha salido mal";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						$resultado = jQuery.parseJSON(this.responseText);
					}
				};
				xmlhttp.open("GET", "php-manejoDatos/fabricar_pc.php?q=" + str, true);
				xmlhttp.send();
			}
		}

		pidoDatos("torres")


		$(window).on("load", function() {
			//BORRAR IMAGENES CON CLASE imagen_borrar
			document.querySelectorAll('.contenedor_fabricar').forEach(function(elem) {
				elem.addEventListener("click", function() {
					if (elem.children[elem.childElementCount - 1].className == "imagen_borrar") {
						elem.children[elem.childElementCount - 1].remove()
					}

				})
			})

			//CREAR DESPLEGABLE DE TORRES
			setTimeout(function() {
				$("#torre").parent().one("mouseenter", function() {
					$claves = Object.keys($resultado)
					for ($i = 0; $i < $claves.length; $i++) {
						$("#torre").append("<li id='torre" + $resultado[$i].id_torre + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_torre +
							"<br>Modelo: " + $resultado[$i].modelo_torre + "<br>Precio: " + $resultado[$i].precio_torre + "€" +
							"</p><img class='imagen_borrar' id='img_torre_" + $resultado[$i].id_torre + "' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
					}
				})
			}, 400)

			/* 			$("#placa_base").parent().one("mouseenter", function() {

						})

						$("#procesador").parent().one("mouseenter", function() {

						}) */

		});
	</script>
</head>

<body id="page3">
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
		<div class="main" style="width: 100%; height: 1000px;">
			<section id="content2">
				<div class="box3">
					<h3>Bienvenido a la fabrica Obrex</h3>
					<p></p>
				</div>

				<div id="grid_fabricar">
					<div id="acordeon">
						<ul class="acorh">
							<li><a href="#">Torre</a>
								<ul id="torre">
								</ul>
							</li>
							<li><a href="#">Placa base</a>
								<ul id="placa_base">

								</ul>
							</li>
							<li><a href="#">Procesador</a>
								<ul id="procesador">

								</ul>
							</li>
							<li><a href="#">RAM</a>
								<ul id="ram">

								</ul>
							</li>
							<li><a href="#">Tarjeta gráfica</a>
								<ul id="tarjeta_grafica">

								</ul>
							</li>
							<li><a href="#">Fuente de alimentación</a>
								<ul id="fuente_alimentacion">

								</ul>
							</li>
							<li><a href="#">Ventilador procesador</a>
								<ul id="ventilador_procesador">

								</ul>
							</li>

						</ul>
					</div>
					<div id="container">
						<div id="contenedor_torre" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_placa" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_procesador" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_ram" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_ventProcesador" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_grafica" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_fuenteAlim" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
					</div>


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