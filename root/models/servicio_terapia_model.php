<?php
require_once('models/model.php');

Class ServicioTerapia extends Model{

	private $id;
	private $id_ub;
	private $id_perfil;
	private $id_tipo_servicio;
	private $id_terapia;
	private $posicion_ruta;



	function __construct($id=null,$id_ub=null,$id_perfil=null,$id_tipo_servicio=null,$id_terapia=null,$posicion_ruta=null) {

		$this->id = $id;
		$this->id_ub = $id_ub;
		$this->id_perfil = $id_perfil;
		$this->id_tipo_servicio = $id_tipo_servicio;
		$this->id_terapia = $id_terapia;
		$this->posicion_ruta = $posicion_ruta;
	}

	function getId(){
		return $this->id;
	}
	function getIdUb(){
		return $this->id_ub;
	}
	function getIdPerfil(){
		return $this->id_perfil;
	}
	function getIdTipoServicio(){
		return $this->id_tipo_servicio;
	}
	function getIdTerapia(){
		return $this->id_terapia;
	}
	function getPosicionRuta(){
		return $this->posicion_ruta;
	}


	function setIdUb($value){
		$this->id_ub = $value;
	}
	function setIdPerfil($value){
		$this->id_perfil = $value;
	}
	function SetIdTipoServicio($value){
		$this->id_tipo_servicio = $value;
	}
	function SetIdTerapia($value){
		$this->id_terapia = $value;
	}
	function SetPosicionRuta($value){
		$this->posicion_ruta = $value;
	}

	function persiste() {
		$bd = ConnectMySQL::getInstance();
		if ($this->id) {
			$select = "UPDATE tabla_configuracion_perfil
					   SET id_ub = :id_ub, 
					   id_perfil = :id_perfil, 
					   id_tipo_servicio = :id_tipo_servicio,
					   id_terapia = :id_terapia,
					   posicion_ruta = :posicion_ruta
	          		   WHERE id = :id";
		    $sentencia = $bd->prepare($select);
		    $sentencia->execute([
		      ":id_ub" => $this->id_ub,
		      ":id_perfil" => $this->id_perfil,
		      ":id_tipo_servicio" => $this->id_tipo_servicio,
		      ":id_terapia" => $this->id_terapia,
		      ":posicion_ruta" => $this->posicion_ruta,
		      ":id" => $this->id
		    ]);
		} else {
			$select = "INSERT INTO tabla_configuracion_perfil (id_ub, id_perfil, id_tipo_servicio,id_terapia,posicion_ruta)
	          		   VALUES (:id_ub,:id_perfil, :id_tipo_servicio, :id_terapia, :posicion_ruta)";
		    $sentencia = $bd->prepare($select);
		    $sentencia->execute([
		      ":id_ub" => $this->id_ub,
		      ":id_perfil" => $this->id_perfil,
		      ":id_tipo_servicio" => $this->id_tipo_servicio,
		      ":id_terapia" => $this->id_terapia,
		      ":posicion_ruta" => $this->posicion_ruta
		    ]);
		}

	}
}

?>