<?php

class Html {
	
	public static function showAll($array) {
		echo '<pre>';
		print_r ( $array );
		echo '</pre>';
	}
	
	public static function getDayAsPulldown() {
		
		//Erstellung des Arrays fuer die Tage
		$tage = array ();
		for($i = 1; $i <= 31; $i ++) {
			$tage [$i] = $i;
		}
		
		$day_pull_name = 'tag_input_reg';
		$html = self::buildPullDownMenu ( $day_pull_name, $tage );
		
		return $html;
	}
	
	public static function getMonthAsPulldown() {
		
		//Erstellung des Arrays fuer den Monat
		$month = array ();
		for($i = 1; $i <= 12; $i ++) {
			$month [$i] = $i;
		}
		
		$day_pull_name = 'monat_input_reg';
		$html = self::buildPullDownMenu ( $day_pull_name, $month );
		
		return $html;
	}
	
	public static function getYearAsPulldown() {
		
		//Erstellung des Arrays fuer das Jahr
		$year = array ();
		for($i = 1900; $i <= 2010; $i ++) {
			$year [$i] = $i;
		}
		
		$day_pull_name = 'jahr_input_reg';
		$html = self::buildPullDownMenu ( $day_pull_name, $year );
		
		return $html;
	}
	
	public static function buildPullDownMenu($name, $options, $multiple = FALSE, $selected_options = 0) {
		
		$html = '<select name="' . $name . '"';
		
		if ($multiple) {
			$html .= ' multiple';
		}
		
		$html .= '>' . "\n";
		
		foreach ( $options as $value => $label ) {
			$html .= '  <option value="' . $value . '"';
			
			if (is_array ( $selected_options )) {
				
				if (in_array ( $value, $selected_options )) {
					$html .= ' selected';
				}
			
			}
			
			$html .= '>' . $label . '</option>' . "\n";
		
		}
		$html .= '</select>' . "\n";
		
		return $html;
	}
	
	//Korrekte Zusammensetzung des Geburtsdatums fuer die DB.
	public static function buildMysqlDate($day, $month, $year) {
		if ($day < 10) { //Wenn die Zahl kleiner als 10 ist soll
			//eine 0 vor die eigentliche Zahl gesetzt
			$day = "0" . $day; //werden.
		}
		
		if ($month < 10) {
			
			$month = "0" . $month;
		}
		$bday = $year . '-' . $month . '-' . $day;
		
		return $bday;
	}
	
	public static function objektArrayToNameArray($fachs) {
		$fachs_name = array ();
		foreach ( $fachs as $key => $fach ) {
			$fachs_name [$key] = $fach->getName ();
		}
		
		return $fachs_name;
	}
	
	public static function arrayArrayToNameArray($fachs) {
		$fachs_name = array ();
		foreach ( $fachs as $key => $fach ) {
			$fachs_name [$key] = $fach['name'];
		}
		
		return $fachs_name;
	}

	/**
	 * fügt pulldownmenu nach dem SELECT vor der 1. option
	 * eine none-option hinzu
	 * value=0 label=leerstring
	 *
	 * @param string $select
	 */
	public static function addNoneOption($select) {
		
		$pos_opt = strpos($select, 'option');
		
		$select_noneoption = substr($select, 0, $pos_opt);
		$select_noneoption .= '<option value="0"></option>';
		$select_noneoption .= substr($select, $pos_opt +1);
		
		return $select_noneoption;
	}
	
/**
     *'2009-12-24' -> '24.12.2009'
     *
     * @param string $mysqldate
     * @return string
     */
    public static function buildDateFromMysql($mysqldate){

        $date_array = explode('-', $mysqldate);
        $date_array = array_reverse($date_array);
        $date = implode('.', $date_array);

        return $date;
    }


     /**
     *'30.12.1990' -> '18'
     *
     * @param string $mysqldate
     * @return string
     */
    public static function buildDateToAge($geburtstag) {
        
           $strlen=strlen($geburtstag);
       $f=0;
       for($i=0;$i<$strlen;$i=$i+2)
       {
         $array=substr($geburtstag, $i, 2);
         $zahl[$f]=$array;
         $f++;
       }

       $JAHR="$zahl[3]$zahl[4]";
       $CHJAHR="$zahl[3]$zahl[4]";
       $mon = getdate();
       $yjahr=$mon['year'];
       $alter=$yjahr-$JAHR;


       $birth_day   = explode(".", $geburtstag);
       $birth_year  = substr("0" . $geburtstag, -2);

       $d=date("d");
       $m=date("m");
       $y=date("Y");

      $t=0;
      if ($birth_day[1]>$m)
      {
       $t=$t-1;
      }
      else if ($m==$birth_day[1] AND $birth_day[0]<$d)
      {
        $t=$t-1;
      }

      $alter=$alter+$t;

      return $alter;
        
    }
    
    /**
     * erwartet 2-dim Array und bildet html Tabelle daraus
     *
     * @param unknown_type $twodims
     */
    public function buildTable($twodims) {
   		
    	$html = '<table border="1" style="border-collapse:collapse">' ."\n";
    	foreach ($twodims as $columnhtml) {
    		
    		$html .= '  <tr>' ."\n";
    		
    		foreach ($columnhtml as $field) {
    			
    			$html .= '    <td nowrap width="90px">' .$field. '</td>' ."\n";
    			
    		}
    		
    		$html .= '  </tr>' ."\n";
    	}
    	  	
    	$html .= '</table>' ."\n";
    	
    	return $html;
    }
    
	
/**
 * Enter description here...
 *
 * @param string $name
 * @param array $options mit pk als Schlüssel und Objekt als Element
 * @return string
 */
/*
	public function getPullDown($name, $options){
        $out = '<select name="' .$name. '" size="5" multiple>'. "\n";
        foreach($this->options as $key => $option){
            $out .= '<option value="' .$option->getId(). '">' .$option->getName(). '</option>'. "\n";
        }
        $out .= '</select>' ."\n";

        return $out;
    }
	*/
}
?>
