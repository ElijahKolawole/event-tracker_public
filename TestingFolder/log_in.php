<?php
session_start();
?>

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





<div class="container">
        <h2>User Log In</h2>

        <form class="form-horizontal" method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="passwd">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwd" placeholder="Enter password" name="passwd">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="submit">Submit</button>
                </div>
            </div>
        </form>
        <hr/>
Want to sign up, click <a href = "user_sign_up.php">here</a>.
Forget your password? click <a href = "reset.php">here</a> to reset.
    </div>
</form>



<?php
include "my_db_function.php";
if(isset($_POST['submit']))
{
	if (!empty($_POST['email']))
    {
    	$conn = My_Connect_DB();
        $sql = "SELECT * FROM User WHERE email = '".$_POST['email']."'
        		AND passwd = '".md5($_POST['passwd'])."';";
                
         $result = My_SQL_EXE($conn, $sql);
         if (mysqli_num_rows($result) <=0) //empty
         {
         	echo "Your id or password is wrong, try again <br/>";
         }
         else
         {
         	$_SESSION['email'] = $_POST['email'];
         	Show_User($conn, $_POST['email']);
             echo '<script>window.location.href = "logged_in.php";</script>';
            echo "Click here to log off";
         }
       }
       }
         
         	function Show_User($conn, $email)
{
	$sql = "SELECT * FROM User WHERE email = ".$email.";";
    $result =  My_SQL_EXE($conn, $sql);
    if ($row = mysqli_fetch_row($result))
    {
    	echo "Your information for ". $email. " is as follows.<br/>";
    	echo "ID: ".$row[0]."<br/>";
        echo "Name: ".$row[2]."<br/>";
        echo "Phone: ".$row[3]. "<br/>";
        echo "Email: ".$row[4]. "<br/>";
        
    }
    else
    {
    	echo "No such ID: $id <br/>";
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