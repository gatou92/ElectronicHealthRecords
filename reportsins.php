
<form action='index.php?pg=5' method=post onsubmit='return check();'>
<table>

<tr><td>email*:</td><td><input type=text name=vemail id=iemail value='$row44[email]'></td></tr>
<tr><td>password*:</td><td><input type=password name=vpass id=ipass></td></tr>
<tr><td>Firstname:</td><td><input type=text name=vfirstname value='$row44[firstname]'></td></tr>
<tr><td>Lastname:</td><td><input type=text name=vlastname value='$row44[lastname]'></td></tr>
<tr><td>Phone:</td><td><input type=text name=vphone id=iphone value='$row44[phone]'></td></tr>
<tr><td colspan=2><input type=submit name=vupdateprofile class='savebtn' value='Save Changes'></td></tr>
</table>
</form>
