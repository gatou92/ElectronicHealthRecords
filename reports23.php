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
id_categories=categories.id and type=0 ".$critiria." order by reports.id desc ";
$res331=mysql_query($sql331);

	if($a>mysql_num_rows($res331)) $a=$a-$pgn;
	if($a<0) $a=0;
	
}
else
{
$a=0;

}

$sql33="select *,reports.description as dcr, reports.id as idv from reports,categories where 
id_categories=categories.id and type=0 ".$critiria." order by reports.id desc limit $a,$pgn";
$res33=mysql_query($sql33);
echo "<table style='border: 1px solid black; width:100%;'>";
echo "<tr><td ><b>id</b></td><td><b>Κατηγορία</b></td><td><b>Description</b></td><td><b>Ημερομηνία Καταχώρησης</b></td><td></td></tr>";
echo "
<form action='' method=post>
<tr  style='border: 1px solid black;'><td></td><td><input type=text size=5 name=katigoria ></td><td></td><td></td><td>
<input type=submit name=search value='Search' class=sedelbtn></td></tr>
</form>";
while($row33=mysql_fetch_array($res33))
{
  echo "<tr style='border: 1px solid black;'><td >$row33[idv]</td><td>$row33[name]</td><td>$row33[dcr]</td><td>$row33[date1]</td>";
  
  if ($usertype==1)
  echo"
  <td>
  <form action='index.php?pg=25' method=post name=frm$row33[idv] style='display:inline;'>
  <input type=hidden value=$row33[idv] name=vid>
  <input type=submit value='Λεπτομέρειες' name=details  class=sedelbtn>
  </form>
  </td>
  ";

  else
  echo"
  <td>  </td>
  ";
  
  
  
}
echo "</table>";

$b=$a+$pgn;
$c=$a-$pgn;
echo "<a href='index.php?pg=23&a=$c'>Προηγούμενο</a>&nbsp&nbsp";echo "<a href='index.php?pg=23&a=$b'>Επόμενο</a>";



?>