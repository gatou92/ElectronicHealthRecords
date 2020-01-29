<?php


$sql11="select *,users.idclinic as idclu from users where id=$userid";
$res11=mysql_query($sql11);
$row11=mysql_fetch_array($res11);

$sql77="select *,activity.id_physician as idph ,activity.id_record as idreca from activity where idclinic=$row11[idclu] and enddate>Now() order by startdate desc";
$res77=mysql_query($sql77);

echo "
<h1 text-align='center'>Activities</h1>

<table style='border: 1px solid black; width: 100%;'>

<tr><td ><b>Category</b></td><td ><b>Last name</b></td><td ><b>First name</b></td><td><b>Description</b></td><td><b>Start Date</b></td><td><b>End Date</b></td><td><b>Images</b></td><td></td><td></td></tr>


";

while($row77=mysql_fetch_array($res77))
{


$sql44="select *,record.idpatient as idp, record.id as idr,record.idclinic as idcl from record where id=$row77[idreca]";
$res44=mysql_query($sql44);
$row44=mysql_fetch_array($res44);


$sql66="select *,patient.lastname as lnm, patient.firstname as fnm from patient where id=$row44[idp]";
$res66=mysql_query($sql66);
$row66=mysql_fetch_array($res66);

  echo "<tr style='border: 1px solid black;'><td>$row77[category]</td><td>$row66[lnm]</td><td>$row66[fnm]</td><td>$row77[description]</td><td>$row77[startdate]</td><td>$row77[enddate]</td><td>";
  if ($row77['image1']!='') echo "<a href='files/$row77[image1]' target=_blank><img src='files/$row77[image1]' width=80></a>";
if ($row77['image2']!='') echo "<a href='files/$row77[image2]' target=_blank><img src='files/$row77[image2]' width=80></a>";
echo "</td>

";
$sql88="select *,users.lname as lnmu from users where id=$row77[idph]";
$res88=mysql_query($sql88);
$row88=mysql_fetch_array($res88);
echo "


<td>From: $row88[lnmu]</td><td></td>
               </tr>
  ";

}


echo "</table>";





?>

