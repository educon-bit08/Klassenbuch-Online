<?php

class Klasse extends Db implements Dmlable {
	
	/*
	 * PrimŠrschlŸssel 
	 */
	private $klasse_id;
	private $aktiv;
	
	/*
	 * Name des Schulklasses
	 * string
	 * 45 Zeichen erlaubt
	 */
	private $name;
	
	public $schuelers;
	
	public function __construct() {
		try {
			parent::__construct();
		}
		catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	
	/**
	 * @return int
	 */
	public function getId() {
		return $this->klasse_id;
	}
	
	/**
	 * @param int $klasse_id
	 */
	public function setId($klasse_id) {
		$this->klasse_id = $klasse_id;
	}
	
	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * @param tring $name
	 */
	public function setName($name) {
		$this->name = $name;
	}
	/**
	 * Aktiv
	 */
    public function getAktiv() {
		return $this->aktiv;
	}
	public function setAktiv($aktiv) {
		$this->aktiv = $aktiv;
	}	
	/*
	 * speichert das aktuelle Objekt
	 * falls kein PrimŠrschlŸssel existiert
	 * wird ein neuer Datensatz erzeugt
	 * anderfalls ein update durchgefŸhrt
	 */
	public function save() {
		
		if (isset($this->klasse_id)) {
			$this->update();
		} else {
			$this->insert();
		}
		
	}
	
	public function insert() {
		
		$sql = "INSERT INTO klasse 
					   (klasse_id, name,aktiv) 
				VALUES ('' 
					   , '" .$this->name."','".$this->aktiv."');";

		try {
			$success_insert = mysql_query($sql);
			if (!$success_insert) {
				throw new MysqlException();
			}
				
			$insert_id = mysql_insert_id();
			$this->klasse_id = $insert_id;	
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function update() {
		
		$sql = "UPDATE klasse 
				   SET name='" .$this->name. "' 
				       ,aktiv='".$this->aktiv."' 
				 WHERE klasse_id=" .$this->klasse_id. ";";
		
		try {
			$success_update = mysql_query($sql);
			if (!$success_update) {
				throw new MysqlException();
			}
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
	}
	
	public function delete($id) {
		$sql = "DELETE FROM klasse 
			     WHERE klasse_id=" .$id. ";";
		
		try {
			$success_delete = mysql_query($sql);
			if (!$success_delete) {
				throw new MysqlException();
			}
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function getAllAsArray($restriction = '') {
		$sql = "SELECT *
			      FROM klasse 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$klasses = array();
			while ($row = mysql_fetch_assoc($result)) {
				$klasses[$row['klasse_id']]['klasse_id'] = $row['klasse_id'];
				$klasses[$row['klasse_id']]["name"] = $row['name'];
				$klasses[$row['klasse_id']]["aktiv"] = $row['aktiv'];
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $klasses;
	}
	
	public function getAllAsObject($restriction = '') {
		$sql = "SELECT *
			      FROM klasse 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$klasses = array();
			while ($row = mysql_fetch_assoc($result)) {
				$f = new klasse();
				$f->setId($row['klasse_id']);
				$f->setName($row['name']);
				$f->setAktiv($row['aktiv']);
				$klasses[$f->getId()] = $f;
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $klasses;
	}
	
	
	public function load($id) {
		
		$sql = "SELECT * 
				  FROM klasse 
				 WHERE klasse_id="  .$id. ";";
		
		try {
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['klasse_id'])) {
				throw new Exception("Datensatz leer: ". $sql);
			}
			
			$this->klasse_id = $row['klasse_id'];
			$this->name = $row['name'];
			$this->aktiv = $row['aktiv'];
			
		} catch (MysqlException $e) {
			Html::showAll($e);
		} catch (Exception $e) {
			Html::showAll($e);
		}

	}
	
	/**
	 * lŠdt in schuelers die SchŸler,
	 * die zu dieser /Schul-) klasse gehšren
	 *
	 */
	public function loadSchuelers() {
		$s = new Schueler();
		$this->schuelers = $s->getAllAsObject(' AND klasse_id = ' .$this->klasse_id. ' ');
	}
	
	

}

?>