<?php

class Schueler extends Db implements Dmlable { 
	
	/*
	 * PrimŠrschlŸssel 
	 */
	private $schueler_id;
	
	private $user_id;
	/*
	 * Name des Schulfachs
	 * string
	 * 45 Zeichen erlaubt
	 */
	private $vorname;
	private $nachname;
	private $klasse_id;
	private $aktiv;
	private $beschreibung;

    public $notens;
    public $anwesenheits;
	
	/*
	 * Name des Schulfachs
	 * string
	 * 45 Zeichen erlaubt
	 */
	public function __construct() {
		try {
			parent::__construct();
		}
		catch (MysqlException $e) {
			Html::showAll($e);
	    }
            //Noten alles Schueler werden übergeben
            //$notens = Note::getAllAsObject();
	}
	/**
	 * @return int
	 */
	public function getId() {
		return $this->schueler_id;
	}
	public function setId($schueler_id) {
		$this->schueler_id = $schueler_id;
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
	
	public function getNachname() {
		return $this->nachname;
	}

	public function setNachname($nachname) {
		$this->nachname = $nachname;
	}
	
	public function getPasswd() {
		return $this->passwd;
	}

	public function setPasswd($passwd) {
		$this->passwd = $passwd;
	}
	
	/**
	 * @return unknown
	 */
	public function getAktiv() {
		return $this->aktiv;
	}
	
	/**
	 * @param unknown_type $aktiv
	 */
	public function setAktiv($aktiv) {
		$this->aktiv = $aktiv;
	}
	
	/**
	 * @return unknown
	 */
	public function getBeschreibung() {
		return $this->beschreibung;
	}
	
	/**
	 * @param unknown_type $beschreibung
	 */
	public function setBeschreibung($beschreibung) {
		$this->beschreibung = $beschreibung;
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
	public function getUser_id () { return $this->user_id; }

/**
	 * @param unknown_type $user_id
	 */
	public function setUser_id ($user_id) { $this->user_id = $user_id; }


	/*
	 * speichert das aktuelle Objekt
	 * falls kein PrimŠrschlŸssel existiert
	 * wird ein neuer Datensatz erzeugt
	 * anderfalls ein update durchgefŸhrt
	 */
	public function save() {
		
		if (isset($this->schueler_id)) {
			$this->update();
		} else {
			$this->insert();
		}
		
	}
	
	public function insert() {
		
		$sql = "INSERT INTO schueler 
					   (schueler_id, user_id, vorname, nachname, klasse_id, aktiv, beschreibung ) 
				VALUES ('' 
					   , " .$this->user_id. "
					   , '" .$this->vorname. "' 
					   , '" .$this->nachname."'
					   , " .$this->klasse_id. "
					   , '" .$this->aktiv. "' 
					   , '" .$this->beschreibung. "');";


		try {
			$success_insert = mysql_query($sql);
			if (!$success_insert) {
				throw new MysqlException();
			}
				
			$insert_id = mysql_insert_id();
			$this->schueler_id = $insert_id;	
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function update() {
		
		$sql = "UPDATE schueler 
				   SET vorname'" .$this->vorname. "'
				       , user_id = " .$this->user_id. "
				       , nachname='" .$this->nachname. " 
				       , klasse_id=" .$this->klasse_id. " 
				       , aktiv='" .$this->aktiv. "' 
				       , beschreibung = '" .$this->beschreibung. "'
				 WHERE schueler_id=" .$this->schueler_id. ";";
		
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
			     WHERE schueler_id=" .$id. ";";
		
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
			      FROM schueler 
			     WHERE 1=1 ";
		$sql .= $restriction. " ";
		
		$sql .= " ORDER BY nachname;";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$schuelers = array();
			while ($row = mysql_fetch_assoc($result)) {
				$schuelers[$row['schueler_id']]['schueler_id'] = $row['schueler_id'];
				$schuelers[$row['schueler_id']]["vorname"] = $row['vorname'];
				$schuelers[$row['schueler_id']]["nachname"] = $row['nachname'];
				$schuelers[$row['schueler_id']]["user_id"] = $row['user_id'];
				$schuelers[$row['schueler_id']]["aktiv"] = $row['aktiv'];
				$schuelers[$row['schueler_id']]["klasse_id"] = $row['klasse_id'];
				$schuelers[$row['schueler_id']]["beschreibung"] = $row['beschreibung'];
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $schuelers;
	}

	public function getAllAsObject($restriction = '') {
		$sql = "SELECT * 
			      FROM schueler 
			     WHERE 1=1 ";
		$sql .= $restriction. " ";
		
		$sql .= " ORDER BY nachname;";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$schuelers = array();
			while ($row = mysql_fetch_assoc($result)) {
				$s = new Schueler();
				$s->setId($row['schueler_id']);
				$s->setVorname($row['vorname']);
				$s->setNachname($row['nachname']);
				$s->setUser_id($row['user_id']);
				$s->setAktiv($row['aktiv']);
				$s->setKlasse_id($row['klasse_id']);
				$s->setBeschreibung($row['beschreibung']);
				$schuelers[$s->getId()] = $s;
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $schuelers;
	}
	
	
	public function load($id) {
		
		$sql = "SELECT * 
				  FROM schueler 
				 WHERE schueler_id="  .$id. ";";
		
		try {
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['schueler_id'])) {
				throw new Exception("Datensatz leer: ". $sql);
			}
			
			$this->schueler_id = $row['schueler_id'];
			$this->vorname = $row['vorname'];
			$this->nachname = $row['nachname'];
			$this->user_id = $row['user_id'];
			$this->klasse_id = $row['klasse_id'];
			$this->aktiv = $row['aktiv'];
			$this->beschreibung = $row['beschreibung'];
			
		} catch (MysqlException $e) {
			Html::showAll($e);
		} catch (Exception $e) {
			Html::showAll($e);
		}

	}

/**
	 * ŸberprŸft, ob die user_id zu einem Lehrer gehšrt
	 *
	 * @param unknown_type $user_id
	 * @return unknown
	 */
	public function isSchueler($user_id) {
		
		$sql = "SELECT * 
				  FROM schueler 
				 WHERE user_id=" . $user_id . ";";
		
		try {
			$result = mysql_query ( $sql );
			$row = mysql_fetch_assoc ( $result );
		
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		} catch ( Exception $e ) {
			Html::showAll ( $e );
		}
		
		if (! empty ( $row ['schueler_id'] )) {
			return $row ['schueler_id'] ;
		} else {
			return FALSE;
		}
	
	}
	
	public function loadNotens($fach_id = 0) {
		
		$n = new Note();
		
		if ($fach_id == 0) {
			$this->notens = $n->getNoten($this->schueler_id);
		} else {
			$this->notens = $n->getNoten($this->schueler_id, $fach_id);
		}
		
		
	}
	
	public function loadAnwesenheits($fach_id = 0) {
		
		$a = new Anwesenheit();
		
		if ($fach_id == 0) {
			$this->anwesenheits = $a->getNoten($this->schueler_id);
		} else {
			$this->anwesenheits = $a->getNoten($this->schueler_id, $fach_id);
		}
		
		
	}
	
}

?>