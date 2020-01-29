
<?php

if (isset($_POST['vreg']))
{
$sql2="insert into record(entrydate,visitreason,idclinic,idpatient,diagnosis,releasedate,rfidcode) 
values (Now(),'$_POST[vvisitreason]','$_POST[vidclinic]','$_POST[vid]','$_POST[vdiagnosis]','$_POST[vreleasedate]','$_POST[vrfidcode]')";

   if (mysql_query($sql2)) echo "<font color=#2da800>The record creation was successful";
   else echo "<font color=red>ERROR creating patient record!</font>";
}
else


{
$sql="select *,patient.id as idp from patient where patient.id=$_POST[vid]";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);

?>

<?php

// akolouthei forma eggrafis
echo"
<br>
<br>

<h3 style='color:#003399;'>Create new record for patient:<b> $row[lastname] $row[firstname]</b></h3>

<form action='index.php?pg=23' method=post onsubmit='return check();'>
<table>
<tr><td width=\"150px\"><input type=text name=vvisitreason value='Visit reason'
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>
</tr>

<tr><td width=\"150px\"><input type=text name=vdiagnosis value=Diagnosis
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>
</tr>

<tr>
<td>Releasedate: <input type=date name=vreleasedate value=''></td>
</tr>


<tr>
<td width=\"150px\"><input type=text name=vrfidcode value='RFID Code'
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>
</tr>


<tr><td>Clinic: ";
?>



<select  name=vidclinic >
<?php
$sql="select * from clinic";
$res=mysql_query($sql);
while ($row=mysql_fetch_array($res))
{
echo "<option value=$row[id]>$row[name]</option>";

}
?>
</select>

<?php
echo"

<input type=hidden name=vid value=$_POST[vid] >
</tr>

<tr><td ><br><input type=submit class='loginbtn' name=vreg value='Create'></td></tr>
</table>
</form>
";


}
?>
