<?php 

//anoigei ena session 
session_start();

/// syndeetai me tin vasi
 mysql_connect("localhost","root","");

mysql_select_db("hospital");
mysql_query("set names 'utf8'");


// to login einai arxika 0 kai ginetai 1 an syndethei
$login=0;

// an vrei sti syndesi tin timi logout kanei session kena pou simainei episkeptis
if (isset($_GET['logout']))
{
   $_SESSION['email']='';
	$_SESSION['pass']='';
	$_SESSION['fname']='';
	$_SESSION['lname']='';

}

// se peripetosi poy kanoume syndesi apo tin forma syndesis (exei patithei to koumpi tis formas)
if (isset($_POST['vsend']))
{

// zitame ton xristi me email kai pass
	$sql1="select * from users where email='$_POST[vemail]' and password='".md5($_POST['vpass'])."'";
// ekteloume to erotima to opoio stelnei kai kriptografimeno to password 
	$res=mysql_query($sql1);
	
// metrame poses grammes stelnei to apoteslsma tou erotimatos (diladi an vrike xristi i oxi)
	if (mysql_num_rows($res)>0)
	{
	
	// an vrike tote syndethike 
	$login=1;
	
	// pairno tin proti grammi tou pinaka (pou einai kai monadiki)
	$row2=mysql_fetch_array($res);
	
	// apothikevo ta parakato stoixeia
    $_SESSION['email']=$row2['email'];
	$_SESSION['pass']=$row2['password'];
	$_SESSION['lname']=$row2['lname'];
	$_SESSION['fname']=$row2['fname'];
	$userid=$row2['id'];
	$usertype=$row2['type'];
	}
	else
	{
	
	// allios petaw ena mikro javascript pou anoigei ena parathiraki
	echo "<script>alert('You gave a wrong username or password!');</script>";

	}

}
// alliws an den exei patithei koumpi tis formas syndesis
else
{
// tote elegxei an exei kratithei to email (diladi an eimaste idi syndemenei

if (isset($_SESSION['email'])){

// kai kanei ta idia alla tora me ton pinaka session gia email kai password
	$sql1="select * from users where email='$_SESSION[email]' and password='$_SESSION[pass]'";
	$res=mysql_query($sql1);
	if (mysql_num_rows($res)>0)
	{
	$login=1;
	$row2=mysql_fetch_array($res);
   $userid=$row2['id'];
   $usertype=$row2['type'];
	}
}
}


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.59861 -->
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Quattrocento+Sans&amp;subset=latin">

    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>


<style>.art-content .art-postcontent-0 .layout-item-old-0 { padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style></head>
<body>
<div id="art-main">
<header class="art-header">


    <div class="art-shapes">
<div class="art-object587581353" data-left="99.25%"></div>

            </div>
<h1 class="art-headline" data-left="12.28%">
    <a href="#"></a>
</h1>
<h2 class="art-slogan" data-left="11.49%"></h2>




                        
                    
</header>
<nav class="art-nav">
    <div class="art-nav-inner">
	
	<?php
	include "menu.php";
	?>
    </div>
    </nav>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
						
						<?php
						
						include "main.php";
						?>
						
						
						</div>
                    </div>
                </div>
            </div><footer class="art-footer">

<p>Copyright © 2016. All Rights Reserved.</p>
</footer>

    </div>
    <p class="art-page-footer">
        <span id="art-footnote-links"><a href="http://www.artisteer.com/" target="_blank">Web Template</a> created with Artisteer.</span>
    </p>
</div>


</body></html>