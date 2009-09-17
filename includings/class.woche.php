<?php

class Woche extends db implements Dmlable {
	
	private $woche_id;
	private $klasse_id;
	private $lehrer_id;
	private $beginn;
	
	function __construct() {
	try {
			parent::__construct();
		}
		catch (MysqlException $e) {
			Html::showAll($e);
	    }
	
	}
	
	/**
	 * @return unknown
	 */
	public function getBeginn() {
		return $this->beginn;
	}
	
	/**
	 * @param unknown_type $beginn
	 */
	public function setBeginn($beginn) {
		$this->beginn = $beginn;
	}
	
	/**
	 * @return unknown
	 */
	public function getKlasse_id() {
		return $this->klasse_id;
	}
	
	/**
	 * @param unknown_type $klasse_id
	 */
	public function setKlasse_id($klasse_id) {
		$this->klasse_id = $klasse_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getLehrer_id() {
		return $this->lehrer_id;
	}
	
	/**
	 * @param unknown_type $lehrer_id
	 */
	public function setLehrer_id($lehrer_id) {
		$this->lehrer_id = $lehrer_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getId() {
		return $this->woche_id;
	}
	
	/**
	 * @param unknown_type $woche_id
	 */
	public function setId($woche_id) {
		$this->woche_id = $woche_id;
	}

		/*
	 * speichert das aktuelle Objekt
	 * falls kein PrimŠrschlŸssel existiert
	 * wird ein neuer Datensatz erzeugt
	 * anderfalls ein update durchgefŸhrt
	 */
	public function save() {
		
		if (isset($this->woche_id)) {
			$this->update();
		} else {
			$this->insert();
		}
		
	}
	
	public function insert() {
		
		$sql = "INSERT INTO woche 
					   (woche_id, klasse_id, lehrer_id, beginn) 
				VALUES ('' 
					   , " .$this->klasse_id.",".$this->lehrer_id.", '" .$this->beginn. "');";

		try {
			$success_insert = mysql_query($sql);
			if (!$success_insert) {
				throw new MysqlException();
			}
				
			$insert_id = mysql_insert_id();
			$this->fach_id = $insert_id;	
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function update() {
		
		$sql = "UPDATE woche 
				   SET klasse_id=" .$this->klasse_id. " 
				   	   , lehrer_id=".$this->lehrer_id."
				   	   , beginn='" .$this->beginn. "'  
				 WHERE woche_id=" .$this->woche_id. ";"; 
		
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
		$sql = "DELETE FROM woche 
			     WHERE woche_id=" .$id. ";";
		
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
			      FROM woche 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$wochen = array();
			while ($row = mysql_fetch_assoc($result)) {
				$wochen[$row['woche_id']]['woche_id'] = $row['woche_id'];
				$wochen[$row['woche_id']]['klasse_id'] = $row['klasse_id'];
				$wochen[$row['woche_id']]['lehrer_id'] = $row['lehrer_id'];
				$wochen[$row['woche_id']]['beginn'] = $row['beginn'];
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $wochen;
	}
	
	public function getAllAsObject($restriction = '') {
		$sql = "SELECT *
			      FROM woche 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$wochen = array();
			while ($row = mysql_fetch_assoc($result)) {
				$w = new Woche();
				$w->setId($row['woche_id']);
				$w->setKlasse_id($row['klasse_id']);
				$w->setLehrer_id($row['lehrer_id']);
				$w->setBeginn($row['beginn']);
				$wochen[$w->getId()] = $w;
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $wochen;
	}
	
	
	public function load($id) {
		
		$sql = "SELECT * 
				  FROM woche 
				 WHERE woche_id="  .$id. ";";
		
		try {
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['woche_id'])) {
				throw new Exception("Datensatz leer: ". $sql);
			}
			
			$this->woche_id = $row['woche_id'];
			$this->klasse_id = $row['klasse_id'];
			$this->lehrer_id = $row['lehrer_id'];
			$this->beginn = $row['beginn'];
			
		} catch (MysqlException $e) {
			Html::showAll($e);
		} catch (Exception $e) {
			Html::showAll($e);
		}

	}
	
	
}

?>