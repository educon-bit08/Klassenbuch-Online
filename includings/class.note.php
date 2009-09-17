<?php
// ruft auch tabellen unterrichtsstunde auf

class Note extends Db implements Dmlable {
	
	//Primärschlüssel
	private $note_id;
	private $typ;
	private $schueler_id;
	private $unterrichtsstunde_id;
	private $punkte;
	
	public function __construct() {
		try {
			parent::__construct ();
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	/*
	 *resturn int
	*/
	public function getId() {
		return $this->note_id;
	}
	
	public function setId($note_id) {
		$this->note_id = $note_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getPunkte() {
		return $this->punkte;
	}
	
	/**
	 * @param unknown_type $punkte
	 */
	public function setPunkte($punkte) {
		$this->punkte = $punkte;
	}
	
	/**
	 * @return unknown
	 */
	public function getSchueler_id() {
		return $this->schueler_id;
	}
	
	/**
	 * @param unknown_type $schueler_id
	 */
	public function setSchueler_id($schueler_id) {
		$this->schueler_id = $schueler_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getTyp() {
		return $this->typ;
	}
	
	/**
	 * @param unknown_type $typ
	 */
	public function setTyp($typ) {
		$this->typ = $typ;
	}
	
	/**
	 * @return unknown
	 */
	public function getUnterrichtsstunde_id() {
		return $this->unterrichtsstunde_id;
	}
	
	/**
	 * @param unknown_type $unterrichtsstunde_id
	 */
	public function setUnterrichtsstunde_id($unterrichtsstunde_id) {
		$this->unterrichtsstunde_id = $unterrichtsstunde_id;
	}
	
	/*
	 *Speicherung des Aktuellen Objektes
	 *falls kein Primärschlüssel existieren sollte
	 *wird ein neuer Datensatz erzeugt
	 *andernfalls ein Udate durchgeführt
	*/
	public function save() {
		if (isset ( $this->$note_id )) {
			$this->update ();
		} else {
			$this->insert ();
		}
	}
	
	public function insert() {
		$sql = "INSERT INTO note
					   (note_id, schueler_id, unterrichtsstunde_id, typ, punkte)
				VALUES (''," . $this->schueler_id . ", " . $this->unterrichtsstunde_id . ", '" . $this->type . "'," . $this->punkte . ");";
		
		try {
			$success_insert = mysql_query ( $sql );
			if (! success_insert) {
				throw new MysqlException ( );
			}
			
			$insert_id = mysql_insert_id ();
			$this->$note_id = $insert_id;
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	public function update() {
		$sql = "UPDATE note
				   SET typ='" . $this->typ . "',
				   	   schueler_id='" . $this->schueler_id . "',
					   unterrichtsstunde_id='" . $this->unterrichtsstunde_id . "',
					   punkte='" . $this->punkte . "' 				   
				 WHERE note_id=" . $this->note_id . ";";
		
		try {
			$success_delete = mysql_query ( $sql );
			if (! success_delete) {
				throw new MysqlException ( );
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	public function delete($id) {
		$sql = "DELETE FROM noten
				WHERE note_id=" . $id . ";";
		try {
			$success_delete = mysql_query ( $sql );
			if (! success_delete) {
				throw new MysqlException ( );
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	public function getAllAsArray($restriction = '') {
		$sql = "SELECT *
				FROM note
				WHERE 1=1";
		$sql .= $restriction . ";";
		
		try {
			$result = mysql_query ( $sql );
			
			if (! result) {
				throw new MysqlException ( );
			}
			
			$noten = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$noten [$row ['note_id']] ['note_id'] = $row ['note_id'];
				$noten [$row ['note_id']] ['schueler_id'] = $row ['schueler_id'];
				$noten [$row ['note_id']] ['typ'] = $row ['typ'];
				$noten [$row ['note_id']] ['punkte'] = $row ['punkte'];
				$noten [$row ['note_id']] ['unterrichtsstunde_id'] = $row ['unterrichtsstunde_id'];
			
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $noten;
	}
	
	/**
	 *
	 * @param <type> $restriction
	 *
	 * Hier wird die Variable Noten aufgef�llt :)
	 */
	
	public function getAllAsObject($restriction = '') {
		$sql = "SELECT *
				FROM note
				WHERE 1=1";
		$sql .= $restriction . ";";
		
		try {
			$result = mysql_query ( $sql );
			
			if (! $result) {
				throw new MysqlException ( );
			}
			
			$noten = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$n = new Note ( );
				$n->setId ( $row ['note_id'] );
				$n->setSchueler_id ( $row ['schueler_id'] );
				$n->setTyp ( $row ['typ'] );
				$n->setPunkte ( $row ['punkte'] );
				$n->setUnterrichtsstunde_id ( $row ['unterrichtsstunde_id'] );
				$noten [$n->getId ()] = $n;
			}
		} 

		catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $noten;
	}
	
	public function load($id) {
		
		$sql = "SELECT *
				FROM note
			  	WHERE note_id=" . $id . ";";
		
		try {
			$result = mysql_query ( $sql );
			$row = mysql_fetch_assoc ( $result );
			
			if (empty ( $row ['note_id'] )) {
				throw new MysqlException ( "Datensatz leer: " . $sql );
			}
			
			$this->note_id = $row ['note_id'];
			$this->punkte = $row ['punkte'];
			$this->typ = $row ['typ'];
			$this->schueler_id = $row ['schueler_id'];
			$this->unterrichtsstunde_id = $row ['unterrichtsstunde_id'];
		
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		} catch ( Exception $e ) {
			Html::showAll ( $e );
		}
	
	}
	
	/**
	 * depreciated
	 *
	 * @param unknown_type $fach_id
	 * @param unknown_type $schueler_id
	 */
	public function loadNoten($fach_id = 0, $schueler_id = 0) {
		
		$fach_noten = array ();
		foreach ( $notens as $noten ) {
			if ($noten ['fach_id'] == $fach_id) {
				$fach_noten [] = $noten;
			}
		}
	
	}
	
	/**
	 * gibt zu schueler_id ( und (fach_id)
	 * alle Notenobjekte zur�ck
	 *
	 * @param unknown_type $schueler_id
	 * @param unknown_type $fach_id
	 * @return unknown
	 */
	public function getNoten($schueler_id, $fach_id = 0) {
		
		if ($fach_id === 0) {
			$restriction = ' AND schueler_id = ' . $schueler_id . ' ';
			return $this->getAllAsObject ( $restriction );
		} else {
			
			
			return $this->getFachNoten($schueler_id, $fach_id);
			
		}
	
	}
	
	public function getFachNoten($schueler_id, $fach_id) {
		$sql = "SELECT n.note_id AS note_id, 
				n.schueler_id AS schueler_id, 
				n.typ AS typ, 
				n.punkte AS punkte,
				u.unterrichtsstunde_id AS unterrichtsstunde_id
				FROM note n, unterrichtsstunde u
				WHERE u.unterrichtsstunde_id=n.unterrichtsstunde_id
				AND n.schueler_id=" .$schueler_id." 
				AND u.fach_id=" .$fach_id.";";
		
		
		try {
			$result = mysql_query ( $sql );
			
			if (! $result) {
				throw new MysqlException ( );
			}
			
			$noten = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$n = new Note ( );
				$n->setId ( $row ['note_id'] );
				$n->setSchueler_id ( $row ['schueler_id'] );
				$n->setTyp ( $row ['typ'] );
				$n->setPunkte ( $row ['punkte'] );
				$n->setUnterrichtsstunde_id ( $row ['unterrichtsstunde_id'] );
				$noten [$n->getId ()] = $n;
			}
		} 

		catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $noten;
	}
	

}
?>