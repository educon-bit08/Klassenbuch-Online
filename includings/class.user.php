<?php

class User extends Db implements Dmlable {
	
	//Primärschlüssel
	private $user_id;
	private $login;
	private $passwd;
	private $aktiv;
	private $email;
	private $geburtstag;
	
	public function __construct() {
		try {
			parent::__construct ();
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	public function getId() {
		return $this->user_id;
	}
	
	public function setId($user_id) {
		$this->user_id = $user_id;
	}
	
	public function getLogin() {
		return $this->login;
	}
	
	public function setLogin($login) {
		$this->login = $login;
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
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param unknown_type $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
	
	/**
	 * @return unknown
	 */
	public function getGeburtstag() {
		return $this->geburtstag;
	}
	
	/**
	 * @param unknown_type $geburtstag
	 */
	public function setGeburtstag($geburtstag) {
		$this->geburtstag = $geburtstag;
	}
	
	/*
	 *Speicherung des Aktuellen Objektes
	 *falls kein Primärschlüssel existieren sollte
	 *wird ein neuer Datensatz erzeugt
	 *andernfalls ein Udate durchgeführt
	*/
	public function save() {
		if (isset ( $this->user_id )) {
			$this->update ();
		} else {
			$this->insert ();
		}
	}
	
	public function insert() {
		$sql = "INSERT INTO user
					   (user_id,login,passwd, aktiv, email, geburtstag)
				VALUES ('','" . $this->login . "','" . $this->passwd . "','" . $this->aktiv . "','" . $this->email . "','" . $this->geburtstag . "');";
		
		try {
			$success_insert = mysql_query ( $sql );
			if (! $success_insert) {
				throw new MysqlException ( );
			}
			
			$insert_id = mysql_insert_id ();
			$this->user_id = $insert_id;
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	public function update() {
		$sql = "UPDATE user
				   SET login='" . $this->login . "',
					   passwd='" . $this->passwd . "',
					   aktiv='" . $this->aktiv . "',
					   email='" . $this->email . "',
					   geburtstag='" . $this->geburtstag . "',  
				 WHERE user_id=" . $this->user_id . ";";
		
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
		$sql = "DELETE FROM user
				WHERE user_id=" . $id . ";";
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
				FROM user
				WHERE 1=1";
		$sql .= $restriction . ";";
		
		try {
			$result = mysql_query ( $sql );
			
			if (! $result) {
				throw new MysqlException ( );
			}
			
			$users = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$users [$row ['user_id']] ['user_id'] = $row ['user_id'];
				$users [$row ['user_id']] ['login'] = $row ['login'];
				$users [$row ['user_id']] ['passwd'] = $row ['passwd'];
				$users [$row ['user_id']] ['aktiv'] = $row ['aktiv'];
				$users [$row ['user_id']] ['email'] = $row ['email'];
				$users [$row ['user_id']] ['geburtstag'] = $row ['geburtstag'];
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $users;
	}
	
	public function getAllAsObject($restriction = '') {
		$sql = "SELECT *
				FROM user
				WHERE 1=1";
		$sql .= $restriction . ";";
		
		try {
			$result = mysql_query ( $sql );
			
			if (! $result) {
				throw new MysqlException ( );
			}
			
			$users = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				
				$u = new User ( );
				$u->setId ( $row ['user_id'] );
				$u->setLogin ( $row ['login'] );
				$u->setPasswd ( $row ['passwd'] );
				$u->setAktiv ( $row ['aktiv'] );
				$u->setEmail ( $row ['email'] );
				$u->setGeburtstag ( $row ['geburtstag'] );
				$users [$u->getId ()] = $u;
			
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $users;
	}
	public function load($id) {
		
		$sql = "SELECT *
				FROM user
			  	WHERE user_id=" . $id . ";";
		
		try {
			$result = mysql_query ( $sql );
			$row = mysql_fetch_assoc ( $result );
			
			if (empty ( $row ['user_id'] )) {
				throw new MysqlException ( "Datensatz leer: " . $sql );
			}
			
			$this->user_id = $row ['user_id'];
			$this->login = $row ['login'];
			$this->passwd = $row ['passwd'];
			$this->aktiv = $row ['aktiv'];
			$this->email = $row ['email'];
			$this->geburtstag = $row ['geburtstag'];
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		} catch ( Exception $e ) {
			Html::showAll ( $e );
		}
	
	}
	
	public function getRole() {
		
		$l = new Lehrer ( );
		if ($lehrer_id = $l->isLehrer ( $this->user_id )) {
			
			$l->load ( $lehrer_id );
			return $l;
			
		} else {
			
			$s = new Schueler();
			if ($schueler_id = $s->isSchueler ( $this->user_id )) {
				$s->load ( $schueler_id );
				return $s;
			}
		}
	
	}

}

?>