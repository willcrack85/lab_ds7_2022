<?php require_once('class/votos.php'); ?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset='UTF-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Template con PHP en Laboratorio #48">
    <meta name="keywords" content="HTML5, CSS, Javascript" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="WillCrack Solution Corp.">
    <meta name="generator" content="WC 0.0.0">
    <title>Laboratorio 10.1</title>
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
                        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
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
                <h1 class="display-3">DS7 - Laboratorio 10.1</h1>
                <p class="lead">Objetivo: Desarrollar aplicaciones web en PHP con acceso a base de datos MySQL (MariaDB).</p>
                <hr class="my-4">
            </div>
        </div>
        <div class="container">
            <div class="row m-1">
                <div class='jumbotron-wc1 border border-white col-md-12'>
                    <div class="text-center shadow-lg p-3 mb-5 bg-light rounded">
                        <?php
                        // Creación del código PHP que consultará la Base de Datos.
                        if (array_key_exists('btnEnviar', $_POST)) {
                            print("<h1 class='text-white bg-dark'>ENCUESTA VOTO RESITRADO</h1>");
                            $obj_votos = new votos();
                            $result_votos = $obj_votos->listar_votos();
                            foreach ($result_votos as $value) {
                                $votos1 = $value['votos1'];
                                $votos2 = $value['votos2'];
                            }
                            $voto = $_REQUEST['voto'];
                            if ($voto == "si")
                                $votos1 = $votos1 + 1;
                            else if ($voto == "no")
                                $votos2 += 1;
                            $obj_votos = new votos();
                            $result =  $obj_votos->actualizar_votos($votos1, $votos2);
                            if ($result) {
                                print("<div class='form-group text-center p-2 mb-1'>");
                                print("<h5>Su voto ha sido registrado. Gracias por participar</h5>");
                                print("</div>");
                                print("<div class='form-group col-md-12'>");
                                print("<a class='btn btn-success col-md-4 col-md-offset-4' href='lab102.php' role='button'>Ver Resultados</a>");
                                print("</div>");
                            } else {
                                print("<div class='form-group col-md-12'>");
                                print("<a class='btn btn-success col-md-4 col-md-offset-4' href='lab101.php' role='button'>Error al actualizar su voto...!</a>");
                                print("</div>");
                            }
                        } else {
                        ?>
                            <h1 class="text-white bg-dark">ENCUESTA</h1>
                            <p class="lead text-left">¿Cree ud. que el precio de la vivienda seguir&aacute; subiendo al ritmo actual?</p>
                            <form name='frmFiltro' method='post' action='lab101.php'>
                                <div class="input-group p-3 mb-2 mx-auto" style="width: 200px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="voto" id="inlineRadio1" value="si" checked>
                                        <label class="form-check-label" for="inlineRadio1">S&iacute;</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="voto" id="inlineRadio2" value="no">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                    <button type="submit" name="btnEnviar" class="btn btn-primary mb-2">Votar</button>
                                </div>
                                <div class='form-group col-md-12'>
                                    <a class="btn btn-success col-md-4 col-md-offset-4" href="lab102.php" role="button">Ver Resultados</a>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
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