
<?php


if(isset($_POST['vresolve']))
{
	
	$sql11="update reports set  admin_description='$_POST[vdescadmin]' , id_admin='$userid' , date2=Now(), type=1 where id=$_POST[vid]";
	if (mysql_query($sql11)) echo "Η καταχώρηση έγινε επιτυχώς";
	else echo "Η καταχώρηση δεν έγινε επιτυχώς";	
		
}
else
{

$sql="select *,reports.description as dcr, reports.id as idv from reports,categories where 
id_categories=categories.id and reports.id=$_POST[vid]";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);

?>

 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
 <script>
var map;
var marker;
function initialize() {
  var mapOptions = {
    zoom: 15,
	<?php
    echo "center: new google.maps.LatLng($row[x],$row[y])";
	?>
  };
  

  map = new google.maps.Map(document.getElementById('maps'),
      mapOptions);
	  
	 
 <?php
    echo "addMarker(new google.maps.LatLng($row[x],$row[y]));";
  ?>
	  
 
  
  
}


function addMarker(location) {
 
  
  var markernew = new google.maps.Marker({
    position: location,
    map: map
  });
  
    document.getElementById('xid').value=location.lat();
	  document.getElementById('yid').value=location.lng();
  markernew.setMap(map);

 
}


google.maps.event.addDomListener(window, 'load', initialize);

    </script>
	<?php
	
	echo"
<form action='index.php?pg=25' method=post enctype='multipart/form-data'>
<table width=100% style='background-color:#aaaaaa;' >

<tr><td width=50%><div class='xartis' id=maps ></div></td>
<td>x=<input style='width:100px' type=text name=x id=xid >
<br>y=<input style='width:100px' type=text name=y id=yid ><br>
Κατηγορία: 
<b><u>$row[name]</b></u>
<br><br>
Περιγραφή<br>
<textarea readonly name=vdescription required style='width:250px'  cols=10 rows=5>$row[dcr]</textarea><br>
Εικόνες:<br>";
if ($row['photo1']!='') echo "<a href='files/$row[photo1]' target=_blank><img src='files/$row[photo1]' width=80></a><br>";
if ($row['photo2']!='') echo "<a href='files/$row[photo2]' target=_blank><img src='files/$row[photo2]' width=80></a><br>";
if ($row['photo3']!='') echo "<a href='files/$row[photo3]' target=_blank><img src='files/$row[photo3]' width=80></a><br>";
if ($row['photo4']!='') echo "<a href='files/$row[photo4]' target=_blank><img src='files/$row[photo4]' width=80></a><br>";
echo "<br>
Περιγραφή από administrator<br>
<textarea  name=vdescadmin required style='width:250px'  cols=10 rows=5></textarea><br>

<input type=hidden name=vid value=$_POST[vid] >

</td></tr>



<tr><td colspan=2><input type=submit name=vresolve class='savebtn' value='Resolve'></td></tr>
</table>
</form>
";

}
?>
