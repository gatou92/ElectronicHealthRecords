<article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Welcome </h2>
                                    </div>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
				
			
				
<?php

// an den exoyme syndethi
if ($login==0)
{
?>			
			

<div id=cont style='padding: 0 20px;'>
<form action='index.php' method=post>

<h1 style="color:black;">Σύνδεση:</h1>

<table>
<tr><td></td><td><input type=text name=vemail value="email" 
onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"></td></tr>

<tr><td></td><td><input type=text name=vpass value="Password" 
onfocus="if(this.value==this.defaultValue){this.value='';  this.setAttribute('type', 'password');}" onblur="if(this.value=='')this.value=this.defaultValue;"></td></tr>

<tr><td colspan=2 ><input type=submit class="loginbtn" name=vsend value='Login'  ></td></tr>
</table>
</form>
<br><br>
<hr>




<?php

// an exoyme patisei register tote kanei insert ton xristi 
if (isset($_POST['vreg']))
{
$sql2="insert into users(fname,lname,email,password,officephone,type) values ('$_POST[vfirstname]','$_POST[vlastname]','$_POST[vemail]','".md5($_POST['vpass'])."','$_POST[vphone]',0)";

if (mysql_query($sql2)) echo "<font color=#003399>Your account created. Please Login.";
else echo "<font color=red>Your email already exists !</font>";



}
else

// akolouthei forma eggrafis
echo"


<h1 id=reg style='color:black;'>Εγγραφή:</h1>
<form action='index.php' method=post onsubmit='return check();'>
<table>
<tr><td><input type=text name=vemail id=iemail value=email*
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
 ></td></tr>
<tr><td><input type=text name=vpass id=ipass
value='password*'
onfocus=\"if(this.value==this.defaultValue) {this.value='';  this.setAttribute('type', 'password');}\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
></td></tr>
<tr><td><input type=text name=vfirstname
value='Firstname'
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
></td></tr>
<tr><td><input value='Lastname' type=text name=vlastname
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
></td></tr>
<tr><td><input value='Phone' type=text name=vphone id=iphone
onfocus=\"if(this.value==this.defaultValue)this.value='';\" onblur=\"if(this.value=='')this.value=this.defaultValue;\"
></td></tr>
<tr><td ><input type=submit class='loginbtn' name=vreg value='Sign In'></td></tr>
</table>
</form>
";



?>



<?php

}
else
{
// an exoyme syndethei tote emfanizei analoga me ton xritsi to analogo minima 

if ($usertype==0)
echo "<h3 style='color:#003399;'>Αναμονή επικύρωσης εγγραφής από administrator</h3>";
else
if ($usertype==1) 
echo "<h5 style='color:#003399;'>Your are administrator with email:<b> $_SESSION[email]</b> and name: <b> $_SESSION[lname] $_SESSION[fname]</b> </h5>";
else
if ($usertype==2) 
echo "<h3 style='color:#003399;'>You are Physician with email:<b> $_SESSION[email]</b> and name: <b> $_SESSION[lname] $_SESSION[fname]</b> </h3>";
else
echo "<h3 style='color:#003399;'>You are Nurse with email:<b> $_SESSION[email]</b> and name: <b> $_SESSION[lname] $_SESSION[fname]</b> </h3>";

// kai an eimaste stin arxiki selida emfanizei xarti kai statistika
if (!isset($_GET['pg']))
	echo"
	<div id=map style='width:100%;height:400px;'>
	</div>
	<div id=divstat></div>";
// analoga me to pg fernei tin analogi selida
if (isset($_GET['pg']))
{
	if ($_GET['pg']==0)
	{
		include("users.php");
	}

	if ($_GET['pg']==1)
	{
		include("menupatient.php");
	}

	if ($_GET['pg']==2)
	{
		include("menugiatros.php");
	}
	
	if ($_GET['pg']==21)
	{
		include("patient_insert.php");
	}
	if ($_GET['pg']==22)
	{
		include("patient_provoli.php");
	}
	if ($_GET['pg']==23)
	{
		include("record_create.php");
	}
	if ($_GET['pg']==24)
	{
		include("patient_profile.php");
	}
	
	if ($_GET['pg']==26)
	{
		include("patient_profile2.php");
	}

	if ($_GET['pg']==27)
	{
		include("record_update.php");
	}

	if ($_GET['pg']==28)
	{
		include("user_profile.php");
	}

	if ($_GET['pg']==3)
	{
		include("patient_records.php");
	}
	
	if ($_GET['pg']==4)
	{
		include("physicianprofile.php");
	}

	if ($_GET['pg']==5)
	{
		include("nurseprofile.php");
	}

	if ($_GET['pg']==6)
	{
		include("menupatient2.php");
	}

	if ($_GET['pg']==222)
	{
		include("patient_provoli2.php");
	}

		if ($_GET['pg']==31)
	{
		include("test2.php");
	}

	if ($_GET['pg']==32)
	{
		include("rfid.php");
	}

	if ($_GET['pg']==9)
	{
		include("activities.php");
	}

	if ($_GET['pg']==91)
	{
		include("history.php");
	}

}

}


?>

</div>
</div>


</article>