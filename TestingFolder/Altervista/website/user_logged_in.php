<?php
session_start();

$page_title = 'Welcome User';
include ('header.html');


include "my_db_functions.php";
$_SESSION["email"] =$_POST["email"];
if(isset($_POST['submit']))
{
    
    $_SESSION["email"] =$_POST["email"];

	if (!empty($_POST['email']))
    {
    	$conn = My_Connect_DB();
        $sql = "SELECT * FROM user WHERE email = '".$_POST['email']."'
        		AND password = '".md5($_POST['passwd'])."';";
                
         $result = My_SQL_EXE($conn, $sql);
         if (mysqli_num_rows($result) <=0) //empty
         {
         	echo "Your id or password is wrong, try again <br/>";
         }
         else
         {
         	
        echo "<h1>Welcome '".$_POST['email']."'</h1>";
        
         }
    }
    }
?>
<?php
include ('footer.html');
