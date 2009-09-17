<html>
<head>
<title></title>
</head>
<body>
<!-- div zum Positionieren -->
<div style="position:absolute;  left:100px;">

<!-- Seiten-Ueberschrift -->
<h2>F&auml;cherliste</h2>

<!--†berschriften zur Unterteilung von aktiven und inaktiven Fächer -->
<h3> Aktive F&auml;cher</h3>

<table border="0">

	<tr align="center">
		<td colspan="3"><b>Fach</b></td>
	</tr>
	<form action="index.php?action=save&what=fach" method="post">
	<!-- Fach hinzufuegen am Tabellenanfang -->
	<tr>
		<td><input type="text" name="fach"></td>
		<td colspan="2"><input type="submit" name="add_fach" value="Fach hinzuf&uuml;gen"></td>
	</tr>
    <tr align="center">
		<td colspan="3"><input type="reset" name="reset" value="reset"></td>
	</tr>
	</form>
    <!-- eingebaute Leerzeile zur Uebersichtlichkeit am Anfang der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>
    <form action="index.php?action=deactivate&what=fach" method="post">
<?php

echo $htmlf -> getFachs();

?>
	</form>
	<!-- eingebaute Leerzeile zur Uebersichtlichkeit am Ende der Tabelle -->
    <tr>
		<td colspan="3">&nbsp;</td>
	</tr>

</table>

<!-- Ueberschrift - inaktive Fächer -->
<h3>Inaktive F&auml;cher</h3>

<table border="0" width="300">
	<tr align="center">
		<td width="150"><b>&nbsp;</b></td>
		<td width="150">&nbsp;</td>
	</tr>

    <!-- Beispielwerte -->
    <form action="index.php?action=activate&what=fach" method="post">
	<tr align="center">
		<?php
echo $htmlf_inaktiv -> getFachs();
		?>
	</tr>
	</form>
</table>
</div>
</body>
</html>