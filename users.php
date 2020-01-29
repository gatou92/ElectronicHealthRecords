<?php

$critiria=" ";
if (isset($_POST['search']))
{
 $critiria=" where email like '$_POST[smemail]%' ";

}

if (isset($_POST['delete']))
{
  $sql55="delete from users where id=$_POST[vid]";
  mysql_query($sql55);

}

if (isset($_POST['reset']))
{
 $sql55="update users set password='".md5('0000')."' where id=$_POST[vid]";
  mysql_query($sql55);


}

if (isset($_POST['vtype']))
{
 $sql55="update users set type='$_POST[vtype]' where id=$_POST[vid]";
  mysql_query($sql55);


}


$sql33="select * from users $critiria order by email";
$res33=mysql_query($sql33);
echo "<table style='border: 1px solid black; width:100%;'>";
echo "<tr><td ><b>e-mail</b></td><td><b>Firstname</b></td><td><b>Lastname</b></td><td><b>Phone</b></td><td><b>Hire Date</b></td><<td><b>Type</b></td><td><b>Action</b></td></tr>";
echo "
<form action='' method=post>
<tr  style='border: 1px solid black;'><td><input type=text size=5 name=smemail ></td><td></td><td></td><td></td><td></td><td></td><td>
<input type=submit name=search value='Search' class=sedelbtn></td></tr>
</form>";
while($row33=mysql_fetch_array($res33))
{
  echo "<tr style='border: 1px solid black;'><td >$row33[email]</td><td>$row33[fname]</td><td>$row33[lname]</td><td>$row33[officephone]</td><td>$row33[hiredate]</td>";
  echo "<form action=''  method=post name=frm2_$row33[id]>";
  echo "<input type=hidden value=$row33[id] name=vid>";
  if ($row33['type']==0) echo "<td><select name=vtype onchange='this.form.submit();'>
                      <option value=0>User</option>
                      <option value=2>Physician</option>
                      <option value=3>Nurse</option>
                  </select></td>";
  if ($row33['type']==1) echo "<td><select name=vtype onchange='this.form.submit();'>
											<option value=1>Admin</option>
											<option value=2>Physician</option>
									</select></td>";
  if ($row33['type']==2)echo "<td><select name=vtype  onchange='this.form.submit();'>
											<option value=2>Physician</option>
											<option value=1>Admin</option>
									</select></td>";
  if ($row33['type']==3)echo "<td><select name=vtype  onchange='this.form.submit();'>
                      <option value=3>Nurse</option>
                      <option value=2>Physician</option>
                  </select></td>";                
 echo "</form>";
  echo "<td>
  
  <form action='' method=post name=frm$row33[id] style='display:inline;'>
  <input type=hidden value=$row33[id] name=vid>
  <input type=submit value='Reset Password' name=reset  class=sedelbtn>
  </form>

  <form action='' method=post name=frm$row33[id]  style='display:inline;'>  
  <input type=hidden value=$row33[id] name=vid>
  <input type=submit value='Delete' name=delete  class=sedelbtn>
  </form>

  <form action='index.php?pg=28' method=post name=frm$row33[id]  style='display:inline;'>  
  <input type=hidden value=$row33[id] name=vid>
  <input type=submit value='View Profile' name=profile  class=sedelbtn></td></tr>
  </form></td></tr>
  ";

}
echo "</table>";



?>