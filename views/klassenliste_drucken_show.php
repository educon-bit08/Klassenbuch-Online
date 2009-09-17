<?php

include ('kuhl-test.php');
include ('pulldown_function.php');

$klasse_name=array('Klasse');
$klasse_options=array(0=> ' ', 1 => 'BIT06/1P', 2 => 'BIT07/1P', 3 => 'BIT08/1P'); //Werte des Klasse-Arrays

$klasse_pulldown=pulli($klasse_name,$klasse_options);

$anzahl=count($schueler);
	for ($i=0;$i<$anzahl;$i++)
	{
		$schleife .=  "<tr><td><input type='text' value='".$schueler[$i]['nachname'].",&nbsp;".$schueler[$i]['vorname']."' readonly='readonly' style='border-style:none;height:20px;'></td>";
	}
?>

<html>
<head>
<title>Klassenliste zum drucken</title>
</head>
<body>

<h2>Klassenliste zum Drucken</h2>

Klasse: <?php echo $klasse_pulldown; ?>
<br>
<br>

<table border="1" style="border-collapse:collapse;">
    <tr>
        <th valign="middle">Name</th>
        <td>&nbsp;</td>
    </tr>
    <tr>
    <?php echo $schleife; ?>
        <td style="width:300px;"></td>
    </tr>
</table>
<br>
<form>
<input type="button" value=" drucken " onClick="javascript:window.print()"></form>
</body>
</html>