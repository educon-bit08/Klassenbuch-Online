<?php

$f = new Fach ( );
$fachs = $f->getAllAsArray ();
$htmlf = new HtmlFach ( $fachs );
$fach_pdm = $htmlf->buildPdm ( 'qwertzuiop' );

$r = new Raum ( );
$raums = $r->getAllAsArray ();
$htmlr = new HtmlRaum ( $raums );
$raum_pdm = $htmlr->buildPdm ( 'asdfghjkl' );

$l = new Lehrer ( );
$lehrers = $l->getAllAsArray ();
$htmll = new HtmlLehrer ( $lehrers );
$lehrer_pdm = $htmll->buildPdm ( 'yxcvbnm,' );

$weekdays = 5; //anzahl wochentage
$klasse_id = 77;

$b = new Block ( );
$blocks = $b->getAllAsObject ();

/*
// brauche fachs als Array mit id als key und name als value  
$lehrers_name = Html::objektArrayToNameArray($lehrers);
$lehrer_pdm = Html::buildPullDownMenu('fach', $lehrers_name);
$lehrer_pdm = Html::addNoneOption($lehrer_pdm);
*/

include ('views/pulldown_function.php'); //Einbindung der Pulldownfunction


$fach_name = array ('Fach' );
$fach_options = array (0 => ' ', 1 => 'Mathe', 2 => 'SL', 3 => 'Englisch' ); //Werte des Faecher-Arrays


$lehrer_name = array ('Lehrer' );
$lehrer_options = array (0 => ' ', 1 => 'Voigt', 2 => 'H&auml;ckl', 3 => 'Gr&uuml;tte' ); //Werte des Lehrer-Arrays


$raum_name = array ('Raum' );
$raum_options = array (0 => ' ', 1 => '2.16', 2 => '2.18', 3 => '2.31' ); //Werte des Raum-Arrays


$klasse_name = array ('Klasse' );
$klasse_options = array (0 => ' ', 1 => 'BIT06/1P', 2 => 'BIT07/1P', 3 => 'BIT08/1P' ); //Werte des Klasse-Arrays


$klasse_pulldown = pulli ( $klasse_name, $klasse_options );
$fach_pulldown = pulli ( $fach_name, $fach_options ); //Zuweisung des Array einer Variablen
$lehrer_pulldown = pulli ( $lehrer_name, $lehrer_options );
$raum_pulldown = pulli ( $raum_name, $raum_options );
?>

<html>
<head>
<title>Stundenplan</title>
</head>
<body>
<form action="index.php?action=save&what=wochenplan">
        Klasse: <?php
								echo $klasse_pulldown?> <input type="button"
	value="Best&auml;tigen" name="accept">
<br>
<br>
<!--Aufruf der Variablen die ein Array enthÃ¤lt-->

<table border="0">
	<tr>
		<td>G&uuml;ltigkeitszeitraum von <input type="text" maxlength="10"
			size="10" value=""> bis <input type="text" maxlength="10" size="10"
			value=""></td>
	</tr>
	<tr>
		<td align="right">
		<div style="font-size: 11px;">Eingabeformat: JJJJ-MM-TT; 2009-06-23</div>
		</td>
	</tr>
</table>
<br>

<table border="1">
	<tr>
		<td>&nbsp;</td>
		<td>Mo</td>
		<td>Di</td>
		<td>Mi</td>
		<td>Do</td>
		<td>Fr</td>
	</tr>
<?php

foreach ( $blocks as $block ) {
	/**
	 * Variablennamen fŸr Tabelle Wochenplaner:
	 * klassen_id  _  wochentag_id  _  block_id  _ fach-,lehrer_ bzw. raum_id
	 * die Klassen_id wird miit im Variablennamen angegeben, damit bei
	 * spŠteren Erweiterungen Unterrichtsstunden zwischen 2 verschiedenen Klassen
	 * in einer OberflŠche verschoben werden kšnnen 
	 */
	
	echo '            <tr>';
	echo '                <td rowspan="3">' .substr($block->getVon(), 0, 5) .' - ' .substr($block->getBis(), 0, 5). '</td>';
	
	for($wotag = 1; $wotag < $weekdays + 1; $wotag ++) {
		$param = $klasse_id . '_' . $wotag . '_' .$block->getId(). '_fach_id';
		echo '                <td>' . $htmlf->buildPdm ( $param ) . '</td>';
	
	}
	
	echo '            </tr>';
	echo '            <tr>';
	
	for($wotag = 1; $wotag < $weekdays + 1; $wotag ++) {
		$param = $klasse_id . '_' . $wotag . '_' .$block->getId(). '_lehrer_id';
		echo '                <td>' . $htmll->buildPdm ( $param ) . '</td>';
	
	}
	
	echo '            </tr>';
	echo '            <tr>';
	
	for($wotag = 1; $wotag < $weekdays + 1; $wotag ++) {
		$param = $klasse_id . '_' . $wotag . '_' .$block->getId(). '_raum_id';
		echo '                <td>' . $htmlr->buildPdm ( $param ) . '</td>';
	
	}
	echo '            </tr>';

}
?>            
            <tr>
		<td rowspan="3">9:45 - 11:15</td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
	</tr>

	<tr>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
	</tr>

	<tr>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
	</tr>

	<tr>
		<td rowspan="3">11:30 - 13:00</td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
	</tr>

	<tr>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
	</tr>

	<tr>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
	</tr>

	<tr>
		<td rowspan="3">13:30 - 15:00</td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
	</tr>

	<tr>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
	</tr>

	<tr>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
	</tr>

	<tr>
		<td rowspan="3">15:15 - 16:45</td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
	</tr>

	<tr>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
	</tr>

	<tr>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
	</tr>

	<tr>
		<td rowspan="3">17:00 - 18:30</td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
		<td><?php
		echo $fach_pulldown?></td>
	</tr>

	<tr>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
		<td><?php
		echo $lehrer_pulldown?></td>
	</tr>

	<tr>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
		<td><?php
		echo $raum_pulldown?></td>
	</tr>

</table>
<br>
<br>
<input type="button" name="save" value="Speichern">
<input type="button" name="cancel" value="Abbrechen">
</form>
</body>
</html>
