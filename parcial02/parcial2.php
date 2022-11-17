<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Template con PHP en Laboratorio #23">
    <meta name="keywords" content="HTML5, CSS, Javascript" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="WillCrack Solution Corp.">
    <title>Parcial 2</title>
    <!-- Icono de la página WEB -->
    <link rel="shortcut icon" type="image/x-ico" href="dist/ico/wc.ico" />
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dist/css/cover.css" rel="stylesheet">
</head>

<body>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Desarrollo de Software VII - 2022</h3>
            </div>
        </header>
        <div class="row">
            <div class="cover-jumbotronWC text-center col-md-12 col-md-auto border border-white">
                <h1 class="display-4">DS7 - Parcial No. 2.0</h1>
                <p class="lead">Realizar una aplicaci&oacute;n web que calcule el factorial de un n&uacute;mero N. Leer el n&uacute;mero desde un formulario HTML y entregar la respuesta en una p&aacute;gina PHP.</p>
                <hr class="my-4">
            </div>
        </div>
        <?php
        if (array_key_exists('btnEnviar', $_POST)) {
            require_once('class/calculo.php');
            echo "<div class='row'>";
            echo "<div class='cover-jumbotronWC col-md-12 col-md-auto border border-white'>";
            echo "<h3>RESULTADO DEL FACTORIAL DE $_REQUEST[vFactorial]</h3>";
            echo "<div class='form-row'>";
            echo "<div class='col-7 mt-3 mb-2'>";
            echo "<label class='col-form-label'>Introdusca un N&uacute;mro (N!):</label>";
            echo "</div>";
            echo "<div class='col mt-3 mb-2'>";
            echo "<input type='text' name='vFactorial' class='form-control' placeholder='#######' readonly>";
            echo "</div><div class='col mt-3 mb-2'>";
            echo "<button class='form-control btn btn-primary' type='submit' name='btnEnviar' disabled>Procesar Datos</button>";
            echo "</div></div>";
            if ($_REQUEST['vFactorial'] != "") {
                $objCitas = new matematica();
                $valIngreso = $_POST['vFactorial'];
                $Cont = 0;
                $intInicio = 1;
                $calFactorial = 0;
                echo "<div class='form-group text-center col-md-12'>";
                print "<h5><font size=5 color=#000000>$valIngreso! = </font>";
                for ($x = 1; $x <= $valIngreso; $x++) {
                    $intInicio *= $x;
                    $calFactorial += sprintf("%01.2f", ($intInicio / ($intInicio + 1)));
                    if ($x < $valIngreso) {
                        echo ("<b><font size=5 color=#ffffff80>" . sprintf("%d!/[%d! + 1] + ", $x, $x) . "</font></b>");
                    } else {
                        echo ("<b><font size=5 color=#ffffff80>" . sprintf("%d!/[%d! + 1] = ", $x, $x) . "</font></b>");
                        echo ("<b><font size=5 color=red>" . sprintf("%01.2f", $calFactorial) . "</font></b>");
                    }
                    $respuesta = $objCitas->grabar_calculo($valIngreso, $intInicio, $calFactorial);
                }
                if ($respuesta) {
                    echo ("<script>alert('Se grabó la información.');</script>");
                }
                echo "</h5>";
                echo ("<div class='form-group col-md-12'>");
                echo ("<a class='btn btn-success col-md-4 col-md-offset-4' href='parcial2.html' role='button'>Ingresar valor de N!</a>");
                echo ("</div>");
                echo "</div>";
            } else {
                echo "<div class='form-group text-center col-md-12'>";
                echo "<br><br><h5><font color=#000000>No agregó ningún Número para calcular...</font></h5>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='cover-jumbotronWC col-md-12 col-md-auto border border-white'>";
            echo "<h3>HISTORIAL DE REGISTROS ALMACENADOS</h3>";

            $listaCALC = $objCitas->listar_calculos();
            echo ("<div class='shadow-lg p-3 mb-5 bg-light rounded'>");
            echo ("<div class='table-responsive'>");
            echo ("<table class='table table-striped table-dark'>");
            echo ("<thead>");
            echo ("<tr>");
            echo ("<th scope='col' class='p-3 mb-2 text-center'>WC</th>");
            echo ("<th scope='col' class='p-3 mb-2 text-center'>N</th>");
            echo ("<th scope='col' class='p-3 mb-2 text-center'>FACTORIAL n!</th>");
            echo ("<th scope='col' class='p-3 mb-2 text-center'>SUMATORIA</th>");
            echo ("</tr>");
            echo ("</thead>");
            echo ("<tbody>");
            $Cont = 1;
            foreach ($listaCALC as $value) {
                echo ("<tr>");
                echo ("<th scope='row' class='bg-info text-white' width='15'>$Cont</th>");
                print("<td class='text-center'>" .  $value['n'] . "</td>");
                print("<td class='text-center'>" .  $value['factorial'] . "</td>");
                print("<td class='text-center'>" .  $value['sumatoria'] . "</td>");
                $Cont++;
                print("</tr>");
            }
            print("</tbody>");
            print("</table>");
            echo ("</div>");
            echo ("</div>");
            echo "</div>";
            echo "</div>";
        } ?>
        <footer class="mastfoot mt-auto text-center">
            <div class="inner">
                <b>Dise&ntilde;ado por <a href="https://willcrackcorp.w3spaces.com/" title="WillCrack Solutions Corp., Panam&aacute;" target="_blank">WC Solutions Corp.</a> Copyright &copy; DS 7 - 2022 | William Miranda</b>
            </div>
        </footer>
    </div>
</body>

</html>