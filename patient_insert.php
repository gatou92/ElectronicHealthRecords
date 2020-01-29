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

// an exoyme patisei register tote kanei insert ton xristi 
if (isset($_POST['vreg']))
{
$sql2="insert into patient(firstname,lastname,fathername,amka,gender,rhfactor,bloodtype,zipcode,occupation,phone,mobile,city,country,language,street,email,dateofbirth,type,insurer) 
values ('$_POST[vfirstname]','$_POST[vlastname]','$_POST[vfathername]','$_POST[vamka]','$_POST[vgender]','$_POST[vrhfactor]','$_POST[vbloodtype]','$_POST[vzipcode]','$_POST[voccupation]','$_POST[vphone]','$_POST[vmobile]','$_POST[vcity]','$_POST[vcountry]','$_POST[vlanguage]','$_POST[vstreet]','$_POST[vemail]','$_POST[vdateofbirth]',4,'$_POST[vinsurer]')";


if (mysql_query($sql2)) echo "<font color=#2da800>The register was successful";
else echo "<font color=red>The patient already exists!</font>";



}
else

// akolouthei forma eggrafis
echo"


<h1 id=reg style='color:black;'>Εγγραφή ασθενή:</h1>
<form action='index.php?pg=21' method=post onsubmit='return check();'>
<table>
<tr><td><input type=text name=vfirstname id=ifirstname value=Firstname
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>

<td><input type=text name=vlastname id=ilastname value=Lastname
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>
<td><input type=text name=vfathername id=ifathername value=Fathername
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>

<td><input type=text name=vamka id=iamka value=A.M.K.A
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>


</tr>


<tr><td><input type=text name=vcountry id=icountry value=Country
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>

<td><input type=text name=vcity id=icity value=City
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>
<td><input type=text name=vlanguage id=ilanguage value=language
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>
 
 <td><input type=text name=vstreet id=istreet value=Street
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>
<td width=\"70px\"><input type=text name=vzipcode id=izipcode value=Zipcode
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>

</tr>

<tr><td><input type=text name=voccupation id=ioccupation value=Occupation
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>

<td><input type=email name=vemail id=iemail value='E-mail'
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>
<td><input type=text name=vphone id=iphone value=Phone
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>

 <td><input type=text name=vmobile id=imobile value=Mobile
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>

 <td><input type=text name=vinsurer  value=Insurer
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td>

</tr>


<tr>


<td>
<p align=\"left\">Gender:</p> 
<input type=radio name=vgender value='Male'>Male 
<input type=radio name=vgender value='Female'>Female
<input type=radio name=vgender value='Other'>Other
</td>

<td>
<p align=\"left\">Blood Type:</p> 
<input type=radio name=vbloodtype value='A'>A
<input type=radio name=vbloodtype value='B'>B
<input type=radio name=vbloodtype value='AB'>AB
<input type=radio name=vbloodtype value='O'>O

</td>

<td>
<p align=\"left\">RH factor:</p> 
<input type=radio name=vrhfactor value='+'>+ 
<input type=radio name=vrhfactor value='-'>-
</td>


<td><p>Date of Birth:</p><input type=date name=vdateofbirth id=idateofbirth value='Date of birth' ></td>


</tr>

<tr>



</tr>

<tr><td ><input type=submit class='loginbtn' name=vreg value='Register'></td></tr>
</table>
</form>
";



?>
