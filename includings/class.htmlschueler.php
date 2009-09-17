<?php
class HtmlSchueler {
	
	public $schuelers;
	public $valid_schueler_key;
	public $anzahl;
	
	public function __construct($schuelers) {
		$this->schuelers = $schuelers;
		
		$schuelers_keys =  array_keys($schuelers);
		// Schluessel des 1. Schuelers wird ausgelesen
		$this->valid_schueler_key = $schuelers_keys[0];
	}
	
	public function getDatum() {
		$html = '';
		//Html::showAll ($this->schuelers[$this->valid_schueler_key]->notens);
		foreach ($this->schuelers[$this->valid_schueler_key]->notens as $note) {
  	  	  $html .= '        <th><div align="center"><input type="text" class="tablehead" size="10" maxlength="10" value="' .$note['datum']. '">' ."\n";
		  if (($note['typ'])=="K")
		  {
		  $html.='<br><select class="tablehead"><option selected>K</option><option>M</option><option>T</option><option>V</option></select></div></th>' ."\n";
		  }
		  else if (($note['typ'])=="M")
			{
			$html.='<br><select class="tablehead"><option>K</option><option selected>M</option><option>T</option><option>V</option></select></div></th>' ."\n";
			}
			else if (($note['typ'])=="T")
			{
			$html.='<br><select class="tablehead"><option>K</option><option>M</option><option selected>T</option><option>V</option></select></div></th>' ."\n";
			}
			else
			{
			$html.='<br><select class="tablehead"><option>K</option><option>M</option><option>T</option><option selected>V</option></select></div></th>' ."\n";
			}
  	    }
		$html .= '        <th><div align="center"><input type="text" class="tablehead" size="10" maxlength="10" name="neu_datum" value="TT-MM-JJJJ">' ."\n";
		$html.='<br><select name="neu_typ" class="tablehead"><option>K</option><option>M</option><option>T</option><option>V</option></select></div></th>' ."\n";
  	    $html.='<th><div><input class="tablehead" type="text" size="12" value="Durchschnitt" readonly="readonly"></div></th>';
  	    return $html;
	}
	
	public function getName() {
		$html = '';
		
		foreach ($this->schuelers as $schueler) {
  	  		$html .= '        <tr><th><div><input type="text" class="schueler" value="' .$schueler->getName(). '" readonly="readonly"></div></th></tr>' ."\n";
  	  	}
  	  	
  	  	return $html;
	}
	
	public function getPunkte() {
		$html = '';
		
		foreach ($this->schuelers as $schueler) {
	  		$html .= '         <tr>' ."\n";
	  	
	  		foreach ($schueler->notens as $note) {
			$n=new Noten();
			//Html::showAll($note);
			$n->load($note['note_id']);
	  			$html .= '           <td><div align="center"><input type="text" class="noten" size="2" maxlength="2" name="'.$note['note_id'].'" value="' .$note['note']. '"></div></td>' ."\n";
	  		}
			$html .= '           <td><div align="center"><input type="text" class="noten" size="2" maxlength="2" name="neu_'.$schueler->getId().'" value=""></div></td>' ."\n";
			$html.='           <td><div align="center"><input type="text" class="noten" size="5" maxlength="5" value="' .$n->getDurchschnitt(). '" readonly="readonly"></div></td>' ."\n";
  	    	$html .= '         </tr>' ."\n";
	    }
	    
	    return $html;
	}
	
	
}

?>