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
	<script type="text/javascript" src="js/cufon-replace.js"></script> 
	<script type="text/javascript" src="js/Shanti_400.font.js"></script>
	<script type="text/javascript" src="js/Didact_Gothic_400.font.js"></script>-->
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
		//var cont_disco = 0

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

			// cambio de src en la "original" para que sean imagenes default al dropear
			copyimg.src = original.src

			if (original.id.split("_")[1] == "torre") {
				original.src = "images/piezas/torre-gen.png"
			} else if (original.id.split("_")[1] == "placa") {
				original.src = "images/piezas/placa-base-gen.png"
			} else if (original.id.split("_")[1] == "ventProcesador") {
				original.src = "images/piezas/cooler-gen.png"
			} else if (original.id.split("_")[1] == "ram") {
				original.src = "images/piezas/ram-gen.png"
			} else if (original.id.split("_")[1] == "grafica") {
				original.src = "images/piezas/grafica-gen.png"
			} else if (original.id.split("_")[1] == "fuenteAlim") {
				original.src = "images/piezas/fuente-gen.png"
			} else if (original.id.split("_")[1] == "disco") {
				original.src = "images/piezas/disco-gen.png"
			} else if (original.id.split("_")[1] == "procesador") {
				copyimg.src = original.src
			}


			copyimg.id = "copy-" + original.id
			copyimg.className = "imagen_borrar"
			copyimg.draggable = true
			copyimg.addEventListener("dragstart", drag)
			elementDragParent.appendChild(copyimg)
			var compr_id = original.parentElement.id.split("_")[1]


			//comprobantes de elemento dropeado y "desbloqueo" del siguiente campo
			if (compr_id == "torre") {
				if (compr_id == original.id.split("_")[1]) {
					if (cont_torre < 1) {
						cont_torre++

						pidoDatos("placas")

						setTimeout(function() {
							$claves = Object.keys($resultado)
							for ($i = 0; $i < $claves.length; $i++) {

								$("#placa_base").append("<li id='placa" + $resultado[$i].id_placa + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_placa +
									"<br>Modelo: " + $resultado[$i].modelo_placa + "<br>Precio: " + $resultado[$i].precio_placa + "€" +
									"</p><img class='imagen_borrar' id='img_placa_" + $resultado[$i].id_placa + "' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
							}
						}, 1000)
					}

					document.getElementById("contenedor_placa").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "placa") {
				if (compr_id == original.id.split("_")[1]) {
					if (cont_placaBase < 1) {
						cont_placaBase++

						pidoDatos("procesadores")

						setTimeout(function() {
							$claves = Object.keys($resultado)
							for ($i = 0; $i < $claves.length; $i++) {

								$("#procesador").append("<li id='procesador" + $resultado[$i].id_procesador + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_procesador +
									"<br>Modelo: " + $resultado[$i].modelo_procesador + "<br>Precio: " + $resultado[$i].precio_procesador + "€" +
									"</p><img class='imagen_borrar' id='img_procesador_" + $resultado[$i].id_procesador + "' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
							}
						}, 1000)
					}

					document.getElementById("contenedor_procesador").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "procesador") {
				if (compr_id == original.id.split("_")[1]) {
					if (cont_procesador < 1) {
						cont_procesador++

						pidoDatos("coolers_procesador")

						setTimeout(function() {
							$claves = Object.keys($resultado)
							for ($i = 0; $i < $claves.length; $i++) {

								$("#ventilador_procesador").append("<li id='cooler" + $resultado[$i].id_cooler + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_cooler +
									"<br>Modelo: " + $resultado[$i].modelo_cooler + "<br>Precio: " + $resultado[$i].precio_cooler + "€" +
									"</p><img class='imagen_borrar' id='img_ventProcesador_" + $resultado[$i].id_cooler + "' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
							}
						}, 1000)
					}

					document.getElementById("contenedor_ventProcesador").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "ventProcesador") {

				if (compr_id == original.id.split("_")[1]) {
					if (cont_ventilador < 1) {
						cont_ventilador++

						pidoDatos("ram")

						setTimeout(function() {
							$claves = Object.keys($resultado)
							for ($i = 0; $i < $claves.length; $i++) {

								$("#ram").append("<li id='ram" + $resultado[$i].id_ram + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_ram +
									"<br>Modelo: " + $resultado[$i].modelo_ram + "<br>Precio: " + $resultado[$i].precio_ram + "€" + "<br>Tamaño: " + $resultado[$i].tamano_ram + "<br>Unidades: " + $resultado[$i].unidades_ram +
									"</p><img class='imagen_borrar' id='img_ram_" + $resultado[$i].id_ram + "' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
							}
						}, 1000)
					}

					document.getElementById("contenedor_ram").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "ram") {
				if (compr_id == original.id.split("_")[1]) {
					if (cont_ram < 1) {
						cont_ram++

						pidoDatos("tarjetas_graficas")

						setTimeout(function() {
							$claves = Object.keys($resultado)
							for ($i = 0; $i < $claves.length; $i++) {

								$("#tarjeta_grafica").append("<li id='grafica" + $resultado[$i].id_grafica + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_grafica +
									"<br>Modelo: " + $resultado[$i].modelo_grafica + "<br>Precio: " + $resultado[$i].precio_grafica + "€" +
									"</p><img class='imagen_borrar' id='img_grafica_" + $resultado[$i].id_grafica + "' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
							}
						}, 1000)
					}

					document.getElementById("contenedor_grafica").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "grafica") {
				if (compr_id == original.id.split("_")[1]) {
					if (cont_grafica < 1) {
						cont_grafica++

						pidoDatos("fuentes_alimentacion")

						setTimeout(function() {
							$claves = Object.keys($resultado)
							for ($i = 0; $i < $claves.length; $i++) {

								$("#fuente_alimentacion").append("<li id='fuente" + $resultado[$i].id_fuente + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_fuente +
									"<br>Modelo: " + $resultado[$i].modelo_fuente + "<br>Precio: " + $resultado[$i].precio_fuente + "€" +
									"</p><img class='imagen_borrar' id='img_fuenteAlim_" + $resultado[$i].id_fuente + "' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
							}
						}, 1000)
					}

					document.getElementById("contenedor_fuenteAlim").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "fuenteAlim") {
				if (compr_id == original.id.split("_")[1]) {
					if (cont_alimentacion < 1) {
						cont_alimentacion++

						pidoDatos("discos")

						setTimeout(function() {
							$claves = Object.keys($resultado)
							for ($i = 0; $i < $claves.length; $i++) {

								$("#disco").append("<li id='disco" + $resultado[$i].id_disco + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_disco +
									"<br>Modelo: " + $resultado[$i].modelo_disco + "<br>Precio: " + $resultado[$i].precio_disco + "€" +
									"</p><img class='imagen_borrar' id='img_disco_" + $resultado[$i].id_disco + "' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
							}
						}, 1000)
					}

					document.getElementById("contenedor_disco").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "disco") {
				if (compr_id == original.id.split("_")[1]) {
					
						//CREACION DE PRESUPUESTO
					
					original.parentElement.style.backgroundColor = "#236c8356"
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			}

			if (document.getElementById("contenedor_torre").hasChildNodes()) {
				document.getElementById("contenedor_placa").style.display = "block"
			}
			if (document.getElementById("contenedor_placa").hasChildNodes()) {
				document.getElementById("contenedor_procesador").style.display = "block"
			}
			if (document.getElementById("contenedor_procesador").hasChildNodes()) {
				document.getElementById("contenedor_ventProcesador").style.display = "block"
			}
			if (document.getElementById("contenedor_ventProcesador").hasChildNodes()) {
				document.getElementById("contenedor_ram").style.display = "block"
			}
			if (document.getElementById("contenedor_ram").hasChildNodes()) {
				document.getElementById("contenedor_grafica").style.display = "block"
			}
			if (document.getElementById("contenedor_grafica").hasChildNodes()) {
				document.getElementById("contenedor_fuenteAlim").style.display = "block"
			}
			if (document.getElementById("contenedor_fuenteAlim").hasChildNodes()) {
				document.getElementById("contenedor_disco").style.display = "block"
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
						if (elem.id == "contenedor_torre") {
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_placa").style.display = "none"
							document.getElementById("contenedor_procesador").style.display = "none"
							document.getElementById("contenedor_ventProcesador").style.display = "none"
							document.getElementById("contenedor_ram").style.display = "none"
							document.getElementById("contenedor_grafica").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_placa") {
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_procesador").style.display = "none"
							document.getElementById("contenedor_ventProcesador").style.display = "none"
							document.getElementById("contenedor_ram").style.display = "none"
							document.getElementById("contenedor_grafica").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_procesador") {
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_ventProcesador").style.display = "none"
							document.getElementById("contenedor_ram").style.display = "none"
							document.getElementById("contenedor_grafica").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_ventProcesador") {
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_ram").style.display = "none"
							document.getElementById("contenedor_grafica").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_ram") {
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_grafica").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_grafica") {
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_fuenteAlim") {
							document.getElementById("contenedor_disco").style.display = "none"
						} else if (elem.id == "contenedor_disco") {

						}
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
		<div class="main" style="width: 100%; height: 1050px;">
			<section id="content2">
				<div class="box3">
					<h3>Bienvenido a la fábrica Obrex</h3>
					<p>Aquí podras hacer tu presupuesto sin preocuparte de si las piezas con compatibles o no,
						ya que la fábrica solo mostrará las piezas compatibles entre si
					</p>
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
							<li><a href="#">Ventilador procesador</a>
								<ul id="ventilador_procesador">

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
							<li><a href="#">Unidad de almacenamiento</a>
								<ul id="disco">

								</ul>
							</li>
						</ul>
						<div id="presupuesto">
							<div>
								<h3></h3>
							</div>
							<h3 id="precio_total"></h3>
						</div>
					</div>



					<div id="container">
						<div id="contenedor_torre" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_placa" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_procesador" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_ram" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_ventProcesador" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_grafica" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_fuenteAlim" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
						<div id="contenedor_disco" class="contenedor_fabricar" ondrop=drop(event) ondragover="allowDrop(event)"></div>
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