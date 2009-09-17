<?php
	
    /*Eine Funktion um Dropdown auszugeben. Den Text der drin stehen
     * soll zieht er aus einem Array.*/

    function pulli($name,$options,$qname) {                                     //Function zum erstellen eines Pulldowns
		$pulldown = '<select name="' . $qname . '">';
		$anzahl = count ($options);
		
			for ($i=0; $i < $anzahl; $i++) {                                    //Schleife fuer Pulldown
				$pulldown = $pulldown . '<option>';
				$pulldown = $pulldown . $options[$i];
				$pulldown = $pulldown . '</option>';
			}
	
		$pulldown = $pulldown . '</select>';
		return $pulldown;
	}

?>
<html>
<head>
<title>Unbenanntes Dokument</title>
</head>

<body>
</body>
</html>
