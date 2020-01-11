<?php
 session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Portal Hostel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/newflipfloppost.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- <script src="./gototop.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <style>
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation">
    <div class="container ml-0">
        <a class="navbar-brand align-middle" href="index.php"><img src="img/iiitnlogo.png" alt="logo" width="50" height="50" class=" d-inline-block align-top pr-2">IIITN HOSTEL</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item active mar1 mx-4">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mar1  mx-4">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item mar1  mx-4">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item mar1  mx-4">
                    <a class="nav-link" href="mess.php">Mess Menu</a>
                </li>

                <?php
                 if(isset($_SESSION['type'])){
                     echo ' <li class="nav-item mar1  mx-4">
                            <a class="nav-link" href="notice.php">Notices</a>
                            </li>';
                     if($_SESSION['type']=='student'){
                        echo '  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Student Corner
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item " href="editprofiles.php">Edit Profile</a>
                        <a class="dropdown-item " href="complaint.php">Register Complaint</a>
                        <a class="dropdown-item " href="leave.php">Request Leave</a>
                        <a class="dropdown-item " href="viewSL.php">My Leaves</a>
                        <a class="dropdown-item " href="viewSC.php">My Complaints</a>
                        </div>
                        </li>';
                     }
                     else if($_SESSION['type']=='warden'){
                        echo '  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Warden Corner
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item " href="editprofiles.php">Edit Profile</a>
                        <a class="dropdown-item " href="feedback.php">Give Feedback</a>
                        <a class="dropdown-item " href="viewSTC.php">Complaint Logs</a>
                        <a class="dropdown-item " href="viewSTL.php">Leave Logs</a>
                        <a class="dropdown-item " href="putnotice.php">Put Notice</a>
                        <a class="dropdown-item " href="delnotice.php">Manage Notice</a>
                        </div>
                        </li>';
                     }
                     else if($_SESSION['type']=='hmc'){
                        echo '  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        HMC Corner
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item " href="editprofiles.php">Edit Profile</a>
                        <a class="dropdown-item " href="feedback.php">Give Feedback</a>
                        <a class="dropdown-item " href="viewSTC.php">Complaint Logs</a>
                        <a class="dropdown-item " href="viewSTL.php">Leave Logs</a>
                        <a class="dropdown-item " href="putnotice.php">Put Notice</a>
                        </div>
                        </li>';
                     }
                     if($_SESSION['type']=='staff'){
                        echo '  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Staff Corner
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item " href="editprofiles.php">Edit Profile</a>
                        <a class="dropdown-item " href="feedback.php">Give Feedback</a>
                        <a class="dropdown-item " href="viewSTC.php">Complaint Logs</a>
                        <a class="dropdown-item " href="viewSTL.php">Leave Logs</a>
                        </div>
                        </li>';
                     }
                }
                ?>
            </ul>
            
        <?php
                if(isset($_SESSION['type'])){
                   
                    echo '<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="dropdown order-1">
                        <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Logout <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                           <li class="px-3 py-2">
                               <form class="form" role="form" action="includes/logout.inc.php" method="POST">
                                    
                                    <div class="form-group">
                                        <button type="submit" name="logout_btn" class="btn btn-primary btn-block">Logout</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>';
                }
                else{
                   

                    echo '<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="dropdown order-1">
                        <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Login <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                           <li class="px-3 py-2">
                               <form class="form" role="form" action="includes/login.inc.php" method="POST">
                                    <div class="form-group">
                                        <input id="emailInput" name="rollnumber" placeholder="ROLL NUMBER" class="form-control form-control-sm" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <input id="passwordInput" name="pwd" placeholder="Password" class="form-control form-control-sm" type="password" required="">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="login_btn" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>';
                }
            ?>
            
        </div>
    </div>
    </nav>
<br>
