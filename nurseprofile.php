
<script language=javascript>
function check()
{

var f=0;
var msg="";
	if (document.getElementById("iemail").value=="")
	{
		f=1;
		msg=msg+"You must give email!\n";
	}
	
   if ((document.getElementById("iemail").value.indexOf('@')<0 || document.getElementById("iemail").value.indexOf('.')<0) && f!=1)
	{
		f=1;
		msg=msg+"You must give a valid email!\n";
	}

	
	
	if (document.getElementById("iphone").value!="")
	{
		
		if (document.getElementById("iphone").value.length<10 || document.getElementById("iphone").value.length>13)
		{
		f=2;
		msg=msg+"You must give a valid phone!\n";
		}
		else
		if (isNaN(document.getElementById("iphone").value))
		{
		f=2;
		msg=msg+"You must give a valid phone!\n";
		}
		
		 
	}
	
	if (f>0) {alert(msg); return false;}
	else return true;
}


</script>
<?php



if (isset($_POST['vupdateprofile']))
{
if ($_POST['vpass']=="")
{
 $sql55="update users set 
   email='$_POST[vemail]',
   fname='$_POST[vfirstname]',
   lname='$_POST[vlastname]',
   hiredate='$_POST[vhiredate]',
   officephone='$_POST[vphone]',
   idclinic='$_POST[vidclinic]'
   where id=$userid";
 
  mysql_query($sql55);
}

else
{
   $sql55="update users set 
   email='$_POST[vemail]',
   password='".md5($_POST['vpass'])."',
   fname='$_POST[vfirstname]',
   lname='$_POST[vlastname]',
   hiredate='$_POST[vhiredate]',
   officephone='$_POST[vphone]',
   idclinic='$_POST[vidclinic]'
   where id=$userid";
 mysql_query($sql55);
 echo $_POST['vpass'];
 }
}

$sql44="select *,users.idclinic as idcl from users where id=$userid";
$res44=mysql_query($sql44);
$row44=mysql_fetch_array($res44);




echo"

<form action='index.php?pg=5' method=post onsubmit='return check();'>
<table>
<tr><td>email*:</td><td><input type=text name=vemail id=iemail value='$row44[email]'></td></tr>
<tr><td>password*:</td><td><input type=password name=vpass id=ipass></td></tr>
<tr><td>Firstname:</td><td><input type=text name=vfirstname value='$row44[fname]'></td></tr>
<tr><td>Lastname:</td><td><input type=text name=vlastname value='$row44[lname]'></td></tr>
<tr><td>Hire Date: </td><td><input type=date name=vhiredate value='$row44[hiredate]'></td></tr>
<tr><td>Clinic:</td><td>";


?>



<select  name=vidclinic >
<?php
$sql="select * from clinic where id=$row44[idcl]";
$res=mysql_query($sql);
while ($row=mysql_fetch_array($res))
{
echo "<option value=$row[id]>$row[name]</option>
	  <option value=''>_________</option>";

}


?>


<?php
$sql9="select * from clinic";
$res9=mysql_query($sql9);
while ($row9=mysql_fetch_array($res9))
{
echo "<option value=$row9[id]>$row9[name]</option>";

}
?>

</select>

<?php
echo"









</td></tr>
<tr><td>Mobile Phone:</td><td><input type=text name=vphone id=iphone value='$row44[officephone]'></td></tr>

<tr><td colspan=2><input type=submit name=vupdateprofile class='savebtn' value='Save Changes'></td></tr>
</table>
</form>


";





?>



