<?php

$page_title = 'Login';
include ('header.html');

if (isset($errors) && !empty($errors)){
echo '<h1>Error</h1>
<p class ="error">The following error(s) occured:<br />';
foreach ($errors as $msg){
echo " - $msg<br />\n";
}
echo '</p><p>Please try again. </p>';
}

//Display form
?>
<h1>Login</h1>
<form action ="user_logged_in.php" method = "post">
<p>Email Adrress: <input type ="text" name="email" size="20" maxlength="60"/></p>
<p>Password: <input type ="text" name="passwd" size="20" maxlength="20"/></p>
<p><input type = "submit" name = "submit" value = "Login" /></p>
</form>

<?php include ('footer.html');
