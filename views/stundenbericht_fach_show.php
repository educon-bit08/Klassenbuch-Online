<?php

include ('pulldown_function.php');

$fach_name=array('Fach');
$fach_options=array(0 => ' ', 1 => 'Mathe',2 => 'SL', 3 => 'Englisch');         //Werte des Faecher-Arrays

$fach_pulldown=pulli($fach_name,$fach_options);

?>

<html>
<head>
<title>Stundenbericht - Fachspezifisch</title>
</head>
<body link="#000000" alink="#000000" vlink="#000000">

<h2>Stundenbericht - Fachspezifisch</h2>

<table border="0">
    <tr>
        <td>Woche von <input type="text" maxlength="10" size="10" value=""> bis <input type="text" maxlength="10" size="10" value=""></td>
        <td>&nbsp; Fach: <?php echo $fach_pulldown  ?></td>
        <td>&nbsp; <input type="button" name="accept" value="best&auml;tigen"></td>
    </tr>
    <tr>
        <td align="right"><div style="font-size:11px;">Eingabeformat: JJJJ-MM-TT; 2009-06-23</div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>

<br>
<br>

<table border="1">
    <tr align="center">
        <td>Tag</td>
        <td>Std.</td>
        <td>Fach</td>
        <td>Unterrichtsgegenstand</td>
        <td>Hausaufgaben</td>
        <td>An- und Abwesenheit</td>
        <td>Unterschrift</td>
    </tr>
    <tr align="center">
        <td rowspan="6">Mo.</td>
        <td>1</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td>Matche</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>bla</td>
    </tr>
                                                                                <!--Dienstag-->
    <tr align="center">
        <td rowspan="6">Di.</td>
        <td>1</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td>Matche</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>bla</td>
    </tr>
                                                                                <!--Mittwoch-->
    <tr align="center">
        <td rowspan="6">Mi.</td>
        <td>1</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td>Matche</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>bla</td>
    </tr>
                                                                                <!--Donnerstag-->
    <tr align="center">
        <td rowspan="6">Do.</td>
        <td>1</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td>Matche</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>bla</td>
    </tr>
                                                                                <!--Freitag-->
    <tr align="center">
        <td rowspan="6">Fr.</td>
        <td>1</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td>Matche</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>bla</td>
    </tr>
                                                                                <!--Samstag-->
    <tr align="center">
        <td rowspan="6">Sa.</td>
        <td>1</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td>Matche</td>
        <td>bla, bla, bla</td>
        <td>bla, bla, bla</td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td>Matche</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>bla</td>
    </tr>
</table>
<br>
<form>
<input type="button" value=" drucken " onClick="javascript:window.print()"></form>

</body>
</html>