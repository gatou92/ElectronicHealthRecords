<?php

$critiria=" ";
if (isset($_POST['search']))
{
 $critiria=" where lastname like '$_POST[slname]%' ";

}

if (isset($_POST['delete']))
{
  $sql55="delete from patient where id=$_POST[vid]";
  mysql_query($sql55);
}


$sql33="select *,patient.id as idp from patient $critiria order by lastname";
$res33=mysql_query($sql33);
echo "<table style='border: 1px solid black; width:100%;'>";
echo "<tr><td ><b>Lastname</b></td><td><b>Firstname</b></td><td><b>fathername</b></td><td><b>Phone</b></td><td><b>Action</b></td></tr>";
echo "
<form action='' method=post>
<tr  style='border: 1px solid black;'><td><input type=text size=5 name=slname  value=Search... onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
></td><td></td><td></td><td></td><td>
<input type=submit name=search value=Search class=sedelbtn></td></tr>
</form>";
while($row33=mysql_fetch_array($res33))
{
  echo "<tr style='border: 1px solid black;'><td>$row33[lastname]</td><td>$row33[firstname]</td><td>$row33[fathername]</td><td>$row33[phone]</td><td>
               

  
<form action='index.php?pg=26' method=post name=frm$row33[idp] style='display:inline;'>
  <input type=hidden value=$row33[idp] name=vid>
  <input type=submit value='View Profile' name=Profile  class=sedelbtn>
  </form>
 
";

}
echo "</table>";



?>