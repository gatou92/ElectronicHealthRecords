<?php

$critiria=" ";
if (isset($_POST['search']))
{
 $critiria=" and category like '$_POST[scategory]%' ";

}


$sql77="select *,activity.id_physician as idph from activity where id_patient=$_POST[vid] $critiria order by startdate desc";
$res77=mysql_query($sql77);

echo "
<br>
<br>
<h1 text-align='center'>History</h1>
<form action='' method=post enctype='multipart/form-data'>

<table style='border: 1px solid black; width: 100%; '>

<tr><td ><b>Category</b></td><td><b>Description</b></td><td><b>Start Date</b></td><td><b>End Date</b></td><td><b>Images</b></td><td></td><td></td></tr>


";

echo "
<form action='' method=post>
<tr  style='border: 1px solid black;'><td><input type=text size=5 name=scategory ></td><td></td><td></td><td></td><td></td><td></td><td>
<input type=submit name=search value='Search' class=sedelbtn></td>
<input type=hidden name=vid value=$_POST[vid] >
</tr>

</form>";


while($row77=mysql_fetch_array($res77))
{
  echo "<tr style='border: 1px solid black;'><td>$row77[category]</td><td>$row77[description]</td><td>$row77[startdate]</td><td>$row77[enddate]</td><td>";
  if ($row77['image1']!='') echo "<a href='files/$row77[image1]' target=_blank><img src='files/$row77[image1]' width=80></a>";
if ($row77['image2']!='') echo "<a href='files/$row77[image2]' target=_blank><img src='files/$row77[image2]' width=80></a>";
echo "</td>

";
$sql88="select *,users.lname as lnm from users where id=$row77[idph]";
$res88=mysql_query($sql88);
$row88=mysql_fetch_array($res88);
echo "


<td>From: $row88[lnm]</td><td></td>
               </tr>
  ";

}


echo "</table>";





?>

