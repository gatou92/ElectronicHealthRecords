<?php



$sql44="select *,record.idpatient as idp from record where id=$_POST[vid]";
$res44=mysql_query($sql44);
$row44=mysql_fetch_array($res44);


$sql55="select *,patient.lastname as lnm from patient where id=$row44[idp]";
$res55=mysql_query($sql55);
$row55=mysql_fetch_array($res55);


echo"

<h1 id=reg style='color:black;'>Patient Record for patient: $row55[lnm]</h1>
<form action='index.php?pg=25' method=post enctype='multipart/form-data'>
<table>
<tr>
<td>Entrydate: </td><td>$row44[entrydate]</td>
</tr>
<tr>
<td>Releasedate: </td><td>$row44[releasedate]</td>
</tr>
<tr>
<td>Visitreason: </td><td>$row44[visitreason]</td>
</tr>
<tr>
<td>Diagnosis: </td><td>$row44[diagnosis]</td>
</tr>
<tr>
<td>Description: </td><td>$row44[description]</td>
</tr>
<tr>
<td>Medical treatment1: </td><td>$row44[medicine1]</td></tr>
<tr>
<td>Medical treatment2: </td><td>$row44[medicine2]</td></tr>
<tr>
<td>Medical treatment3: </td><td>$row44[medicine3]</td></tr>
</tr>
</table>
</form>


";


?>

