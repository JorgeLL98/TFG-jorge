<?php
session_start();
?>
<?php
include 'conexion.php';


if ($_GET["q"] == "torres") {
    $query = mysqli_query($con, 'SELECT * FROM torres');
    $results = array();
    while ($row = mysqli_fetch_row($query)) {
        $id_torre = $row[0];
        $modelo_torre = $row[1];
        $marca_torre = $row[2];
        $formato_torre = $row[3];
        $largo_torre = $row[4];
        $ancho_torre = $row[5];
        $alto_torre = $row[6];
        $precio_torre = $row[7];
        $ruta_imagen = $row[8];
        $link_fabricante = $row[9];
        $link_compra1 = $row[10];
        $link_compra2 = $row[11];
        $link_compra3 = $row[12];

        $results[] = array(
            "id_torre" => $id_torre, "modelo_torre" => $modelo_torre, "marca_torre" => $marca_torre,
            "formato_torre" => $formato_torre, "largo_torre" => $largo_torre, "ancho_torre" => $ancho_torre,
            "alto_torre" => $alto_torre, "precio_torre" => $precio_torre, "ruta_imagen" => $ruta_imagen,
            "link_fabricante" => $link_fabricante, "link_compra1" => $link_compra1, "link_compra2" => $link_compra2,
            "link_compra3" => $link_compra3
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "procesadores") {

    if (isset($_COOKIE["socket"])) {
        $query = mysqli_query($con, 'SELECT * FROM procesadores WHERE SOCKET="' . $_COOKIE["socket"] . '"');
    } else {
        $query = mysqli_query($con, 'SELECT * FROM procesadores');
    }

    $results = array();
    while ($row = mysqli_fetch_row($query)) {
        $id_procesador = $row[0];
        $modelo_procesador = $row[1];
        $marca_procesador = $row[2];
        $socket_procesador = $row[3];
        $nucleos_procesador = $row[4];
        $ht_procesador = $row[5];
        $suministro_procesador = $row[6];
        $tipo_ram_procesador = $row[7];
        $velocidad_ram_procesador = $row[8];
        $precio_procesador = $row[9];
        $ruta_imagen = $row[10];
        $link_fabricante = $row[11];
        $link_compra1 = $row[12];
        $link_compra2 = $row[13];
        $link_compra3 = $row[14];

        $results[] = array(
            "id_procesador" => $id_procesador,
            "modelo_procesador" => $modelo_procesador, "marca_procesador" => $marca_procesador,
            "socket_procesador" => $socket_procesador, "nucleos_procesador" => $nucleos_procesador,
            "ht_procesador" => $ht_procesador, "suministro_procesador" => $suministro_procesador,
            "tipo_ram_procesador" => $tipo_ram_procesador, "velocidad_ram_procesador" => $velocidad_ram_procesador,
            "precio_procesador" => $precio_procesador, "ruta_imagen" => $ruta_imagen, "link_fabricante" => $link_fabricante,
            "link_compra1" => $link_compra1, "link_compra2" => $link_compra2,
            "link_compra3" => $link_compra3
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "placas") {
    if (isset($_COOKIE["formato"])) {
        $query = mysqli_query($con, 'SELECT * FROM placas_base WHERE FORMATO_FORMA="' . $_COOKIE["formato"] . '"');
    } else {
        $query = mysqli_query($con, 'SELECT * FROM placas_base');
    }
    $results = array();
    while ($row = mysqli_fetch_row($query)) {
        $id_placa = $row[0];
        $modelo_placa = $row[1];
        $marca_placa = $row[2];
        $formato_placa = $row[3];
        $socket_placa = $row[4];
        $m2_placa = $row[5];
        $tipo_ram_placa = $row[6];
        $ram_maxima_placa = $row[7];
        $velocidad_ram_maxima = $row[8];
        $precio_placa = $row[9];
        $ruta_imagen = $row[10];
        $link_fabricante = $row[11];
        $link_compra1 = $row[12];
        $link_compra2 = $row[13];
        $link_compra3 = $row[14];

        $results[] = array(
            "id_placa" => $id_placa, "modelo_placa" => $modelo_placa, "marca_placa" => $marca_placa,
            "formato_placa" => $formato_placa, "socket_placa" => $socket_placa, "m2_placa" => $m2_placa, "tipo_ram_placa" => $tipo_ram_placa,
            "ram_maxima_placa" => $ram_maxima_placa, "velocidad_ram_maxima" => $velocidad_ram_maxima,
            "precio_placa" => $precio_placa, "ruta_imagen" => $ruta_imagen, "link_fabricante" =>
            $link_fabricante, "link_compra1" => $link_compra1, "link_compra2" => $link_compra2,
            "link_compra3" => $link_compra3
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "ram") {
    if (isset($_COOKIE["tipoRamPlaca"])) {
        $query = mysqli_query($con, 'SELECT * FROM ram WHERE TIPO_RAM = "' . $_COOKIE["tipoRamPlaca"] . '" AND VELOCIDAD_RAM > "' . $_COOKIE["velocidadRamProcesador"] . '"');
    } else {
        $query = mysqli_query($con, 'SELECT * FROM ram');
    }
    $results = array();
    while ($row = mysqli_fetch_row($query)) {
        $id_ram = $row[0];
        $modelo_ram = $row[1];
        $marca_ram = $row[2];
        $tipo_ram = $row[3];
        $tamano_ram = $row[4];
        $velocidad_ram = $row[5];
        $cl_ram = $row[6];
        $unidades_ram = $row[7];
        $precio_ram = $row[8];
        $ruta_imagen = $row[9];
        $link_fabricante = $row[10];
        $link_compra1 = $row[11];
        $link_compra2 = $row[12];
        $link_compra3 = $row[13];


        $results[] = array(
            "id_ram" => $id_ram, "modelo_ram" => $modelo_ram, "marca_ram" => $marca_ram,
            "tipo_ram" => $tipo_ram, "tamano_ram" => $tamano_ram, "velocidad_ram" => $velocidad_ram, "cl_ram" => $cl_ram, "unidades_ram" => $unidades_ram,
            "precio_ram" => $precio_ram, "ruta_imagen" => $ruta_imagen, "link_fabricante" =>
            $link_fabricante, "link_compra1" => $link_compra1, "link_compra2" => $link_compra2,
            "link_compra3" => $link_compra3
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "tarjetas_graficas") {
    if (isset($_COOKIE["largoTorre"])) {
        $query = mysqli_query($con, 'SELECT * FROM tarjetas_graficas WHERE PROFUNDIDAD < "' . $_COOKIE["largoTorre"] . '"');
    } else {
        $query = mysqli_query($con, 'SELECT * FROM tarjetas_graficas');
    }
    $results = array();
    while ($row = mysqli_fetch_row($query)) {
        $id_grafica = $row[0];
        $modelo_grafica = $row[1];
        $marca_grafica = $row[2];
        $vram_grafica = $row[3];
        $velocidad_reloj_grafica = $row[4];
        $suministro_grafica = $row[5];
        $profundidad_grafica = $row[6];
        $precio_grafica = $row[7];
        $ruta_imagen = $row[8];
        $link_fabricante = $row[9];
        $link_compra1 = $row[10];
        $link_compra2 = $row[11];
        $link_compra3 = $row[12];

        $results[] = array(
            "id_grafica" => $id_grafica, "modelo_grafica" => $modelo_grafica, "marca_grafica" => $marca_grafica, "vram_grafica" => $vram_grafica,
            "velocidad_reloj_grafica" => $velocidad_reloj_grafica, "suministro_grafica" => $suministro_grafica,
            "profundidad_grafica" => $profundidad_grafica, "precio_grafica" => $precio_grafica,
            "ruta_imagen" => $ruta_imagen, "link_fabricante" =>
            $link_fabricante, "link_compra1" => $link_compra1, "link_compra2" => $link_compra2,
            "link_compra3" => $link_compra3
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "fuentes_alimentacion") {
    if (isset($_COOKIE["suministroProcesador"])) {
        $consumo_maximo = $_COOKIE["suministroProcesador"] + $_COOKIE["suministroGrafica"] + 300;
        $query = mysqli_query($con, 'SELECT * FROM fuentes_alimentacion WHERE POTENCIA >= "' . $consumo_maximo . '"');
    } else {
        $query = mysqli_query($con, 'SELECT * FROM fuentes_alimentacion');
    }
    $results = array();
    while ($row = mysqli_fetch_row($query)) {
        $id_fuente = $row[0];
        $modelo_fuente = $row[1];
        $marca_fuente = $row[2];
        $potencia_fuente = $row[3];
        $certificado_fuente = $row[4];
        $formato_fuente = $row[5];
        $modular_fuente = $row[6];
        $precio_fuente = $row[7];
        $ruta_imagen = $row[8];
        $link_fabricante = $row[9];
        $link_compra1 = $row[10];
        $link_compra2 = $row[11];
        $link_compra3 = $row[12];

        $results[] = array(
            "id_fuente" => $id_fuente, "modelo_fuente" => $modelo_fuente, "marca_fuente" => $marca_fuente,
            "potencia_fuente" => $potencia_fuente, "certificado_fuente" => $certificado_fuente, "formatio_fuente" => $formato_fuente,
            "modular_fuente" => $modular_fuente, "precio_fuente" => $precio_fuente, "ruta_imagen" => $ruta_imagen, "link_fabricante" =>
            $link_fabricante, "link_compra1" => $link_compra1, "link_compra2" => $link_compra2,
            "link_compra3" => $link_compra3
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "coolers_procesador") {
    if (isset($_COOKIE["socket"])) {
        $query = mysqli_query($con, 'SELECT * FROM coolers_procesador WHERE SOCKET="' . $_COOKIE["socket"] . '" AND ALTURA <= "' . $_COOKIE["anchoTorre"] . '"');
    } else {
        $query = mysqli_query($con, 'SELECT * FROM coolers_procesador');
    }
    $results = array();
    while ($row = mysqli_fetch_row($query)) {
        $id_cooler = $row[0];
        $modelo_cooler = $row[1];
        $marca_cooler = $row[2];
        $socket_compatible_cooler = $row[3];
        $altura_cooler = $row[4];
        $precio_cooler = $row[5];
        $ruta_imagen = $row[6];
        $link_fabricante = $row[7];
        $link_compra1 = $row[8];
        $link_compra2 = $row[9];
        $link_compra3 = $row[10];

        $results[] = array(
            "id_cooler" => $id_cooler, "modelo_cooler" => $modelo_cooler, "marca_cooler" => $marca_cooler,
            "socket_compatible_cooler" => $socket_compatible_cooler, "altura_cooler" => $altura_cooler,
            "precio_cooler" => $precio_cooler, "ruta_imagen" => $ruta_imagen, "link_fabricante" =>
            $link_fabricante, "link_compra1" => $link_compra1, "link_compra2" => $link_compra2,
            "link_compra3" => $link_compra3
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "discos") {
    if (isset($_COOKIE["m2Placa"]) && $_COOKIE["m2Placa"] == 1) {
        $query = mysqli_query($con, 'SELECT * FROM discos');
    } else {
        $query = mysqli_query($con, 'SELECT * FROM discos WHERE INTERFAZ != "M2"');
    }

    $results = array();
    while ($row = mysqli_fetch_row($query)) {
        $id_disco = $row[0];
        $modelo_disco = $row[1];
        $marca_disco = $row[2];
        $tipo_disco = $row[3];
        $tamano_disco = $row[4];
        $interfaz_disco = $row[5];
        $pulgadas_disco = $row[6];
        $precio_disco = $row[7];
        $ruta_imagen = $row[8];
        $link_fabricante = $row[9];
        $link_compra1 = $row[10];
        $link_compra2 = $row[11];
        $link_compra3 = $row[12];

        $results[] = array(
            "id_disco" => $id_disco, "modelo_disco" => $modelo_disco, "marca_disco" => $marca_disco, "tipo_disco" => $tipo_disco,
            "tamano_disco" => $tamano_disco, "interfaz_disco" => $interfaz_disco, "pulgadas_disco" => $pulgadas_disco,
            "precio_disco" => $precio_disco, "ruta_imagen" => $ruta_imagen, "link_fabricante" =>
            $link_fabricante, "link_compra1" => $link_compra1
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "presupuesto") {
    $query = "INSERT INTO presupuestos (ID_USUARIOS, TORRE_P, PLACA_P, PROCESADOR_P, VENTPROCESADOR_P, RAM_P, GRAFICA_P, FUENTEALIM_P, DISCO_P) VALUES ('" . $_COOKIE["id"] . "', '" . $_COOKIE["torreP"] . "', '" . $_COOKIE["placaP"] . "', '" . $_COOKIE["procesadorP"] . "', '" . $_COOKIE["ventProcesadorP"] . "', '" . $_COOKIE["ramP"] . "', '" . $_COOKIE["graficaP"] . "', '" . $_COOKIE["fuenteAlimP"] . "', '" . $_COOKIE["discoP"] . "')";
    mysqli_query($con, $query);
} else if ($_GET["q"] == "pedirPresupuesto") {
    $seleccionar_presupuestos = 'SELECT * FROM presupuestos WHERE ID_USUARIOS = "' . $_COOKIE["id"] . '"';
    $query = mysqli_query($con, $seleccionar_presupuestos);
    if (mysqli_num_rows($query) == 0) {
        $results[] = array(
            "estado" => 3
        );

        echo json_encode($results);
    } else {
        while ($row = mysqli_fetch_row($query)) {
            $id_presupuesto = $row[0];
            $id_usuario = $row[1];
            $torre_p = $row[2];
            $placa_p = $row[3];
            $procesador_p = $row[4];
            $ventprocesador_p = $row[5];
            $ram_p = $row[6];
            $grafica_p = $row[7];
            $fuentealim_p = $row[8];
            $disco_p = $row[9];

            $results[] = array(
                "id_presupuesto" => $id_presupuesto, "id_usuario" => $id_usuario, "torre_p" => $torre_p,
                "placa_p" => $placa_p, "procesador_p" => $procesador_p, "ventprocesador_p" => $ventprocesador_p,
                "ram_p" => $ram_p, "grafica_p" => $grafica_p, "fuentealim_p" => $fuentealim_p, "disco_p" => $disco_p
            );
        }
        echo json_encode($results);
    }
} else if (preg_match("/borrarPresupuesto_\d/", $_GET["q"])) {
    $id = intval(explode("_", $_GET["q"])[1]);
    $borrarPresupuesto = 'DELETE FROM presupuestos WHERE ID_PRESUPUESTOS = ' . $id . ';';

    if (mysqli_query($con, $borrarPresupuesto)) {
        echo json_encode("<p style='color:green;'>El presupuesto ha sido borrado correctamente</p>");
    } else {
        echo json_encode("<p style='color:red;'>El presupuesto no ha podido ser borrado</p>");
    }
}


/*  else if ($_GET["q"] == "piezas") {
    $results = array();

    $queryTorres = mysqli_query($con, 'SELECT * FROM torres');
    $queryPlacas = mysqli_query($con, 'SELECT * FROM placas_base');
    $queryProcesadores = mysqli_query($con, 'SELECT * FROM procesadores');
    $queryCoolers = mysqli_query($con, 'SELECT * FROM coolers_procesador');
    $queryRam = mysqli_query($con, 'SELECT * FROM ram');
    $queryGraficas = mysqli_query($con, 'SELECT * FROM tarjetas_graficas');
    $queryFuentes = mysqli_query($con, 'SELECT * FROM fuentes_alimentacion');
    $queryDiscos = mysqli_query($con, 'SELECT * FROM discos');

    while ($row = mysqli_fetch_row($queryTorres)) {
        $id_torre = $row[0];
        $modelo_torre = $row[1];
        $marca_torre = $row[2];
        $formato_torre = $row[3];
        $largo_torre = $row[4];
        $ancho_torre = $row[5];
        $alto_torre = $row[6];
        $precio_torre = $row[7];
        $ruta_imagen_torre = $row[8];
        $link_fabricante_torre = $row[9];
        $link_compra1_torre = $row[10];
        $link_compra2_torre = $row[11];
        $link_compra3_torre = $row[12];

        $results[] = array(
            "id_torre" => $id_torre, "modelo_torre" => $modelo_torre, "marca_torre" => $marca_torre,
            "formato_torre" => $formato_torre, "largo_torre" => $largo_torre, "ancho_torre" => $ancho_torre,
            "alto_torre" => $alto_torre, "precio_torre" => $precio_torre, "ruta_imagen_torre" => $ruta_imagen_torre,
            "link_fabricante_torre" => $link_fabricante_torre, "link_compra1_torre" => $link_compra1_torre,
            "link_compra2_torre" => $link_compra2_torre, "link_compra3_torre" => $link_compra3_torre
        );
    }

    while ($row = mysqli_fetch_row($queryPlacas)) {
        $id_placa = $row[0];
        $modelo_placa = $row[1];
        $marca_placa = $row[2];
        $formato_placa = $row[3];
        $socket_placa = $row[4];
        $m2_placa = $row[5];
        $tipo_ram_placa = $row[6];
        $ram_maxima_placa = $row[7];
        $velocidad_ram_maxima_placa = $row[8];
        $precio_placa = $row[9];
        $ruta_imagen_placa = $row[10];
        $link_fabricante_placa = $row[11];
        $link_compra1_placa = $row[12];
        $link_compra2_placa = $row[13];
        $link_compra3_placa = $row[14];

        $results[] = array(
            "id_placa" => $id_placa, "modelo_placa" => $modelo_placa, "marca_placa" => $marca_placa,
            "formato_placa" => $formato_placa, "socket_placa" => $socket_placa, "m2_placa" => $m2_placa, "tipo_ram_placa" => $tipo_ram_placa,
            "ram_maxima_placa" => $ram_maxima_placa, "velocidad_ram_maxima_placa" => $velocidad_ram_maxima_placa,
            "precio_placa" => $precio_placa, "ruta_imagen_placa" => $ruta_imagen_placa, "link_fabricante" => $link_fabricante_placa,
            "link_compra1_placa" => $link_compra1_placa, "link_compra2_placa" => $link_compra2_placa, "link_compra3_placa" => $link_compra3_placa
        );
    }

    while ($row = mysqli_fetch_row($queryProcesadores)) {
        $id_procesador = $row[0];
        $modelo_procesador = $row[1];
        $marca_procesador = $row[2];
        $socket_procesador = $row[3];
        $nucleos_procesador = $row[4];
        $ht_procesador = $row[5];
        $suministro_procesador = $row[6];
        $tipo_ram_procesador = $row[7];
        $velocidad_ram_procesador = $row[8];
        $precio_procesador = $row[9];
        $ruta_imagen_procesador = $row[10];
        $link_fabricante_procesador = $row[11];
        $link_compra1_procesador = $row[12];
        $link_compra2_procesador = $row[13];
        $link_compra3_procesador = $row[14];

        $results[] = array(
            "id_procesador" => $id_procesador,
            "modelo_procesador" => $modelo_procesador, "marca_procesador" => $marca_procesador,
            "socket_procesador" => $socket_procesador, "nucleos_procesador" => $nucleos_procesador,
            "ht_procesador" => $ht_procesador, "suministro_procesador" => $suministro_procesador,
            "tipo_ram_procesador" => $tipo_ram_procesador, "velocidad_ram_procesador" => $velocidad_ram_procesador,
            "precio_procesador" => $precio_procesador, "ruta_imagen_procesador" => $ruta_imagen_procesador,
            "link_fabricante_procesador" => $link_fabricante_procesador, "link_compra1_procesador" => $link_compra1_procesador,
            "link_compra2_procesador" => $link_compra2_procesador, "link_compra3_procesador" => $link_compra3_procesador
        );
    }

    while ($row = mysqli_fetch_row($queryCoolers)) {
        $id_cooler = $row[0];
        $modelo_cooler = $row[1];
        $marca_cooler = $row[2];
        $socket_compatible_cooler = $row[3];
        $altura_cooler = $row[4];
        $precio_cooler = $row[5];
        $ruta_imagen_cooler = $row[6];
        $link_fabricante_cooler = $row[7];
        $link_compra1_cooler = $row[8];
        $link_compra2_cooler = $row[9];
        $link_compra3_cooler = $row[10];

        $results[] = array(
            "id_cooler" => $id_cooler, "modelo_cooler" => $modelo_cooler, "marca_cooler" => $marca_cooler,
            "socket_compatible_cooler" => $socket_compatible_cooler, "altura_cooler" => $altura_cooler,
            "precio_cooler" => $precio_cooler, "ruta_imagen_cooler" => $ruta_imagen_cooler, "link_fabricante_cooler" => $link_fabricante_cooler,
            "link_compra1_cooler" => $link_compra1_cooler, "link_compra2_cooler" => $link_compra2_cooler, "link_compra3_cooler" => $link_compra3_cooler
        );
    }

    while ($row = mysqli_fetch_row($queryRam)) {
        $id_ram = $row[0];
        $modelo_ram = $row[1];
        $marca_ram = $row[2];
        $tipo_ram = $row[3];
        $tamano_ram = $row[4];
        $velocidad_ram = $row[5];
        $cl_ram = $row[6];
        $unidades_ram = $row[7];
        $precio_ram = $row[8];
        $ruta_imagen_ram = $row[9];
        $link_fabricante_ram = $row[10];
        $link_compra1_ram = $row[11];
        $link_compra2_ram = $row[12];
        $link_compra3_ram = $row[13];


        $results[] = array(
            "id_ram" => $id_ram, "modelo_ram" => $modelo_ram, "marca_ram" => $marca_ram,
            "tipo_ram" => $tipo_ram, "tamano_ram" => $tamano_ram, "velocidad_ram" => $velocidad_ram, "cl_ram" => $cl_ram, "unidades_ram" => $unidades_ram,
            "precio_ram" => $precio_ram, "ruta_imagen_ram" => $ruta_imagen_ram, "link_fabricante_ram" => $link_fabricante_ram,
            "link_compra1_ram" => $link_compra1_ram, "link_compra2_ram" => $link_compra2_ram, "link_compra3_ram" => $link_compra3_ram
        );
    }

    while ($row = mysqli_fetch_row($queryGraficas)) {
        $id_grafica = $row[0];
        $modelo_grafica = $row[1];
        $marca_grafica = $row[2];
        $vram_grafica = $row[3];
        $velocidad_reloj_grafica = $row[4];
        $suministro_grafica = $row[5];
        $profundidad_grafica = $row[6];
        $precio_grafica = $row[7];
        $ruta_imagen_grafica = $row[8];
        $link_fabricante_grafica = $row[9];
        $link_compra1_grafica = $row[10];
        $link_compra2_grafica = $row[11];
        $link_compra3_grafica = $row[12];

        $results[] = array(
            "id_grafica" => $id_grafica, "modelo_grafica" => $modelo_grafica, "marca_grafica" => $marca_grafica, "vram_grafica" => $vram_grafica,
            "velocidad_reloj_grafica" => $velocidad_reloj_grafica, "suministro_grafica" => $suministro_grafica,
            "profundidad_grafica" => $profundidad_grafica, "precio_grafica" => $precio_grafica,
            "ruta_imagen_grafica" => $ruta_imagen_grafica, "link_fabricante_grafica" => $link_fabricante_grafica,
            "link_compra1_grafica" => $link_compra1_grafica, "link_compra2_grafica" => $link_compra2_grafica, "link_compra3_grafica" => $link_compra3_grafica
        );
    }

    while ($row = mysqli_fetch_row($queryFuentes)) {
        $id_fuente = $row[0];
        $modelo_fuente = $row[1];
        $marca_fuente = $row[2];
        $potencia_fuente = $row[3];
        $certificado_fuente = $row[4];
        $formato_fuente = $row[5];
        $modular_fuente = $row[6];
        $precio_fuente = $row[7];
        $ruta_imagen_fuente = $row[8];
        $link_fabricante_fuente = $row[9];
        $link_compra1_fuente = $row[10];
        $link_compra2_fuente = $row[11];
        $link_compra3_fuente = $row[12];

        $results[] = array(
            "id_fuente" => $id_fuente, "modelo_fuente" => $modelo_fuente, "marca_fuente" => $marca_fuente,
            "potencia_fuente" => $potencia_fuente, "certificado_fuente" => $certificado_fuente, "formatio_fuente" => $formato_fuente,
            "modular_fuente" => $modular_fuente, "precio_fuente" => $precio_fuente, "ruta_imagen_fuente" => $ruta_imagen_fuente,
            "link_fabricante_fuente" => $link_fabricante_fuente, "link_compra1_fuente" => $link_compra1_fuente,
            "link_compra2_fuente" => $link_compra2_fuente, "link_compra3_fuente" => $link_compra3_fuente
        );
    }

    while ($row = mysqli_fetch_row($queryDiscos)) {
        $id_disco = $row[0];
        $modelo_disco = $row[1];
        $marca_disco = $row[2];
        $tipo_disco = $row[3];
        $tamano_disco = $row[4];
        $interfaz_disco = $row[5];
        $pulgadas_disco = $row[6];
        $precio_disco = $row[7];
        $ruta_imagen_disco = $row[8];
        $link_fabricante_disco = $row[9];
        $link_compra1_disco = $row[10];
        $link_compra2_disco = $row[11];
        $link_compra3_disco = $row[12];

        $results[] = array(
            "id_disco" => $id_disco, "modelo_disco" => $modelo_disco, "marca_disco" => $marca_disco, "tipo_disco" => $tipo_disco,
            "tamano_disco" => $tamano_disco, "interfaz_disco" => $interfaz_disco, "pulgadas_disco" => $pulgadas_disco,
            "precio_disco" => $precio_disco, "ruta_imagen_disco" => $ruta_imagen_disco, "link_fabricante_disco" => $link_fabricante_disco,
            "link_compra1_disco" => $link_compra1_disco, "link_compra2_disco" => $link_compra2_disco, "link_compra3_disco" => $link_compra3_disco
        );
    }

    echo json_encode($results);
} */

$con->close();
