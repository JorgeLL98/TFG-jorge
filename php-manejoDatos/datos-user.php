<?php
if (isset($_POST["register"])) {
    include 'conexion.php';
    $nombre = $_POST["name"];
    $apellidos = $_POST["lastName"];
    $email = $_POST["email"];
    $contra = sha1($_POST["passwd"]);
    unset($_POST["passwd"]);

    $insertar = 'INSERT INTO obrex_users (NOMBRE, APELLIDOS, EMAIL, CONTRA) VALUES ("' . $nombre . '", "' . $apellidos . '", "' . $email . '", "' . $contra . '")';
    $seleccionar = 'SELECT EMAIL FROM obrex_users WHERE EMAIL="' . $email . '"';

    $row = mysqli_num_rows(mysqli_query($con, $seleccionar));
    if ($row == 0) {
        if (mysqli_query($con, $insertar)) {
            setcookie("email", $email, time() + (600 * 4), "/");
            header("Location: ../login.php");
            exit();
        } else {

            header("Location: ../registro.php?e=1");
            exit();
        }
    } else if ($row > 0) {

        header("Location: ../registro.php?e=2");
        exit();
    } else {

        header("Location: ../registro.php?e=3");
        exit();
    }
    $con->close();
}

if (isset($_POST["login"])) {
    include 'conexion.php';
    $email = $_POST["email"];
    $contra = sha1($_POST["passwd"]);
    unset($_POST["passwd"]);

    $seleccionar = 'SELECT * FROM obrex_users WHERE EMAIL="' . $email . '"';

    $row = mysqli_fetch_row(mysqli_query($con, $seleccionar));

    if ($row == null) {

        header("Location: ../login.php?e=1");
        exit();
    } else if ($email == $row[3] && $contra === $row[4]) {
        setcookie("id", $row[0], time() + (86400 * 30), "/");
        setcookie("nombre", $row[1], time() + (86400 * 30), "/");
        setcookie("apellidos", $row[2], time() + (86400 * 30), "/");
        if (!isset($_COOKIE["email"]) || $_COOKIE["email"] != $email) {
            setcookie("email", $row[3], time() + (86400 * 30), "/");
        }
        header("Location: ../index.php");
        exit();
    } else if ($email != $row[3] && $contra != $row[4]) {
        header("Location: ../login.php?e=2");
        exit();
    } else {
        header("Location: ../login.php?e=3");
        exit();
    }
    $con->close();
}

if (isset($_POST["perfil"])) {
    include 'conexion.php';

    $id = $_COOKIE["id"];

    if (empty($_POST["passwd_nuevo"])) {
        $passwd_nuevo = sha1($_POST["passwd"]);
        $passwd = sha1($_POST["passwd"]);
        unset($_POST["passwd"]);
    } else {
        $passwd_nuevo = sha1($_POST["passwd_nuevo"]);
        unset($_POST["passwd_nuevo"]);
        $passwd = sha1($_POST["passwd"]);
        unset($_POST["passwd"]);
    }


    $seleccionar = 'SELECT * FROM obrex_users WHERE ID_USERS ="' . $id . '"';

    $row = mysqli_fetch_row(mysqli_query($con, $seleccionar));

    if ($passwd === $row[4]) {

        if (empty($_POST["name_nuevo"])) {
            $name_nuevo = $_COOKIE["nombre"];
        } else {
            $name_nuevo = $_POST["name_nuevo"];
        }

        if (empty($_POST["lastName_nuevo"])) {
            $lastName_nuevo = $_COOKIE["apellidos"];
        } else {
            $lastName_nuevo = $_POST["lastName_nuevo"];
        }

        if (empty($_POST["email_nuevo"])) {
            $email_nuevo = str_replace("%40", "@", $_COOKIE["email"]);
        } else {
            $email_nuevo = $_POST["email_nuevo"];
        }



        $update = 'UPDATE obrex_users SET NOMBRE = "' . $name_nuevo . '", APELLIDOS = "' . $lastName_nuevo . '", EMAIL = "' . $email_nuevo . '", CONTRA = "' . $passwd_nuevo . '" WHERE ID_USERS = "' . $id . '";';
        $seleccionar = 'SELECT * FROM obrex_users WHERE ID_USERS ="' . $id . '"';

        $row = mysqli_fetch_row(mysqli_query($con, $seleccionar));


        if (mysqli_query($con, $update)) {
            setcookie("email", $email_nuevo, time() + (86400 * 30), "/");
            setcookie("nombre", $name_nuevo, time() + (86400 * 30), "/");
            setcookie("apellidos", $lastName_nuevo, time() + (86400 * 30), "/");

            header("Location: ../perfil.php?c=0");
            exit();
        } else {
            header("Location: ../perfil.php?e=1");
            exit();
        }
    } else {
        header("Location: ../perfil.php?e=2");
        exit();
    }
    $con->close();
}
