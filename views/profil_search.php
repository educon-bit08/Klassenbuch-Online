<?php

include ('pulldown_function.php');                                              //Einbindung der Pulldownfunction

$klasse_name=array('Klasse');
$klasse_options=array(0=> ' ', 1 => 'Mathe', 2 => 'SL', 3 => 'Englisch');

$klasse_pulldown=pulli($klasse_name,$klasse_options);
?>

<html>
<head>
<title>Profilsuche</title>
</head>
<body>

<h2>Profilsuche</h2>

<table>
	<tr>
		<td>Vorname:</td>
		<td><input type="text" name="vname_input"></td>
	</tr>
    <tr>
		<td>Nachname:</td>
		<td><input type="text" name="nname_input"></td>
	</tr>
    <tr>
		<td>Klasse:</td>
		<td><?php echo $klasse_pulldown ?></td>
	</tr>
    <tr>
        <td><input type="submit" value="Suchen" name="search" /></td>
    </tr>
</table>

</body>
</html>
