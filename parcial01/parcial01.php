<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Template con PHP en Parcial #1">
    <meta name="keywords" content="HTML5, CSS, Javascript"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="WillCrack Solution Corp.">
    <title>Parcial 1</title>
    <!-- Icono de la página WEB -->
    <link rel="shortcut icon" type="image/x-ico" href="dist/ico/wc.ico"/>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dist/css/sticky-footer.css" rel="stylesheet">
    <style media='screen'>.jumbotron{margin-top: 2em;}</style>
</head>
<body>
    <form name="formParcial1" method="POST" action="parcial01.php">
        <div class="container">
            <div class="row">
                <div class="jumbotron text-center col-md-12 col-md-auto">
                    <h1 class="display-4">DS7 - Parcial 1</h1>
                        <p class="lead">Generar una matriz de tipo cruz chica en una tabla. La celda del centro (y su fila previa y posterior, columna previa y posterior) contendr&aacute;n valores aleatorios (entre 1 y 100) y los demás con 0. La matr&iacute; debe ser N por N donde N debe ser impar. 
                        </p>
                    <hr class="my-4">
                    <?php
                    if(array_key_exists('btnEnviar', $_POST)){
                        echo "<h3>APLICACION WEB EN PHP</h3>";
                        echo "<div class='form-group row'>";
                        if($_REQUEST['vPorcentaje']!=""){
                            if($_REQUEST['vPorcentaje']%2!=0){
                                $intVector=array();
                                $N=$_REQUEST['vPorcentaje'];
                                for($i=0;$i<($N*$N);$i++){
                                    $intVector[$i]=rand(1, 100);
                                }
                                echo "<table class='table table-dark'>";
                                $cont=0;
                                for($n1=1;$n1<=$N;$n1++){
                                    echo "<tr>";
                                    for($n2=1;$n2<=$N;$n2++){
                                        if(($n2==round($N/2) && $n1==round($N/2)-1)||($n2==round($N/2) && $n1==round($N/2)+1)){
                                            printf("<td><b><font size=4 color=blue>%d</font></b></td>",$intVector[$cont]);
                                        }
                                        elseif(($n1==round($N/2) && $n2==round($N/2)-1)||($n1==round($N/2) && $n2==round($N/2)+1)){
                                            printf("<td><b><font size=4 color=blue>%d</font></b></td>",$intVector[$cont]);
                                        }
                                        elseif($n2==round($N/2) && $n1==round($N/2)){
                                            printf("<td><b><font size=4 color=red>%d</font></b></td>",$intVector[$cont]);
                                        }
                                        else{
                                            $intVector[$cont]=0;
                                            printf("<td><b><font size=4 color=yellow>%d</font></b></td>",$intVector[$cont]);
                                        }
                                        $cont++;
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                                function CalculoSuma($intArreglo){
                                    $intValor=0;
                                    for($e=0;$e<count($intArreglo);$e++){
                                            $intValor+=$intArreglo[$e];
                                    }
                                    return $intValor;
                                }
                                echo "<div class='form-group row'>";
                                echo "<label for='txtValor' class='col-sm-12 col-form-label'>";
                                $resultado=CalculoSuma($intVector);
                                echo "Suma de todos los valores de la matr&iacutez. << $resultado >>";
                                echo "</label>";
                                echo "</div>";
                            }else{
                                echo "<label for='txtValor' class='col-sm-7 col-form-label'>Ingrese un valor N impar:</label>";
                                echo "<div class='col-sm-2'>";
                                echo "<input type='text' name='vPorcentaje' placeholder='N' class='form-control' id='txtValor'>";
                                echo "</div>";
                                echo "<button class='btn btn-primary col-md-3 col-md-offset-4' type='submit' name='btnEnviar'>Enviar</button>";
                                echo "<div class='form-group text-center col-md-12'>";
                                echo "<br><br><h5>En numero no es impar 1, 3, 5, etc...</h5>";
                                echo "</div>";
                            }
                        }else{
                            echo "<label for='txtValor' class='col-sm-7 col-form-label'>Ingrese un valor N impar:</label>";
                            echo "<div class='col-sm-2'>";
                            echo "<input type='text' name='vPorcentaje' placeholder='N' class='form-control' id='txtValor'>";
                            echo "</div>";
                            echo "<button class='btn btn-primary col-md-3 col-md-offset-4' type='submit' name='btnEnviar'>Enviar</button>";
                            echo "<div class='form-group text-center col-md-12'>";
                            echo "<br><br><h5>No agregó ningún valor en el campo...</h5>";
                            echo "</div>";
                        }
                        echo "</div>";
                    }else{
                    ?>
                    <h3>APLICACION WEB EN PHP</h3>
                    <div class="form-group row">
                        <label for="txtValor" class="col-sm-7 col-form-label">Ingrese un valor N:</label>
                        <div class="col-sm-2">
                            <input type="text" name="vPorcentaje" placeholder='N' class="form-control" id="txtValor">
                        </div>
                        <button class='btn btn-primary col-md-3 col-md-offset-4' type='submit' name='btnEnviar'>Enviar</button>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <footer class="footer text-center">
            <div class="container">
                <p>Dise&ntilde;ado por <a href="https://willcrackcorp.w3spaces.com/" title="WillCrack Solutions Corp., Panam&aacute;" target="_blank">WC Solutions Corp.</a>Copyright &copy; DS 7 2021 | William Miranda</p>
            </div>
        </footer>
    </form>
</body>
</html>