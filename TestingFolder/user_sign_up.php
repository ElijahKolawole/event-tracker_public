
<html lang="en">
<head>
    <title>Events Tracking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Events Tracking</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="EventHome.html">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Events <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="Required_Create_Event.php">Create Events</a></li>
                        <li><a href="#">Sign Up for Events</a></li>
                        <li><a href="events.php">Upcomming Events</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Search <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="events.php">Events</a></li>
                        <li><a href="#">Opening Slots</a></li>

                    </ul>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="user_sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="log_in.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav> 



<body style="background-color:	#C0C0C0;">

<h1>Please provide the following information to register:</h1>
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
	<tr><td align=right>Type your user ID:</td><td><input type="text" name="id" value=""><font color=red>(Only digits allowed)</font></td></tr>
    <tr><td align=right>Choose your password:</td><td><input type="password" name="passwd"></td></tr>
    <tr><td align=right>Retype your password:</td><td><input type="password" name="passwd2"></td></tr>
    <tr><td align=right>Your name:</td><td><input type="text" name="name" value=""></td></tr>
    <tr><td align=right>Your Email:</td><td><input type="text" name="email" value=""></td></tr>
    <tr><td align=right>Your Phone:</td><td><input type="text" name="phone" value=""></td></tr>
    <tr><td align=right><input type="submit" name="submit" value="Sign up"></td>
    	<td><input type="reset" name="reset" value="Reset"></td></tr>
</table>
</form>
<?php
include "my_db_function.php";
if(isset($_POST['submit']))
{
	if($_POST['passwd'] != $_POST['passwd2'])
    {
    	echo "password does not match<br/>";
		exit();
    }
    if(isset($_POST['id']) && !empty($_POST['id']) )
    {
    	$conn = My_Connect_DB();
      
        
           
        //verify if the id already exists   
        $sql = "SELECT * FROM User WHERE id=".$_POST['id'].";";
        $result = My_SQL_EXE($conn, $sql);
        if(mysqli_num_rows($result) > 0)		//duplicate id
        {
        	echo "ID already exists, please choose another one<br/>";
        	//My_Show_Table($result);
            //exit();
            die();
		}
        else
        {
        	
          
          $sql = "INSERT INTO User VALUES (".$_POST['id'].", '".md5($_POST['passwd'])."', '".$_POST['name']."',
          '".$_POST['phone']."', '".$_POST['email']."');";
           
            echo "<hr/>";
            echo "Click <a href ='create_event.php'>here</a> to log in <br/>";
        }
    }
}

?>

<style>
            .footer {
               position: fixed;
               left: 0;
               bottom: 0;
               width: 100%;
               background-color: rgb(7, 9, 26);
               color: white;
               text-align: center;
            }
            </style>
            
            <div class="footer">
              <p><small><i>Copyright &copy; 2018 Event Tracking</i></small><br>
                <small><i><a href ="mailto:ymai@ggc.edu">ymai@ggc.edu</a></i></small><br></p>
            </div>



</body>
</html>
