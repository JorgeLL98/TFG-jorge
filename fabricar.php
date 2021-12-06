<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Obrex Fabricar</title>
	<meta charset="utf-8" name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="icon" href="images/logo.ico" type="image/x-icon" media="all">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript">
		var elementDrag
		var precio_total = 0
		var now = new Date();
		var time = now.getTime();
		var expireTime = time + 1000 * 36000;
		now.setTime(expireTime);

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

		function piezasPresupuesto(tipo, elemento) {
			marca = elemento.id.split("-")[1]
			modelo = elemento.id.split("-")[2]
			precio = elemento.id.split("-")[3].split("^")[0]
			idTipo = elemento.id.split("_")[1]
			id = elemento.id.split("_")[2].split("-")[0]

			$('#piezas_presupuesto').append("<li id='" + idTipo + "_" + id + "' class='" + idTipo + "'><strong>" + tipo + "</strong>: " + marca +
				" " + modelo + " <span>" + precio + " €" + "</span></li>")

			actualizarPrecio()
		}

		function actualizarPrecio() {
			$("#piezas_presupuesto").each(function() {
				$(this).find('span').each(function() {
					precio_total = parseInt(this.innerHTML.split(" ")[0]) + precio_total
				})
			})

			$('#precio_total').text(precio_total + "€")
			precio_total = 0
		}

		function guardarPresupuesto() {
			var info = document.getElementById("info_p_1")
			info.style.color = "rgb(172, 17, 17)"
			let idUser = getCookie("id")

			if (idUser != null) {
				if (sessionStorage.length == 8) {
					envioPresupuesto()
				} else {
					info.innerHTML = "El presupuesto no se puede guardar incompleto. Faltan " + (8 - sessionStorage.length) + " piezas por añadir"
					info.style.display = "block"
				}
			} else {
				info.innerHTML = "No es posible guardar un presupuesto sin haber iniciado sesión"
				info.style.display = "block"
			}
		}

		function drop(ev) {
			let elementDragParent = document.getElementById(elementDrag).parentElement
			ev.preventDefault();
			var data = ev.dataTransfer.getData("img")
			autoEscalarAContenedor(ev.target.id)
			ev.target.appendChild(document.getElementById(data))
			var copyimg = document.createElement("img");
			var original = document.getElementById(data);

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


			copyimg.id = "copy|" + original.id
			copyimg.className = "imagen_borrar"
			copyimg.draggable = true
			copyimg.addEventListener("dragstart", drag)
			elementDragParent.appendChild(copyimg)
			var compr_id = original.parentElement.id.split("_")[1]


			//comprobantes de elemento dropeado por cada div y "desbloqueo" del siguiente campo
			if (compr_id == "torre") {
				if (compr_id == original.id.split("_")[1]) {
					sessionStorage.setItem("torre", "existe")
					document.cookie = "torreP=" + original.id.split("-")[1] + "|" + original.id.split("-")[2] + "|" + original.id.split("-")[3] + "|" + original.id.split("^")[1] + "; expires=" + now.toUTCString() + "; path=/"
					document.cookie = "formato=" + original.id.split("-")[4] + "; expires=" + now.toUTCString() + "; path=/"
					document.cookie = "largoTorre=" + original.id.split("-")[5] + "; expires=" + now.toUTCString() + "; path=/"
					document.cookie = "anchoTorre=" + original.id.split("-")[6].split("^")[0] + "; expires=" + now.toUTCString() + "; path=/"


					$("#placa_base").empty()
					pidoDatos("placas")

					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {
							if ($resultado[$i].m2_placa == 1) {
								$m2 = "Si"
							} else {
								$m2 = "No"
							}

							$("#placa_base").append("<li id='placa" + $resultado[$i].id_placa + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_placa +
								"<br>Modelo: " + $resultado[$i].modelo_placa + "<br>Precio: " + $resultado[$i].precio_placa + "€" + "<br>Soporta M.2: " + $m2 +
								"</p><img class='imagen_borrar' id='img_placa_" + $resultado[$i].id_placa + "-" + $resultado[$i].marca_placa + "-" + $resultado[$i].modelo_placa + "-" + $resultado[$i].precio_placa + "-" + $resultado[$i].socket_placa + "-" + $resultado[$i].tipo_ram_placa + "-" + $resultado[$i].m2_placa + "^" + $resultado[$i].link_compra1 +
								"' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
						}
					}, 700)


					document.getElementById("contenedor_placa").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"

					piezasPresupuesto("Torre", original)
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "placa") {
				if (compr_id == original.id.split("_")[1]) {
					sessionStorage.setItem("placa", "existe")
					document.cookie = "placaP=" + original.id.split("-")[1] + "|" + original.id.split("-")[2] + "|" + original.id.split("-")[3] + "|" + original.id.split("^")[1] + "; expires=" + now.toUTCString() + "; path=/"
					document.cookie = "socket=" + original.id.split("-")[4] + "; expires=" + now.toUTCString() + "; path=/"
					document.cookie = "tipoRamPlaca=" + original.id.split("-")[5] + "; expires=" + now.toUTCString() + "; path=/"
					document.cookie = "m2Placa=" + original.id.split("-")[6].split("^")[0] + "; expires=" + now.toUTCString() + "; path=/"

					$("#procesador").empty()
					pidoDatos("procesadores")

					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {

							if ($resultado[$i].ht_procesador == 1) {
								$ht = $resultado[$i].nucleos_procesador * 2
							} else {
								$ht = "No tiene"
							}

							$("#procesador").append("<li id='procesador" + $resultado[$i].id_procesador + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_procesador +
								"<br>Modelo: " + $resultado[$i].modelo_procesador + "<br>Precio: " + $resultado[$i].precio_procesador + "€" + "<br>Nucleos físicos: " + $resultado[$i].nucleos_procesador + "<br>Hilos: " + $ht +
								"</p><img class='imagen_borrar' id='img_procesador_" + $resultado[$i].id_procesador + "-" + $resultado[$i].marca_procesador + "-" + $resultado[$i].modelo_procesador + "-" + $resultado[$i].precio_procesador + "-" + $resultado[$i].velocidad_ram_procesador + "-" + $resultado[$i].suministro_procesador + "^" + $resultado[$i].link_compra1 +
								"' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
						}
					}, 700)

					document.getElementById("contenedor_procesador").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
					piezasPresupuesto("Placa base", original)
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "procesador") {
				if (compr_id == original.id.split("_")[1]) {
					sessionStorage.setItem("procesador", "existe")

					document.cookie = "procesadorP=" + original.id.split("-")[1] + "|" + original.id.split("-")[2] + "|" + original.id.split("-")[3] + "|" + original.id.split("^")[1] + "; expires=" + now.toUTCString() + "; path=/"
					document.cookie = "velocidadRamProcesador=" + original.id.split("-")[4] + "; expires=" + now.toUTCString() + "; path=/"
					document.cookie = "suministroProcesador=" + original.id.split("-")[5].split("^")[0] + "; expires=" + now.toUTCString() + "; path=/"

					$("#ventilador_procesador").empty()
					pidoDatos("coolers_procesador")

					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {

							$("#ventilador_procesador").append("<li id='cooler" + $resultado[$i].id_cooler + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_cooler +
								"<br>Modelo: " + $resultado[$i].modelo_cooler + "<br>Precio: " + $resultado[$i].precio_cooler + "€" +
								"</p><img class='imagen_borrar' id='img_ventProcesador_" + $resultado[$i].id_cooler + "-" + $resultado[$i].marca_cooler + "-" + $resultado[$i].modelo_cooler + "-" + $resultado[$i].precio_cooler + "^" + $resultado[$i].link_compra1 +
								"' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
						}
					}, 700)

					document.getElementById("contenedor_ventProcesador").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
					piezasPresupuesto("Procesador", original)
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "ventProcesador") {
				if (compr_id == original.id.split("_")[1]) {
					sessionStorage.setItem("ventProcesador", "existe")

					document.cookie = "ventProcesadorP=" + original.id.split("-")[1] + "|" + original.id.split("-")[2] + "|" + original.id.split("-")[3] + "|" + original.id.split("^")[1] + "; expires=" + now.toUTCString() + "; path=/"

					$("#ram").empty()
					pidoDatos("ram")

					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {

							$("#ram").append("<li id='ram" + $resultado[$i].id_ram + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_ram +
								"<br>Modelo: " + $resultado[$i].modelo_ram + "<br>Precio: " + $resultado[$i].precio_ram + "€" + "<br>Tipo: " + $resultado[$i].tipo_ram + "<br>Tamaño: " + $resultado[$i].tamano_ram + " GB" + "<br>Velocidad: " + $resultado[$i].velocidad_ram + " Mhz" + "<br>Unidades: " + $resultado[$i].unidades_ram + "<br>CL: " + $resultado[$i].cl_ram +
								"</p><img class='imagen_borrar' id='img_ram_" + $resultado[$i].id_ram + "-" + $resultado[$i].marca_ram + "-" + $resultado[$i].modelo_ram + "-" + $resultado[$i].precio_ram + "^" + $resultado[$i].link_compra1 +
								"' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
						}
					}, 700)

					document.getElementById("contenedor_ram").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
					piezasPresupuesto("Ventilador de procesador", original)
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "ram") {
				if (compr_id == original.id.split("_")[1]) {
					sessionStorage.setItem("ram", "existe")

					document.cookie = "ramP=" + original.id.split("-")[1] + "|" + original.id.split("-")[2] + "|" + original.id.split("-")[3] + "|" + original.id.split("^")[1] + "; expires=" + now.toUTCString() + "; path=/"

					$("#tarjeta_grafica").empty()
					pidoDatos("tarjetas_graficas")

					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {

							$("#tarjeta_grafica").append("<li id='grafica" + $resultado[$i].id_grafica + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_grafica +
								"<br>Modelo: " + $resultado[$i].modelo_grafica + "<br>Precio: " + $resultado[$i].precio_grafica + "€" + "<br>VRAM: " + $resultado[$i].vram_grafica + " GB" + "<br>Velocidad de reloj: " + $resultado[$i].velocidad_reloj_grafica + " Mhz" +
								"</p><img class='imagen_borrar' id='img_grafica_" + $resultado[$i].id_grafica + "-" + $resultado[$i].marca_grafica + "-" + $resultado[$i].modelo_grafica + "-" + $resultado[$i].precio_grafica + "-" + $resultado[$i].suministro_grafica + "^" + $resultado[$i].link_compra1 +
								"' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
						}
					}, 700)

					document.getElementById("contenedor_grafica").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
					piezasPresupuesto("RAM", original)
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "grafica") {
				if (compr_id == original.id.split("_")[1]) {
					sessionStorage.setItem("grafica", "existe")

					document.cookie = "graficaP=" + original.id.split("-")[1] + "|" + original.id.split("-")[2] + "|" + original.id.split("-")[3] + "|" + original.id.split("^")[1] + "; expires=" + now.toUTCString() + "; path=/"
					document.cookie = "suministroGrafica=" + original.id.split("-")[4].split("^")[0] + "; expires=" + now.toUTCString() + "; path=/"

					$("#fuente_alimentacion").empty()
					pidoDatos("fuentes_alimentacion")

					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {

							if ($resultado[$i].modular_fuente == 1) {
								$modular = "Si"
							} else {
								$modular = "No"
							}

							$("#fuente_alimentacion").append("<li id='fuente" + $resultado[$i].id_fuente + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_fuente +
								"<br>Modelo: " + $resultado[$i].modelo_fuente + "<br>Precio: " + $resultado[$i].precio_fuente + "€" + "<br>Potencia: " + $resultado[$i].potencia_fuente + " W" + "<br>Certificado: " + $resultado[$i].certificado_fuente + "<br>Modular: " + $modular +
								"</p><img class='imagen_borrar' id='img_fuenteAlim_" + $resultado[$i].id_fuente + "-" + $resultado[$i].marca_fuente + "-" + $resultado[$i].modelo_fuente + "-" + $resultado[$i].precio_fuente + "^" + $resultado[$i].link_compra1 +
								"' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
						}
					}, 700)

					document.getElementById("contenedor_fuenteAlim").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
					piezasPresupuesto("Tarjeta gráfica", original)
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "fuenteAlim") {
				if (compr_id == original.id.split("_")[1]) {
					sessionStorage.setItem("fuenteAlim", "existe")
					document.cookie = "fuenteAlimP=" + original.id.split("-")[1] + "|" + original.id.split("-")[2] + "|" + original.id.split("-")[3] + "|" + original.id.split("^")[1] + "; expires=" + now.toUTCString() + "; path=/"

					$("#disco").empty()
					pidoDatos("discos")

					setTimeout(function() {
						$claves = Object.keys($resultado)
						for ($i = 0; $i < $claves.length; $i++) {

							$("#disco").append("<li id='disco" + $resultado[$i].id_disco + "'><a href='" + $resultado[$i].link_fabricante + "'><p>" + "Marca: " + $resultado[$i].marca_disco +
								"<br>Modelo: " + $resultado[$i].modelo_disco + "<br>Precio: " + $resultado[$i].precio_disco + "€" + "<br>Tipo: " + $resultado[$i].tipo_disco + "<br>Almacenamiento: " + $resultado[$i].tamano_disco + "<br>Pulgadas: " + $resultado[$i].pulgadas_disco +
								"</p><img class='imagen_borrar' id='img_disco_" + $resultado[$i].id_disco + "-" + $resultado[$i].marca_disco + "-" + $resultado[$i].modelo_disco + "-" + $resultado[$i].precio_disco + "^" + $resultado[$i].link_compra1 +
								"' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
						}
					}, 700)

					document.getElementById("contenedor_disco").style.display = "block"
					original.parentElement.style.backgroundColor = "#236c8356"
					piezasPresupuesto("Fuente de alimentación", original)
				} else {
					original.parentElement.style.backgroundColor = "rgba(128, 29, 29, 0.411)"
					original.remove()
				}
			} else if (compr_id == "disco") {
				if (compr_id == original.id.split("_")[1]) {
					sessionStorage.setItem("disco", "existe")
					document.cookie = "discoP=" + original.id.split("-")[1] + "|" + original.id.split("-")[2] + "|" + original.id.split("-")[3] + "|" + original.id.split("^")[1] + "; expires=" + now.toUTCString() + "; path=/"

					original.parentElement.style.backgroundColor = "#236c8356"
					piezasPresupuesto("Unidad de almacenamiento", original)
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
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					$resultado = jQuery.parseJSON(this.responseText);
				}
			};
			xmlhttp.open("GET", "php-manejoDatos/fabricar_pc.php?q=" + str);
			xmlhttp.send();
		}


		
		function envioPresupuesto() {
			var info = document.getElementById("info_p_1")

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					
					console.log(this.responseText)

					info.innerHTML = "Presupuesto guardado correctamente en perfil"
					info.style.color = "rgb(36, 214, 81)"
					info.style.display = "block"
				}
			};
			xmlhttp.open("POST", "php-manejoDatos/fabricar_pc.php?q=presupuesto", true);

			xmlhttp.send();
		}



		pidoDatos("torres")




		$(window).on("load", function() {

			sessionStorage.clear()
			//BORRAR IMAGENES CON CLASE imagen_borrar
			document.querySelectorAll('.contenedor_fabricar').forEach(function(elem) {
				elem.addEventListener("click", function() {
					if (elem.children[elem.childElementCount - 1].className == "imagen_borrar") {
						elem.children[elem.childElementCount - 1].remove()
						actualizarPrecio()
						if (elem.id == "contenedor_torre") {
							sessionStorage.removeItem("torre")
							document.getElementsByClassName("torre")[0].remove()
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_placa").style.display = "none"
							document.getElementById("contenedor_procesador").style.display = "none"
							document.getElementById("contenedor_ventProcesador").style.display = "none"
							document.getElementById("contenedor_ram").style.display = "none"
							document.getElementById("contenedor_grafica").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_placa") {
							sessionStorage.removeItem("placa")
							document.getElementsByClassName("placa")[0].remove()
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_procesador").style.display = "none"
							document.getElementById("contenedor_ventProcesador").style.display = "none"
							document.getElementById("contenedor_ram").style.display = "none"
							document.getElementById("contenedor_grafica").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_procesador") {
							sessionStorage.removeItem("procesador")
							document.getElementsByClassName("procesador")[0].remove()
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_ventProcesador").style.display = "none"
							document.getElementById("contenedor_ram").style.display = "none"
							document.getElementById("contenedor_grafica").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_ventProcesador") {
							sessionStorage.removeItem("ventProcesador")
							document.getElementsByClassName("ventProcesador")[0].remove()
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_ram").style.display = "none"
							document.getElementById("contenedor_grafica").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_ram") {
							sessionStorage.removeItem("ram")
							document.getElementsByClassName("ram")[0].remove()
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_grafica").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_grafica") {
							sessionStorage.removeItem("grafica")
							document.getElementsByClassName("grafica")[0].remove()
							document.getElementById("contenedor_disco").style.display = "none"
							document.getElementById("contenedor_fuenteAlim").style.display = "none"
						} else if (elem.id == "contenedor_fuenteAlim") {
							sessionStorage.removeItem("fuenteAlim")
							document.getElementsByClassName("fuenteAlim")[0].remove()
							document.getElementById("contenedor_disco").style.display = "none"
						} else if (elem.id == "contenedor_disco") {
							sessionStorage.removeItem("disco")
							document.getElementsByClassName("disco")[0].remove()
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
							"</p><img class='imagen_borrar' id='img_torre_" + $resultado[$i].id_torre + "-" + $resultado[$i].marca_torre + "-" + $resultado[$i].modelo_torre + "-" + $resultado[$i].precio_torre + "-" + $resultado[$i].formato_torre + "-" + $resultado[$i].largo_torre + "-" + $resultado[$i].ancho_torre + "^" + $resultado[$i].link_compra1 +
							"' draggable='true' ondragstart='drag(event)' src='" + $resultado[$i].ruta_imagen + "'></a></li>")
					}
				})

			}, 700)

		});
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

	<!-- content -->


	<div class="main" style="width: 100%;">
		<section id="content2">
			<div class="box3">
				<h3>Bienvenido a la fábrica Obrex</h3>
				<div id="instrucciones"><strong>Instrucciones</strong><br>
					<span>
						-Puedes ver la web del fabricante solo con dar click a las fotos en la tabla<br>
						-Solo necesitas arrastrar la pieza a la zona designada para añadirla.<br>
						-Para borrar la pieza solo tienes que poner el ratón encima y dar un click.<br>
						-Puedes guardar el presupuesto en tu cuenta una vez te hayas logueado.<br>
						-Y lo mas importante, SOLO TIENES QUE PREOCUPARTE DEL PRECIO ya que todas las piezas mostradas son compatibles entre si.
					</span>
				</div>
				<div id="presupuesto">
					<h3>PRESUPUESTO</h3>
					<div id="pres_grid">
						<div>
							<h3>Componentes</h3>
							<ul id="piezas_presupuesto">
							</ul>
						</div>
						<div>
							<p id="precio_total"></p>
							<button type="button" class="button2" id="guardar_boton" onclick="guardarPresupuesto()">Guardar en perfil</button>
							<p class="info_p" id="info_p_1"></p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>


	<div class="body3">
		<div class="main" style="width: 100%;">
			<section id="content">
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
		</div>
	</div>



	<!-- / content  -->

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