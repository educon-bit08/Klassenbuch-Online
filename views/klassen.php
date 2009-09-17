<?php

$k = new Klasse();
$klassens = $k -> getAllAsArray();
$htmlk = new HtmlKlasse($klassens);
?>

<!-- div zum Positionieren -->
<div style="position:absolute;  left:100px;">

<!-- Seiten-Ueberschrift -->
<h2>Klassenliste</h2>

<!--Überschriften zur Unterteilung von aktiven und inaktiven Klassen -->
<h3> Aktive Klassen</h3>

<!-- funktionslose Beispiel-Tabelle -->
<table border="0">
	<tr align="center">
		<td colspan="3"><b>Klasse</b></td>
	</tr>
	
	<!-- Klasse hinzufuegen am Tabellenanfang -->
	<tr>
		<td><input type="text" name="newKlasse"></td>
		<td colspan="2"><input type="submit" name="add_class" value="Klasse hinzuf&uuml;gen"></td>
	</tr>
    <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
    
    <!-- eingebaute Leerzeile zur Uebersichtlichkeit am Anfang der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
    
<?php

echo $htmlk -> getKlassens();

?>
	<!-- eingebaute Leerzeile zur Uebersichtlichkeit am Ende der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	
	<!-- Klasse hinzufuegen am Tabellenende -->
    <tr>
		<td><input type="text" name="newKlasse"></td>
		<td colspan="2"><input type="submit" name="add_class" value="neue Klasse"></td>
	</tr>
     <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
</table>

<!-- Ueberschrift - inaktive Klasse -->
<h3>Inaktive Klassen</h3>

<table border="0" width="300">
	<tr align="center">
		<td width="150"><b>Klasse</b></td>
		<td width="150">&nbsp;</td>
	</tr>
	
    <!-- Beispielwerte -->
	<tr align="center">
		<td>Beispiel1"</td>
		<td><input type="submit" name="aktivieren" value="aktivieren"></td>
	</tr>
	<tr align="center">
		<td>Beispiel2</td>
		<td><input type="submit" name="aktivieren" value="aktivieren"></td>
	</tr>
	<tr align="center">
		<td>Beispiel3</td>
		<td><input type="submit" name="aktivieren" value="aktivieren"></td>
	</tr>
</table>
</div>