<?php

$r = new Raume();
$raeumes = $r -> getAllAsArray();
$htmlr = new HtmlRaeume($raeumes);

//html::showAll($raeumes);

?>

<!-- div zum Positionieren -->
<div style="position:absolute;  left:100px;">

<!-- Seiten-Überschrift -->
<h2>Raumliste</h2>

<!--Überschriften zur Unterteilung von aktiven und inaktiven Räume -->
<h3> Aktive R&auml;ume</h3>

<!-- Tabelle für aktive Räume - bisher nur zum Auslesen-->
<table border="0">
	<tr align="center">
		<td colspan="3"><b>Raum</b></td>
	</tr>
	
	<!-- Raum hinzufügen am Tabellenanfang -->
	<tr>
		<td><input type="text" name="newRaum"></td>
		<td colspan="2"><input type="submit" name="add_class" value="Raum hinzuf&uuml;gen"></td>
	</tr>
    <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
    
    <!-- eingebaute Leerzeile zur Übersichtlichkeit am Anfang der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
    
<?php

echo $htmlr -> getRaeumes();

?>
	<!-- eingebaute Leerzeile zur Übersichtlichkeit am Ende der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	
	<!-- Raum hinzufügen am Tabellenende -->
    <tr>
		<td><input type="text" name="newRaum"></td>
		<td colspan="2"><input type="submit" name="add_class" value="neuer Raum"></td>
	</tr>
     <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
</table>

<!-- Überschrift - inaktive Räume -->
<h3>Inaktive R&auml;ume</h3>

<!--Tabelle für aktive Räume - bisher nur zum Auslesen -->
<table border="0" width="300">
	<tr align="center">
		<td width="150"><b>Raum</b></td>
		<td width="150">&nbsp;</td>
	</tr>
	
    <!-- Beispielwerte -->
	<tr align="center">
		<td><input type="text" name="newRaum" value="Beispiel1"></td>
		<td><input type="submit" name="aktivieren" value="aktivieren"></td>
	</tr>
	<tr align="center">
		<td><input type="text" name="newRaum" value="Beispiel2"></td>
		<td><input type="submit" name="aktivieren" value="aktivieren"></td>
	</tr>
	<tr align="center">
		<td><input type="text" name="newRaum" value="Beispiel3"></td>
		<td><input type="submit" name="aktivieren" value="aktivieren"></td>
	</tr>
</table>
</div>