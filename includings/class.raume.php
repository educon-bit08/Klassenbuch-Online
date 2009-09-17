<?php

class raume extends Db implements Dmlable { 
	
	/*
	 * PrimŠrschlŸssel 
	 */
	private $raum_id;
	/*
	 * Name des Raumes
	 * string
	 * 45 Zeichen erlaubt
	 */
	private $vorname;
	
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
		return $this->raum_id;
	}
	public function setId($raum_id) {
		$this->raum_id = $raum_id;
	}
	/**
	 * @return string
	 */
	public function getVorname() {
		return $this->vorname;
	}
    /**
	 * @param tring $name
	 */
	public function setVorname($vorname) {
		$this->vorname = $vorname;
	}

	/*
	 * speichert das aktuelle Objekt
	 * falls kein PrimŠrschlŸssel existiert
	 * wird ein neuer Datensatz erzeugt
	 * anderfalls ein update durchgefŸhrt
	 */
	public function save() {
		
		if (isset($this->raum_id)) {
			$this->update();
		} else {
			$this->insert();
		}
		
	}
	
	public function insert() {
		
		$sql = "INSERT INTO schueler 
					   (raum_id, name) 
				VALUES ('' 
					   , '" .$this->vorname."');";

		try {
			$success_insert = mysql_query($sql);
			if (!$success_insert) {
				throw new MysqlException();
			}
				
			$insert_id = mysql_insert_id();
			$this->raum_id = $insert_id;	
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function update() {
		
		$sql = "UPDATE raum 
				   SET =vorname'" .$this->vorname. "' 
				 WHERE raum_id=" .$this->raum_id. ";";
		
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
		$sql = "DELETE FROM fach 
			     WHERE raum_id=" .$id. ";";
		
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
		$sql = "SELECT raum_id
					   ,vorname  
			      FROM raum 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$raum = array();
			while ($row = mysql_fetch_assoc($result)) {
				$raum[$row['raum_id']]['raum_id'] = $row['raum_id'];
				$raum[$row['raum_id']]["vorname"] = $row['vorname'];
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $vorname;
	}
	
	public function load($id) {
		
		$sql = "SELECT * 
				  FROM raum 
				 WHERE raum_id="  .$id. ";";
		
		try {
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['raum_id'])) {
				throw new Exception("Datensatz leer: ". $sql);
			}
			
			$this->raum_id = $row['raum_id'];
			$this->name = $row['vorname'];
			
		} catch (MysqlException $e) {
			Html::showAll($e);
		} catch (Exception $e) {
			Html::showAll($e);
		}

	}
	

}

?>