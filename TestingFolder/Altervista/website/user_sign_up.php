<?php
include ('header.html');
?>


<body style="background-color:	#C0C0C0;">

<h1>Please provide the following information to register:</h1>
<form method="post" enctype="multipart/form-data" action="validate_sign_up.php" >
<table>
	<tr><td align=right>Your Email:</td><td><input type="text" name="email" value=""></td></tr>
    <tr><td align=right>Choose your password:</td><td><input type="password" name="passwd"></td></tr>
    <tr><td align=right>Retype your password:</td><td><input type="password" name="passwd2"></td></tr>
    <tr><td align=right>First Name:</td><td><input type="text" name="fname" value=""></td></tr>
    <tr><td align=right>Last Name:</td><td><input type="text" name="lname" value=""></td></tr>
	
    <tr><td align=right>Your Phone:</td><td><input type="text" name="phone" value=""></td></tr>
    <tr><td align=right><input type="submit" name="submit" value="Sign up"></td>
    	<td><input type="reset" name="reset" value="Reset"></td></tr>
</table>
</form>


<?php include ('footer.html');?>

</body>

