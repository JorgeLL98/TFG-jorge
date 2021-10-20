<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet/less" type="text/css" href="CSS/styles.less">
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1"></script>
    <script src="javascript/script.js">
        document.getElementById("submit").addEventListener("click", function(event) {
            event.preventDefault();
        })
    </script>
    <link rel="shortcut icon" type="image/png" href="images/faviconObrex.ico">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@300;500;700&display=swap');
    </style>
    <title>Obrex Pc Builder</title>
</head>

<body>
    <nav>
        <?php
        include 'masters/nav.html';
        ?>
    </nav>

    <section>
        <form method="POST" action="register.php">
            <label for="nameR">Nombre</label><br>
            <input type="text" name="nameR" id="name" required>
            <br>
            <label for="lastNameR">Apellidos</label><br>
            <input type="text" name="lastNameR" id="lastName" required>
            <br>
            <label for="emailR">Email</label><br>
            <input type="email" name="emailR" id="email" required>
            <br>
            <label for="passwdR">Contraseña</label><br>
            <input type="password" name="passwdR" id="passwd" required>
            <br>
            <input type="submit" value="Registrarse" name="register" id="submit">
        </form>
        <p id="info"></p>


    </section>

    <footer>
        <?php
        include 'masters/footer.html';
        ?>
    </footer>


</body>

</script>

<?php
include 'conexion.php';
if (isset($_POST["register"])) {
    $nombre = $_POST["nameR"];
    $apellidos = $_POST["lastNameR"];
    $email = $_POST["emailR"];
    $contra = sha1($_POST["passwdR"]);
    unset($_POST["passwdR"]);

    $insertar = 'INSERT INTO obrex_users (NOMBRE, APELLIDOS, EMAIL, CONTRA) VALUES ("' . $nombre . '", "' . $apellidos . '", "' . $email . '", "' . $contra . '")';
    $seleccionar = 'SELECT EMAIL FROM obrex_users WHERE EMAIL="' . $email . '"';

    $row = mysqli_num_rows(mysqli_query($con, $seleccionar));
    if ($row == 0) {
        if (mysqli_query($con, $insertar)) {
            //FALLA, MIRAR MAS ADELANTE
            /*echo '<script type="text/javascript">document.getElementById("info").innerHTML = "Registrado con éxito"
                        document.getElementById("temp").innerHTML = "Redireccionando a login en 3 segundos"</script>';*/


            header("Location: login.php?mail=" . $email . "");
            exit();
        } else {
            echo '<script type="text/javascript">document.getElementById("info").innerHTML = "El registro no se ha podido completar. Inténtelo mas tarde"</script>';
        }
    } else if ($row > 0) {
        echo '<script type="text/javascript">document.getElementById("info").innerHTML = "Ya existe una cuenta con este correo"</script>';
    } else {
        echo '<script type="text/javascript">document.getElementById("info").innerHTML = "Error desconocido. Inténtelo mas tarde"</script>';
    }
}

$con->close();

/*if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}*/
?>

</html>