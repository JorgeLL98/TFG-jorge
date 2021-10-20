<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet/less" type="text/css" href="CSS/styles.less">
    <script src="https://cdn.jsdelivr.net/npm/less@4.1.1"></script>
    <script src='javascript/script.js'>

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





    <section class="home">
        <h1 class="ti-2">Configura tu PC ¡Tú decides como!</h1>
        <div class="asist">
            <h2>Comienza con nuestro asistente virtual <span>ObreX</span></p>
                <a href="#"><img src="images/parpadeo.gif"></a>

        </div>
        <div class="bas">
            <h2>Si ya tienes experiencia en hardware y montaje,
                puedes probar con nuestro configurador básico</p>
                <a href="#"><img src="images/montajeOrdenador.png"></a>
        </div>
    </section>

    <footer>
        <?php
        include 'masters/footer.html';
        ?>
    </footer>



</body>

</html>