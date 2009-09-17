<?php

class UnterrichtsStunde extends Db implements Dmlable {
	
	//PrimÃ¤rschlÃ¼ssel
	private $unterrichtsstunde_id;
	private $datum;
	private $raum_id;
	private $lehrer_id;
	private $vertretung_id;
	private $klasse_id;
	private $fach_id;
	private $block_id;
	
	/**
	 * wenn Fachbereichsleiter Woche abzeichnet
	 * ist shortcut, sollte in separate Tabelle
	 *
	 * @var unknown_type
	 */
	private $fbl_id;
	
	/**
	 * welcher Lehrer den Eintrag getŠtigt hat
	 *
	 * @var unknown_type
	 */
	private $abgezeichnet_id;
	private $hausaufgabe;
	private $inhalt;
	
	// zu ladende Objekt (loadObjects())
	public $raum;
	public $lehrer;
	public $vertretung;
	public $klasse;
	public $fach;
	public $block;
	
	public function loadObjects() {
		$this->raum = new Raum ( );
		$this->raum->load ( $this->raum_id );
		$this->lehrer = new Lehrer ( );
		$this->lehrer->load ( $this->lehrer_id );
		if (isset ( $this->vertretung_id ) && $this->vertretung_id > 0) {
			
			$this->vertretung = new Lehrer ( );
			$this->vertretung->load ( $this->vertretung_id );
		}
		$this->klasse = new Klasse();
		$this->klasse->load($this->klasse_id);
		$this->fach = new Fach();
		$this->fach->load($this->fach_id);
		$this->block = new Block();
		$this->block->load($this->block_id);
	}
	
	/**
	 * @return unknown
	 */
	public function getBlock() {
		return $this->block;
	}
	
	/**
	 * @param unknown_type $block
	 */
	public function setBlock($block) {
		$this->block = $block;
	}
	
	/**
	 * @return unknown
	 */
	public function getFach() {
		return $this->fach;
	}
	
	/**
	 * @param unknown_type $fach
	 */
	public function setFach($fach) {
		$this->fach = $fach;
	}
	
	/**
	 * @return unknown
	 */
	public function getKlasse() {
		return $this->klasse;
	}
	
	/**
	 * @param unknown_type $klasse
	 */
	public function setKlasse($klasse) {
		$this->klasse = $klasse;
	}
	
	/**
	 * @return unknown
	 */
	public function getLehrer() {
		return $this->lehrer;
	}
	
	/**
	 * @param unknown_type $lehrer
	 */
	public function setLehrer($lehrer) {
		$this->lehrer = $lehrer;
	}
	
	/**
	 * @return unknown
	 */
	public function getRaum() {
		return $this->raum;
	}
	
	/**
	 * @param unknown_type $raum
	 */
	public function setRaum($raum) {
		$this->raum = $raum;
	}
	
	/**
	 * @return unknown
	 */
	public function getVretretung() {
		return $this->vretretung;
	}
	
	/**
	 * @param unknown_type $vretretung
	 */
	public function setVretretung($vretretung) {
		$this->vretretung = $vretretung;
	}
	
