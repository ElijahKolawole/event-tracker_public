<?php
session_start(); //starts all the sessions
include ('header.html');
?>
<?php
include "my_db_functions.php";
if(isset($_POST['submit']))
{
	if($_POST['passwd'] != $_POST['passwd2'])
    {
    	echo "password does not match<br/>";
		exit();
    }
    if(isset($_POST['email']) && !empty($_POST['email']) )
    {
    	$conn = My_Connect_DB();
      
        
           
        //verify if the id already exists   
        $sql = "SELECT * FROM user WHERE email='".$_POST['email']."';";
        $result = My_SQL_EXE($conn, $sql);
        if(mysqli_num_rows($result) > 0)		//duplicate id
        {
        	echo "<h3>ID already exists, please choose another one</h3><br/>";
        	//My_Show_Table($result);
            //exit();
           echo "Click <a href ='user_sign_up.php'>here</a> to try again. <br/>";
            die();
           
		}
        else
        {
        	
          
          $sql = "INSERT INTO user VALUES (NULL, '".$_POST['email']."', '".md5($_POST['passwd'])."', '".$_POST['fname']."','".$_POST['lname']."',
          '".$_POST['phone']."');";
          My_SQL_EXE($conn, $sql);
            echo "<hr/>";
            echo "<h1>Thank you for signing up/</h1>";
            echo "Click <a href ='login.php'>here</a> to log in <br/>";
        }
    }
}

?>



 <?php

include ('footer.html');
?>   
