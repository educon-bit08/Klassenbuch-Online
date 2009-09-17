<?php

class HtmlRaum {
	public $raums;
	
	public function __construct($raums) {
		$this->raums = $raums;
	}
	
	public function getRaums()
	{
		$html = '';
		foreach ($this->raums as $raum)
        {
			// aktive und inaktive Räume erhalten unterschiedlichen submit-Knopf
			if ($raum['aktiv'] == 'TRUE') {
				$submit_label = 'deaktivieren';
			} else {
				$submit_label = 'aktivieren';
			}


            $html.= '	<tr>
        <td><input type="text" name="raum'.$raum['raum_id'].'" value="'.$raum['name'].'"></td>
        <td><input type="submit" name="deaktiv' .$raum['raum_id']. '" value="' .$submit_label. '"></td>
        <td><input type="submit" name="update" value="Update"></td>
    </tr>';

        }
	return $html;
	}
	
	/**
	 * erstellt aus namen der FŠcher PulldownMenu mit Abwahloption
	 *
	 * @param string $name
	 */
	public function buildPdm($name) {
		
		// brauche fachs als Array mit id als key und name als value  
		$raums_name = Html::arrayArrayToNameArray ( $this->raums );
		$raum_pdm = Html::buildPullDownMenu ( $name, $raums_name );
		$raum_pdm = Html::addNoneOption ( $raum_pdm );
		
		return $raum_pdm;
	}

}

?>