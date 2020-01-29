<?php

$critiria=" ";
if (isset($_POST['search']))
{
 $critiria=" and name like '$_POST[katigoria]%' ";

}
// selidopoiisi
$pgn=4;
if(isset($_GET['a']))
{
	$a=$_GET['a'];
	
	$sql331="select *,reports.description as dcr, reports.id as idv from reports,categories where 
id_categories=categories.id ".$critiria." and id_user=$userid order by reports.id";
$res331=mysql_query($sql331);

	if($a>mysql_num_rows($res331)) $a=$a-$pgn;
	if($a<0) $a=0;
	
}
else
{
$a=0;

}

$sql33="select *,reports.description as dcr, reports.id as idv from reports,categories where 
id_categories=categories.id ".$critiria." and id_user=$userid order by reports.id desc limit $a,$pgn";
$res33=mysql_query($sql33);

echo "<table style='border: 1px solid black; width:100%;'>";
echo "<tr><td ><b>id</b></td><td><b>Κατηγορία</b></td><td><b>Description</b></td><td><b>Ημερομηνία Καταχώρησης</b></td><td><b>Ημερομηνία Επίλυσης</b></td><td></td></tr>";
echo "
<form action='' method=post>
<tr  style='border: 1px solid black;'><td></td><td><input type=text size=5 name=katigoria ></td><td></td><td></td><td></td><td>
<input type=submit name=search value='Search' class=sedelbtn></td></tr>
</form>";
while($row33=mysql_fetch_array($res33))
{
  echo "<tr style='border: 1px solid black;'><td >$row33[idv]</td><td>$row33[name]</td><td>$row33[dcr]</td><td>$row33[date1]</td><td>$row33[date2]</td>";
  echo"
  <td>
  
  </td>
  ";

}
echo "</table>";
$b=$a+$pgn;
$c=$a-$pgn;
echo "<a href='index.php?pg=24&a=$c'>Προηγούμενο</a>&nbsp&nbsp";echo "<a href='index.php?pg=24&a=$b'>Επόμενο</a>";



?>