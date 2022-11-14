<?php

/**
 * Description de la clase config.php
 * Se asignarán los datos necesarios para conectarse a la base de datos.
 * @author WCcorp
 */

require_once('modelo.php');
class noticia extends modeloCredencialesBD
{
    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function __construct()
    {
        //// Llamando al constructor de la 
        //// clase Padre modeloCredencialesDB.
        parent::__construct();  
    }

    public function consultar_noticias()
    {
        $instruccion = "CALL sp_listar_noticias()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if (!$resultado) {
            echo "fallo al consultar las noticas";
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

    ////  Nuevo metodo agregado y consumido por lab92.php
    public function consultar_noticias_filtro($campo, $valor)
    {
        $instruccion = "CALL sp_listar_noticias_filtro('" . $campo . "','" . $valor . "')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if ($resultado) {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}
?>