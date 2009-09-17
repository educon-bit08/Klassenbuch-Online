<html>
<head>
<title>News</title>
</head>
<body>

<h2>News</h2>
<br>
<br>
<table border="1" style="border-collapse:collapse;">
    <tr>
        <td valign="middle" style="border-width:4px; border-color:#cf8989; border-style:solid; padding:0px;">
        <b><?php echo $n->getTitle(); ?></b></td>
    </tr>
    <tr>
        <td style="border-width:4px; border-color:#cf8989; border-style:solid; padding:0px; width:600px">
            <?php
			echo $n->getTextfield();
            ?>
        </td>
    </tr>

</table>

</body>
</html>