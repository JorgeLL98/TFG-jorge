<?php
session_start();
if (isset($_POST["mail"])) {
    setcookie("mail", $_POST["mail"], time() + 600, "/");
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet/less" type="text/css" href="CSS/styles.less">
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1"></script>
    <script src='javascript/script.js'></script>
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
        <form method="POST" action="login.php">
            <label for="emailR">Email</label><br>
            <input type="email" name="emailL" id="email" value="<?php if (isset($_GET["mail"])) {
                                                                    echo $_GET["mail"];
                                                                } ?>" required>
            <br>
            <label for="passwdR">Contraseña</label><br>
            <input type="password" name="passwdL" id="passwd" required>
            <br>
            <input type="submit" value="Entrar" name="login">
        </form>
        <p id="info"></p>


    </section>

    <footer>
        <?php
        include 'masters/footer.html';
        ?>
    </footer>


</body>
<?php
//login y comprobacion
if (isset($_POST["login"])) {
    include 'conexion.php';
    if (isset($_GET["mail"])) {
        $email = $_GET["mail"];
    } else {
        $email = $_POST["emailL"];
    }
    $contra = sha1($_POST["passwdL"]);
    unset($_POST["passwdL"]);

    $seleccionar = 'SELECT * FROM obrex_users WHERE EMAIL="' . $email . '"';
    $row = mysqli_fetch_row(mysqli_query($con, $seleccionar));

    if ($email == $row[3] & $contra == $row[4]) {
        $_SESSION["iduser"] = $row[0];
        $_SESSION["user"] = $row[1];
        //redireccion a index
        header("Location: index.php");
        exit();
    } else {
        echo
        '<script type="text/javascript">document.getElementById("info").innerHTML = "Contraseña incorrecta"</script>';
    }
}

//Ejecuta cuando llega de login con mail en encabezado
if (isset($_GET["mail"])) {
    echo '<script type="text/javascript">document.getElementById("info").innerHTML = "Registrado con éxito"</script>';
}


?>

</html>