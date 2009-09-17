<?php
$s=new Schueler();
$schuelers=$s->getAllAsObject();
foreach ($schuelers as $key=>$schueler) {
	$schuelers[1]->loadNotens();
}
$htmls = new HtmlSchueler($schuelers);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Notenliste</title>
    <link type="text/css" href="Style.css" rel="stylesheet" />
    <script type="text/javascript" src="Script.js"></script>
</head>
<body>
<h2>Notenliste</h2>
<br><br>
<form name="notenform" method="post" action="">
<table class="scrollTable" id="scrollTable" cellpadding="0" cellspacing="0" border="0">
  <tr>
  	<td>
  	<div class="corner">
  	  <table cellpadding="0" cellspacing="0" border="0">
		<tr>
		  <th><div><input class="tablehead" type="text" value="Sch&uuml;ler" readonly="readonly"></div></th>
		</tr>
	  </table>
  	</div>
  	</td>
  	<td>
  	<div class="headerRow">
  	  <table cellpadding="0" cellspacing="0" border="0">
		<tr>
		<?php echo $htmls->getDatum(); ?>
  	    </tr>
  	  </table>
  	</div>
  	</td>
  </tr>
  <tr>
  	<td valign="top">
  	<div class="headerColumn">
  	  <table cellpadding="0" cellspacing="0" border="0">
  	  
  	  <?php
  	  echo $htmls->getName();
  	  ?>
  	  
	  </table>	  
  	</div>
  	</td>
  	<td>
  	<div class="body">
  	  <table cellpadding="0" cellspacing="0" border="0">
  	  
  	  <?php
  	  echo $htmls->getPunkte();
  	  ?>
  	  </table>
  	</div>
  	</td>
  </tr>
</table><!--
<table id="filter" border="0">
	<tr>
		<td>Klasse:</td>
		<td><?php
		/*$anzahl=count($klasse);
		echo "<select class='pulldown'>";
		for ($i=0;$i<$anzahl;$i++)
		{
			echo "<option>".$klasse[$i]."</option>";
		}
		echo "</select>";
		?></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>Fach:</td>
		<td><?php
		$anzahl=count($faecher);
		echo "<select class='pulldown'>";
		for ($i=0;$i<$anzahl;$i++)
		{
			echo "<option>".$faecher[$i]."</option>";
		}
		echo "</select>";*/
		?></td>
	</tr>
</table>-->
<input type="submit" value="Speichern">
</form>
</body>
</html>
<script language="javascript">
	paddingLeft = 10;
	paddingRight = 10;
	paddingTop = 1;
	paddingBottom = 1;
	
	ScrollTableRelativeSize(
		document.getElementById("scrollTable"), 
		50, 
		120);
		
	/*ScrollTableAbsoluteSize(
		document.getElementById("scrollTable"), 
		500, 
		550);*/
</script>