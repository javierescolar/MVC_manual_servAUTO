<?php
require_once('connect/connectMySQL.php');

Class Model {

	static function all($tabla, $modelo){
		$bd = ConnectMySQL::getInstance();
		$select = "SELECT * FROM $tabla order by id_ub";
	    $sth = $bd->prepare($select);
	    $sth->execute();
	    $resultados = $sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $modelo);
	    return $resultados;
	}

	static function getRegistroId($tabla, $modelo,$id){
		$bd = ConnectMySQL::getInstance();
		$select = "SELECT * FROM $tabla where id = :id";
	    $sth = $bd->prepare($select);
	    $sth->execute([":id" => $id]);
	    $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $modelo);
	    $resultado = $sth->fetch();
	    return $resultado;
	}

	static function removeRegistroId($tabla,$id){
		$bd = ConnectMySQL::getInstance();
		$select = "DELETE FROM $tabla where id = :id";
	    $sth = $bd->prepare($select);
	    $sth->execute([":id" => $id]);
	}

	static function importXml($query) {
		$bd = ConnectMySQL::getInstance();
	    $sth = $bd->prepare($query);
	    $sth->execute();
	}

}


?>