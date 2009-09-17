<?php

class HtmlUser {
	public $users;
	public $schueler;
	public $lehrer;
	//public $sekret;
	//public $fbl;
	//public $admin;
	

	public function __construct($users) {
		$this->users = $users;
	}
	/*
	public function __construct($klasse) {
		$this->schueler = $klasse;
	}
	//fügt die options in das Pulldownmenü für die Klassenauswahl ein
	public function getKlaPu() {
		$html = '';
		foreach ( $this->klasse as $klasse ) {
			$html.='<option>'.$klasse['name'].'</option>'
		
		}
		return $html;
	}
	*/
	// Ausgabe der Schüler
	public function getSchuelers() {
		$html = '';
		foreach ( $this->users as $schueler ) {
			$html .= '	<tr>
				<td><input type="text" name="schueler' . $schueler ['schueler_id'] . '" value="' . $schueler ['name'] . '"></td>
				<td><input type="submit" name="" value="deaktivieren"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>';
		
		}
		return $html;
	}
	
	// Ausgabe der Lehrer
	public function getLehrers() {
		$html = '';
		foreach ( $this->users as $lehrer ) {
			$html .= '	<tr>
		<td><input type="text" name="schueler' . $lehrer ['lehrer_id'] . '" value="' . $lehrer ['name'] . '"></td>
		<td><input type="submit" name="" value="deaktivieren"></td>
		<td><input type="submit" name="update" value="Update"></td>
	</tr>';
		
		}
		return $html;
	}
	
/*
	// Ausgabe der Sekretärin(nen)
		public function getSekrets()
	{
		$html = '';
		foreach ($this->users as $sekret)
		{
			$html.= '	<tr>
		<td><input type="text" name="Sekrets'.$sekret['Sekrets_id'].'" value="'.$sekret['name'].'"></td>
		<td><input type="submit" name="" value="deaktivieren"></td>
		<td><input type="submit" name="update" value="Update"></td>
	</tr>';
			
		}
	return $html;
	}
	
	
	// Ausgabe der Fachbereichsleiter (FBL)
		public function getFBLs()
	{
		$html = '';
		foreach ($this->users as $fbl)
		{
			$html.= '	<tr>
		<td><input type="text" name="fbl'.$fbl['fbl_id'].'" value="'.$fbl['name'].'"></td>
		<td><input type="submit" name="" value="deaktivieren"></td>
		<td><input type="submit" name="update" value="Update"></td>
	</tr>';
			
		}
	return $html;
	}	
	
		// Ausgabe der Administratoren
		public function getAdmins()
	{
		$html = '';
		foreach ($this->users as $admin)
		{
			$html.= '	<tr>
		<td><input type="text" name="admin'.$admin['admin_id'].'" value="'.$admin['name'].'"></td>
		<td><input type="submit" name="" value="deaktivieren"></td>
		<td><input type="submit" name="update" value="Update"></td>
	</tr>';
			
		}
	return $html;
	}
	
	*/
}

?>