<?php

$k = new User();
$users = $k -> getAllAsArray();
$htmlu = new htmlUser($users);
?>

<!-- div zum Positionieren -->
<div style="position:absolute;  left:100px;">

<!-- Seiten-Überschrift -->
<h2>Benutzerliste</h2>

<!--Überschriften zur Unterteilung von aktiven und inaktiven Benutzer -->
<h3> Aktive Benutzer</h3>

<!-- funktionslose Beispiel-Tabelle -->
<table border="0">

	<tr align="center">
		<td colspan="3"><b>User</b></td>
	</tr>
	
	<!-- User hinzufügen am Tabellenanfang -->
	<tr>
		<td><input type="text" name="newUser"></td>
		<td colspan="2"><input type="submit" name="add_class" value="User hinzuf&uuml;gen"></td>
	</tr>
    <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
    
    <!-- eingebaute Leerzeile zur Übersichtlichkeit am Anfang der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr> 
	
<?php

echo $htmlu -> getUsers();

?>

	<!-- eingebaute Leerzeile zur Übersichtlichkeit am Ende der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	
	<!-- User hinzufügen am Tabellenende -->
    <tr>
		<td><input type="text" name="newUser"></td>
		<td colspan="2"><input type="submit" name="add_class" value="neue User"></td>
	</tr>
     <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
</table>

<!-- Überschrift - inaktive User -->
<h3>Inaktive Benutzer</h3>

<table border="0" width="300">
	<tr align="center">
		<td width="150"><b>User</b></td>
		<td width="150">&nbsp;</td>
	</tr>
	
    <!-- Beispielwerte -->
	<tr align="center">
		<td><input type="text" name="newFach" value="Beispiel1"></td>
		<td><input type="submit" name="aktivieren" value="aktivieren"></td>
	</tr>
	<tr align="center">
		<td><input type="text" name="newFach" value="Beispiel2"></td>
		<td><input type="submit" name="aktivieren" value="aktivieren"></td>
	</tr>
	<tr align="center">
		<td><input type="text" name="newFach" value="Beispiel3"></td>
		<td><input type="submit" name="aktivieren" value="aktivieren"></td>
	</tr>
</table>
</div>