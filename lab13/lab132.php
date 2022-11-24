<?php
if (array_key_exists('btnEnviar', $_POST)) {
    $expire = time() + 60 * 5;
    setcookie("user", $_REQUEST['visitante'], $expire);
    header("Refresh: 0");
}
?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset='UTF-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Template con PHP en Laboratorio #55">
    <meta name="keywords" content="HTML5, CSS, Javascript" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="WillCrack Solution Corp.">
    <meta name="generator" content="WC 0.0.0">
    <title>Laboratorio 13.2</title>
    <!-- Icono de la página WEB -->
    <link rel="shortcut icon" type="image/x-ico" href="assets/ico/favicon.ico" />
    <!-- ESTILO Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- ESTILO Custom PARA LA PAGINA WEB -->
    <link rel="stylesheet" type="text/css" href="assets/css/wcStyle2022.css">
    <!-- ESTILO PARA ALERTAS CON SWEET ALERT 2 -->
    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark mx-bg-top-linear">
            <a class="navbar-brand text-uppercase" rel="nofollow" target="_blank" href="#">
                <img src="assets/ico/favicon.ico" width="32" height="32" class="d-inline-block align-top" alt="Logo">
                Dev Software VII - 2022
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">|&nbsp;INICIO&nbsp;|<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Hacer una busqueda" aria-label="Search" id="wc-center">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </header>
    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">DS7 - Laboratorio 13.2</h1>
                <p class="lead">Objetivo: Desarrollar aplicaciones web en PHP con manejo de cookies.</p>
                <p class="lead">Nota: Copiar la carpeta css utilizada en los labs 9, 10, 11 y 12 en la carpeta correspondiente al lab13.</p>
                <hr class="my-4">
            </div>
        </div>
        <div class="container-sm">
            <div class="row m-1">
                <div class='jumbotron-wc1 border border-white col-md-12'>
                    <div class="shadow-lg p-3 mb-2 m-2 bg-white text-primary rounded">
                        <h1 class='text-white bg-dark text-center'>CREACI&Oacute;N DE COOKIES</h1>
                    </div>
                    <div class="jumbotron-wc2 border border-white p-3 m-2">
                        <div class="shadow-lg p-3 mb-2 mx-5 bg-white text-primary rounded">
                            <h2 class="text-center">La coockie "User" tendr&aacute; solo 5 minutos de duraci&oacute;n</h2>
                            <?php
                            if (isset($_COOKIE["user"])) {
                                print("<p class='text-center'>Hola <b>" . $_COOKIE["user"] . "</b> gracias por visitar nuestro sitio WEB.</p>");
                            } else {
                            ?>
                                <form name='formCookie' method='post' action='lab132.php'>
                                    <!-- class="form-inline"  -->
                                    <h3 class="text-center">Hola, primera vez que te vemos por nuestro sitio web ¿Como te llamas?</h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                <div class="input-group mb-3">
                                                    <label class="sr-only" for="valor">Username</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">@</div>
                                                    </div>
                                                    <input autofocus type="text" class="form-control text-center" placeholder="Username" aria-describedby="txtvisitante" name="visitante" id="wc-center">
                                                    <div class="input-group-append" id="txtvisitante">
                                                        <button class="btn btn-outline-primary" type="submit" name="btnEnviar">Gracias por identificarse</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class='col-md-12 text-center'>
                                <a class='btn btn-success col-md-4 col-md-offset-4' href='lab133.php' role='button'>Continuar...</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <blockquote class="blockquote text-center">
                        <footer class="display-4 blockquote-footer text-white">Edicion Limitada</footer>
                    </blockquote>
                </div>
            </div>
        </div> <!-- /container -->
    </main>
    <footer class="wcfooter mt-auto py-3">
        <div class="container text-center">
            <span class="text-muted">
                <b>Dise&ntilde;ado por <a href="https://willcrackcorp.w3spaces.com/" title="WillCrack Solutions Corp., Panam&aacute;" target="_blank">WC Solutions Corp.</a> Copyright &copy; DS 7 - 2022 | William Miranda</b>
            </span>
        </div>
    </footer>
</body>
<!-- CARGAR ENLACES A JAVASCRIPT -->
<script src="assets/js/sweetalert2.all.min.js"></script>
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
    const wcMixin = Swal.mixin({
        toast: true,
        icon: 'success',
        title: 'General Title',
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('load', (event) => {
        wcMixin.fire({
            animation: true,
            title: 'Conexi&oacute;n Iniciada...',
        });
    });
    //=====================================================================//
    window.jQuery || document.write('<script src="assets/js/jquery-3.5.1.min.js"><\/script>')
</script>

</html>