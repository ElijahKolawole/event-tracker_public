
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
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Events <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Create Events</a></li>
                        <li><a href="#">Sign Up for Events</a></li>
                        <li><a href="#">Upcomming Events</a></li>
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
                <li><a href="EventHome.html"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">

    
        <h3>
           Welcome member. You can now sign up for available events.
           

        </h3>
        <h2>Upcomming Events</h2>


<?php

include "my_db_function.php";
$conn = My_Connect_DB();

$sql ="SELECT * FROM events;";
$result = My_SQL_EXE($conn, $sql);
My_Show_Table($result);  
die();


mysqli_close($conn);
?>
        <p>
            Thank you for being a valuable member. We hope you are happy with our service.

        </p>
    </div>

</body>
</html>
