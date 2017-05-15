<?php
require_once('models/model.php');

Class Tecnico extends Model{

	private $id;
	private $id_ub;
	private $id_tecnico;
	private $id_perfil;
	private $codigo;
	private $carga_max_largo;

	function __construct($id=null,$id_ub=null,$id_tecnico=null,$id_perfil=null,$codigo=null,$carga_max_largo=null) {

		$this->id = $id;
		$this->id_ub = $id_ub;
		$this->id_tecnico = $id_tecnico;
		$this->id_perfil = $id_perfil;
		$this->codigo = $codigo;
		$this->carga_max_largo = $carga_max_largo;
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
	function getIdTecnico(){
		return $this->id_tecnico;
	}
	function getCodigo(){
		return $this->codigo;
	}
	function getCargaMaxLargo(){
		return $this->carga_max_largo;
	}

	
	function setIdUb($value){
		$this->id_ub = $value;
	}
	function setIdPerfil($value){
		$this->id_perfil = $value;
	}
	function setIdTecnico($value){
		$this->id_tecnico = $value;
	}
	function setCodigo($value){
		$this->codigo = $value;
	}
	function setCargaMaxLargo($value){
		$this->carga_max_largo = $value;
	}


	function persiste() {
		$bd = ConnectMySQL::getInstance();
		if ($this->id) {
			$select = "UPDATE tabla_configuracion_tecnicos
					   SET id_ub = :id_ub, 
					   id_tecnico = :id_tecnico, 
					   id_perfil = :id_perfil,
					   codigo = :codigo,
					   carga_max_largo = :carga_max_largo
	          		   WHERE id = :id";
		    $sentencia = $bd->prepare($select);
		    $sentencia->execute([
		      ":id_ub" => $this->id_ub,
		      ":id_tecnico" => $this->id_tecnico,
		      ":id_perfil" => $this->id_perfil,
		      ":codigo" => $this->codigo,
		      ":carga_max_largo" => $this->carga_max_largo,
		      ":id" => $this->id
		    ]);
		} else {
			$select = "INSERT INTO tabla_configuracion_tecnicos (id_ub, id_tecnico, id_perfil,codigo,carga_max_largo)
	          		   VALUES (:id_ub,:id_tecnico, :id_perfil, :codigo, :carga_max_largo)";
		    $sentencia = $bd->prepare($select);
		    $sentencia->execute([
		      ":id_ub" => $this->id_ub,
		      ":id_tecnico" => $this->id_tecnico,
		      ":id_perfil" => $this->id_perfil,
		      ":codigo" => $this->codigo,
		      ":carga_max_largo" => $this->carga_max_largo
		    ]);
		}

	}

}

?>