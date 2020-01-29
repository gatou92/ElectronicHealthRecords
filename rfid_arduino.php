<?php

mysql_connect("localhost","root","");
mysql_select_db("hospital");
mysql_query("set names 'utf8'");

   $sql2="update rfid_connection set rfidcode='$_GET[rfidcode]' where id_user='$_GET[id_user]'";


 if (mysql_query($sql2)) echo "<font color=#2da800>The register was successful";
else echo "<font color=red>The patient already exists!</font>";

 
?>