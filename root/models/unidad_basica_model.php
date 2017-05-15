<?php
require_once('models/model.php');

Class UnidadBasica extends Model {

	private $id;
	private $id_ub;
	private $nom_ub;
	private $id_exp_bolsa_tox;
	private $id_exp_bolsa_ti; 
	private $id_exp_bolsa_tm; 
	private $ejecutar_ub; 
	private $dia_ejecutar_largo; 
	private $codigo_dist;
	private $codigo_rev;
	private $ejecutar_tox;
	private $ejecutar_ti;
	private $ejecutar_tm;

	function __construct($id=null,$id_ub=null,$nom_ub=null,$id_exp_bolsa_tox=null,$id_exp_bolsa_ti=null,$id_exp_bolsa_tm=null,$ejecutar_ub=null,
						$dia_ejecutar_largo=null,$codigo_dist=null,$codigo_rev=null,$ejecutar_tox=null,$ejecutar_ti=null,$ejecutar_tm=null) {

		$this->id = $id;
		$this->id_ub = $id_ub;
		$this->nom_ub = $nom_ub;
		$this->id_exp_bolsa_tox = $id_exp_bolsa_tox;
		$this->id_exp_bolsa_ti = $id_exp_bolsa_ti;
		$this->id_exp_bolsa_tm = $id_exp_bolsa_tm;
		$this->ejecutar_ub = $ejecutar_ub;
		$this->dia_ejecutar_largo = $dia_ejecutar_largo; 
		$this->codigo_dist = $codigo_dist;
		$this->codigo_rev = $codigo_rev;
		$this->ejecutar_tox = $ejecutar_tox;
		$this->ejecutar_ti = $ejecutar_ti;
		$this->ejecutar_tm = $ejecutar_tm;
	}

	function getId(){
		return $this->id;
	}
	function getIdUb(){
		return $this->id_ub;
	}
	function getNomUb(){
		return $this->nom_ub;
	}
	function getIdExpBolsaTox(){
		return $this->id_exp_bolsa_tox;
	}
	function getIdExpBolsaTi(){
		return $this->id_exp_bolsa_ti;
	}
	function getIdExpBolsaTm(){
		return $this->id_exp_bolsa_tm;
	}
	function getEjecutarUb(){
		return $this->ejecutar_ub;
	}
	function getDiaEjecutarLargo(){
		return $this->dia_ejecutar_largo;
	}
	function getCodigoDist(){
		return $this->codigo_dist;
	}
	function getCodigoRev(){
		return $this->codigo_rev;
	}
	function getEjecutarTox(){
		return $this->ejecutar_tox;
	}
	function getEjecutarTi(){
		return $this->ejecutar_ti;
	}
	function getEjecutarTm(){
		return $this->ejecutar_tm;
	}



	function setIdUb($value){
		$this->id_ub = $value;
	}
	function setNomUb($value){
		$this->nom_ub = $value;
	}
	function setIdExpBolsaTox($value){
		$this->id_exp_bolsa_tox = $value;
	}
	function setIdExpBolsaTi($value){
		$this->id_exp_bolsa_ti = $value;
	}
	function setIdExpBolsaTm($value){
		$this->id_exp_bolsa_tm = $value;
	}
	function setEjecutarUb($value){
		$this->ejecutar_ub = $value;
	}
	function setDiaEjecutarLargo($value){
		$this->dia_ejecutar_largo = $value;
	}
	function setCodigoDist($value){
		$this->codigo_dist = $value;
	}
	function setCodigoRev($value){
		$this->codigo_rev = $value;
	}
	function setEjecutarTox($value){
		$this->ejecutar_tox = $value;
	}
	function setEjecutarTi($value){
		$this->ejecutar_ti = $value;
	}
	function setEjecutarTm($value){
		$this->ejecutar_tm = $value;
	}


	function persiste() {
		$bd = ConnectMySQL::getInstance();
		if ($this->id) {
			$select = "UPDATE tabla_configuracion_UB
					   SET id_ub = :id_ub, 
						   nom_ub = :nom_ub, 
						   id_exp_bolsa_tox = :id_exp_bolsa_tox,
						   id_exp_bolsa_ti = :id_exp_bolsa_ti,
						   id_exp_bolsa_tm = :id_exp_bolsa_tm,
						   ejecutar_ub = :ejecutar_ub,
						   dia_ejecutar_largo = :dia_ejecutar_largo,
						   codigo_dist = :codigo_dist,
						   codigo_rev = :codigo_rev,
						   ejecutar_tox = :ejecutar_tox,
						   ejecutar_ti = :ejecutar_ti,
						   ejecutar_tm = :ejecutar_tm
	          		   WHERE id = :id";
		    $sentencia = $bd->prepare($select);
		    $sentencia->execute([
		      ":id_ub" => $this->id_ub,
		      ":nom_ub" => $this->nom_ub,
		      ":id_exp_bolsa_tox" => $this->id_exp_bolsa_tox,
		      ":id_exp_bolsa_ti" => $this->id_exp_bolsa_ti,
		      ":id_exp_bolsa_tm" => $this->id_exp_bolsa_tm,
		      ":ejecutar_ub" => $this->ejecutar_ub,
		      ":dia_ejecutar_largo" => $this->dia_ejecutar_largo,
		      ":codigo_dist" => $this->codigo_dist,
		      ":codigo_rev" => $this->codigo_rev,
		      ":ejecutar_tox" => $this->ejecutar_tox,
		      ":ejecutar_ti" => $this->ejecutar_ti,
		      ":ejecutar_tm" => $this->ejecutar_tm,
		      ":id" => $this->id
		    ]);
		} else {
			$select = "INSERT INTO tabla_configuracion_UB (id_ub, nom_ub, id_exp_bolsa_tox,id_exp_bolsa_ti,id_exp_bolsa_tm,ejecutar_ub,dia_ejecutar_largo,codigo_dist,codigo_rev,ejecutar_tox,ejecutar_ti,ejecutar_tm)
	          		   VALUES (:id_ub, :nom_ub, :id_exp_bolsa_tox, :id_exp_bolsa_ti, :id_exp_bolsa_tm, :ejecutar_ub, :dia_ejecutar_largo,:codigo_dist,:codigo_rev,:ejecutar_tox,:ejecutar_ti,:ejecutar_tm)";
		    $sentencia = $bd->prepare($select);
		    $sentencia->execute([
		      ":id_ub" => $this->id_ub,
		      ":nom_ub" => $this->nom_ub,
		      ":id_exp_bolsa_tox" => $this->id_exp_bolsa_tox,
		      ":id_exp_bolsa_ti" => $this->id_exp_bolsa_ti,
		      ":id_exp_bolsa_tm" => $this->id_exp_bolsa_tm,
		      ":ejecutar_ub" => $this->ejecutar_ub,
		      ":dia_ejecutar_largo" => $this->dia_ejecutar_largo,
		      ":codigo_dist" => $this->codigo_dist,
		      ":codigo_rev" => $this->codigo_rev,
		      ":ejecutar_tox" => $this->ejecutar_tox,
		      ":ejecutar_ti" => $this->ejecutar_ti,
		      ":ejecutar_tm" => $this->ejecutar_tm
		    ]);
		}

	}
	
}

