<?php

$sql44="select *,patient.id as idp from patient where id=$_POST[vid]";
$res44=mysql_query($sql44);
$row44=mysql_fetch_array($res44);


$sql66="select *,record.id as idr,record.entrydate as edt from record where idpatient=$_POST[vid]";
$res66=mysql_query($sql66);



echo"<h1 id=reg style='color:black;'>Patient records:</h1>
<table>";

$counter=1;
while($row66=mysql_fetch_array($res66))
{


echo"
<tr>
<form action='index.php?pg=27' method=post target='_blank' name=frm$row66[idr] style='display:inline;'>
  <input type=hidden value=$row66[idr] name=vid>
  <input type=submit value='$counter.Record($row66[edt])' name=Profile  class=recordlbtn>
  </form>
</tr>
";  
$counter++;
}


echo"
</table>";




echo"

 <form action='index.php?pg=91' method=post target='_blank' name=frm$row44[id]  style='display:inline;'>  
  <input type=hidden value=$row44[idp] name=vid>
  <input type=submit value='Patient History' name=history  class=sedelbtn></td></tr>
  </form>
  <br>




<h1 id=reg style='color:black;'>Patient Profile:</h1>
<form action='index.php?pg=24' method=post>
<table>
<tr>
<td><b>Firstname: </td><td>$row44[firstname]</td>
</tr>
<tr>
<td><b>Lastname: </b></td><td>$row44[lastname]</td>
</tr>
<tr>
<td><b>Fathername: </td><td>$row44[fathername]</td>
</tr>
<tr>
<td><b>AMKA: </td><td>$row44[amka]</td>
</tr>


<tr>
<td><b>Country: </td><td>$row44[country]</td>
</tr>
<tr>
<td><b>City: </td><td>$row44[city]</td>
 </tr>
 <tr>
<td><b>Language: </td><td>$row44[language]</td>
 </tr>
 <tr>
<td><b>Street: </td><td>$row44[street]</td>
 </tr>
 <tr>
<td><b>Zipcode: </td><td>$row44[zipcode]</td>

</tr>

<tr>
<td><b>Occupation: </td><td>$row44[occupation]</td>
</tr>
<tr>
<td><b>E-mail: </td><td>$row44[email]</td>
 </tr>
 <tr>
<td><b>Phone: </td><td>$row44[phone]</td>
</tr>
<tr>
<td><b>Mobile Phone: </td><td>$row44[mobile]</td>
</tr>
<tr>
<td><b>Date of Birth:</td><td>$row44[dateofbirth]</td>


</tr>

<tr><td><b>Gender: </td><td>$row44[gender]
</td>
</tr>
<tr>
<td><b>Blood Type: </td><td>$row44[bloodtype]
</td>
</tr>
<tr>
<td><b>RH factor: </td><td>$row44[rhfactor]
</td>
</tr>
<tr>
<input type=hidden name=vid value=$_POST[vid] >
</tr>
</table>
</form>


";


?>

