<?php

$f = new Fach();
$faechers = $f -> getAllAsArray();
$htmlf = new HtmlFach($faechers);

?>

<!-- div zum Positionieren -->
<div style="position:absolute;  left:100px;">

<!-- Seiten-Überschrift -->
<h2>F&auml;cherliste</h2>

<!--Überschriften zur Unterteilung von aktiven und inaktiven Fächern -->
<h3> Aktive F&auml;cher</h3>

<!-- Tabelle für aktive Fächer - bisher nur zum Auslesen-->
<table border="0">
	<tr align="center">
		<td colspan="3"><b>Fach</b></td>
	</tr>
	
	<!-- Fach hinzufügen am Tabellenanfang -->
	<tr>
		<td><input type="text" name="newFach"></td>
		<td colspan="2"><input type="submit" name="add_class" value="Fach hinzuf&uuml;gen"></td>
	</tr>
    <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
    
    <!-- eingebaute Leerzeile zur Übersichtlichkeit am Anfang der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
    
<?php

echo $htmlf -> getFaechers();

?>
	<!-- eingebaute Leerzeile zur Übersichtlichkeit am Ende der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	
	<!-- Fach hinzufügen am Tabellenende -->
    <tr>
		<td><input type="text" name="newFach"></td>
		<td colspan="2"><input type="submit" name="add_class" value="neue Fach"></td>
	</tr>
     <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
</table>

<!-- Überschrift - inaktive Fächer -->
<h3>Inaktive F&auml;cher</h3>

<!--Tabelle für aktive Fächer - bisher nur zum Auslesen -->
<table border="0" width="300">
	<tr align="center">
		<td width="150"><b>Fach</b></td>
		<td width="150">&nbsp;</td>
	</tr>
	
    <!-- Beispielwerte -->
	<tr align="center">
		<td>Beispiel1</td>
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