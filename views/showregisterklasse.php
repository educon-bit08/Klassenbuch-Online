<html>
<head>
<title></title>
</head>
<body>
<!-- div zum Positionieren -->
<div style="position:absolute;  left:100px;">

<!-- Seiten-Ueberschrift -->
<h2>Klassenliste</h2>

<!--†berschriften zur Unterteilung von aktiven und inaktiven Klassen -->
<h3> Aktive Klassen</h3>

<table border="0">

	<tr align="center">
		<td colspan="3"><b>Klasse</b></td>
	</tr>
	<form action="index.php?action=save&what=klasse" method="post">
	<!-- Klasse hinzufuegen am Tabellenanfang -->
	<tr>
		<td><input type="text" name="klasse"></td>
		<td colspan="2"><input type="submit" name="add_class" value="Klasse hinzuf&uuml;gen"></td>
	</tr>
    <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
	</form>    
    <!-- eingebaute Leerzeile zur Uebersichtlichkeit am Anfang der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
    <form action="index.php?action=deactivate&what=klasse" method="post">
<?php

echo $htmlk -> getKlassens();

?>
	</form>
	<!-- eingebaute Leerzeile zur Uebersichtlichkeit am Ende der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>

</table>

<!-- Ueberschrift - inaktive Klasse -->
<h3>Inaktive Klassen</h3>

<table border="0" width="300">
	<tr align="center">
		<td width="150"><b>&nbsp;</b></td>
		<td width="150">&nbsp;</td>
	</tr>
	
    <!-- Beispielwerte -->
    <form action="index.php?action=activate&what=klasse" method="post">
	<tr align="center">
		<?php
echo $htmlk_inaktiv -> getKlassens();
		?>
	</tr>
	</form>
</table>
</div>
</body>
</html>