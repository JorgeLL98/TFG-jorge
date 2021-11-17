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

        $results[] = array(
            "id_torre" => $id_torre, "modelo_torre" => $modelo_torre, "marca_torre" => $marca_torre,
            "formato_torre" => $formato_torre, "largo_torre" => $largo_torre, "ancho_torre" => $ancho_torre,
            "alto_torre" => $alto_torre, "precio_torre" => $precio_torre, "ruta_imagen" => $ruta_imagen, "link_fabricante" => $link_fabricante
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "procesadores") {
    $query = mysqli_query($con, 'SELECT * FROM procesadores');
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

        $results[] = array(
            "id_procesador" => $id_procesador,
            "modelo_procesador" => $modelo_procesador, "marca_procesador" => $marca_procesador,
            "socket_procesador" => $socket_procesador, "nucleos_procesador" => $nucleos_procesador,
            "ht_procesador" => $ht_procesador, "suministro_procesador" => $suministro_procesador,
            "tipo_ram_procesador" => $tipo_ram_procesador, "velocidad_ram_procesador" => $velocidad_ram_procesador,
            "precio_procesador" => $precio_procesador, "ruta_imagen" => $ruta_imagen, "link_fabricante" => $link_fabricante
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "placas") {
    $query = mysqli_query($con, 'SELECT * FROM placas_base');
    $results = array();
    while ($row = mysqli_fetch_row($query)) {
        $id_placa = $row[0];
        $modelo_placa = $row[1];
        $marca_placa = $row[2];
        $formato_placa = $row[3];
        $socket_placa = $row[4];
        $tipo_ram_placa = $row[5];
        $ram_maxima_placa = $row[6];
        $velocidad_ram_maxima = $row[7];
        $precio_placa = $row[8];
        $ruta_imagen = $row[9];
        $link_fabricante = $row[10];

        $results[] = array(
            "id_placa" => $id_placa, "modelo_placa" => $modelo_placa, "marca_placa" => $marca_placa,
            "formato_placa" => $formato_placa, "socket_placa" => $socket_placa, "tipo_ram_placa" => $tipo_ram_placa,
            "ram_maxima_placa" => $ram_maxima_placa, "velocidad_ram_maxima" => $velocidad_ram_maxima,
            "precio_placa" => $precio_placa, "ruta_imagen" => $ruta_imagen, "link_fabricante" => $link_fabricante
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "ram") {
    $query = mysqli_query($con, 'SELECT * FROM ram');
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


        $results[] = array(
            "id_ram" => $id_ram, "modelo_ram" => $modelo_ram, "marca_ram" => $marca_ram,
            "tipo_ram" => $tipo_ram, "tamano_ram" => $tamano_ram, "velocidad_ram" => $velocidad_ram, "cl_ram" => $cl_ram, "unidades_ram" => $unidades_ram,
            "precio_ram" => $precio_ram, "ruta_imagen" => $ruta_imagen, "link_fabricante" => $link_fabricante
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "tarjetas_graficas") {
    $query = mysqli_query($con, 'SELECT * FROM tarjetas_graficas');
    $results = array();
    while ($row = mysqli_fetch_row($query)) {
        $id_grafica = $row[0];
        $modelo_grafica = $row[1];
        $marca_grafica = $row[2];
        $velocidad_reloj_grafica = $row[3];
        $suministro_grafica = $row[4];
        $profundidad_grafica = $row[5];
        $precio_grafica = $row[6];
        $ruta_imagen = $row[7];
        $link_fabricante = $row[8];

        $results[] = array(
            "id_grafica" => $id_grafica, "modelo_grafica" => $modelo_grafica, "marca_grafica" => $marca_grafica,
            "velocidad_reloj_grafica" => $velocidad_reloj_grafica, "suministro_grafica" => $suministro_grafica,
            "profundidad_grafica" => $profundidad_grafica, "precio_grafica" => $precio_grafica,
            "ruta_imagen" => $ruta_imagen, "link_fabricante" => $link_fabricante
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "fuentes_alimentacion") {
    $query = mysqli_query($con, 'SELECT * FROM fuentes_alimentacion');
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

        $results[] = array(
            "id_fuente" => $id_fuente, "modelo_fuente" => $modelo_fuente, "marca_fuente" => $marca_fuente,
            "potencia_fuente" => $potencia_fuente, "certificado_fuente" => $certificado_fuente, "formatio_fuente" => $formato_fuente,
            "modular_fuente" => $modular_fuente, "precio_fuente" => $precio_fuente, "ruta_imagen" => $ruta_imagen, "link_fabricante" => $link_fabricante
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "coolers_procesador") {
    $query = mysqli_query($con, 'SELECT * FROM coolers_procesador');
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

        $results[] = array(
            "id_cooler" => $id_cooler, "modelo_cooler" => $modelo_cooler, "marca_cooler" => $marca_cooler,
            "socket_compatible_cooler" => $socket_compatible_cooler, "altura_cooler" => $altura_cooler,
            "precio_cooler" => $precio_cooler, "ruta_imagen" => $ruta_imagen, "link_fabricante" => $link_fabricante
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "discos") {
    $query = mysqli_query($con, 'SELECT * FROM discos');
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

        $results[] = array(
            "id_disco" => $id_disco, "modelo_disco" => $modelo_disco, "marca_disco" => $marca_disco, "tipo_disco" => $tipo_disco,
            "tamano_disco" => $tamano_disco, "interfaz_disco" => $interfaz_disco, "pulgadas_disco" => $pulgadas_disco,
            "precio_disco" => $precio_disco, "ruta_imagen" => $ruta_imagen, "link_fabricante" => $link_fabricante
        );
    }
    echo json_encode($results);
}

$con->close();
