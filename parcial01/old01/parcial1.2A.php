<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Template con PHP en Parcial #1">
    <meta name="keywords" content="HTML5, CSS, Javascript"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="WillCrack Solution Corp.">
    <title>Parcial 1 (B)</title>
    <!-- Icono de la página WEB -->
    <link rel="shortcut icon" type="image/x-ico" href="dist/ico/wc.ico"/>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dist/css/sticky-footer.css" rel="stylesheet">
    <style media='screen'>.jumbotron{margin-top: 2em;}</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="jumbotron text-center col-md-12 col-md-auto">
                <h1 class="display-4">DS7 - Parcial 1 (B)</h1>
                <p class="lead">Crear una aplicación en PHP que realice una sucesión Fibonacci. La sucesión comienza con los números 0 y 1,2 y a partir de estos, «cada término es la suma de los dos anteriores», es la relación de recurrencia que la define.
                </p>
                <hr class="my-4">
                <h3>CALCULO DE UNA SUCESIÓN FIBONACCI</h3>
                <?php
                if(array_key_exists('btnCalcular',$_POST)){
                    if($_REQUEST['numbN']!=""){
                        //Código para el cálculo de la sucesión de fibonacci
                        $limite=$_POST['numbN'];
                        $valor1=0;
                        $valor2=1;
                        echo "<table border=10>";
                        echo "<tr>";
                        for($i=1;$i<=($limite-1);$i++){
                            print("<b><font size=6 color=blue>$x * </font></b>");
                        }
                        
                        
                        
                            
                        for($x=1;$x<=TAM;$x++){
                            echo "<tr>";
                            for($y=1;$y<=TAM;$y++){
                                echo ("1");
                            }
                            echo "</tr>";
                        }
                        //echo "</table>";
                        echo "</h5>";
                        echo "</div>";

                            $intFactorial = $_POST['vFactorial'];
                            $Cont = 0;
                            $Resultado = 1;
                            echo "<div class='form-group text-center col-md-12'>";
                            print "<br><br><h5><font size=6 color=#000000>$intFactorial! = </font>";
                            for($x=1;$x<=$intFactorial;$x++){
                                $Resultado*=$x;
                                if($x<$intFactorial){
                                    print("<b><font size=6 color=blue>$x * </font></b>");
                                }else{
                                    print("<b><font size=6 color=red>$x = $Resultado</font></b>");
                                }
                            }
                            echo "</h5>";
                            echo "</div>";
                    }else{
                        echo "<div class='form-group text-center col-md-12'>";
                        echo "<br><br><h5><font color=#000000>No agregó ningún Número para calcular...</font></h5>";
                        echo "</div>";
                    }
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