<?php

/**
 * Description of votos
 * Objetivo: Desarrollar aplicaciones web en PHP con acceso a base de datos 
 * MySQL (MariaDB).
 * @author WCcorp
 */
require_once('modelo.php');
class matematica extends modeloCredencialesBD
{

    public function __construct()
    {
        parent::__construct();
    }

    public function grabar_calculo($valor1, $valor2, $valor3)
    {
        $instruccion = "CALL sp_grabar_calculos('" . $valor1 . "','" . $valor2 . "','" . $valor3 . "')";
        $consulta = $this->_db->query($instruccion);
        if (!$consulta) {
            echo ("<script>alert('Error, no se ha podido grabar el cálculo.');</script>");
        } else {
            return $consulta;
            $consulta->close();
            $this->_db->close();
        }
    }

    public function listar_calculos()
    {
        $instruccion = "CALL sp_listar_calculos()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if (!$resultado) {
            echo ("<script>alert('Para el día de hoy no hay citas.');</script>");
        } else {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}
