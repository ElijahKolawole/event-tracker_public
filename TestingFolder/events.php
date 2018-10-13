
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

<h2>Upcoming Events</h2>

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

<?php

include "my_db_function.php";
$conn = My_Connect_DB();

$sql ="SELECT * FROM events;";
$result = My_SQL_EXE($conn, $sql);
My_Show_Table($result);  
die();


mysqli_close($conn);
?>



</body>
</html>
