    <?php
	if ($login==1){

    if ($usertype==0)
	echo "
	<ul class='art-hmenu'>
	<li><a href='index.php'>Home</a></li>
	<li><a href='index.php?logout=1'>Logout</a></li>
	</ul> ";



	if ($usertype==1)
	echo "
	<ul class='art-hmenu'>
	<li><a href='index.php'>Home</a></li>
	<li><a href='index.php?pg=0'>Users</a></li>
	<li><a href='index.php?pg=1'>Patients</a></li>
	<li><a href='index.php?logout=1'>Logout</a></li>
	</ul> ";
	
	
	if ($usertype==2)
	echo "
	<ul class='art-hmenu'>
	<li><a href='index.php'>Home</a></li>
	<li><a href='index.php?pg=6'>Patients</a></li>
	<li><a href='index.php?pg=3'>Patient records</a></li>
	<li><a href='index.php?pg=4'>Profile</a></li>
	<li><a href='index.php?pg=32'>RFID</a></li>
	<li><a href='index.php?logout=1'>Logout</a></li>
	</ul> ";
	


	if ($usertype==3)
	echo "
	<ul class='art-hmenu'>
	<li><a href='index.php'>Home</a></li>
	<li><a href='index.php?pg=6'>Patients</a></li>
	<li><a href='index.php?pg=3'>Patient records</a></li>
	<li><a href='index.php?pg=9'>Activities</a></li>
	<li><a href='index.php?pg=5'>Profile</a></li>
	<li><a href='index.php?logout=1'>Logout</a></li>

	</ul> ";
	
    }
	else
	{
	echo "<ul class='art-hmenu'>
	<li><a href='index.php'>Home</a></li> 
	<li><a href='index.php#cont'>Sign in</a></li> 
	<li><a href='index.php#reg'>Registration</a></li>
	
	</ul> ";
	
	
	}
	?>