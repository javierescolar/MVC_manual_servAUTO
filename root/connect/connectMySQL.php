<?php

class ConnectMySQL {
    private $basedatos = 'servicios_auto';
    private $usuario = 'root';
    private $contrasenya = 'usbw';
    private $equipo = '127.0.0.1:3307';

    protected static $bd = null;
    private function __construct() {
        try {
            self::$bd = new PDO("mysql:host=".$this->equipo.";dbname=".$this->basedatos, $this->usuario, $this->contrasenya);
            self::$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            switch ($e->getCode()){
                case 2002:
                    $error = "Error de conexión a la BD";
                    break;
                default :
                    $error = "Error desconocido";
            }
            throw new Exception($error);
        }
    }
    public static function getInstance() {
        if (!self::$bd) {
            new ConnectMySQL();
        }
        return self::$bd;
    }
}

?>
