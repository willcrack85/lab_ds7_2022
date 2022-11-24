<?php

/**
 * Description de la clase config.php
 * Se asignarán los datos necesarios para conectarse a la base de datos.
 * @author WCcorp
 */

require_once('config.php');
class modeloCredencialesBD
{
    protected $_db;

    public function __construct()
    {
        try {
            $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Error al conectar a la base de datos: " . DB_NAME);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
?>