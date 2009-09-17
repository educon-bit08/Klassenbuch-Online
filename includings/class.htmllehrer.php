<?php

class HtmlLehrer {
	public $lehrers;
	
	public function __construct($lehrers) {
		$this->lehrers = $lehrers;
	}
	
	public function getlehrers() {
		$html = '';
		foreach ( $this->lehrers as $lehrer ) {
			$html .= '	<tr>
		<td><input type="text" name="fach' . $lehrer ['lehrer_id'] . '" value="' . $lehrer ['name'] . '"></td>
		<td><input type="submit" name="" value="deaktivieren"></td>
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
		$lehrers_name = Html::arrayArrayToNameArray ( $this->lehrers );
		$lehrer_pdm = Html::buildPullDownMenu ( $name, $lehrers_name );
		$lehrer_pdm = Html::addNoneOption ( $lehrer_pdm );
		
		return $lehrer_pdm;
	}

}

?>