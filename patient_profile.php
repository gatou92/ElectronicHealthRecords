<script language=javascript>
// mia synartisi check elegxei an exoume mail tilefono k.l.p.
function check()
{
// me f=0 ola sosta me f=1 einai provlima email allios lathos kai f=2 
var f=0;
var msg="";

  
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
   $sql55="update patient set 
   firstname='$_POST[vfirstname]',
   lastname='$_POST[vlastname]',
   fathername='$_POST[vfathername]',
   amka='$_POST[vamka]',
   country='$_POST[vcountry]',
   city='$_POST[vcity]',
   language='$_POST[vlanguage]',
   street='$_POST[vstreet]',
   zipcode='$_POST[vzipcode]',
   occupation='$_POST[voccupation]',
   email='$_POST[vemail]',
   phone='$_POST[vphone]',
   mobile='$_POST[vmobile]',
   dateofbirth='$_POST[vdateofbirth]'
   where id=$_POST[vid]";
 mysql_query($sql55);
 }

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
<form action='index.php?pg=27' method=post name=frm$row66[idr] style='display:inline;'>
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

 <form action='index.php?pg=91' method=post name=frm$row44[id]  style='display:inline;'>  
  <input type=hidden value=$row44[idp] name=vid>
  <input type=submit value='Patient History' name=history  class=sedelbtn></td></tr>
  </form>
  <br>



<h1 id=reg style='color:black;'>Patient Profile:</h1>
<form action='index.php?pg=24' method=post onsubmit='return check();'>
<table>
<tr>
<td>Firstname: </td><td><input type=text name=vfirstname id=ifirstname value='$row44[firstname]'></td>
 </tr>

<tr>
<td>Lastname: </td><td><input type=text name=vlastname id=ilastname value='$row44[lastname]'></td>
 </tr>

<tr>
<td>Fathername: </td><td><input type=text name=vfathername id=ifathername value='$row44[fathername]'></td>
</tr>
<tr>
<td>AMKA: </td><td><input type=text name=vamka id=iamka value='$row44[amka]'></td>
</tr>


<tr>
<td>Country: </td><td><input type=text name=vcountry id=icountry value='$row44[country]'></td>
</tr>
<tr>
<td>City: </td><td><input type=text name=vcity id=icity value='$row44[city]'></td>
 </tr>
 <tr>
<td>Language: </td><td><input type=text name=vlanguage id=ilanguage value='$row44[language]'></td>
 </tr>
 <tr>
<td>Street: </td><td><input type=text name=vstreet id=istreet value='$row44[street]'></td>
 </tr>
 <tr>
<td>Zipcode: </td><td width=\"70px\"><input type=text name=vzipcode id=izipcode value='$row44[zipcode]'></td>

</tr>

<tr>
<td>Occupation: </td><td><input type=text name=voccupation id=ioccupation value='$row44[occupation]'></td>
</tr>
<tr>
<td>E-mail: </td><td><input type=email name=vemail id=iemail value='$row44[email]'></td>
 </tr>
 <tr>
<td>Phone: </td><td><input type=text name=vphone id=iphone value='$row44[phone]'></td>
</tr>
<tr>
<td>Mobile Phone: </td><td><input type=text name=vmobile id=imobile value='$row44[mobile]'></td>
</tr>
<tr>
<td><p>Date of Birth:</p></td><td><input type=date name=vdateofbirth id=idateofbirth value='$row44[dateofbirth]'></td>


</tr>

<tr><td>Gender: </td><td>$row44[gender]
</td>
</tr>
<tr>
<td>Blood Type: </td><td>$row44[bloodtype]
</td>
</tr>
<tr>
<td>RH factor: </td><td>$row44[rhfactor]
</td>
</tr>
<tr>
<input type=hidden name=vid value=$_POST[vid] >
</tr>

<tr><td colspan=2><input type=submit name=vupdateprofile class='savebtn' value='Save Changes'></td></tr>
</table>
</form>


";


?>

