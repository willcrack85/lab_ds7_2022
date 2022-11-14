<?php require_once('class/noticias.php'); ?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset='UTF-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Template con PHP en Laboratorio #46">
    <meta name="keywords" content="HTML5, CSS, Javascript" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="WillCrack Solution Corp.">
    <meta name="generator" content="WC 0.0.0">
    <title>Laboratorio 9.1</title>
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
                <h1 class="display-3">DS7 - Laboratorio 9.1</h1>
                <p class="lead">C&oacute;digo PHP para acceder a los datos de la base de datos labsdb.</p>
                <hr class="my-4">
            </div>
        </div>
        <div class="container-fluid">
            <div class="row m-1">
                <div class='jumbotron-wc1 border border-white col-md-12'>
                    <div class="shadow-lg p-3 mb-2 m-2 bg-white text-primary rounded">
                        <h2 class="mt-1">CONSULTA DE NOTICIAS</h2>
                    </div>
                    <div class="jumbotron-wc2 border border-white p-3 m-2">
                        <?php
                        $obj_noticia = new noticia();
                        $noticias = $obj_noticia->consultar_noticias();
                        $nfilas = count($noticias);
                        if ($nfilas > 0) {
                            $Cont = 1;
                            echo "<div class='table-responsive-lg'>";
                            print("<table class='table table-striped table-dark'>");
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th scope='col' class='bg-gradient-primary'>WC</th>";
                            echo "<th scope='col' class='bg-danger text-white'>TITULO</th>";
                            echo "<th scope='col' class='bg-danger text-white'>TEXTO</th>";
                            echo "<th scope='col' class='bg-danger text-white'>CATEGORIA</th>";
                            echo "<th scope='col' class='bg-danger text-white'>FECHA</th>";
                            echo "<th scope='col' class='bg-danger text-white'>IMAGEN</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            foreach ($noticias as $resultado) {
                                print("<tr>");
                                print "<th scope='row' class='bg-info text-white'>$Cont</th>";
                                print("<td>" . $resultado['titulo'] . "</td>");
                                print("<td>" . $resultado['texto'] . "</td>");
                                print("<td>" . $resultado['categoria'] . "</td>");
                                print("<td>" . date("j/n/Y", strtotime($resultado['fecha'])) . "</td>");
                                if ($resultado['imagen'] != "") {
                                    print("<td class='text-center'><a target='_blank' href='assets/img/" . $resultado['imagen'] . "'><img border='0' src='assets/img/info.gif'></a></td>");
                                } else {
                                    print("<td>&nbsp;</td>");
                                }
                                $Cont++;
                                print("</tr>");
                            }
                            echo "</tbody>";
                            print "</table>";
                            print "</div>";
                        } else {
                            print("No hay noticias disponibles");
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