<html>
<head>
<title>News</title>
</head>
<body>

<h2>News erstellen</h2>
<br>
<br>
<form action="index.php?action=save&what=news" method="post">
<table border="1" style="border-collapse:collapse;">
    <tr>
        <td valign="middle" style="border-width:4px; border-color:#cf8989; border-style:solid; padding:0px;">
        <b>Titel:<input name="new_news_title" size="60" maxlength="60"></b></td>
    </tr>
    <tr>
        <td valign="top" style="border-width:4px; border-color:#cf8989; border-style:solid; padding:0px;">
           <b>Text:</b><br><textarea name="new_news_create" rows="10" cols="60"></textarea>
        </td>
    </tr>
</table>
<br>
<input type="reset" name="new_news_cancel" value="abbrechen">
<input type="submit" name="new_news_accept" value="&uuml;bernehmen">
</form>
</body>
</html>