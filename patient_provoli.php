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
echo "<tr><td ><b>Lastname</b></td><td><b>Firstname</b></td><td><b>Fathername</b></td><td><b>Phone</b></td><td><b>Action</b></td></tr>";
echo "
<form action='' method=post>
<tr  style='border: 1px solid black;'><td><input type=text size=5 name=slname  value=Search... onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td><td></td><td></td><td></td><td>
<input type=submit name=search value=Search class=sedelbtn></td></tr>
</form>";
while($row33=mysql_fetch_array($res33))
{
  echo "<tr style='border: 1px solid black;'><td>$row33[lastname]</td><td>$row33[firstname]</td><td>$row33[fathername]</td><td>$row33[phone]</td>";
  echo "<form action=''  method=post name=frm2_$row33[id]>";
                  
 echo "</form>";
  echo "<td>
  

  <form action='' method=post name=frm$row33[id]  style='display:inline;'>  
  <input type=hidden value=$row33[id] name=vid>
  <input type=submit value='Delete' name=delete  class=sedelbtn>
  </form>

  <form action='index.php?pg=23' method=post name=frm$row33[idp] style='display:inline;'>
  <input type=hidden value=$row33[idp] name=vid>
  <input type=submit value='Create Record' name=details  class=sedelbtn>
  </form>

  <form action='index.php?pg=24' method=post name=frm$row33[idp] style='display:inline;'>
  <input type=hidden value=$row33[idp] name=vid>
  <input type=submit value='Patient Profile' name=Profile  class=sedelbtn>
  </form>

  </td>

  </tr>
  
  ";

}
echo "</table>";



?>