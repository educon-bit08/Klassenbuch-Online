<?php

class HtmlKlasse
{
    public $klassens;

    public function __construct($klassens)
    {
        $this ->klassens = $klassens;
    }

    public function getKlassens()
    {
        $html = '';
        foreach ($this->klassens as $klasse)
        {
			// aktive und inaktive Klassen erhalten unterschiedlichen submit-Knopf
			if ($klasse['aktiv'] == 'TRUE') {
				$submit_label = 'deaktivieren';
			} else {
				$submit_label = 'aktivieren';
			}
			
        	
            $html.= '	<tr>
        <td><input type="text" name="klasse'.$klasse['klasse_id'].'" value="'.$klasse['name'].'"></td>
        <td><input type="submit" name="deaktiv' .$klasse['klasse_id']. '" value="' .$submit_label. '"></td>
        <td><input type="submit" name="update" value="Update"></td>
    </tr>';

        }
        return $html;
    }

    public function getPullDown($name){
        $out = '<select name="' .$name. '" size="5" multiple>'. "\n";
        foreach($this->klassens as $key => $option){
            $out .= '<option value="' .$key. '">' .$option['name']. '</option>'. "\n";
        }
        $out .= '</select>' ."\n";

        return $out;
    }

}

?>