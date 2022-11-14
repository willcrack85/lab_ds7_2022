<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Template con PHP en Parcial #1">
    <meta name="keywords" content="HTML5, CSS, Javascript"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="WillCrack Solution Corp.">
    <title>Parcial 1 (A)</title>
    <!-- Icono de la página WEB -->
    <link rel="shortcut icon" type="image/x-ico" href="dist/ico/wc.ico"/>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dist/css/sticky-footer.css" rel="stylesheet">
    <style media='screen'>.jumbotron{margin-top: 2em;}</style>
</head>
<body>
    <form name="formParcial1" method="POST" action="parcial1.1A.php">
        <div class="container">
            <div class="row">
                <div class="jumbotron text-center col-md-12 col-md-auto">
                    <h1 class="display-4">DS7 - Parcial 1 (A)</h1>
                        <p class="lead">Generar una matriz de tipo equis en una tabla. La diagonal principal e inversa tendrán valores con 1 y 
                            los demás con 0. La matriz debe ser N por N donde N debe ser impar. 
                        </p>
                    <hr class="my-4">
                    <?php
                    if(array_key_exists('btnEnviar', $_POST)){
                        echo "<h3>DIAGONAL PRINCIPAL E INVERSA</h3>";
                        echo "<div class='form-group row'>";
                        if($_REQUEST['vPorcentaje']!=""){
                            if($_REQUEST['vPorcentaje']%2!=0){
                                echo "<table class='table table-dark'>";
                                $a = 0;
                                for($x=1;$x<=$_REQUEST['vPorcentaje']; $x++){
                                    echo "<tr>";
                                    for($y=1;$y<=$_REQUEST['vPorcentaje'];$y++){
                                        if($y==$x){
                                            $n=1;
                                            echo"<td bgcolor = #ff8800>",$n,"</td>";
                                        }
                                        elseif($y==($_REQUEST['vPorcentaje']-$a)){
                                            $n=1;
                                            echo"<td bgcolor = #ff8800>",$n,"</td>";
                                        }
                                        else{
                                            $n = 0;
                                            echo "<td>", $n, "</td>";
                                        }
                                    }
                                    echo "</tr>";
                                    $a+=1;
                                }
                                echo "</table>";
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
                    <h3>DIAGONAL PRINCIPAL E INVERSA</h3>
                    <div class="form-group row">
                        <label for="txtValor" class="col-sm-7 col-form-label">Ingrese un valor N impar:</label>
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