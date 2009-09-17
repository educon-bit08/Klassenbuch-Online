<?php

   $GEBOREN="30.12.1990";
   $strlen=strlen($GEBOREN);
   $f=0;
   for($i=0;$i<$strlen;$i=$i+2)
   {
     $array=substr($GEBOREN, $i, 2);
     $zahl[$f]=$array;
     $f++;
   }

   $JAHR="$zahl[3]$zahl[4]";
   $CHJAHR="$zahl[3]$zahl[4]";
   $mon = getdate();
   $yjahr=$mon['year'];
   $alter=$yjahr-$JAHR;


   $birth_day   = explode(".", $GEBOREN);
   $birth_year  = substr("0" . $GEBOREN, -2);

   $d=date("d");
   $m=date("m");
   $y=date("Y");

  $t=0;
  if ($birth_day[1]>$m)
  {
   $t=$t-1;
  }
  else if ($m==$birth_day[1] AND $birth_day[0]<$d)
  {
    $t=$t-1;
  }

  $alter=$alter+$t;

   echo "    Geburtstag: $GEBOREN

             Datum: $d.$m.$y

             Alter: $alter";

?>