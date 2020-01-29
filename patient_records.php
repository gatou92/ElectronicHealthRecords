<?php

$sql22="select *,users.idclinic as idcl from users where id=$userid";
$res22=mysql_query($sql22);
$row22=mysql_fetch_array($res22);


$sql33="select * from record where idclinic=$row22[idcl] and releasedate>Now()";
$res33=mysql_query($sql33);
echo "<table style='border: 1px solid black; width:100%;'>";
echo "<tr><td ><b>Entry Date</b></td><td><b>Visit Reason</b></td><td><b>Diagnosis</b></td><td><b>Name Clinic</b></td><td></td></tr>";

while($row33=mysql_fetch_array($res33))
{
  echo "<tr style='border: 1px solid black;'><td >$row33[entrydate]</td><td>$row33[visitreason]</td><td>$row33[diagnosis]</td>";

$sql44="select *,clinic.name as clname from clinic where id=$row33[idclinic]";
$res44=mysql_query($sql44);
$row44=mysql_fetch_array($res44);
 echo "

  <td>$row44[clname]</td>";
  echo "<td>
  <form action='index.php?pg=27' method=post name=frm$row33[id]  style='display:inline;'>  
  <input type=hidden value=$row33[id] name=vid>
  <input type=submit value='View Record' name=profile  class=sedelbtn></td></tr>
  </form></td></tr>
  ";

}
echo "</table>";



?>