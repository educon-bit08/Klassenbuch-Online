<html>
<head>
<title>Benutzer registrieren</title>
</head>
<body>

<h2>Exceldatei hochladen</h2>
<form method="post" action="index.php" enctype="multipart/form-data">
			<input type="hidden" name="action" value="save">
			<input type="hidden" name="what" value="excelfile">
			
            <input type="file" name="userfile" id="userfile" />
            <input type="submit" name="submit" value="submit" />
</form>


</body>
</html>