
<?php

if (isset($_POST['vdischarge']))
  {

   
   $sql65="update record set 
   rfidcode='$_POST[vrfidcode]'
   where id=$_POST[vidr]";
   mysql_query($sql65);
   echo"The Discharge was succesful";
  
  }


if (isset($_POST['vupdateprofile']))
{
   $sql55="update record set 
   entrydate='$_POST[ventrydate]',
   releasedate='$_POST[vreleasedate]',
   visitreason='$_POST[vvisitreason]',
   diagnosis='$_POST[vdiagnosis]'
   where id=$_POST[vidr]";
 mysql_query($sql55);
 }

if (isset($_POST['vinsertactivity']))
{



// parinei to xrono gia min exoume idia photo
  $t=time();
  
  // thetoume tis photo kenes (metavlites) - afora to onoma arxeiou
  $photo1="";
  $photo2="";
  
  
  
  // an exoume orisei photo1 
   if($_FILES['photo1']['name']!="") {
// anevazei me to neo onoma arxeio kai apothevo sto photo1
      move_uploaded_file($_FILES['photo1']['tmp_name'],"files/".$t.$_FILES['photo1']['name']);
     $photo1=$t.$_FILES['photo1']['name'];
   }

      if($_FILES['photo2']['name']!="") {

      move_uploaded_file($_FILES['photo2']['tmp_name'],"files/".$t.$_FILES['photo2']['name']);
     $photo2=$t.$_FILES['photo2']['name'];
   }



$sql22="insert into activity(category,image1,image2,description,startdate,enddate,idclinic,id_record,id_physician,id_patient) 
values ('$_POST[vcategory]','$photo1','$photo2','$_POST[vdescription]','$_POST[vstartdate]','$_POST[venddate]','$_POST[vidclinic]','$_POST[vrid]','$userid','$_POST[vidpat]')";

if (mysql_query($sql22)) { goto label;} 

 }



label:

$sql99="select *,rfid_connection.rfidcode as ridc from rfid_connection where id_user=$userid";
$res99=mysql_query($sql99);
$row99=mysql_fetch_array($res99);


$sql44="select *,record.idpatient as idp,record.rfidcode as recirfd, record.id as idr,record.idclinic as idcl from record where rfidcode=$row99[ridc]";
$res44=mysql_query($sql44);
$row44=mysql_fetch_array($res44);


$sql66="select *,patient.lastname as lnm, patient.firstname as fnm from patient where id=$row44[idp]";
$res66=mysql_query($sql66);
@$row66=mysql_fetch_array($res66);


$sql77="select *,activity.id_physician as idph from activity where id_record=$row44[idr]";
$res77=mysql_query($sql77);


if($row99['ridc']==0){


echo"<h1>Αναμονή για έγκυρη ετικέτα.</h1>";

}

else if ($row44['rfidcode']==0){echo"<h1>Αναμονή για έγκυρη ετικέτα.</h1>";}

else{

echo"

<h1 id=reg style='color:black;'>Patient Record for patient:<b>$row66[lnm]  $row66[fnm]</b></h1>
<form action='index.php?pg=32' method=post enctype='multipart/form-data'>
<table>
<tr>
<td>Entrydate: </td><td><input type=date name=ventrydate value='$row44[entrydate]'></td>
</tr>
<tr>
<td>Releasedate: </td><td><input type=date name=vreleasedate value='$row44[releasedate]'></td>
</tr>
<tr>
<td>Visitreason: </td><td><input type=text name=vvisitreason value='$row44[visitreason]'></td>
</tr>
<tr>
<td>Diagnosis: </td><td><input type=text name=vdiagnosis value='$row44[diagnosis]'></td>
</tr>

 <input type=hidden value=$row44[idr] name=vidr>

<tr><td colspan=2><input type=submit name=vupdateprofile class='savebtn' value='Save Changes'></td></tr>
</table>
</form>
";



echo "
<br>
 <form action='index.php?pg=32' method=post enctype='multipart/form-data'>  
 <input type=hidden value=$row44[idr] name=vidr>
 <input type=hidden value=0 name=vrfidcode>
 <input type=submit name=vdischarge class='savebtn' value='Discharge'>
 </form>

<br>
 <form action='index.php?pg=32' method=post   style='display:inline;'>  
  <input type=hidden value=$row44[idp] name=vid>
  <input type=submit value='Patient History' name=history  class=sedelbtn></td></tr>
  </form>

<br>
<h1 text-align='center'>Activities</h1>
<form action='index.php?pg=32' method=post enctype='multipart/form-data'>

<table style='border: 1px solid black;'>

<tr><td ><b>Category</b></td><td><b>Description</b></td><td><b>Start Date</b></td><td><b>End Date</b></td><td><b>Images</b></td><td></td><td></td></tr>

<tr>
<td><select name=vcategory >
                      
                      <option value=Prescription>Prescription</option>
                      <option value=Diagnosis>Diagnosis</option>
                  </select></td>

<td><input type=text name=vdescription value='Description' 
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"></td>


<td><input type=date name=vstartdate value='Now()' 
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"></td>

<td><input type=date name=venddate value='enddate' 
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"></td>


<td><input type=file accept='image/*' name=photo1><br>
<input type=file accept='image/*' name=photo2></td>


<td><input type=submit name=vinsertactivity class='savebtn' value='Insert'></td>


<td>
<input type=hidden name=vidclinic value=$row44[idcl] >
<input type=hidden name=vrid value=$row44[idr] >
<input type=hidden name=vidpat value=$row44[idp] >
</td></tr>
</form>
";


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

}

?>