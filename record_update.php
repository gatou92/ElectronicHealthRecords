<?php


$critiria=" ";
if (isset($_POST['search']))
{
 $critiria=" and category like '$_POST[scategory]%' ";

}

if (isset($_POST['vupdateprofile']))
{
   $sql55="update record set 
   entrydate='$_POST[ventrydate]',
   releasedate='$_POST[vreleasedate]',
   visitreason='$_POST[vvisitreason]',
   diagnosis='$_POST[vdiagnosis]'
   where id=$_POST[vid]";
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
values ('$_POST[vcategory]','$photo1','$photo2','$_POST[vdescription]',Now(),'$_POST[venddate]','$_POST[vidclinic]','$_POST[vrid]','$userid','$_POST[vidpat]')";

if (mysql_query($sql22)) { goto label;} 

 }

label:

$sql44="select *,record.idpatient as idp, record.id as idr,record.idclinic as idcl from record where id=$_POST[vid]";
$res44=mysql_query($sql44);
$row44=mysql_fetch_array($res44);


$sql66="select *,patient.lastname as lnm, patient.firstname as fnm , patient.id as idpat from patient where id=$row44[idp]";
$res66=mysql_query($sql66);
$row66=mysql_fetch_array($res66);


$sql77="select *,activity.id_physician as idph from activity where id_record=$row44[idr] $critiria order by startdate desc";
$res77=mysql_query($sql77);




echo"

<h1 id=reg style='color:black;'>Patient Record for patient:<b>$row66[lnm]  $row66[fnm]</b></h1>
<form action='index.php?pg=27' method=post enctype='multipart/form-data'>
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

<tr>
<input type=hidden name=vid value=$_POST[vid] >
</tr>

<tr><td colspan=2><input type=submit name=vupdateprofile class='savebtn' value='Save Changes'></td></tr>
</table>
</form>
";



echo "
<br>
 <form action='index.php?pg=91' method=post target='_blank' name=frm$row44[id]  style='display:inline;'>  
  <input type=hidden value=$row44[idp] name=vid>
  <input type=submit value='Patient History' name=history  class=sedelbtn></td></tr>
  </form>
<br>
<h1 text-align='center'>Activities</h1>
<form action='index.php?pg=27' method=post enctype='multipart/form-data'>

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
<input type=hidden name=vid value=$_POST[vid] >

<input type=hidden name=vidclinic value=$row44[idcl] >

<input type=hidden name=vidpat value=$row66[idpat] >

<input type=hidden name=vrid value=$row44[idr] >
</td></tr>







</form>
";

echo "
<form action='' method=post>
<tr  style='border: 1px solid black;'><td><input type=text size=5 name=scategory ></td><td></td><td></td><td></td><td></td><td>
<input type=submit name=search value='Search' class=sedelbtn></td>
<td>
<input type=hidden name=vid value=$_POST[vid] >

<input type=hidden name=vidclinic value=$row44[idcl] >

<input type=hidden name=vidpat value=$row66[idpat] >

<input type=hidden name=vrid value=$row44[idr] >
</td>

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

