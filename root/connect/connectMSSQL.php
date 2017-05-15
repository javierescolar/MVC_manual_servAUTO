<?php

class ConnectMSSQL {
    private $basedatos = 'TR_ES_PRD';
    private $usuario = '';
    private $contrasenya = '';
    private $equipo = 'MLGMUC00LSQL004';

    protected static $bd = null;
    private function __construct() {
        try {
            self::$bd = new PDO("sqlsrv:Server=".$this->equipo.";Database=".$this->basedatos, $this->usuario, $this->contrasenya);
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
            new ConnectMSSQL();
        }
        return self::$bd;
    }
}


//INICIALIZAMOS LA authentication de la sesion
    /*$server = "MLGMUC00LSQL004";
    $connectinfo = array("Database"=> "TR_ES_PRD");
    $conn = sqlsrv_connect($server,$connectinfo);
    if($conn){
      echo "connectado";die;
    } else {
      echo "error conexcion";die;
    }*/
?>
