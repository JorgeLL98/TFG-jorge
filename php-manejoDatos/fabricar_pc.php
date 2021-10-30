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
        $precio_placa = $row[5];
        $ruta_imagen = $row[6];
        $link_fabricante = $row[7];

        $results[] = array(
            "id_placa" => $id_placa, "modelo_placa" => $modelo_placa,
            "marca_placa" => $marca_placa, "formato_placa" => $formato_placa, "socket_placa" => $socket_placa,
            "precio_placa" => $precio_placa, "ruta_imagen" => $ruta_imagen, "link_fabricante" => $link_fabricante
        );
    }
    echo json_encode($results);
} else if ($_GET["q"] == "ram") {
    
}

$con->close();