	public function __construct() {
		try {
			parent::__construct ();
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	/**
	 * @return unknown_type
	 */
	public function getAbgezeichnet_id() {
		return $this->abgezeichnet_id;
	}
	
	/**
	 * @param unknown_type $abgezeichnet_id
	 */
	public function setAbgezeichnet_id($abgezeichnet_id) {
		$this->abgezeichnet_id = $abgezeichnet_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getBlock_id() {
		return $this->block_id;
	}
	
	/**
	 * @param unknown_type $block_id
	 */
	public function setBlock_id($block_id) {
		$this->block_id = $block_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getDatum() {
		return $this->datum;
	}
	
	/**
	 * @param unknown_type $datum
	 */
	public function setDatum($datum) {
		$this->datum = $datum;
	}
	
	/**
	 * @return unknown
	 */
	public function getFach_id() {
		return $this->fach_id;
	}
	
	/**
	 * @param unknown_type $fach_id
	 */
	public function setFach_id($fach_id) {
		$this->fach_id = $fach_id;
	}
	
	/**
	 * @return unknown_type
	 */
	public function getFbl_id() {
		return $this->fbl_id;
	}
	
	/**
	 * @param unknown_type $fbl_id
	 */
	public function setFbl_id($fbl_id) {
		$this->fbl_id = $fbl_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getHausaufgabe() {
		return $this->hausaufgabe;
	}
	
	/**
	 * @param unknown_type $hausaufgabe
	 */
	public function setHausaufgabe($hausaufgabe) {
		$this->hausaufgabe = $hausaufgabe;
	}
	
	/**
	 * @return unknown
	 */
	public function getInhalt() {
		return $this->inhalt;
	}
	
	/**
	 * @param unknown_type $inhalt
	 */
	public function setInhalt($inhalt) {
		$this->inhalt = $inhalt;
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
	public function getRaum_id() {
		return $this->raum_id;
	}
	
	/**
	 * @param unknown_type $raum_id
	 */
	public function setRaum_id($raum_id) {
		$this->raum_id = $raum_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getId() {
		return $this->unterrichtsstunde_id;
	}
	
	/**
	 * @param unknown_type $unterrichtsstunde_id
	 */
	public function setId($unterrichtsstunde_id) {
		$this->unterrichtsstunde_id = $unterrichtsstunde_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getVertretung_id() {
		return $this->vertretung_id;
	}
	
	/**
	 * @param unknown_type $vertretung_id
	 */
	public function setVertretung_id($vertretung_id) {
		$this->vertretung_id = $vertretung_id;
	}
	
	public function getAllAsArray($restriction = '') {
		$sql = "SELECT * 
				FROM unterrichtsstunde
				WHERE 1=1";
		$sql .= $restriction . ";";
		
		try {
			$result = mysql_query ( $sql );
			
			if (! $result) {
				throw new MysqlException ( );
			}
			
			$unterrichtsstunde = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['unterrichtsstunde_id'] = $row ['unterrichtsstunde_id'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['datum'] = $row ['datum'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['raum_id'] = $row ['raum_id'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['lehrer_id'] = $row ['lehrer_id'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['vertretung_id'] = $row ['vertretung_id'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['klasse_id'] = $row ['klasse_id'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['fach_id'] = $row ['fach_id'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['block_id'] = $row ['block_id'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['fbl_id'] = $row ['fbl_id'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['abgezeichnet_id'] = $row ['abgezeichnet_id'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['hausaufgabe'] = $row ['hausaufgabe'];
				$unterrichtsstunde [$row ['unterrichtsstunde_id']] ['inhalt'] = $row ['inhalt'];
			
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $unterrichtsstunde;
	}
	
	public function getAllAsObject($restriction = '') {
		$sql = "SELECT * 
				FROM unterrichtsstunde
				WHERE 1=1";
		$sql .= $restriction . ";";
		
		try {
			$result = mysql_query ( $sql );
			
			if (! $result) {
				throw new MysqlException ( );
			}
			
			$unterrichtsstunde = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				
				$u = new UnterrichtsStunde ( );
				
				$u->setId ( $row ['unterrichtsstunde_id'] );
				$u->setDatum ( $row ['datum'] );
				$u->setRaum_id ( $row ['raum_id'] );
				$u->setLehrer_id ( $row ['lehrer_id'] );
				$u->setVertretung_id ( $row ['vertretung_id'] );
				$u->setKlasse_id ( $row ['klasse_id'] );
				$u->setFach_id ( $row ['fach_id'] );
				$u->setBlock_id ( $row ['block_id'] );
				$u->setFbl_id ( $row ['fbl_id'] );
				$u->setAbgezeichnet_id ( $row ['abgezeichnet_id'] );
				$u->setHausaufgabe ( $row ['hausaufgabe'] );
				$u->setInhalt ( $row ['inhalt'] );
				
				$unterrichtsstunde [$u->getId ()] = $u;
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $unterrichtsstunde;
	}
	
	public function load($id) {
		
		$sql = "SELECT *
				FROM unterrichtsstunde
			  	WHERE unterrichtsstunde_id=" . $id . ";";
		
		try {
			$result = mysql_query ( $sql );
			$row = mysql_fetch_assoc ( $result );
			
			if (empty ( $row ['unterrichtsstunde_id'] )) {
				throw new MysqlException ( "Datensatz leer: " . $sql );
			}
			
			$this->unterrichtsstunde_id = $row ['unterrichtsstunde_id'];
			$this->datum = $row ['datum'];
			$this->raum_id = $row ['raum_id'];
			$this->lehrer_id = $row ['lehrer_id'];
			$this->vertretung_id = $row ['vertretung_id'];
			$this->klasse_id = $row ['klasse_id'];
			$this->fach_id = $row ['fach_id'];
			$this->block_id = $row ['block_id'];
			$this->fbl_id = $row ['fbl_id'];
			$this->abgezeichnet_id = $row ['abgezeichnet_id'];
			$this->hausaufgabe = $row ['hausaufgabe'];
			$this->inhalt = $row ['inhalt'];
		
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		} catch ( Exception $e ) {
			Html::showAll ( $e );
		}
	
	}
	
	public function insert() {
		
		if (empty($this->vertretung_id)) {
			$this->vertretung_id = 'NULL';
		}
		if (!isset($this->fbl_id)) {
			$this->fbl_id = 'NULL';
		}if (!isset($this->abgezeichnet_id)) {
			$this->abgezeichnet_id = 'NULL';
		}if (!isset($this->vertretung_id)) {
			$this->vertretung_id = 'NULL';
		}
		
		$sql = "INSERT INTO unterrichtsstunde 
					   (unterrichtsstunde_id, datum, raum_id, lehrer_id, vertretung_id, klasse_id 
					   , fach_id, block_id, fbl_id, abgezeichnet_id, hausaufgabe, inhalt ) 
				VALUES ('' 
					   , '" . $this->datum . "' 
					   ," . $this->raum_id . " 
					   ," . $this->lehrer_id . " 
					   ," . $this->vertretung_id . " 
					   ," . $this->klasse_id . " 
					   ," . $this->fach_id . " 
					   ," . $this->block_id . " 
					   ," . $this->fbl_id . " 
					   ," . $this->abgezeichnet_id . " 
					   ,'" . $this->hausaufgabe . "' 
					   ,'" . $this->inhalt . "');";
		//echo $sql;
		try {
			$success_insert = mysql_query ( $sql );
			if (! $success_insert) {
				throw new MysqlException ( );
			}
			
			$insert_id = mysql_insert_id ();
			$this->klasse_id = $insert_id;
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	public function update() {
		
		$sql = "UPDATE unterrichtsstunde 
		
				   SET datum = '" . $this->datum . "' 
				       ,raum_id = " . $this->raum_id . "
				       ,lehrer_id = " . $this->lehrer_id . "
				       ,vertretung_id = " . $this->vertretung_id . "
				       ,klasse_id = " . $this->klasse_id . "
				       ,fach_id = " . $this->fach_id . "
				       ,block_id = " . $this->block_id . "
				       ,fbl_id = " . $this->fbl_id . "
				       ,abgezeichnet_id = " . $this->abgezeichnet_id . "
				       ,hausaufgabe = '" . $this->hausaufgabe . "' 
				       ,inhalt = '" . $this->inhalt . "' 
 
				 WHERE klasse_id =" . $this->klasse_id . ";";
		
		try {
			$success_update = mysql_query ( $sql );
			if (! $success_update) {
				throw new MysqlException ( );
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	
	}
	
	/*
	 * speichert das aktuelle Objekt
	 * falls noch kein DS mit
	 * demselben datum,
	 * derselbenblock_id und
	 * derselben klasse_id existiert
	 * wird ein neuer Datensatz erzeugt
	 * anderfalls ein update durchgefŸhrt
	 */
	public function save() {
		
		if (isset ( $this->unterrichtsstunde_id )) {
			$this->update ();
		} else {
			$this->insert ();
		}
	
	}
	public function delete($unterrichtsstunde_id) {
		$sql = "DELETE FROM unterrichtsstunde 
			     WHERE unterrichtsstunde_id=" . $id . ";";
		
		try {
			$success_delete = mysql_query ( $sql );
			if (! $success_delete) {
				throw new MysqlException ( );
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	
	/**
	 * erwratet ein Array mit Unterrichtsstunden - Objekt mit Eelementen,
	 * die alle gespeichert werden, sofern das Datum in der Zukunft liegt.
	 *
	 * @param unknown_type $wo
	 */
	public function saveWochenplan($wo) {
		;
	}
	

}

?>