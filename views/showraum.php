<html>
<head>
<title></title>
</head>
<body>
<!-- div zum Positionieren -->
<div style="position:absolute;  left:100px;">

<!-- Seiten-Ueberschrift -->
<h2>Raumliste</h2>

<!--†berschriften zur Unterteilung von aktiven und inaktiven Fächer -->
<h3> Aktive R&auml;ume</h3>

<table border="0">

	<tr align="center">
		<td colspan="3"><b>Raum</b></td>
	</tr>
	<form action="index.php?action=save&what=raum" method="post">
	<!-- Raum hinzufuegen am Tabellenanfang -->
	<tr>
		<td><input type="text" name="raum"></td>
		<td colspan="2"><input type="submit" name="add_raum" value="Raum hinzuf&uuml;gen"></td>
	</tr>
    <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
	</form>
    <!-- eingebaute Leerzeile zur Uebersichtlichkeit am Anfang der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
    <form action="index.php?action=deactivate&what=raum" method="post">
<?php

echo $htmlr -> getRaums();

?>
	</form>
	<!-- eingebaute Leerzeile zur Uebersichtlichkeit am Ende der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>

</table>

<!-- Ueberschrift - inaktive Fächer -->
<h3>Inaktive R&auml;ume</h3>

<table border="0" width="300">
	<tr align="center">
		<td width="150"><b>&nbsp;</b></td>
		<td width="150">&nbsp;</td>
	</tr>

    <!-- Beispielwerte -->
    <form action="index.php?action=activate&what=raum" method="post">
	<tr align="center">
		<?php
echo $htmlr_inaktiv -> getRaums();
		?>
	</tr>
	</form>
</table>
</div>
</body>
</html>