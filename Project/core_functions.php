


<head>
    <title>Events Tracking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href= "event.css" rel = "stylesheet">

    <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            .navbar {
              margin-bottom: 0;
              border-radius: 0;
            }
            
            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {height: 450px}
            
            /* Set gray background color and 100% height */
            .sidenav {
              padding-top: 20px;
              background-color: #f1f1f1;
              height: 100%;
            }
            
            /* Set black background color, white text and some padding */
            footer {
              background-color: #555;
              color: white;
              padding: 15px;
            }
            
            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
              .sidenav {
                height: auto;
                padding: 15px;
              }
              .row.content {height:auto;} 
            }
          </style>


</head>
<body>

    <nav class="navbar navbar-inverse" >
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Events Tracking<img src="image/iconlogo.png "  width="120" height="40" alt="Logo Icon"></a>
            </div>
            <ul class="nav navbar-nav">
                <li class="wobble-top"><a href="EventHome.php"><img src="image/homeIcon.png " alt="Home Icon">Home</a></li>
                <li class="wobble-top"><a href="" ><img src="image/calendarIcon.png" alt="Calendar Icon">Calendar</a></li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="image/EventsIcon.png" alt="Events Icon">Events <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="Required_Create_Event.php">Create Events</a></li>
                        <li><a href="sign_up_for_event_required.php">Sign Up for Events</a></li>
                        <li><a href="upCommingEvent.php">Upcomming Events</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="image/searchIcon.png" alt="Search Icon">Search <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="search.php">Event by ID</a></li>
                        <li><a href="#">Event by Name</a></li>
                        <li><a href="#">Event by Organizer</a></li>


                    </ul>

                    <li class="wobble-top"><a href="" ><img src="image/envelopeIcon.png" alt="Envelope Icon">Contact</a></li>
                    </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="user_sign_up.php"><img src="image/signupIcon.png" alt="Sign Up Icon"> Sign Up<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="user_sign_up.php">User Sign Up</a></li>
                        <li><a href="organizer_sign_up.php">Oranizer Sign Up</a></li>
                        </ul>
            <li class="dropdown">            
            <a class="dropdown-toggle" data-toggle="dropdown" href="log_in.php"><img src="image/logInIcon.png" alt="Log In Icon"> Login<span class="caret"></span></a>
            <ul class="dropdown-menu">
                        <li><a href="user_log_in.php">Users Log In</a></li>
                        <li><a href="organizer_log_in.php">Organizer Log In</a></li>
            </ul>
        </div>
    </nav>

    

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

